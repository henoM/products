<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\AttachmentAddRequest;
use App\Http\Requests\csvCreateRequest;
use App\Http\Requests\ProductCreateRequest;
use App\Models\Category;
use App\Models\File;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use \Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpKernel\EventListener\ExceptionListener;

class ProductController extends Controller
{

    public function crateProduct()
    {
        $categories = Category::with('subcategories')->get()->pluck('category','id');

        return view('home.product.create',compact('categories'));
    }
    public function storeProduct(ProductCreateRequest $request)
    {
        $user_id = Auth::User()->id;
        $product =  new Product;
        $products = [
            'upc' =>  $request->upc,
            'case_count' => $request->case_count,
            'name' => $request->name,
            'description' => $request->description,
            'brand' => $request->brand,
            'size' =>$request->size,
            'user_id' =>  $user_id,
            'category_id' =>$request->categories_id,
            'subcategory_id' => $request->subcategories_id
        ];
        $product->create($products);
        $id = $product->orderBy('created_at','desc')->first()->id;
        mkdir("originalFiles/attachment".$id, 0777);
        mkdir("files/attachment".$id, 0777);
        if ($request->hasFile('file')) {
            $file = $request->file;

            $extesion = $file->getClientOriginalExtension();
//            if($extesion == 'mp4' and 10485760)
            $newName = str_random(40);
            $fileName = $newName . '.' . $extesion;
            $path = 'originalFiles/attachment'.$id;
            $file->move($path, $fileName);
            $originalFile = public_path().'/originalFiles/attachment'.$id.'/'.$fileName;
            $ffmpeg = public_path().'\ffmpeg\ffmpeg.exe';
            $filePath = "files/attachment".$id.'/'.$fileName;
            $cmd = "$ffmpeg -i $originalFile -vf scale=400:400 $filePath";
            shell_exec($cmd);
            $file = new File;
            $files = [
                'path' => $fileName,
                'product_id' => $id
            ];
            $file->create($files);
            return redirect()->to('products')->with('create', 'New product postes');
        }
    }

    public function view($id)
    {
        $product = Product::with('files')->where('id',$id)->first();

        return view('home.product.view',compact('product'));
    }
    public function fileAdd($id)
    {
        return view('home.product.addAttachment',compact('id'));
    }
    public function fileStore($id,AttachmentAddRequest $request)
    {
        $count = File::where('product_id',$id)->count();
        if ($count > 8){
            return redirect()->to('product/view'.$id)->with('danger', '9 ic avel chi kara lini');
        }
        else{
            if ($request->hasFile('file')) {
                $file = $request->file;
                $extesion = $file->getClientOriginalExtension();
                    $newName = str_random(40);
                    $fileName = $newName . '.' . $extesion;
                    $ffmpeg = public_path() . '\ffmpeg\ffmpeg.exe';
                    $filePath = "files/attachment" . $id . '/' . $fileName;
                if (($extesion == 'jpg' or $extesion == 'png' or $extesion == 'jpeg') and $file->getClientSize() < 20971520){
                    dd(1);
                    $path = 'originalFiles/attachment' . $id;
                    $file->move($path, $fileName);
                    $originalFile = public_path() . '/originalFiles/attachment' . $id . '/' . $fileName;
                    $cmd = "$ffmpeg -i $originalFile -vf scale=400:400 $filePath";
                    shell_exec($cmd);
                    $file = new File;
                    $files = [
                        'path' => $fileName,
                        'product_id' => $id
                    ];
                    $file->create($files);
                    return redirect()->to('product/view' . $id)->with('add', 'New attachment added');
             }
             else if ($extesion == 'mp4' and $file->getClientSize() < 52428800){
                 $path = 'files/attachment' . $id;
                 $file->move($path, $fileName);
                 $name = $path.'/'.'l'.$newName.'.gif';
                 $video = public_path() . '/files/attachment' . $id . '/' . $fileName;
                 $cmd = "$ffmpeg -ss 2 -i $video -vframes 1 -filter scale=400:400 $name";
                 shell_exec($cmd);
                 $file = new File;
                 $files = [
                     'path' => $newName,
                     'product_id' => $id
                 ];
                 $file->create($files);
                 return redirect()->to('product/view' . $id)->with('add', 'New attachment added');

             }else{

             }return redirect()->to('product/view' . $id)->with('danger', 'invalid format or size');
            }
        }
    }

    public function update($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('home.product.update',compact('product'));
    }
    public function edit($id,Request $request)
    {
        $products = $request->except('_token','_method');

        $product =  new Product;
        $product->where('id',$id)->update($products);
        return redirect()->to('product/view' . $id)->with('update', 'product updated');

    }
    public function delete($id)
    {
        DB::table('products')->where('id', $id)->delete();
         rmdir(public_path()."/originalFiles/attachment".$id);
         rmdir(public_path()."/files/attachment".$id);
        return redirect()->to('products')->with('delete', ' deleted product');
    }
    public function crateProductCsv()
    {

        $categories = Category::with('subcategories')->get()->pluck('category','id');

        return view('home.product.createCsv',compact('categories'));

    }
    public function storeProductCsv(csvCreateRequest $request)
    {
        $user_id = Auth::User()->id;
        $product =  new Product;
        $file = new File;
        $path = $request->file('file')->getRealPath();

        $data = Excel::load($path)->get();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $products = [
                    'upc' =>  $value->upc,
                    'case_count' => $value->case_count,
                    'name' => $value->name,
                    'description' => $value->description,
                    'brand' => $value->brand,
                    'size' =>$value->size,
                    'user_id' =>  $user_id,
                    'category_id' =>$request->categories_id,
                    'subcategory_id' => $request->subcategories_id
                ];
                $product->create($products);

                $id = $product->orderBy('created_at','desc')->first()->id;
                mkdir("files/attachment".$id, 0777);

                $newName = str_random(40);
                $downloadFile = 'downloadFiles/'.$newName.'.jpg';
                file_put_contents($downloadFile, file_get_contents($value->image));
                $fileName = public_path().'/'.$downloadFile;
                $ffmpeg = public_path().'\ffmpeg\ffmpeg.exe';
                $filePath = "files/attachment".$id.'/'.$newName.'.jpg';
                $cmd = "$ffmpeg -i $fileName -vf scale=400:400 $filePath";
                shell_exec($cmd);

                $files = [
                    'path' => $newName.'.jpg',
                    'product_id' => $id
                ];
                $file->create($files);
            }
        }

        return redirect()->to('products')->with('create', 'New products postes');

    }

}

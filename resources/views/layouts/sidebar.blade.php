<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <h3 class="menu-title">UI elements</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="{{route('products')}}" class="dropdown-toggle"> <i class="menu-icon fa fa-table"></i>Products</a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="{{route('categories')}}" class="dropdown-toggle"> <i class="menu-icon fa fa-table"></i>Categories</a>
                </li>
            </ul>
        </div>
    </nav>
</aside>

<x-website-layout>
    <main class="main">
        <div class="page-header"
             style=" background-color: #3C63A4;">
            <h1 class="page-title">All Products</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="d-icon-home"></i></a></li>
                <li class="delimiter">/</li>
                <li>Products</li>
            </ul>
        </div>
        <!-- End PageHeader -->
        <div class="page-content mb-10 pb-3">
            <div class="container">
                @if (session('cart_empty'))
                    <div class="alert alert-warning alert-dark alert-round alert-inline mt-5">
                        <h4 class="alert-title">Error :</h4>
                        No Any Product In The Cart Yet..
                        <button type="button" class="btn btn-link btn-close">
                            <i class="d-icon-times"></i>
                        </button>
                    </div>
                @endif
                <div class="row main-content-wrap gutter-lg">
                    <aside
                        class="col-lg-3 sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                        <div class="sidebar-content">
                            <div class="sticky-sidebar" data-sticky-options="{'top': 10}">
                                <div class="filter-actions mb-4">
                                    <a href="#"
                                       class="sidebar-toggle-btn toggle-remain btn btn-outline btn-primary btn-icon-right btn-rounded">Filter<i
                                            class="d-icon-arrow-left"></i></a>
                                    <a href="#" class="filter-clean">Clean All</a>
                                </div>
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">All Categories</h3>
                                    <ul class="widget-body filter-items search-ul">
                                        @forelse($categories as $category)
                                            <li>
                                                <a href="#">{{$category->name}}</a>
                                                @if(count($category->children) != 0)
                                                    <ul>
                                                        @forelse($category->children as $child)
                                                            <li><a href="#">{{$child->name}}</a></li>
                                                        @empty
                                                        @endforelse
                                                    </ul>
                                                @endif
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">Filter by Price</h3>
                                    <div class="widget-body mt-3">
                                        <form action="#">
                                            <div class="filter-price-slider"></div>

                                            <div class="filter-actions">
                                                <div class="filter-price-text mb-4">Price:
                                                    <span class="filter-price-range"></span>
                                                </div>
                                                <button type="submit"
                                                        class="btn btn-dark btn-filter btn-rounded">Filter</button>
                                            </div>
                                        </form><!-- End Filter Price Form -->
                                    </div>
                                </div>
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">Brands</h3>
                                    <ul class="widget-body filter-items">
                                       @forelse($brands as $brand)
                                            <li><a href="#">{{$brand->name}}</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <div class="col-lg-9 main-content">
                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            <div class="toolbox-left">
                                <a href="#"
                                   class="toolbox-item left-sidebar-toggle btn btn-sm btn-outline btn-primary btn-rounded btn-icon-right d-lg-none">Filter<i
                                        class="d-icon-arrow-right"></i></a>
                                <div class="toolbox-item toolbox-sort select-box text-dark">
                                    <label>Sort By :</label>
                                    <select name="orderby" class="form-control">
                                        <option value="default">Default</option>
                                        <option value="popularity" selected="selected">Most Popular</option>
                                        <option value="rating">Average rating</option>
                                        <option value="date">Latest</option>
                                        <option value="price-low">Sort forward price low</option>
                                        <option value="price-high">Sort forward price high</option>
                                        <option value="">Clear custom sort</option>
                                    </select>
                                </div>
                            </div>
                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show select-box text-dark">
                                    <label>Show :</label>
                                    <select name="count" class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                        <option value="{{route('website.products.index',"per_page=12")}}"
                                            @if(request()->get('per_page') == 12)
                                                selected
                                            @endif>
                                            12
                                        </option>
                                        <option value="{{route('website.products.index',"per_page=24")}}"
                                                @if(request()->get('per_page') == 24)
                                                    selected
                                                @endif>24
                                        </option>
                                        <option value="{{route('website.products.index',"per_page=36")}}"
                                                @if(request()->get('per_page') == 36)
                                                    selected
                                                @endif>36
                                        </option>
                                    </select>

                                </div>
                                <div class="toolbox-item toolbox-layout">
                                    <a href="shop-list.html" class="d-icon-mode-list btn-layout"></a>
                                    <a href="shop.html" class="d-icon-mode-grid btn-layout active"></a>
                                </div>
                            </div>
                        </nav>
                        <div class="row cols-2 cols-sm-3 product-wrapper">
                            @foreach($products as $product)
                                <x-product-wrap :product="$product"/>
                            @endforeach
                        </div>
                        <nav class="toolbox toolbox-pagination">
                           {{ $products->withQueryString()->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-website-layout>

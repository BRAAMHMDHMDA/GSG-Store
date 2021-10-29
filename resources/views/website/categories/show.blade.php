<x-website-layout>
    <div class="page-header"
         style="background-image: url('/website/images/shop/page-header-back.jpg'); background-color: #3C63A4;">
        <h3 class="page-subtitle">Category</h3>
        <h1 class="page-title">{{$category->name}}</h1>
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="d-icon-home"></i></a></li>
            <li class="delimiter">/</li>
            <li><a href="{{route('website.category.index')}}">Categories</a></li>
            <li class="delimiter">/</li>
            <li>{{$category->name}}</li>
        </ul>
    </div>
    <!-- End PageHeader -->
    <div class="page-content mb-10 pb-6">
        <div class="container">
            <div class="toolbox-wrap">
                <aside class="sidebar sidebar-fixed shop-sidebar closed">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
{{--                    <div class="sidebar-content">--}}
{{--                        <div class="mb-0 mb-lg-4">--}}
{{--                            <div class="filter-actions">--}}
{{--                                <a href="#"--}}
{{--                                   class="sidebar-toggle-btn toggle-remain btn btn-sm btn-outline btn-rounded btn-primary">Filter<i--}}
{{--                                        class="d-icon-arrow-left"></i></a>--}}
{{--                                <a href="#" class="filter-clean">Clean All</a>--}}
{{--                            </div>--}}
{{--                            <div class="row cols-lg-4">--}}
{{--                                <div class="widget">--}}
{{--                                    <h3 class="widget-title">Size</h3>--}}
{{--                                    <ul class="widget-body filter-items">--}}
{{--                                        <li><a href="#">Extra Large</a></li>--}}
{{--                                        <li><a href="#">Large</a></li>--}}
{{--                                        <li><a href="#">Medium</a></li>--}}
{{--                                        <li><a href="#">Small</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="widget">--}}
{{--                                    <h3 class="widget-title">Color</h3>--}}
{{--                                    <ul class="widget-body filter-items">--}}
{{--                                        <li><a href="#">Black</a></li>--}}
{{--                                        <li><a href="#">Blue</a></li>--}}
{{--                                        <li><a href="#">Brown</a></li>--}}
{{--                                        <li><a href="#">Green</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="widget price-with-count">--}}
{{--                                    <h3 class="widget-title">Price</h3>--}}
{{--                                    <ul class="widget-body filter-items filter-price">--}}
{{--                                        <li class="active"><a href="#">All</a><span>(10)</span></li>--}}
{{--                                        <li><a href="#">$0.00 - $100.00</a><span>(1)</span></li>--}}
{{--                                        <li><a href="#">$100.00 - $200.00</a><span>(9)</span></li>--}}
{{--                                        <li><a href="#">$200.00 +</a><span>(3)</span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="widget">--}}
{{--                                    <h3 class="widget-title">Tags</h3>--}}
{{--                                    <div class="widget-body pt-2">--}}
{{--                                        <a href="#" class="tag">Bag</a>--}}
{{--                                        <a href="#" class="tag">Classic</a>--}}
{{--                                        <a href="#" class="tag">Converse</a>--}}
{{--                                        <a href="#" class="tag">Fit</a>--}}
{{--                                        <a href="#" class="tag">Green</a>--}}
{{--                                        <a href="#" class="tag">Jack and Jones</a>--}}
{{--                                        <a href="#" class="tag">Jeans</a>--}}
{{--                                        <a href="#" class="tag">Jumper</a>--}}
{{--                                        <a href="#" class="tag">Leather</a>--}}
{{--                                        <a href="#" class="tag">Diesel</a>--}}
{{--                                        <a href="#" class="tag">Man</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </aside>
                <div class="toolbox sticky-toolbox sticky-content fix-top">
                    <div class="toolbox-left">
                        <a href="#"
                           class="toolbox-item left-sidebar-toggle btn btn-outline btn-primary btn-rounded btn-icon-left font-primary"><i
                                class="d-icon-filter-2"></i>Filter</a>
                        </p>
                    </div>
                    <div class="toolbox-right">
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
                        <div class="toolbox-item toolbox-layout">
                            <a href="#" class="d-icon-mode-list btn-layout"></a>
                            <a href="#" class="d-icon-mode-grid btn-layout active"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row cols-2 cols-sm-3 cols-md-4 product-wrapper">
                @forelse($category->products as $product)
                    <x-product-wrap :product="$product" />
                @empty
                    <h5 class="title title-center">There are no products in this category</h5>
                @endforelse
            </div>
            <nav class="toolbox toolbox-pagination">
                <h3 class="show-info mr-sm-auto">
                {{ $category->products->links() }}
                </h3>
            </nav>
        </div>
    </div>
</x-website-layout>

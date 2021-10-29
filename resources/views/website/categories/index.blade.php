<x-website-layout>
    <div class="page-header"
         style="background-image: url('/website/images/shop/page-header-back.jpg'); background-color: #3C63A4;">
        <h3 class="page-subtitle">Categories</h3>
        <h1 class="page-title">All Categories</h1>
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="d-icon-home"></i></a></li>
            <li class="delimiter">/</li>
            <li><a href="#">Categories</a></li>
        </ul>
    </div>
    <!-- End PageHeader -->
    <div class="page-content">
        <div class="container">
            <section class="mt-10 pt-4 pb-10 mb-10">
                <div style="display: block; text-align: center; margin-bottom: inherit">
                    <h2 class="title title-center" style="display: inline">Main Categories</h2><small> {{$categories->count()}} </small>
                </div>
                <div class="row cols-lg-3 cols-sm-2 cols-1" >
                    @forelse($categories as $category)
                        <div class="row">
                            <div class="category category-group-image pt-2 pb-2 mb-5 mr-3">
                                <a href="{{ route('website.category.show', $category->slug) }}">
                                    <figure class="category-media">
                                        <img src="{{ $category->image_path }}" alt="category" width="190"
                                             height="169" />
                                    </figure>
                                </a>
                                <div class="category-content ml-2">
                                    <h4 class="category-name"><a href="{{ route('website.category.show', $category->slug) }}">{{ $category->name }}</a></h4>
                                    <ul class="category-list">
                                        @forelse($category->children as $child)
                                            <li><a href="{{ route('website.category.show', $child->slug) }}">{{$child->name}}</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </section>
        </div>
    </div>
</x-website-layout>

<div class="product-wrap">
    <div class="product">
        <figure class="product-media">
            <a href="{{ route('website.product.details',$product->slug) }}">
                <img src="{{$product->image_url}}" alt="product" width="280" height="315">
            </a>
            <div class="product-action-vertical">
                <form action="{{route('website.cart.store')}}" method="post" id="add-to-cart">
                    @csrf
                    <input hidden name="product_id" value="{{$product->id}}" />
                    <input hidden name="quantity" value="1" />

                    <button
                        class="btn-product-icon btn-cart"
                        type="submit" title="Add to cart">
                        <i class="d-icon-bag"></i>
                    </button>
                </form>
                @auth
                    <form action="{{route('website.wishlist.store')}}" method="post" id="add-to-cart">
                        @csrf
                        <input hidden name="product_id" value="{{$product->id}}" />
                        <input hidden name="is_fav" value="{{$product->is_fav}}" />
                        <button type="submit" class="btn-product-icon" title="Add to wishlist">
                                @if($product->is_fav == true)
                                    <i class="d-icon-heart-full"></i>
                                @else
                                    <i class="d-icon-heart"></i>
                                @endif
                        </button>
                    </form>
                @endauth
            </div>
            <div class="product-action">
                <a href="#" class="btn-product btn-quickview" id="{{$product->id}}" title="Quick View">
                    Quick View
                </a>
            </div>
        </figure>
        <div class="product-details">
            <div class="product-cat">
                <a href="#">{{ $product->category->name }}</a>
            </div>
            <h3 class="product-name">
                <a href="{{ route('website.product.details',$product->slug) }}">{{$product->name}}</a>
            </h3>
            <div class="product-price">
                @if($product->sale_price)
                    <ins class="new-price">${{$product->sale_price}}</ins><del class="old-price">${{$product->price}}</del>
                @else
                    <span>${{$product->price}}</span>
                @endif
            </div>
            <div class="ratings-container">
                <div class="ratings-full">
                    <span class="ratings" style="width:100%"></span>
                    <span class="tooltiptext tooltip-top"></span>
                </div>
                <a href="#" class="rating-reviews">( 6 reviews )</a>
            </div>
        </div>
    </div>
</div>

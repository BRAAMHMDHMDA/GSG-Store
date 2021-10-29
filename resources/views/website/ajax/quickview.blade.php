<div class="product product-single row product-popup">
	<div class="col-md-6">
		<div class="product-gallery">
			<div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
				<figure class="product-image">
					<img src="{{$product->image_url}}"
						data-zoom-image="{{$product->image_url}}" alt="Blue Pinafore Denim Dress"
						width="580" height="580">
				</figure>
				@if($product->images()->count() != 0)
                    <figure class="product-image">
                        <img src="images/product/product-1-2-580x652.jpg"
                             data-zoom-image="images/product/product-1-2-800x900.jpg" alt="Blue Pinafore Denim Dress"
                             width="580" height="580">
                    </figure>
                    <figure class="product-image">
                        <img src="images/product/product-1-3-580x652.jpg"
                             data-zoom-image="images/product/product-1-3-800x900.jpg" alt="Blue Pinafore Denim Dress"
                             width="580" height="580">
                    </figure>
                    <figure class="product-image">
                        <img src="images/product/product-1-4-580x652.jpg"
                             data-zoom-image="images/product/product-1-4-800x900.jpg" alt="Blue Pinafore Denim Dress"
                             width="580" height="580">
                    </figure>
                @endif
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="product-details scrollable pr-0 pr-md-3">
			<h1 class="product-name mt-0">{{$product->name}}</h1>
			<div class="product-meta">
				SKU: <span class="product-sku">{{$product->sku}}</span>
                Category: <span class="product-brand">{{$product->category->name}}</span>
                Brand: <span class="product-brand">{{$product->brand->name}}</span>
			</div>
            <div class="product-price">
                @if($product->sale_price)
                    <ins class="new-price">${{$product->sale_price}}</ins><del class="old-price">${{$product->price}}</del>
                @else
                    <span class="price">${{$product->price}}</span>
                @endif
            </div>
			<div class="ratings-container">
				<div class="ratings-full">
					<span class="ratings" style="width:80%"></span>
					<span class="tooltiptext tooltip-top"></span>
				</div>
				<a href="#product-tab-reviews" class="link-to-tab rating-reviews">( 11 reviews )</a>
			</div>
			<p class="product-short-desc">{{$product->description}}</p>

{{--			<div class="product-form product-color">--}}
{{--				<label>Color:</label>--}}
{{--				<div class="product-variations">--}}
{{--					<a class="color" data-src="images/demos/demo7/products/big1.jpg" href="#"--}}
{{--						style="background-color: #1e73be"></a>--}}
{{--					<a class="color" data-src="images/demos/demo7/products/2.jpg" href="#"--}}
{{--						style="background-color: #56962e"></a>--}}
{{--					<a class="color" data-src="images/demos/demo7/products/3.jpg" href="#"--}}
{{--						style="background-color: #965000"></a>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			<div class="product-form product-size">--}}
{{--				<label>Size:</label>--}}
{{--				<div class="product-form-group">--}}
{{--					<div class="product-variations">--}}
{{--						<a class="size" href="#">M</a>--}}
{{--						<a class="size" href="#">L</a>--}}
{{--					</div>--}}
{{--					<a href="#" class="product-variation-clean">Clean All</a>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			<div class="product-variation-price">--}}
{{--				<span>$239.00</span>--}}
{{--			</div>--}}

{{--			<hr class="product-divider">--}}

{{--            <form action="{{route('website.cart.store')}}" method="post" id="add-to-cart">--}}
{{--                @csrf--}}
{{--                <input hidden name="product_id" value="{{$product->id}}" />--}}
{{--                <div class="product-form product-qty">--}}
{{--                    <div class="product-form-group">--}}
{{--                        <div class="input-group mr-2">--}}
{{--                            <button class="quantity-minus d-icon-minus"></button>--}}
{{--                            <input class="quantity form-control" type="number" name="quantity" min="1" max="1000000">--}}
{{--                            <button class="quantity-plus d-icon-plus"></button>--}}
{{--                        </div>--}}
{{--                        <button class="btn-product btn-cart text-normal ls-normal font-weight-semi-bold" type="submit">--}}
{{--                            <i class="d-icon-bag"></i>--}}
{{--                            Add to Cart--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}

{{--			<hr class="product-divider mb-3">--}}
{{--			<div class="product-footer">--}}
{{--				<a href="#" class="btn-product btn-wishlist mr-4"><i class="d-icon-heart"></i>Add to wishlist</a>--}}
{{--			</div>--}}
		</div>
	</div>
</div>

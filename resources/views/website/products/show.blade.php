<x-website-layout>
    <main class="main mt-6 single-product">
        <div class="page-content mb-10 pb-6">
            <div class="container">
                <div class="mb-5" id="alert"></div>
                <div class="product product-single row mb-7">
                    <div class="col-md-6 sticky-sidebar-wrapper">
                        <div class="product-gallery pg-vertical sticky-sidebar"
                             data-sticky-options="{'minWidth': 767}">
                            <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                                <figure class="product-image">
                                    <img src="{{$product->image_url}}"
                                         data-zoom-image="images/product/product-1-1-800x900.jpg"
                                         alt="Women's Brown Leather Backpacks" width="800" height="900">
                                </figure>
                                <figure class="product-image">
                                    <img src="{{asset('website/images/product/product-1-2-580x652.jpg')}}"
                                         data-zoom-image="images/product/product-1-2-800x900.jpg"
                                         alt="Women's Brown Leather Backpacks" width="800" height="900">
                                </figure>
                                <figure class="product-image">
                                    <img src="{{asset('website/images/product/product-1-3-580x652.jpg')}}"
                                         data-zoom-image="images/product/product-1-3-800x900.jpg"
                                         alt="Women's Brown Leather Backpacks" width="800" height="900">
                                </figure>
                                <figure class="product-image">
                                    <img src="{{asset('website/images/product/product-1-4-580x652.jpg')}}"
                                         data-zoom-image="images/product/product-1-4-800x900.jpg"
                                         alt="Women's Brown Leather Backpacks" width="800" height="900">
                                </figure>
                            </div>
                            <div class="product-thumbs-wrap">
                                <div class="product-thumbs">
                                    <div class="product-thumb active">
                                        <img src="{{$product->image_url}}" alt="product thumbnail"
                                             width="109" height="122">
                                    </div>
                                    <div class="product-thumb">
                                        <img src="{{asset('website/images/product/product-1-2-109x122.jpg')}}" alt="product thumbnail"
                                             width="109" height="122">
                                    </div>
                                    <div class="product-thumb">
                                        <img src="{{asset('website/images/product/product-1-3-109x122.jpg')}}" alt="product thumbnail"
                                             width="109" height="122">
                                    </div>
                                    <div class="product-thumb">
                                        <img src="{{asset('website/images/product/product-1-4-109x122.jpg')}}" alt="product thumbnail"
                                             width="109" height="122">
                                    </div>
                                </div>
                                <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
                                <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-details">
                            <div class="product-navigation">
                                <ul class="breadcrumb breadcrumb-lg">
                                    <li><a href="{{route('home')}}"><i class="d-icon-home"></i></a></li>
                                    <li><a href="{{route('website.products.index')}}" class="active">Products</a></li>
                                    <li>Detail</li>
                                </ul>
                            </div>
                            <h1 class="product-name">{{$product->name}}</h1>
                            <div class="product-meta">
                                SKU: <span class="product-sku">{{$product->sku}}</span>
                                BRAND: <span class="product-brand">{{$product->brand->name}}</span>
                            </div>
                            <div class="product-price">
                                @if($product->sale_price)
                                    <del><span class="sale_price">${{ $product->price }}</span></del>
                                    <span class="sale_price">${{ $product->sale_price }}</span>
                                @else <span class="sale_price">${{ $product->price }}</span>
                                @endif
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:80%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( 11 reviews )</a>
                            </div>
                            <p class="product-short-desc">{{$product->description}}.</p>

                            <hr class="product-divider">

                            <form action="{{route('website.cart.store')}}" method="post" id="add-to-cart">
                                @csrf
                                <input hidden name="product_id" value="{{$product->id}}" />
                                <div class="product-form product-qty">
                                <div class="product-form-group">
                                    <label class="float-left" for="qty">Quantity</label>
                                    <div class="form-group">
                                        <input class="form-control" name="quantity" id="qty" type="number" min="1" max="100" value="1" placeholder="Quantity">
                                    </div>
                                    <button
                                        class="btn-product btn-cart text-normal ls-normal font-weight-semi-bold"
                                        type="submit">
                                        <i class="d-icon-bag"></i>
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                            </form>
                            <hr class="product-divider mb-3">

                            <div class="product-footer">
                                <a href="#" class="btn-product btn-wishlist mr-6">
                                    <i class="d-icon-heart"></i>
                                    Add to wishlist
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab tab-nav-simple product-tabs">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#product-tab-description">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product-tab-additional">Additional information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product-tab-reviews">Reviews (2)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active in" id="product-tab-description">
                            <div class="row mt-6">
                                {{$product->description}}
                            </div>
                        </div>
                        <div class="tab-pane" id="product-tab-additional">
                            <ul class="list-none">
                                <li><label>Brands:</label>
                                    <p>SkillStar, SLS</p>
                                </li>
                                <li><label>Color:</label>
                                    <p>Blue, Brown</p>
                                </li>
                                <li><label>Size:</label>
                                    <p>Large, Medium, Small</p>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane " id="product-tab-reviews">
                            <div class="comments mb-8 pt-2 pb-2 border-no">
                                <ul>
                                    <li>
                                        <div class="comment">
                                            <figure class="comment-media">
                                                <a href="#">
                                                    <img src="{{asset('website/images/blog/comments/1.jpg')}}" alt="avatar">
                                                </a>
                                            </figure>
                                            <div class="comment-body">
                                                <div class="comment-rating ratings-container mb-0">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <span class="tooltiptext tooltip-top">4.00</span>
                                                    </div>
                                                </div>
                                                <div class="comment-user">
														<span class="comment-date text-body">September 22, 2020 at 9:42
															pm</span>
                                                    <h4><a href="#">John Doe</a></h4>
                                                </div>

                                                <div class="comment-content">
                                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
                                                        libero sodales leo,
                                                        eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo.
                                                        Suspendisse potenti.
                                                        Sed egestas, ante et vulputate volutpat, eros pede semper
                                                        est, vitae luctus metus libero eu augue.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="comment">
                                            <figure class="comment-media">
                                                <a href="#">
                                                    <img src="{{asset('website/images/blog/comments/2.jpg')}}" alt="avatar">
                                                </a>
                                            </figure>

                                            <div class="comment-body">
                                                <div class="comment-rating ratings-container mb-0">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <span class="tooltiptext tooltip-top">4.00</span>
                                                    </div>
                                                </div>
                                                <div class="comment-user">
														<span class="comment-date text-body">September 22, 2020 at 9:42
															pm</span>
                                                    <h4><a href="#">John Doe</a></h4>
                                                </div>

                                                <div class="comment-content">
                                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
                                                        libero sodales leo, eget blandit nunc tortor eu nibh. Nullam
                                                        mollis.
                                                        Ut justo. Suspendisse potenti. Sed egestas, ante et
                                                        vulputate volutpat,
                                                        eros pede semper est, vitae luctus metus libero eu augue.
                                                        Morbi purus libero,
                                                        faucibus adipiscing, commodo quis, avida id, est. Sed
                                                        lectus. Praesent elementum
                                                        hendrerit tortor. Sed semper lorem at felis. Vestibulum
                                                        volutpat.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Comments -->
                            <div class="reply">
                                <div class="title-wrapper text-left">
                                    <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                </div>
                                <div class="rating-form">
                                    <label for="rating" class="text-dark">Your rating * </label>
                                    <span class="rating-stars selected">
											<a class="star-1" href="#">1</a>
											<a class="star-2" href="#">2</a>
											<a class="star-3" href="#">3</a>
											<a class="star-4 active" href="#">4</a>
											<a class="star-5" href="#">5</a>
										</span>

                                    <select name="rating" id="rating" required="" style="display: none;">
                                        <option value="">Rate…</option>
                                        <option value="5">Perfect</option>
                                        <option value="4">Good</option>
                                        <option value="3">Average</option>
                                        <option value="2">Not that bad</option>
                                        <option value="1">Very poor</option>
                                    </select>
                                </div>
                                <form action="#">
										<textarea id="reply-message" cols="30" rows="6" class="form-control mb-4"
                                                  placeholder="Comment *" required></textarea>
                                    <div class="row">
                                        <div class="col-md-6 mb-5">
                                            <input type="text" class="form-control" id="reply-name"
                                                   name="reply-name" placeholder="Name *" required />
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <input type="email" class="form-control" id="reply-email"
                                                   name="reply-email" placeholder="Email *" required />
                                        </div>
                                    </div>
                                    <div class="form-checkbox mb-4">
                                        <input type="checkbox" class="custom-checkbox" id="signin-remember"
                                               name="signin-remember" />
                                        <label class="form-control-label" for="signin-remember">
                                            Save my name, email, and website in this browser for the next time I
                                            comment.
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-rounded">Submit<i
                                            class="d-icon-arrow-right"></i></button>
                                </form>
                            </div>
                            <!-- End Reply -->
                        </div>
                    </div>
                </div>

                <section class="pt-3 mt-10">
                    <h2 class="title justify-content-center">Related Products</h2>

                    <div class="owl-carousel owl-theme owl-nav-full row cols-2 cols-md-3 cols-lg-4"
                         data-owl-options="{
							'items': 5,
							'nav': false,
							'loop': false,
							'dots': true,
							'margin': 20,
							'responsive': {
								'0': {
									'items': 2
								},
								'768': {
									'items': 3
								},
								'992': {
									'items': 4,
									'dots': false,
									'nav': true
								}
							}
						}">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{asset('website/images/product/featured1.jpg')}}" alt="product" width="280" height="315">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to cart"><i
                                            class="d-icon-bag"></i></a>
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                            class="d-icon-heart"></i></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="product-cat">
                                    <a href="shop-grid-3col.html">Clothing</a>
                                </div>
                                <h3 class="product-name">
                                    <a href="product.html">Solid Pattern in Summer Dress</a>
                                </h3>
                                <div class="product-price">
                                    <span class="price">$140.00</span>
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="#" class="rating-reviews">( <span class="review-count">12</span>
                                        reviews
                                        )</a>
                                </div>
                            </div>
                        </div>
                        <div class="product">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{asset('website/images/product/featured2.jpg')}}" alt="product" width="280" height="315">
                                </a>
                                <div class="product-label-group">
                                    <label class="product-label label-sale">27% off</label>
                                </div>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to cart"><i
                                            class="d-icon-bag"></i></a>
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                            class="d-icon-heart"></i></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="product-cat">
                                    <a href="shop-grid-3col.html">Bags & Backpacks</a>
                                </div>
                                <h3 class="product-name">
                                    <a href="product.html">Mackintosh Poket Backpack</a>
                                </h3>
                                <div class="product-price">
                                    <ins class="new-price">$125.99</ins><del class="old-price">$160.99</del>
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="#" class="rating-reviews">( <span class="review-count">6</span> reviews
                                        )</a>
                                </div>
                            </div>
                        </div>
                        <div class="product">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{asset('website/images/product/featured3.jpg')}}" alt="product" width="280" height="315">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to cart"><i
                                            class="d-icon-bag"></i></a>
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                            class="d-icon-heart"></i></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="product-cat">
                                    <a href="shop-grid-3col.html">Clothing</a>
                                </div>
                                <h3 class="product-name">
                                    <a href="product.html">Fashionable Orginal Trucker</a>
                                </h3>
                                <div class="product-price">
                                    <span class="price">$78.64</span>
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:40%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="#" class="rating-reviews">( <span class="review-count">2</span> reviews
                                        )</a>
                                </div>
                            </div>
                        </div>
                        <div class="product">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{asset('website/images/product/featured4.jpg')}}" alt="product" width="280" height="315">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to cart"><i
                                            class="d-icon-bag"></i></a>
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                            class="d-icon-heart"></i></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="product-cat">
                                    <a href="shop-grid-3col.html">Clothing</a>
                                </div>
                                <h3 class="product-name">
                                    <a href="product.html">Women Red Fur Overcoat</a>
                                </h3>
                                <div class="product-price">
                                    <span class="price">$184.00</span>
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:80%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="#" class="rating-reviews">( <span class="review-count">6</span> reviews
                                        )</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

</x-website-layout>

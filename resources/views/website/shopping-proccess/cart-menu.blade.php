    <div class="dropdown cart-dropdown type2 cart-offcanvas mr-0 mr-lg-2">
        <a href="#" class="cart-toggle label-block link">
            <div class="cart-label d-lg-show">
                <span class="cart-name">Shopping Cart:</span>
                <span class="cart-price">${{$cart->total}}</span>
            </div>
            <i class="d-icon-bag"><span class="cart-count">{{$cart->quantity}}</span></i>
        </a>
        <div class="cart-overlay"></div>
        <!-- End Cart Toggle -->

        <div class="dropdown-box">
            <div class="cart-header">
                <h4 class="cart-title">Shopping Cart</h4>
                <a href="#" class="btn btn-dark btn-link btn-icon-right btn-close">
                    close
                    <i class="d-icon-arrow-right"></i>
                    <span class="sr-only">Cart</span>
                </a>
            </div>
            <div class="cart-menu">
                <div class="products scrollable">
                    @forelse($cart as $item)
                        <div class="product product-cart">
                            <figure class="product-media">
                                <a href="{{$item->product->permalink}}">
                                    <img src="{{$item->product->image_url}}" alt="product" width="80" height="88" />
                                </a>
                                <button class="btn btn-link btn-close">
                                    <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                </button>
                            </figure>
                            <div class="product-detail">
                                <a href="{{$item->product->permalink}}" class="product-name">{{ $item->product->name }}</a>
                                <div class="price-box">
                                    <span class="product-quantity">{{$item->quantity}}</span>
                                    <span class="product-price">{{$item->product->price}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- End of Cart Product -->
                    @empty
                        <p class="product product-cart">
                            <p style="color: #0a6aa1">No Any Product in Cart Yet.. </p>
                            <button class="btn btn-sm btn-primary">Go To Shopping</button>
                        </p>
                    @endforelse
                </div>
            </div>
            <!-- End of Products  -->
            @if(!$cart->is_empty)
                <div class="cart-total">
                    <label>Total:</label>
                    <span class="price">${{$cart->total}}</span>
                </div>
            @endif
            <!-- End of Cart Total -->

            <div class="cart-action">
                @if(!$cart->is_empty)
                <a href="{{route('website.cart.show')}}" class="btn btn-dark btn-link">View Cart</a>
                    <a href="{{ route('website.checkout') }}" class="btn btn-dark"><span>Go To Checkout</span></a>
                @endif
            </div>
            <!-- End of Cart Action -->
        </div>
        <!-- End Dropdown Box -->
    </div>










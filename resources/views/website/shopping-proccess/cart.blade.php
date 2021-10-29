<x-website-layout>
    <main class="main cart">
        <div class="page-content pt-7 pb-10">
            <div class="step-by pr-4 pl-4">
                <h3 class="title title-simple title-step active"><a href="#">1. Shopping Cart</a></h3>
                <h3 class="title title-simple title-step"><a href="#">2. Checkout</a></h3>
                <h3 class="title title-simple title-step"><a href="#">3. Order Complete</a></h3>
            </div>
            <div class="container col-lg-8 mt-7 mb-2">
                <div class="row">
                    <div class="col-lg-12 col-md-12 pr-lg-4">
                        <table class="shop-table cart-table">
                            <thead>
                            <tr>
                                <th><span>Product</span></th>
                                <th></th>
                                <th><span>Price</span></th>
                                <th><span>quantity</span></th>
                                <th>Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cart as $item)
                                <tr>
                                <td class="product-thumbnail">
                                    <figure>
                                        <a href="{{ route('website.product.details',$item->product->slug) }}">
                                            <img src="images/products/product18.jpg" width="100" height="100" alt="product">
                                        </a>
                                    </figure>
                                </td>
                                <td class="product-name">
                                    <div class="product-name-section">
                                        <a href="product-simple.html">{{$item->product->name}}</a>
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">@if($item->product->sale_price) <del>{{$item->product->price}}</del> {{$item->product->sale_price}} @else {{$item->product->price}} @endif</span>
                                </td>
                                <td class="product-quantity">
                                    <div class="input-group">
{{--                                        <button class="quantity-minus d-icon-minus"></button>--}}
{{--                                        <input class="quantity form-control" type="number" min="1"--}}
{{--                                               max="1000000" value="{{$item->quantity}}">--}}
{{--                                        <button class="quantity-plus d-icon-plus"></button>--}}
                                            <input class="form-control" type="quantity" value="{{$item->quantity}}" disabled>
                                    </div>
                                </td>
                                <td class="product-price">
                                    <span class="amount">
                                        $ @if($item->product->sale_price) {{$item->product->sale_price * $item->quantity }} @else {{$item->product->price * $item->quantity}} @endif
                                    </span>
                                </td>
                                <td class="product-close">
                                    <form action="">
                                        <button href="#" type="submit" class="product-remove" title="Remove this product">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align: center">
                                    <h4 style="color: darkred">No Products Yet..</h4>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="cart-actions mb-6 pt-4">
                            <a href="{{route('website.products.index')}}" class="btn btn-primary btn-outline btn-md btn-rounded btn-icon-left mr-4 mb-4"><i class="d-icon-arrow-left"></i>Continue Shopping</a>
                            @if(!$cart->is_empty)
                                <a href="{{ route('website.checkout') }}" class="btn btn-dark btn-md btn-rounded btn-icon-left mr-4 mb-4"> <i class="d-icon-long-arrow-right"></i> Go To Checkout</a>
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>
</x-website-layout>

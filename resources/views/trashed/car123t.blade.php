<x-website-layout>
    <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-cart-listing">
                <table class="table ps-cart__table">
                    <thead>
                    <tr>
                        <th>All Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                            <tr>
                                <td><a class="ps-product__preview" href="{{route('website.product.details', $item->product->slug)}}"><img class="mr-15" width="90px" src="{{$item->product->image_url}}" alt=""> {{$item->product->name}}</a></td>
                                <td>@if($item->product->sale_price) <dir>{{$item->product->price}}</dir> {{$item->product->sale_price}} @else {{$item->product->price}} @endif</td>
                                <td>
                                    <div class="form-group--number">
                                        <button class="minus"><span>-</span></button>
                                        <input class="form-control" type="quantity" value="{{$item->quantity}}">
                                        <button class="plus"><span>+</span></button>
                                    </div>
                                </td>
                                <td>
                                    $ @if($item->product->sale_price) {{$item->product->sale_price * $item->quantity }} @else {{$item->product->price * $item->quantity}} @endif</td>{{$item->product->price * $item->product->quantity}}
                                <td>
                                    <div class="ps-remove"></div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="ps-cart__actions">
                    <div class="ps-cart__promotion">
                        <div class="form-group">
                            <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                                <input class="form-control" type="text" placeholder="Promo Code">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="ps-btn ps-btn--gray">Continue Shopping</button>
                        </div>
                    </div>
                    <div class="ps-cart__total">
                        <h3>Total Price: <span> {{$total}} $</span></h3><a class="ps-btn" href="{{route('website.checkout')}}">Process to checkout<i class="ps-icon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-website-layout>

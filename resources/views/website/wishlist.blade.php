<x-website-layout>
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}"><i class="d-icon-home"></i></a></li>
                <li>Wishlist</li>
            </ul>
        </div>
    </nav>
    <div class="page-content pt-10 pb-10 mb-2">
        <div class="container">
                <table class="shop-table wishlist-table mt-2 mb-4" >
                    <thead>
                    <tr>
                        <th class="product-name"><span>Product</span></th>
                        <th></th>
                        <th class="product-price"><span>Price</span></th>
                        <th class="product-stock-status"><span>Stock status</span></th>
                        <th class="product-add-to-cart"></th>
                        <th class="product-remove"></th>
                    </tr>
                    </thead>
                    <tbody class="wishlist-items-wrapper" id="wishlist">
                    @forelse($wishlist as $product)
                        <tr>
                            <td class="product-thumbnail">
                                <a href="{{ route('website.product.details',$product->slug) }}">
                                    <figure>
                                        <img src="{{ $product->image_url }}" width="100" height="100"
                                             alt="product">
                                    </figure>
                                </a>
                            </td>
                            <td class="product-name">
                                <a href="{{ route('website.product.details',$product->slug) }}">{{ $product->name }}</a>
                            </td>
                            <td class="product-price">
                                @if($product->sale_price)
                                    <ins class="new-price">${{$product->sale_price}}</ins><del class="old-price">${{$product->price}}</del>
                                @else
                                    <span>${{$product->price}}</span>
                                @endif
                            </td>
                            <td class="product-stock-status">
                                @if($product->quantity != 0)
                                    <span class="wishlist-in-stock">In Stock</span>
                                @else
                                    <span class="wishlist-out-stock">Out Stock</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('website.cart.store')}}" method="post" id="add-to-cart">
                                    @csrf
                                    <input hidden name="product_id" value="{{$product->id}}" />
                                    <div class="product-form product-qty">
                                        <div class="product-form-group">
                                            <button
                                                class="btn-product btn-cart text-normal ls-normal font-weight-semi-bold"
                                                type="submit">
                                                <i class="d-icon-bag"></i>
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td class="product-remove">
                                <div>
                                    <form action="{{route('website.wishlist.destroy', $product->id)}}" method="post" id="delete-from-wishlist">
                                        @csrf
                                        @method('delete')
                                        <button class="remove" type="submit" title="Remove this product">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No Favorite Products..</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            @if(count($wishlist) != 0)
                <div class="social-links share-on">
                    <h5 class="text-uppercase font-weight-bold mb-0 mr-4 ls-s">Share on:</h5>
                    <a href="#" class="social-link social-icon social-facebook" target="_blank"
                       title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link social-icon social-twitter" target="_blank"
                       title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link social-icon social-pinterest" target="_blank"
                       title="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#" class="social-link social-icon social-email" target="_blank"
                       title="Email"><i class="far fa-envelope"></i></a>
                    <a href="#" class="social-link social-icon social-whatsapp" target="_blank"
                       title="Whatsapp"><i class="fab fa-whatsapp"></i></a>
                </div>
            @endif
        </div>
    </div>
</x-website-layout>

(function ($) {
    $('#add-to-cart').on('submit', function (e) {
        e.preventDefault();
        $.post($(this).attr('action'), $(this).serialize(), function (items) {
            $('#alert').html(`<div class="alert alert-success alert-simple alert-btn">
                        <a href="../cart" class="btn btn-success btn-md btn-rounded">View Cart</a>
                        Added Successfully To Cart.
                        <button type="button" class="btn btn-link btn-close">
                            <i class="d-icon-times"></i>
                        </button>
                    </div>`)
            $('.cart-price').html('$'+ items.total)
            $('.cart-count').html(items.quantity)
            $('.price').html('$'+ items.total)
            $('.cart-menu').empty();
            for (i in items) {
                data = items[i];
                $('.cart-menu').append(`<div class="products scrollable">
                <div class="product product-cart">
                    <figure class="product-media">
                        <a href=${data.product.permalink}>
                            <img src=${data.product.image_url} alt="product" width="80" height="88" />
                        </a>
                        <button class="btn btn-link btn-close">
                            <i class="fas fa-times"></i><span class="sr-only">Close</span>
                        </button>
                    </figure>
                    <div class="product-detail">
                        <a href="${data.product.permalink}" class="product-name">${data.product.name}</a>
                        <div class="price-box">
                            <span class="product-quantity">${data.quantity}</span>
                            <span class="product-price">${data.product.price}</span>
                        </div>
                    </div>
                </div>
            </div>`)
            }
        });
    });
})(jQuery);


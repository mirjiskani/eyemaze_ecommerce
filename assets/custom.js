$('document').ready(() => {
    $('.addToCart').on('click', (e) => {
        var idproducts = e.target.closest(`div.card`).querySelector(`[name=idproducts]`).value;
        var productName = e.target.closest(`div.card`).querySelector(`[name=product_name]`).value;
        var productDescription = e.target.closest(`div.card`).querySelector(`[name=description]`).value;
        var productPrice = e.target.closest(`div.card`).querySelector(`[name=price]`).value;
        var productQty = e.target.closest(`div.card`).querySelector(`[name=qty]`).value;
        var productImage = e.target.closest(`div.card`).querySelector(`[name= productImage]`).value;

        if (productQty == '') {
            alert('Please add minimum 1 qty.')
        } else {
            let itemBuyed = 0;
            var cartHtml = '';
            $.ajax({
                url: "cart/addToCart",
                type: JSON,
                method: 'POST',
                data: { idproducts: idproducts, productName: productName, productDescription: productDescription, productPrice: productPrice, productQty: productQty, productImage: productImage },
                success: function (response) {
                    let cartItems = JSON.parse(response).cart
                    const entries = Object.keys(cartItems);
                    entries.forEach((key) => {
                        let item = cartItems[key];
                        itemBuyed += (item.qty != undefined) ? parseInt(item.qty) : 0;
                        cartHtml += `<li class="clearfix" id="itemLi_` + key + `">
                        <input type="hidden" name="idproducts" value="`+ key + `">
                        <div class="removeCartItem">
                          <a href="javascript:void(0)" class="deleteCartItem"><i class="fa-solid fa-circle-xmark" style="color: #ff0505;"></i></a>
                        </div>
                        <img src="`+ item.image + `" width="100" height="100" alt="item1" />
                        <span class="item-name">`+ item.name + `</span>
                        <br />
                        <span class="item-detail"><strong>Description: </strong> `+ item.description + `</span>
                        <br />
                        <span class="item-price"><strong>Price: </strong> $`+ item.price + `</span>
                        <br />
                        <span class="item-quantity"><strong>Quantity:</strong> `+ item.qty + `</span>
                      </li>`
                    })
                    $("#lblCartCount").text(itemBuyed);
                    $(".badgeDropdown").text(itemBuyed);

                    $("#lblCartCount").css("display", "block");
                    console.log(cartHtml);
                    $(".shopping-cart-items").html(cartHtml);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }

            });
        }
    })
    $('.deleteCartItem').on('click', (e) => {
        var idproducts = e.target.closest(`li.clearfix`).querySelector(`[name=idproducts]`).value;
        let itemBuyed = 0;

        $.ajax({
            url: "cart/removeFromCart",
            type: JSON,
            method: 'POST',
            data: { idproducts: idproducts },
            success: function (response) {
                let cartItems = JSON.parse(response).cart
                const entries = Object.keys(cartItems);
                entries.forEach((key) => {
                    let item = cartItems[key];
                    itemBuyed += (item.qty != undefined) ? parseInt(item.qty) : 0;
                })
                $("#lblCartCount").text(itemBuyed);
                $(".badgeDropdown").text(itemBuyed);
                if (itemBuyed == 0) {
                    $("#lblCartCount").css("display", "none");
                }
                $('#itemLi_' + idproducts).remove();

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }

        });
    })// delete cart item 
    $(document).click(function () {
        var $item = $(".shopping-cart");
        if ($item.hasClass("active")) {
            $item.removeClass("active");
        }
    });

    $('.shopping-cart').each(function () {
        var delay = $(this).index() * 50 + 'ms';
        $(this).css({
            '-webkit-transition-delay': delay,
            '-moz-transition-delay': delay,
            '-o-transition-delay': delay,
            'transition-delay': delay
        });
    });
    $('#cart').click(function (e) {
        e.stopPropagation();
        $(".shopping-cart").toggleClass("active");
    });

    $('#addtocart').click(function (e) {
        e.stopPropagation();
        $(".shopping-cart").toggleClass("active");
    });

})
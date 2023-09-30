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
            $.ajax({
                url: "cart/addToCart",
                type: JSON,
                method: 'POST',
                data: { idproducts: idproducts, productName: productName, productDescription: productDescription, productPrice: productPrice, productQty: productQty, productImage: productImage },
                success: function (response) {
                    console.log(JSON.parse(response));
                    let cartItems = JSON.parse(response).cart
                    const entries = Object.keys(cartItems);
                    entries.forEach((key) => {
                        let item = cartItems[key];
                        itemBuyed += (item.qty != undefined) ? parseInt(item.qty) : 0;
                    })
                    $("#lblCartCount").text(itemBuyed);
                    $("#lblCartCount").css("display", "block");
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
                console.log(JSON.parse(response));
                let cartItems = JSON.parse(response).cart
                const entries = Object.keys(cartItems);
                entries.forEach((key) => {
                    let item = cartItems[key];
                    itemBuyed += (item.qty != undefined) ? parseInt(item.qty) : 0;
                })
                $("#lblCartCount").text(itemBuyed);
                $("#lblCartCount").css("display", "block");
                $('#itemLi_' + idproducts).remove();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }

        });
        console.log(idproducts);

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
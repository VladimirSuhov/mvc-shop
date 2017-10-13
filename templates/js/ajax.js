/**
 * Created by Vova on 12.10.2017.
 */
$(document).ready(function () {

    function addToCart(e) {
        e.preventDefault();
        let prodId  = $(this).attr("data-productId");
        $.post("/cart/addAjax/" + prodId, function (data) {
            // $("#cart-count").html(data);
            console.log(data);
        });
        return false;
    }

    $('.add-to-cart').on('click', addToCart);

});

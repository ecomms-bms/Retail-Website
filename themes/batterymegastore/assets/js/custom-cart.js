(function($) {
$(document).ready(function() {


    $(document).on('change', 'input[name^="shipping_method"]', function() {
        var selectedShippingMethod = $(this).val();
        console.log(selectedShippingMethod);
        console.log(wc_cart_params.ajax_url);

        // Perform AJAX request to update shipping fee
        $.ajax({
            url: wc_cart_params.ajax_url,
            type: 'POST',
            data: {
                action: 'update_shipping_fee',
                shipping_method: selectedShippingMethod
            },
            success: function(response) {
                console.log('Success', response);
                // Optionally, you can refresh the checkout to see the updated fee
                $('body').trigger('update_checkout');
            }
        });
    });



















});

})(jQuery);
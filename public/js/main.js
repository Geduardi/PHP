function addGoodInBasket(id) {
    jQuery.ajax({
        url: `?page=6&action=ajaxAdd&id=${id}`,
        type: 'get',
        success: function (response) {
            console.log(response);
            jQuery('#basket').html(response.count);
        }
    });
}
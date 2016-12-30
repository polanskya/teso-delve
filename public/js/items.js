$(document).ready(function() {

    var itemAjax = null;
    $('.item-hover').hover(function() {
        var itemHover = $(this);
        var itemId = itemHover.attr('itemId');
        $('.itemBox').hide();

        if(itemHover.find('.itemBox').length == 0) {

            if(itemAjax) {
                itemAjax.abort();
            }

            itemAjax = $.ajax({
                url: '/ajax/item/' + itemId,
                success: function(data) {
                    $(data).find('.itemBox').show();
                    itemHover.append(data);
                },
            });
        }

        itemHover.find('.itemBox').show();


    }, function() {
        $(this).find('.itemBox').hide();
    });



});

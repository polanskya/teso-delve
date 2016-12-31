$(document).ready(function() {

    var itemAjax = null;
    $('.item-hover').hover(function() {
        var itemHover = $(this);
        var itemId = itemHover.attr('itemId');
        var position = itemHover.position();

        $('.itemBox').hide();

        if(itemHover.find('.itemBox').length == 0) {

            if(itemAjax) {
                itemAjax.abort();
            }

            itemAjax = $.ajax({
                url: '/ajax/item/' + itemId,
                success: function(data) {
                    $('.itemBox').hide();
                    itemHover.append(data);
                    itemHover.find('.itemBox').css({left: position.left+10, top: position.top, 'margin-top': 0});
                    itemHover.find('.itemBox').show();
                },
            });
        }

        $('.itemBox').hide();
        $('.setbox').hide();
        itemHover.find('.itemBox').show();


    }, function() {
        $(this).find('.itemBox').hide();
    });



});

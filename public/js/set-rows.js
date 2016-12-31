$(document).ready(function() {

    $('[data-toggle="tooltip"]').tooltip();

    var setAjax = null;
    $('.set-hover').hover(function() {
        var setHover = $(this);
        var setId = setHover.attr('setId');
        $('.setbox').hide();

        if(setHover.find('.setbox').length == 0) {

            if(setAjax) {
                setAjax.abort();
            }

            setAjax = $.ajax({
                url: '/ajax/set/' + setId,
                success: function(data) {
                    $('.itemBox').hide();
                    $('.setbox').hide();
                    $(data).find('setbox').show();
                    setHover.append(data);

                },
            });
        }

        $('.itemBox').hide();
        $('.setbox').hide();
        setHover.find('.setbox').show();


    }, function() {
        $(this).find('.setbox').hide();
    });


    $('.open-set-row').click(function(event) {
        event.preventDefault();

        var setId = $(this).attr('setId');

        itemRows = $(".set-member-" + setId);
        if(itemRows.hasClass('hidden')) {
            itemRows.removeClass('hidden');
            $(this).find('.fa').removeClass('fa-chevron-down').addClass('fa-chevron-up');
        }
        else {
            itemRows.addClass('hidden');
            $(this).find('.fa').removeClass('fa-chevron-up').addClass('fa-chevron-down');

        }

    });


    $(".setFavourite").click(function(e) {
        e.preventDefault();
        var link = $(this);

        $.ajax({
            url: $(this).attr('href'),
            success: function(data) {
                var favouriteIcon = link.find('.favouriteIcon');
                if(favouriteIcon.hasClass('fa-star-o')) {
                    favouriteIcon.removeClass('fa-star-o').addClass('fa-star');
                }
                else {
                    console.log('doesn\'t have class');
                    favouriteIcon.removeClass('fa-star').addClass('fa-star-o');
                }
            },
        });
    });

});
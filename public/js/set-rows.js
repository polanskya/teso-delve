$(document).ready(function() {

    $('.open-set-row').click(function(event) {
        event.preventDefault();

        var setId = $(this).attr('setId');
        console.log(setId);

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
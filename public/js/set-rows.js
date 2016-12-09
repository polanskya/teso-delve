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

});
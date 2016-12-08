$(document).ready(function() {

    var dropzoneDiv = $("#importDropzone");
    var myDropzone = dropzoneDiv.dropzone({
        url: dropzoneDiv.attr('url'),
        previewTemplate: '<p style="display:none;"></p>',
        success: function(file, response) {
            myDropzone.find('.dropzone-message:visible').fadeOut();
            myDropzone.find('.dropzone-message.message-successfull').fadeIn();
        },
        drop: function(file) {
            myDropzone.find('.dropzone-message:visible').fadeOut();
            myDropzone.find('.dropzone-message.message-uploading').fadeIn();
        },
        error: function(file) {
            myDropzone.find('.dropzone-message:visible').fadeOut();
            myDropzone.find('.dropzone-message.message-failed').fadeIn();
        }
    });

});
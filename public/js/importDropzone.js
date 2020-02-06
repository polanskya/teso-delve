$(document).ready(function() {

    var dropzoneDiv = $("#importDropzone");

    if(!dropzoneDiv.hasClass('dropzoneDisabled')) {
        var myDropzone = dropzoneDiv.dropzone({
            url: dropzoneDiv.attr('url'),
            maxFilesize: 3072, // 3GB
            chunkSize: 10000000, // 10MB
            previewTemplate: '<p style="display:none;"></p>',
            success: function (file, response) {
                myDropzone.find('.dropzone-message:visible').fadeOut();
                myDropzone.find('.dropzone-message.message-successfull').fadeIn();
            },
            drop: function (file) {
                myDropzone.find('.dropzone-message:visible').fadeOut();
                myDropzone.find('.dropzone-message.message-uploading').fadeIn();
            },
            error: function (file, response) {
                console.log(response);
                myDropzone.find('.dropzone-message:visible').fadeOut();
                myDropzone.find('.dropzone-message.message-failed .error').show().html(response.error);
                myDropzone.find('.dropzone-message.message-failed').fadeIn();
            }
        });
    }

});
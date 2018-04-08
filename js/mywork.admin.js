/**
 * The Theme Admin Scripts
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file mywork.admin.js
 *
 */
'use strict';

(function () {
    //var $ = jQuery;
    jQuery(document).ready(function($) {
        var mediaUploader;
        var logoNameInput = $('#logo-name-text');
        var previewLogoText = $('#logo-text-preview');
        var previewImage = $('#logo-image-preview');
        var uploadButton = $('#upload-logo-image');

        uploadButton.on('click', function(e) {
            e.preventDefault();
            if( mediaUploader ) {
                mediaUploader.open();
                return;
            }

            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose a Logo Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });

            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#logo-image-url').val(attachment.url);
                previewImage.attr('src', attachment.url);
            });

            mediaUploader.open();

        });// #upload-logo-image

        // Preview the text while filling the
        // input
        logoNameInput.bind('input', function(e) {
            previewLogoText.text( $(this).val() );
        });

        /*$('#header-options-form').on('submit', function(e) {
            alert();
        });*/
        $( ".logo-display-choice" ).on( "click", 'input', function() {
            var checkedInput = $( "input:checked" );
            if( checkedInput.val() === 'Text' ) {
                $("#header-options-form").submit();
                console.log(checkedInput.val());
            }

            if( checkedInput.val() === 'Image' ) {
                $("#header-options-form").submit();
                console.log(checkedInput.val());
            }

        });

    });

})();
// FIXME: This is a workaround for enabling hero image button in the admin panel
if($ === undefined) {
    var $ = jQuery;
}

$(function() {
    $('a[href*=#]').on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
    });
});

//User Image Uploader

upload = function(id) {
    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
    window.send_to_editor = function (html) {
        imgurl = jQuery('img', html).attr('src');
        id = '#' + id;
        jQuery(id).val(imgurl);
        tb_remove();
        $('body').append('<div id="temp_image">' + html + '</div>');

        var img = $('#temp_image').find('img');

        imgurl   = img.attr('src');
        imgclass = img.attr('class');
        imgid    = parseInt(imgclass.replace(/\D/g, ''), 10);

        $('#upload_image_id').val(imgid);
        $('#remove-hero_image').show();
    }
    return false;
}



uploadPost = function(id, post_id) {
        // save the send_to_editor handler function
        window.send_to_editor_default = window.send_to_editor;

        $('#set-' + id).click(function(){

            // replace the default send_to_editor handler function with our own
            window.send_to_editor = window.attach_image;
            tb_show('', 'media-upload.php?post_id='+ post_id + '&amp;type=image&amp;TB_iframe=true');

            return false;
        });

        // handler function which is invoked after the user selects an image from the gallery popup.
        // this function displays the image and sets the id so it can be persisted to the post meta
        window.attach_image = function(html) {

            // turn the returned image html into a hidden image element so we can easily pull the relevant attributes we need
            $('body').append('<div id="temp_image">' + html + '</div>');

            var img = $('#temp_image').find('img');

            imgurl   = img.attr('src');
            imgclass = img.attr('class');
            imgid    = parseInt(imgclass.replace(/\D/g, ''), 10);

            $('#' + id + '_input').val(imgid);
            $('#remove-' + id).show();

            $('img#'+ id).attr('src', imgurl);
            try{tb_remove();}catch(e){};
            $('#temp_image').remove();

        }
}

remove = function(id) {
    window.send_to_editor_default = window.send_to_editor;

    $('#' + id_ +'_input').val('');
    $('img').attr('src', '');
    $(this).hide();

    return false;

    // restore the send_to_editor handler function
    window.send_to_editor = window.send_to_editor_default;
}

(function ($) {
    "use strict"; // use strict to start
    var ajaxurl = mombo.ajaxurl;

    // Item Verification
    function item_verification(form) {
        var form = $(form);
        form.submit(function (event) {
            event.preventDefault();
            var $self = $(this);
            var data = form.serialize(); 
            $.ajax({
                type: "POST",
                dataType: "html",
                url: mombo.ajaxurl,
                data: data,
                beforeSend: function() {
                    $self.children('.mombo-loader').css({'display': 'inline-block'});
                    $self.children('.mombo-loader').children().addClass('spin');
                },
                success: function (data) {          
                    $self.children('.mombo-loader').css({'display': 'none'});
                    $self.children('.mombo-loader').children().removeClass('spin'); 
                    if(data == 'true') {
                        $('.mombo-important-notice.registration-form-container .about-description-success').slideDown('slow');
                        $('.mombo-important-notice.registration-form-container .mombo-registration-form').slideUp();
                        $('.mombo-important-notice.registration-form-container .about-description-success-before').slideUp();
                    } else { 
                        $('.mombo-important-notice.registration-form-container .about-description-faild-msg').slideDown('slow');
                        setTimeout(function() {
                            $('.mombo-important-notice.registration-form-container .about-description-faild-msg').slideUp('slow');
                        }, 9500);
                    }
                },
                error: function () { 
                    console.log("Something miss. Please recheck");
                }
            });
        });  
    }
     
    if ($('#mombo_product_registration').length) {
        item_verification('#mombo_product_registration');
    }

    // mega menu js
    $.sh_mega_menus_type = function() {
        $('.edit-menu-item-mtype').on('change', function() {
            var t = $(this);
            var id = $(this).attr('id');
            id = id.split('-');
            if ($(this).val() === 'mega') {
                $(this).parent().parent().parent().find('.field-m_page_id').slideDown(250); 
            } else {
                $(this).parent().parent().parent().find('.field-m_page_id').slideUp('fast'); 
            }
        });
    }
    $.sh_mega_menus_type();

    $('.edit-menu-item-mtype').each(function() {
        if ($(this).val() === 'mega') {
            $(this).parent().parent().parent().find('.field-m_page_id').slideDown(250); 
        } else {
            $(this).parent().parent().parent().find('.field-m_page_id').slideUp('fast'); 
        }
    });

})(jQuery);
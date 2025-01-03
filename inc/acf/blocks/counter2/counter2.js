


document.addEventListener('DOMContentLoaded', function () {

    jQuery(document).ready(function ($) {
        function checkAndSetNumbers() {
            $('.counter2-item').each(function() {
                var cPos = $(this).offset().top,
                    windowTop = $(window).scrollTop(),
                    windowBottom = windowTop + $(window).height();
    
                if (cPos < windowBottom && cPos > windowTop) {
                    var $elements = $('.od');
                    if (!$elements.hasClass("viz")) {
                        $elements.addClass("viz").each(function() {
                            var $this = $(this),
                                num = $this.data('num');
                            $this.text(num);
                        });
                    } 
                }
            });
        }

        $(window).scroll(checkAndSetNumbers);
        checkAndSetNumbers();
    });
    
});
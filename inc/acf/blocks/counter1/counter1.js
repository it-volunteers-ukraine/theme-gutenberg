document.addEventListener('DOMContentLoaded', function () {

    jQuery(document).ready(function ($) {
        
        // Функция для запуска анимации чисел
        function animateNumbers() {
            $('.counter1-item').each(function() {
                var cPos = $(this).offset().top,
                    windowTop = $(window).scrollTop(),
                    windowBottom = windowTop + $(window).height();

                // Проверка, что элемент в пределах видимости
                if (cPos < windowBottom && cPos > windowTop) {
                    var $numbers = $('.cn');
                    if (!$numbers.hasClass("viz")) {
                        $numbers.addClass("viz").each(function() {
                            var $this = $(this),
                                num = parseInt($this.data('num'), 10),
                                current = 0,
                                step = num * (60 / 8000); // totalTime was 8000, hardcoded here for clarity

                            var interval = setInterval(function() {
                                current += step;
                                if (current > num) current = num;
                                $this.text(Math.floor(current).toLocaleString());

                                if (current >= num) {
                                    clearInterval(interval);
                                }
                            }, 1000 / 60);
                        });
                    }
                }
            });
        }

        // Вызов функции при скролле
        $(window).scroll(animateNumbers);

        // Вызов функции сразу после загрузки
        animateNumbers();
    });
});
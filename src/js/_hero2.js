document.addEventListener('DOMContentLoaded', function () {
    const hero2RadioButtons = document.querySelectorAll('.hero2 .tab input[type="radio"]');

    hero2RadioButtons.forEach(radio => {
        radio.addEventListener('change', function () {
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });

            if (this.checked) {
                this.closest('.tab').classList.add('active');
            }
        });
    });

    jQuery(document).ready(function ($) {
        $('.marquee').marquee({
            //duration in milliseconds of the marquee
            duration: 15000,
            //gap in pixels between the tickers
            gap: 50,
            //time in milliseconds before the marquee will start animating
            delayBeforeStart: 0,
            //'left' or 'right'
            direction: 'left',
            //true or false - should the marquee be duplicated to show an effect of continues flow
            duplicated: true
        });
    });

    
});
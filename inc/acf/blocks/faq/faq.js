

document.addEventListener('DOMContentLoaded', function () {

    jQuery(document).ready(function ($) {
        
    });

    document.querySelectorAll(".accordion-item").forEach((item) => {
      item.querySelector(".accordion-item-header").addEventListener("click", () => {
        item.classList.toggle("open");
      });
    });
   
});
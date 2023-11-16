   document.addEventListener('DOMContentLoaded', function () {
       var elems = document.querySelectorAll('.slider');
       var instances = M.Slider.init(elems, {
        indicators: false,
        height: 500,
        transisition: 500,
        interval: 6000
       });
   })
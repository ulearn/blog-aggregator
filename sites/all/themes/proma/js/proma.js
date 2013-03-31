(function($) {

    var tpj = jQuery;
    tpj.noConflict();

    tpj(document).ready(function() {

        if (tpj.fn.cssOriginal != undefined)
            tpj.fn.css = tpj.fn.cssOriginal;

        tpj('.fullwidthbanner').revolution(
        {
            delay: 10000,
            startwidth: 890,
            startheight: 450,
            onHoverStop: "off", // Stop Banner Timet at Hover on Slide on/off

            thumbWidth: 100, // Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
            thumbHeight: 50,
            thumbAmount: 3,
            hideThumbs: 200,
            navigationType: "none", //bullet, thumb, none, both	 (No Shadow in Fullwidth Version !)
            navigationArrows: "verticalcentered", //nexttobullets, verticalcentered, none
            navigationStyle: "square", //round,square,navbar

            touchenabled: "on", // Enable Swipe Function : on/off

            navOffsetHorizontal: 0,
            navOffsetVertical: 20,
            fullWidth: "on",
            shadow: 0, //0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

            stopLoop: "off"							// on == Stop loop at the last Slie,  off== Loop all the time.

        });




    });


    $(document).ready(function(){
    
        $('.form-submit').addClass('button green');
        $('.portfolio-grid .item-4').removeClass('col4').addClass('col2');
        $('#nav li a.active').parent('li').addClass('current');
        
    });

})(jQuery);

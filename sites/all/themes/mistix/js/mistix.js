(function ($) {
  
  
  
  
  
  jQuery(function(){

    var $container = jQuery('#homeRecent'),
    // object that will keep track of options
    isotopeOptions = {},
    // defaults, used if not explicitly set in hash
    defaultOptions = {
      filter: '*',
      sortBy: 'original-order',
      sortAscending: true,
      layoutMode: 'masonry'
    };

    // ensure no transforms used in Opera
    if ( jQuery.browser.opera ) {
      defaultOptions.transformsEnabled = false;
    }
      
     

    var setupOptions = jQuery.extend( {}, defaultOptions, {
      itemSelector : '.itemhome'
    });

    // set up Isotope
    $container.isotope( setupOptions );

    var $optionSets = jQuery('#options').find('.option-set'),
    isOptionLinkClicked = false;

    // switches selected class on buttons
    function changeSelectedLink( $elem ) {
      // remove selected class on previous item
      $elem.parents('.option-set').find('.selected').removeClass('selected');
      // set selected class on new item
      $elem.addClass('selected');
    }


    $optionSets.find('a').click(function(){
      var $this = $(this);
      // don't proceed if already selected
      if ( $this.hasClass('selected') ) {
        return;
      }
      changeSelectedLink( $this );
      // get href attr, remove leading #
      var href = $this.attr('href').replace( /^#/, '' ),
      // convert href into object
      // i.e. 'filter=.inner-transition' -> { filter: '.inner-transition' }
      option = $.deparam( href, true );
      // apply new option to previous
      jQuery.extend( isotopeOptions, option );
      // set hash, triggers hashchange on window
      jQuery.bbq.pushState( isotopeOptions );
      isOptionLinkClicked = true;
      return false;
    });

    var hashChanged = false;

    jQuery(window).bind( 'hashchange', function( event ){
      // get options object from hash
      var hashOptions = window.location.hash ? jQuery.deparam.fragment( window.location.hash, true ) : {},
      // do not animate first call
      aniEngine = hashChanged ? 'best-available' : 'none',
      // apply defaults where no option was specified
      options = jQuery.extend( {}, defaultOptions, hashOptions, {
        animationEngine: aniEngine
      } );
      // apply options from hash
      $container.isotope( options );
      // save options
      isotopeOptions = hashOptions;
    
      // if option link was not clicked
      // then we'll need to update selected links
      if ( !isOptionLinkClicked ) {
        // iterate over options
        var hrefObj, hrefValue, $selectedLink;
        for ( var key in options ) {
          hrefObj = {};
          hrefObj[ key ] = options[ key ];
          // convert object into parameter string
          // i.e. { filter: '.inner-transition' } -> 'filter=.inner-transition'
          hrefValue = jQuery.param( hrefObj );
          // get matching link
          $selectedLink = $optionSets.find('a[href="#' + hrefValue + '"]');
          changeSelectedLink( $selectedLink );
        }
      }
    
      isOptionLinkClicked = false;
      hashChanged = true;
    })
    // trigger hashchange to capture any hash data on init
    .trigger('hashchange');

  });
        
        
        
        
        
      
        
  $(document).ready(function(){
  
    // slider
 
    $('#nslider').nivoSlider({
      effect:'random', // Specify sets like: 'fold,fade,sliceDown'
      slices:15, // For slice animations
      boxCols: 8, // For box animations
      boxRows: 4, // For box animations
      animSpeed:800, // Slide transition speed
      pauseTime:6000, // How long each slide will show
      startSlide:0, // Set starting Slide (0 index)
      directionNav:true, // Next & Prev navigation
      directionNavHide:true, // Only show on hover
      controlNav:false
    });
    
    
    // fix header menu 
    
    
    //lightbox
    jQuery("a[rel^='lightbox']").prettyPhoto({
      theme:'light_rounded',
      overlay_gallery: false,
      show_title: false
    });
  
  
    //fix tabs
    $('.tabs.primary a').click(function(){
      return TRUE;
    });
  
  
  
  
    
    /** portfolio */
    
  
 
      
    $('.view-portfolio .views-row').each(function(){
        
      $(this).addClass($(this).find('.term-class').html());
       
    });
    
    $('.bef-select-as-links .form-item .form-item').each(function(){
      $(this).find('a').attr('data-filter', '.'+$(this).attr('id'));
      
    });
      
    $('#edit-field-portfolio-category-tid-all').html('<a class="active" data-filter="*" href="/portfolio">Show All</a>');
    
    var $container = $('.view-portfolio .view-content');
    // initialize isotope
    $container.isotope({
      // options...
      });
      
 
  
    // filter items when filter link is clicked
    $('.bef-select-as-links a').click(function(){
      var selector = $(this).attr('data-filter');
      $('.bef-select-as-links a').removeClass('active');
      $(this).addClass('active');
      $container.isotope({
        filter: selector
      });
      return false;
    });


  // end portfolio
  
  
  
  // bottom boder
  $('.page-search #content .section, .page-user #content .section').after('<div class="bottomborder tweek"></div>');
  
  
  });
  
  
  
        
  
})(jQuery);
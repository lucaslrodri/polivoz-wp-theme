jQuery(document).ready(function($){
    ///-----------------------------------------------------------
    //--------------------------Menu-----------------------------
    //------------------------------------------------------------
    $(window).load(function() {
        $("body").removeClass("preload");
        revealPosts();
    });
    var addExtraHeight=0;
    var topMenuHeight = 50;
    function setParalaxSize(){
        var img = $('.parallax-window').data('image');
        if(typeof(img)!=='undefined')
            $('.parallax-window').css('background-image','url('+img+')');
        var parallax_height = Math.min($(window).height()/1.3-topMenuHeight,$(window).width()/2.33)+'px';
        $('.parallax-window').css('min-height',parallax_height);
        $('.carousel-box').css('min-height',parallax_height);
        $('.carousel-wrap').css('min-height',parallax_height);
        $('.carousel-inner-content').css('min-height',parallax_height);
        $('#polivoz-slider-wrap').css('min-height',parallax_height);
        $('.carousel-buttons').each(function(){
            $(this).css('max-height',parallax_height);
        });
    }
    function setMenuType() {
        var topDistance = $(window).scrollTop();
        if (($(window).width() < 1201)||(topDistance>100)||($(window).height() < 560)) {
            $("#main-menu").removeClass("menu-desktop").addClass("menu-mobile");
            topMenuHeight=50;
            addExtraHeight = 0;
        }else{
            addExtraHeight = 50;
            $("#main-menu").addClass("menu-desktop").removeClass("menu-mobile");
           topMenuHeight=100;
        }
        if ($('body').hasClass("admin-bar")){
            var wp_menu = $('#wpadminbar').outerHeight();
            $('.anchor').css('margin-top',"-"+(topMenuHeight+wp_menu)+"px");
            $('.anchor').css('height',(topMenuHeight+wp_menu)+"px");
            $('body').css('padding-top', (topMenuHeight+wp_menu)+'px !important');
            $('#main-menu').css("top",wp_menu);
            $('#wpadminbar').css("position","fixed");
            $('.space').height(wp_menu);
        }else{
            $('.anchor').css('margin-top',"-"+topMenuHeight+"px");
            $('body').css('padding-top', (topMenuHeight)+'px !important');
            $('.anchor').css('height',topMenuHeight+"px");
            $('#main-menu').css("top",0);
            $('.space').height(0);
        }
        $("body").attr("style","padding-top:"+topMenuHeight+'px;');
        $('.galeria-img').height((9/16)*$('.galeria-img').width()+40);
        setParalaxSize();
    }
    
    $('[data-toggle="tooltip"]').tooltip();

    setMenuType();
    $('#main-menu').css('visibility', 'inherit');
    $(window).resize(setMenuType);
    
    // Cache selectors
    var lastId,
        // All list items
        menuItems = $(".home-link"),
        // Anchors corresponding to menu items
        scrollItems = menuItems.map(function(){
          var item = $($(this).attr("href"));
          if (item.length) { return item; }
        });
        
        var lastScroll =0;
    // Bind click handler to menu items
    // so we can get a fancy scroll animation
    $('.glyphicon-chevron-up').click(function(){
            $('html, body').stop().animate({ 
                scrollTop: 0}, 300);
    });
    $(".active-menu-external-link a").on('click',function(e){
        var href = $(this).attr("href"),
        offsetTop = href === "#" ? 0 : $(href).offset().top;
        $('html, body').stop().animate({ 
          scrollTop: offsetTop
      }, 300);
      e.preventDefault();
    });
    menuItems.click(function(e){
      var href = $(this).attr("href"),
      offsetTop = href === "#" ? 0 : $(href).offset().top;
      if (href === "#"){
          addExtraHeight = 0;
      }
      $('html, body').stop().animate({ 
          scrollTop: offsetTop + addExtraHeight
      }, 300);
      e.preventDefault();
    });
    $('section:not(reveal)').each(function(){
        if(isVisible($(this))){
            $(this).addClass('reveal').find('.polivoz-carousel-thumb').carousel();
    }});

    // Bind to scroll
    $(window).on("scroll touchmove",function(){
       var scrollWindow = $(window).scrollTop();
       
        if(Math.abs(scrollWindow-lastScroll) >$(window).height()*0.1){
            lastScroll=scrollWindow;  
            $('section:not(reveal)').each(function(){
                if(isVisible($(this))){
                    $(this).addClass('reveal').find('.polivoz-carousel-thumb').carousel();
                }
            });
            
        };
        setMenuType();
       // Get container scroll position
       var fromTop = $(this).scrollTop() + 1;

       // Get id of current scroll item
       var cur = scrollItems.map(function(){
         if ($(this).offset().top < fromTop)
           return this;
       });
       // Get the id of the current element
       cur = cur[cur.length-1];
       var id = cur && cur.length ? cur[0].id : "";
       if (lastId !== id) {
           lastId = id;
           // Set/remove active class
           menuItems
             .parent().removeClass("active")
             .end().filter("[href='#"+id+"']").parent().addClass("active");
       }
    });
     
    ///-----------------------------------------------------------
    //--------------------------Slider-----------------------------
    //------------------------------------------------------------
    
    var polivozSlider =  $("#polivoz-slider");
    var polivozSliderWrap = $("#polivoz-slider-wrap");
            
    polivozSlider.owlCarousel({
      autoPlay: 5000,
      slideSpeed : 500,
      paginationSpeed : 500,
      stopOnHover: true,
      singleItem : true,
      lazyLoad : true
    });
    
    $(".carousel-button-left-wrap a").on('click',function(e){
       e.preventDefault();
       polivozSlider.trigger('owl.prev');
    });
    
    $(".carousel-button-right-wrap a").on('click',function(e){
       e.preventDefault();
       polivozSlider.trigger('owl.next');
    });
  
    ///-----------------------------------------------------------
    //--------------------------Loader-----------------------------
    //------------------------------------------------------------
    
    /*Helper functions*/
    function revealPosts(){
        var posts = $('section:not(reveal)');
        var i=0;
        setInterval(function(){
           if(i>=posts.length) return false;
           var el = posts[i];
           $(el).addClass('reveal');
            var gallerySlider = $(el).find("#owl-slider-gallery-"+$(el).data('id'));
            var eventSlider = $(el).find("#owl-slider-event-"+$(el).data('id'));
                gallerySlider.owlCarousel({
                    autoPlay: 3000,
                    items: 3,
                    itemsDesktop: [1199,3],
                    itemsTablet: [992,2],
                    itemsMobile: [544,1],
                    stopOnHover: true,
                    navigation : true,
                    navigationText: ['<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>','<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>']
                });
                if($(window).width()>=768){
                    eventSlider.owlCarousel({
                        autoPlay: 7000,
                        singleItem:true,
                        stopOnHover: true,
                        autoHeight: true,
                        navigation : true,
                        navigationText: ['<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>','<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>']
                    });
                }else{
                    eventSlider.owlCarousel({
                        autoPlay: false,
                        singleItem:true,
                        stopOnHover: true,
                        autoHeight: true,
                        navigation : true,
                        navigationText: ['<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>','<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>']
                    });
                }
            i++;
        },50);
    }
    
    function isVisible(element){
        var scroll_pos = $(window).scrollTop();
        var window_height = $(window).height();
        var el_top = $(element).offset().top;
        var el_height = $(element).height();
        var el_bottom = el_top + el_height;
        return (el_bottom - el_height*0.25 > scroll_pos) && (el_top < scroll_pos+0.5*window_height);
    }
    
    //Pirate Form 
    
    $('#pirate-forms-contact-submit').addClass('btn btn-default');
    $('.contact_subject_wrap').removeClass('col-sm-4 col-lg-4').addClass('col-xs-12');
    $('.contact_submit_wrap').removeClass('col-sm-6 col-lg-6').addClass('col-lg-12')
    $('#pirate-forms-contact-message').attr('rows', '5');
    $('.contact_name_wrap').removeClass('col-sm-4 col-lg-4').addClass('col-md-6');
    $('.contact_email_wrap').removeClass('col-sm-4 col-lg-4').addClass('col-md-6');
    
    $('#pirate-forms-contact-submit').on('click',function(){
        location.href = '#formulario-polivoz';
    });
    
});




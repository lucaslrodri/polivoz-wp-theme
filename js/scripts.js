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
        var parallax_height = Math.min($(window).height()/1.3 - topMenuHeight,$(window).width()/2.33)+'px';
        $('.parallax-window').css('min-height',parallax_height);
        $('.carousel-box').css('min-height',parallax_height);
        $('.carousel-wrap').css('height',parallax_height);
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
            addExtraHeight = 0;
        }else{
            addExtraHeight = 50;
            $("#main-menu").addClass("menu-desktop").removeClass("menu-mobile");
        }
        if ($('body').hasClass("admin-bar")){
            var wp_menu = $('#wpadminbar').outerHeight();
            $('.anchor').css('margin-top',"-"+(topMenuHeight+wp_menu)+"px");
            $('.anchor').css('height',(topMenuHeight+wp_menu)+"px");
            $('#main-menu').css("top",wp_menu);
            $('#wpadminbar').css("position","fixed");
            $('.space').height(wp_menu);
        }else{
            $('.anchor').css('margin-top',"-"+topMenuHeight+"px");
            $('.anchor').css('height',topMenuHeight+"px");
            $('#main-menu').css("top",0);
            $('.space').height(0);
        }
        $("body").attr("style","padding-top:",addExtraHeight + topMenuHeight+'px !important;');
        $("body").css("padding-top",addExtraHeight + topMenuHeight);
        $('.galeria-img').height((9/16)*$('.galeria-img').width()+40);
        setParalaxSize();
        $('[data-spy="scroll"]').each(function () {
          $(this).scrollspy('refresh');
        });
    }
    
    $('[data-toggle="tooltip"]').tooltip();

    setMenuType();
    $('#main-menu').css('visibility', 'inherit');
    $(window).resize(setMenuType);
    
    // so we can get a fancy scroll animation
    $('.glyphicon-chevron-up').click(function(e){
        e.preventDefault();
            $('html, body').stop().animate({ 
                scrollTop: 0}, 300);
    });
    
    $('.home-menu .navbar-brand').click(function(e){
        e.preventDefault();
            $('html, body').stop().animate({ 
                scrollTop: 0}, 300);
    });
    
    $('a[href*="#"]:not([href="#"])').click(function(e) {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 300);
          return false;
        }
      }
    });
    
    $('section:not(reveal)').each(function(){
        if(isVisible($(this))){
            $(this).addClass('reveal').find('.polivoz-carousel-thumb').carousel();
    }});

    var lastScroll = 0;
    $(window).on("scroll touchmove",function(){
        setMenuType();
       var scrollWindow = $(window).scrollTop();
       
        if(Math.abs(scrollWindow-lastScroll) >$(window).height()*0.1){
            lastScroll=scrollWindow;  
            $('section:not(reveal)').each(function(){
                if(isVisible($(this))){
                    $(this).addClass('reveal').find('.polivoz-carousel-thumb').carousel();
                }
            });
        };
    });
     
    ///-----------------------------------------------------------
    //--------------------------Slider-----------------------------
    //------------------------------------------------------------
    
    var polivozSlider =  $("#polivoz-slider");
            
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
    
    //powr counter
    
});




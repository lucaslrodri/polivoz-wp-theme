 jQuery(document).ready(function($){
     /*Ajax functions */
    $(document).on('click','.load-more:not(.loading-more)',function(){
       var that = $(this);
       var page = $(this).data('page');
       var pagenum = $(this).data('pagenum');
       var postperpage = $(this).data('postperpage');
       var postype = $(this).data('postype');
       var filterByDate = $(this).data('filterbydate');
       var addressID = $(this).data('addressid');
       var customDateFilter = transformIntoQueryDate($(this).data('datesObject'));
       var newPage = page+1;
       var term = $(this).data('term');
       if (typeof term === 'undefined')
           term = 0;
       if (typeof filterByDate === 'undefined')
           filterByDate = 0;
       var ajaxurl = $(this).data('url');
       that.addClass('loading-more').find('.text').text(that.text().replace('Carregar', 'Carregando'));
       that.find('.polivoz-icon').addClass("spin").fadeIn(300);
       $.ajax({
           url : ajaxurl,
           type : 'post',
           data: {
               page: page,
               term: term,
               pagenum: pagenum,
               postype: postype,
               addressID: addressID,
               postperpage: postperpage,
               lowerDate: customDateFilter[0],
               higherDate: customDateFilter[1],
               datefilter: filterByDate,
               action: 'polivoz_load_more'
           },
           error : function(response){
               console.log(response);
           },
           success: function(response){
               setTimeout(function(){
                    $('#pagination').removeClass('hidden');
                    if ((pagenum-newPage) <= 0){
                            $('#pagination').addClass('hidden');
                            $('#end-pagination').removeClass('hidden');
                    }else{
                        $('#end-pagination').addClass('hidden');
                    }
                    that.data('page',newPage);
                    $('.polivoz-posts-container').append(response);
                    that.removeClass('loading-more').find('.text').text(that.text().replace('Carregando', 'Carregar'));
                    that.find('.polivoz-icon').removeClass("spin").fadeIn(300);
                    revealPosts();
                    
               },500);
           }
       });
    });
        /*Search functions*/
    $("body").on('click',function(e){
        if($(this).hasClass("search-body-open")&&!($(e.target).closest("#main-menu").hasClass('navbar'))&&!($(e.target).closest(".search-container").hasClass("search-container"))){
            e.preventDefault();
            $('body').removeClass('search-body-open');
            $('.polivoz-search-form').removeClass('search-input-open');
            setTimeout(function(){$(".search-submit-open").removeClass("search-submit-open");},500);
            setTimeout(function(){$(".inside-icon").removeClass("inside-icon-active");},180);
        }
    });
    $("#search-trigger").on('click',function(){
        var menuOpen = $(".glyphicon").hasClass("search-submit-open");
        $('.polivoz-search-form').addClass('search-input-open');
        $(".glyphicon-search").addClass('search-submit-open');
        setTimeout(function(){$('body').addClass('search-body-open');},300);
        if (menuOpen){
            $(this).closest('form').submit();
        }else{
            setTimeout(function(){$("#polivoz-search-input").focus();},500);
            setTimeout(function(){$(".inside-icon").addClass("inside-icon-active");},100);
        }
    });
    $('.search-container').submit(function(e){
        e.preventDefault();
        var form = $(this);
        var loadMore = $('.load-more:not(.loading-more)');
        var term = form.find( "input[name='s']" ).val();
        var searchBtn = $('#search-trigger span');
        var oldTerm = $(this).data('oldterm');
        if (typeof(oldTerm) === 'undefined'){
            oldTerm = '';
        }
        var postperpage = $(this).data('postperpage');
        var currentDateFilter = $(this).attr("data-filterbydate");
        var nextDateFilter = $(this).data("filterbydate");
        var currentCustomDateFilter = $(this).attr("data-datesObject");
        var nextCustomDateFilter = $(this).data('datesObject');
        if(term != oldTerm || currentDateFilter != nextDateFilter|| nextCustomDateFilter != currentCustomDateFilter){
            $('#end-pagination').addClass("hidden");
            var ajaxurl = $(this).data('url');
            var postype = $(this).data('postype');
            var addressID = $(this).data("addressid");
            var customDateFilter = transformIntoQueryDate(nextCustomDateFilter);
            searchBtn.addClass("spin").fadeIn(300);
            $.ajax({
                url : ajaxurl,
                type : 'post',
                data: {
                    term: term, 
                    postype: postype,
                    lowerDate: customDateFilter[0],
                    postperpage: postperpage,
                    addressID: addressID,
                    higherDate: customDateFilter[1],
                    datefilter: nextDateFilter,
                    action: 'polivoz_search'
                },
                error : function(response){
                    console.log(response);
                },
                success: function(response){
                    form.attr("data-filterbydate",nextDateFilter);
                    form.attr("data-datesObject",nextCustomDateFilter);
                    $('#pagination').addClass('hidden');
                    loadMore.data('page',1);
                    setTimeout(function(){
                        $('.load-more').data('term',term);
                        searchBtn.removeClass("spin").fadeIn(300);
                        $('.polivoz-posts-container').html(response);
                        var pagenum = $('#pagenum').data('pagenum');
                        var haveposts = $('#pagenum').data('haveposts');
                        loadMore.data('pagenum',pagenum);
                        loadMore.data('addressid',addressID);
                        loadMore.data('filterbydate',nextDateFilter);
                        loadMore.data('datesObject',nextCustomDateFilter);
                        form.data('oldterm',term);
                        if(pagenum===1){
                            $('#end-pagination').removeClass('hidden');
                        }else if(haveposts){
                            $('#pagination').removeClass('hidden');
                            $('#end-pagination').addClass('hidden');
                        }
                        revealPosts();
                        $('body').removeClass('search-body-open');
                        $('.polivoz-search-form').removeClass('search-input-open');
                        setTimeout(function(){$(".inside-icon").removeClass("inside-icon-active");},180);
                        setTimeout(function(){$(".search-submit-open").removeClass("search-submit-open");
                        },500);
                    },600);
                }
            });
        }else{
            $('body').removeClass('search-body-open');
            $('.polivoz-search-form').removeClass('search-input-open');
            setTimeout(function(){$(".search-submit-open").removeClass("search-submit-open");},500);
            setTimeout(function(){$(".inside-icon").removeClass("inside-icon-active");},180);
        }
    });
    /*Date filter*/
    
    $('.filter-by-date').on('click',function(){
        var rule = $(this).data('rule');
        if (rule === 'custom'){
            $('#modal-custom-date').modal({keyboard: false});
            return false;
        }
        if($(this).hasClass("active-item")){
           return false;
        }
        if(rule === 'none'){$('.custom-date-ok').removeClass("custom-date-ok-active");}
        else{$('.custom-date-ok').addClass("custom-date-ok-active");}
        $('.search-container').data('datesObject','');
        $('.custom-date a').text('Personalizado');
        $('.search-container').data('filterbydate',rule);
        $('#filter-by-date-form .active-item').removeClass('active-item');
        $(this).addClass('active-item');
    });
    /*Calendar*/
    /*Functions Calendar*/
    function dateNotExist(date){
        return typeof(date)==='undefined'||date=="";
    }
    
    function dateString(date,monthString,dayActive){
        var monthName = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'];
        if (monthString === true)
            return ((dayActive===true)?("01/"):"") + monthName[date.getMonth()] + '/' + date.getFullYear();
        return ((dayActive===true)?("01/"):"") + ("0" + (date.getMonth()+1)).slice(-2) + '/' + date.getFullYear();
    }
    function dateQuery(date){
        return date.getFullYear() + '-' + ("0" + (date.getMonth()+1)).slice(-2);
    }
    
    function transformIntoQueryDate(dates){
        if(!(Array.isArray(dates)))
            return ["",""];
        if(dates.lenght<2)
            return ["",""];
        sortDates(dates);
        return [dateQuery(dates[0]), dateQuery(dates[1])];
    }
    
    function sortDates(dates){
        if (dates[0]<dates[1])
            return [dates[0], dates[1]];
        else
            return [dates[1], dates[0]];
    }
    
    function createDateTitle(dates,falseString,monthString,dayActive){
        if(!(Array.isArray(dates)))
            return falseString;
        if (dates.every(dateNotExist)||dates.length<2)
            return falseString;
        dates = sortDates(dates);
        return dateString(dates[0],monthString,dayActive) + ' a ' + dateString(dates[1],monthString,dayActive);
    }
    function beginCalendar(calendar){
        calendar.datepicker({
            format: "mm/yyyy",
            minViewMode: 1,
            maxViewMode: 2,
            language: "pt-BR",
            multidate: 2,
            multidateSeparator: ",",
            keyboardNavigation: false,
            toggleActive: true
        });
    }
    /*Calendar Structure*/
    beginCalendar($('.calendar'));
    $('#modal-custom-date').on('show.bs.modal',function(){
        var calendar = $('.calendar');
        beginCalendar(calendar);
        var datesObject = $('.search-container').data('datesObject');
        calendar.datepicker('setDates',datesObject);
        $('.modal-title').text(createDateTitle(datesObject,"Selecione duas datas",true)); 
    });
    $('#modal-custom-date').on('hidden.bs.modal',function(){;
        $('.calendar').datepicker('destroy');
        return false;
    });
    $('.calendar').datepicker().on('changeMonth',function(e){
       var calendar = $(this);
       setTimeout(function(){
            var datesObject = calendar.datepicker('getDates');
            if (datesObject.length<2)
                return;
            datesObject=sortDates(datesObject);
            $('.modal-title').text(createDateTitle(datesObject,"Selecione duas datas",true));
            
       },100);
    });
    $("#btn-close-date").on('click',function(){
        $('#modal-custom-date').modal('hide');
       return false; 
    });
    $("#btn-clear-date").on('click',function(){
       $('.calendar').datepicker('clearDates');
       $('.modal-title').text("Selecione duas datas"); 
       return false;
    });
    $("#btn-submit-date").on('click',function(){
        var datesObject = $('.calendar').datepicker('getDates');
        if (datesObject.length<2)
                return false;
        datesObject=sortDates(datesObject);
        $('.search-container').data('datesObject',datesObject);
        $('.custom-date a').text(createDateTitle(datesObject,"Personalizado",true));
        $('#filter-by-date-form .active-item').removeClass('active-item');
        $('.custom-date').addClass('active-item');
        $('#modal-custom-date').modal('hide');
        var rule = $('.custom-date').data('rule');
        $('.custom-date-ok').addClass("custom-date-ok-active");
        $('.search-container').data('filterbydate',rule);
        return false;
    });
    function revealPosts(){
        var posts = $('section:not(reveal)');
        var i=0;
        setInterval(function(){
           if(i>=posts.length) return false;
           var el = posts[i];
           $(el).addClass('reveal').find('.polivoz-carousel-thumb').carousel();
            i++;
        },50);
    }
});
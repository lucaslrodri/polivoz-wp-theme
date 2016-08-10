jQuery(document).ready(function($){
    $('.home-type-radio:radio').on('change',function(){
       $('#post').submit(); 
    });
    $('#polivoz_subtitle_field').on('keyup',function(){
        var text_full = $(this).val();
        text_full = text_full.replace("\n", "");
        $(this).val(text_full);
        $('#count-character').text(140-text_full.length);
    });
    $('#polivoz_nota_musical_field').on('keyup',function(){
        var text_full = $(this).val();
        var postID = $(this).data('postid');
        var text_filtered = text_full.replace(/[^A-Za-z0]/g,'');
        text_filtered = text_filtered.replace(/[0]{2}/g,'0');
        $('.nota-musical').text(calculate_nota_musical(postID,text_filtered));
        $(this).val(text_filtered);
    });
    
    $('#polivoz_list_iframe_number').on('change',function(){
        var num = $(this).val();
        $('.iframe-music-container').each(function(i){
            if (i >= num)
                $(this).addClass('hidden');
        });
    });
    
    //Funções auxiliares para upload de itens
    
    function delete_item(name,small_name,selector,default_external){
        var confirmar = confirm("Deseja realmente excluir este item?");
        if(default_external!='yes'||typeof(default_external)==='undefined')
            default_external = 'no';
        if(!confirmar)
            return;
        var currentItem = selector.closest('.'+name+'-container');
        var title = [];
        var code = [];
        var external = [];
        var forcedownload = [];
        $('.'+name+'-container:not(.hidden)').each(function(){
            if(currentItem.attr('id')!=$(this).attr('id')){
                title.push($(this).find("."+small_name+"-title").val());
                code.push($(this).find("."+small_name+"-code").val());
                external.push($(this).find("."+small_name+"-external input:checked").val());
                var forcedownloadtemp = $(this).find('.force-download').attr('checked');
                if (forcedownloadtemp === 'checked'){
                    forcedownload.push(true);
                }else{
                    forcedownload.push(false);
                }
            } 
        });
        var size = title.length;
        $('.'+name+'-container').each(function(index){
            if(index<size){
                $(this).find("."+small_name+"-title").val(title[index]);
                $(this).find("."+small_name+"-code").val(code[index]);
                $(this).find(".external-"+external[index]).prop('checked',true);
                $(this).find(".force-download").prop('checked',forcedownload[index]);
            }else{
                $(this).find("."+small_name+"-title").val('');
                $(this).find("."+small_name+"-code").val('');
                $(this).find(".external-"+default_external).prop('checked',true);
                $(this).find(".force-download").prop('checked',false);
                $(this).addClass('hidden');
            }  
        });
        if(size===1){
            $('.delete-'+small_name+'-item').first().addClass('hidden');
        }
        $("#add_new_"+small_name).removeClass('hidden');
    }
    
    function add_new_item(name,small_name,selector,max){
        $('.delete-'+small_name+'-item').removeClass('hidden');
        $('.'+name+'-container.hidden').first().removeClass('hidden');
        if($('.'+name+'-container:not(.hidden)').size()>=max)
            selector.addClass('hidden');
    }
    
    function hideUploader(name,selector){
        if (selector.is(':checked') && selector.val() == 'yes') 
            selector.parents('.'+name+'-music-container').find('.open-media').addClass('hidden');
        else
            selector.parents('.'+name+'-music-container').find('.open-media').removeClass('hidden');
    }
    
    function loadMediaUploader(selector,item_title,item_text,home_url,name){
        var mediaUploader;
        if(mediaUploader){
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
           title: item_title,
           buttom: {
               text: item_text,
               multiple: false
           }
        });
        mediaUploader.on('select',function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            var filteredAttachment = attachment.url;
            filteredAttachment = filteredAttachment.replace(home_url+'/','');
            filteredAttachment = filteredAttachment.replace(home_url,'');
            selector.parents('.'+name+'-music-container').find('.'+name+'-code').val(filteredAttachment);
        });
        mediaUploader.open();
    }
    
    //Iframes
    
    $('.delete-iframe-item').on('click',function(e){
        e.preventDefault();
        delete_item('iframe-music','iframe',$(this));
    });
    
    $("#add_new_iframe").on('click',function(){
        add_new_item('iframe-music','iframe',$(this),4);
    });
    
    //Partituras
    
    $('.delete-pdfs-item').on('click',function(e){
        e.preventDefault();
        delete_item('pdfs-music','pdfs',$(this));
    });
    
    $("#add_new_pdfs").on('click',function(){
        var max = $('#max-pdfs-num').val();
        add_new_item('pdfs-music','pdfs',$(this),max);
    });
    
    
    $('.link-externo input:radio').on('change',function(){
        hideUploader('pdfs',$(this));
    });
    
    $('.open-media-pdfs').on('click',function(e){
        e.preventDefault();
        var home_url =  $(this).data('homeurl');
        loadMediaUploader($(this),'Escolha uma partitura em formato de documento (PDF, doc)','Escolha uma partitura',home_url,'pdfs');
    });
    
    //Musicas
    
    $('.delete-mp3-item').on('click',function(e){
        e.preventDefault();
        delete_item('mp3-music','mp3',$(this));
    });
    
    $("#add_new_mp3").on('click',function(){
         var max = $('#max-mp3-num').val();
        add_new_item('mp3-music','mp3',$(this),max);
    });
    
    $('.link-externo input:radio').on('change',function(){
        hideUploader('mp3',$(this));
        var forcedownload = $(this).parents('.mp3-external').find('.force-download');
        if ($(this).is(':checked') && $(this).val() == 'yes'){ 
            forcedownload.prop('disabled',false);
        }else
            forcedownload.prop('disabled',true);
            forcedownload.prop('checked',false);
    });
    
    $('.open-media-mp3').on('click',function(e){
        e.preventDefault();
        var home_url =  $(this).data('homeurl');
        loadMediaUploader($(this),'Escolha um arquivo de música (mp3, mid)','Escolha um arquivo de música',home_url,'mp3');
    });
    
    //Visibilty
    
    $('#polivoz_visibility_field_featured').on('change',function(){
        if($(this).is(":checked"))
            $('#featured-atributes').removeClass('hidden');
        else
            $('#featured-atributes').addClass('hidden');
    });
    
    //Mapa
    
    $('#create_map_link').on('click',function(){
        $('#polivoz_location_map_field').val(create_map_link());
    });
    
    function calculate_nota_musical(postID,text){
        var nota_val = ["b", "c", "K", "eQ", "f", "Y", "h", "i",
            "j",  "G", "l", "n", "C", "o", "p", "Z", "L", "s", "t", 
            "H", "v", "U", "y"];
        if (typeof(text)==='undefined'||text==""){
            return nota_val[((postID - 1) % 22)];
        }else if(text == "0"||text == "00"){
            return "";
        }else{
            return text;
        }
    }
    
    $('#go_to_link').on('click',function(){
        var map_field = $('#polivoz_location_map_field');
        if (map_field.val()==''){
            map_field.val(create_map_link());
        }
        window.open(map_field.val(), '_blank');
    });
    
    function create_map_link(){
        var address = [];
        address['title']=$('#title').val();
        $('.address_field_input').each(function(){
            var key= $(this).attr('id').replace('polivoz_location_address_field_','');
            address[key] = $(this).val();
        });
        var address_string = 'http://maps.google.com/maps?q=';
        address_string  += (address['title']!='')? (address['title'] + '%2c+'): '';
        address_string  += (address['street']!='')? (address['street'] + '%2c+'): '';
        address_string  += (address['number']!='')? (address['number'] + '%2c+'): 's/n%2c+';
        address_string  += (address['city']!='')? (address['city'] + '%2c+'): 'Salvador%2c+';
        address_string  += (address['province']!='')? (address['province'] + '%2c+'): 'Bahia%2c+';
        address_string  += (address['country']!='')? (address['country'] + '%2c+'): 'Brasil%2c+';
        address_string  += (address['cep']!='')? (address['cep']): '';
        address_string = address_string.replace(/\s/g,'+');
        return address_string;
    }

    $.datepicker.setDefaults($.datepicker.regional["pt-BR"]);
    var from = $('#polivoz_event_date_field_from_date').datepicker().on("change",function(){
        to.datepicker( "option", "minDate", getDate(this));
        $("#data_event_date_field_timestamp").val(convertDateTimeToTimestamp($('#polivoz_event_date_field_from_date'),$('#polivoz_event_date_field_from_time')));
    });
    var to = $('#polivoz_event_date_field_to_date').datepicker().on("change",function(){
        from.datepicker( "option", "maxDate", getDate(this));
    });
    $("#polivoz_event_date_field_all_day").on('change',function(){
        $("#data_event_date_field_timestamp").val(convertDateTimeToTimestamp($('#polivoz_event_date_field_from_date'),$('#polivoz_event_date_field_from_time')));
    });
    function convertDateTimeToTimestamp(objectDate,objectTime){
        var currentDate = objectDate.val();
        if (currentDate == '')
            return;
        var dateParts = currentDate.split('/');
        var currentTime = objectTime.val();
        if (currentTime == '' ||($("#polivoz_event_date_field_all_day").attr('checked')))
            currentTime = "00:00";
        var timeParts = currentTime.split(':');
        var currentDateTimeObject = new Date(dateParts[2],parseInt(dateParts[1],10)-1,dateParts[0],timeParts[0],timeParts[1]);
        return Math.floor((currentDateTimeObject.getTime())/1000); 
    }

    function getDate(element){
      var dateFormat = "dd/mm/yy"
      var date;
      try {
        date = $.datepicker.parseDate(dateFormat, element.value);
      } catch( error ) {
        date = null;
      }
      return date;
    }
    $("#ui-datepicker-div").hide();
    $('.from_time').each(function(){$(this).on('change',function(){
       set_time('#from_time_hour','#from_time_minute','#polivoz_event_date_field_from_time');
       $("#data_event_date_field_timestamp").val(convertDateTimeToTimestamp($('#polivoz_event_date_field_from_date'),$('#polivoz_event_date_field_from_time')));
    })});
    $('.to_time').each(function(){$(this).on('change',function(){
       set_time('#to_time_hour','#to_time_minute','#polivoz_event_date_field_to_time');
    })});
    
    function set_time(h_el,m_el,output_el){
        $(output_el).val($(h_el).val()+':'+$(m_el).val());
    }
    disable_date();
    $("#polivoz_event_date_field_all_day").on("change",function(){
        disable_date();
    });
    function disable_date(){
        if($("#polivoz_event_date_field_all_day").is(":checked")){
            $('.select_time').each(function(){
               $(this).prop('disabled','disabled');
            });
        }else{
            $('.select_time').each(function(){
               $(this).prop('disabled',false);
            });
        }
    }
    $("#polivoz_event_location_field").on("change",function(){
        var field = $(this).val();
        var address = $("#address-"+field).val();
        $("#current-address").text(address);
    });
});
jQuery(document).ready(function($){
    
    function uploaderMedia(postname){
        var mediaUploader;
        if(mediaUploader){
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
           title: 'Escolha uma imagem destacada',
           buttom: {
               text: 'Escolha uma imagem',
               multiple: false
           }
        });
        mediaUploader.on('select',function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#'+postname+'_header_url').val(attachment.url);
            $('.'+postname+'-header-not-selected').addClass("hidden");  //Esconder os itens de quando está selecionado
            $('.'+postname+'-header-selected').removeClass("hidden"); //Mostrar os itens de quando está selecionado
            $('#header-'+postname+'-image').css("background-image",'url('+attachment.url+')');
            $('#upload-'+postname+'-header').attr("value",'Trocar a imagem');
        });
        mediaUploader.open();
    }
    
    function deleteImageUploader(postname){
        $('#'+postname+'_header_url').val('');
        $('.'+postname+'-header-not-selected').removeClass("hidden"); //Esconder os itens de quando não está selecionado
        $('.'+postname+'-header-selected').addClass("hidden"); //Mostrar os itens de quando está selecionado
        $('#upload-'+postname+'-header').attr("value","Selecionar imagem");
    }
    
    //Galeria
    $('#upload-galeria-header').on('click',function(e){
        e.preventDefault();
        uploaderMedia('galeria');

    });
    $("#upload-galeria-remove").on('click',function(e){
        e.preventDefault();
        deleteImageUploader('galeria');

    });   
    //Local
    $('#upload-local-header').on('click',function(e){
        e.preventDefault();
        uploaderMedia('local');
    });
    $("#upload-local-remove").on('click',function(e){
        e.preventDefault();
        deleteImageUploader('local');
    });
    //Evento
    $('#upload-evento-header').on('click',function(e){
        e.preventDefault();
        uploaderMedia('evento');
    });
    $("#upload-evento-remove").on('click',function(e){
        e.preventDefault();
        deleteImageUploader('evento');
    });
    
    //Música
    $('#upload-musica-header').on('click',function(e){
        e.preventDefault();
        uploaderMedia('musica');
    });
    $("#upload-musica-remove").on('click',function(e){
        e.preventDefault();
        deleteImageUploader('musica');
    });
    
    $('.polivoz_nota_musical_field').on('keyup',function(){
        var text_full = $(this).val();
        var postID = $(this).data('postid');
        var text_filtered = text_full.replace(/[^A-Za-z0]/g,'');
        text_filtered = text_filtered.replace(/[0]{2}/g,'0');
        $(this).parent().find('.nota-musical').text(calculate_nota_musical(postID,text_filtered));
        $(this).val(text_filtered);
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
    
});

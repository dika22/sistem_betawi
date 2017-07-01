/**
 * Created by haris on 1/23/15.
 */


$(document).ready(function(){
    $(document).on('click', '#addNew', function(){
        $('#modal').modal('hide');
        var html = '<iframe width="100%" height="500px"  src="'+$(this).attr('data-value')+'"></iframe>';
        $('#addNewModal').modal('show')
                .find('#modalAddContent')
                .html(html);
        return false;
    });

    $('#backToBrowse').click(function (){
         $('#addNewModal').modal('hide');
        $('#modal').modal('show')
            .find('#modalContent')
            .load($('#modalButton').attr('value'));
    });

})

$(document).ready(function(){

    $(document).on('click', '#addNew', function(){
        $('#modalContent').html('');
        return false;
    });

    $('#modalButton').click(function (){
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });
    CKEDITOR.replaceAll( 'editor' );
    CKEDITOR.replace( 'content', {
        on: {
            instanceReady: function() {
                // this is current editor instance
                //      this.insertHtml( '<h1>someText</h1>' );
            }
        },
        config : {
            height : '500px'
        }

    });

    CKEDITOR.config = function( config )
    {
        // misc options
        config.height = '550px';
    };

    $(document).on('click', '.insert-image', function(){
        var imageUrl = $(this).attr('data-image');
        var credit = $(this).attr('data-credit');
        CKEDITOR.instances.content.insertHtml('<figure class="image" style="float:right"><img src="'+imageUrl+'" /><figcaption>'+credit+'</figcaption></figure>');
        $('#modal').modal('hide');
    });

    $(document).on('click', '.insert-thumbnail', function(){
        var imageUrl = $(this).attr('data-image');
        var id = $(this).attr('data-id');
        var html = '<img src="'+imageUrl+'" class="img-thumbnail"/>';
        $('#thumbnailContainer').html(html);
        $('#post-image').val(id);
        $('#modal').modal('hide');
    });


    $(document).on('click', '.pagination li a', function(){

        var url = $(this).attr('href');
        $.ajax({
            url : url,
            method : 'get',
            dataType : 'html',
            success : function (valuelink){
                $('#modalContent').html(valuelink);
            }
        });

        return false;
    });

    $(document).on('keypress', '#searchGallery', function(key){
        var search = $(this).val();

        if(key.keyCode==13){
            $.ajax({
                url : $('#formGallery').val()+'?s='+search,
                method : 'get',
                dataType : 'html',
                success : function(value){
                    $('#modalContent').html(value);
                }
            });

            return false;
        }
    });

})

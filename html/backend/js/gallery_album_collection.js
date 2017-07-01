$(document).ready(function(){

	$('#modalButton').click(function (){
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });

	$(document).on('click', '.insert-image', function(){
        var Url = $(this).attr('data-url');

        $('#modal').modal('hide');

		window.location.replace(Url);
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

});
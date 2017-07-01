$(function(){
    var pic_X=$('.360_view').offset().left;
    var pic_Y=$('.360_view').offset().top;
    var pic_W=$('.360_view').width()/2;
    var pic_H=$('.360_view').height()/2;
    var center_X=pic_X+pic_W;
    var center_Y=pic_Y+pic_H;
    var movestop=pic_W/10;
    $('.360_view').mousemove(function(event){
        var mouse_X=event.pageX;
        var mouse_Y=event.pageY;
        if(mouse_X-center_X<=0){
            moveImg(mouse_X,mouse_Y,'left')
        }else{
            moveImg(mouse_X,mouse_Y)
        }
    });
    function moveImg(m_X,m_Y,dir){
        var index=Math.ceil(Math.abs(m_X-center_X)/movestop);
        if(dir){
            $('.360_view li').eq(index).show().siblings().hide();
        }else{
            $('.360_view li').eq(18-index).show().siblings().hide();
        }
    }
})
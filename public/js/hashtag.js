$(function(){
    var regex = /[#|@](\w+)$/ig;
    $(document).on('keyup','.text-whathappen',function(){
        var content = $(this).val().trim();
        var text=content.match(regex);
        var max = 140;
        
        $('#count').text(max - content.length);
    
        if(content.length >= max){
          $('#count').css('color','#f00');
         
        }else{
          $('#count').css('color','#1DA1F2');
        }
        
    })
})
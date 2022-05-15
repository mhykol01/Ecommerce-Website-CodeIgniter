$(document).ready(function(){
    $("#button").click(function(){
        $path=$("#main").offset().top;
        $('body').animate({scrollTop:$path}, 1000);
    });
});
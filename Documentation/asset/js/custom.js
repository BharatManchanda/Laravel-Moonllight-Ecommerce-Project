$(document).ready(function(){
    $(".tab-btn ul li").click(function(){
        $(".tab-btn ul li").removeClass("active");
        $(this).addClass("active");
        $(".tab-content > div").removeClass("active");
        $(".tab-content > div").eq($(this).index()).addClass("active");
    });
});
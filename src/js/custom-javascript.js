(function($){

    $(document).ready(function(){
        $('.navbar').hide();
        $(function(){
            $(window).scroll(function(){
                if($(this).scrollTop() > 100){
                    $('.navbar').fadeIn();
                }else{
                    $('.navbar').fadeOut();
                }
            })
        });

        $(function(){

            var animationEnd = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
            var animation = 'animated fadeInUp';

            var line_1 = $('.welcome-line-1');
            
            line_1.addClass(animation).one(animationEnd,function(){
                line_1.removeClass(animation);
                line_1.addClass('animated fadeOut');
            });
            line_1.animate({
                marginBottom: "20px",
            },5000);
        });

    })

}(jQuery));
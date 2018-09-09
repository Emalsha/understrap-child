(function($){

    $(document).ready(function(){
        
        var is_root = location.pathname == "/";
        if(is_root){
            $('.navbar').removeClass('fixed-top');
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
        }

        $(function(){

            var line_1 = $('#welcome-line-1');
            var line_2 = $('#welcome-line-2');
            var line_3 = $('#welcome-line-3');
            var line_4 = $('#welcome-line-4');
            var line_5 = $('#welcome-line-5');
            var line_6 = $('#welcome-line-6');

            var line_animation = function(selector,delay){
                var dfd = $.Deferred();
                selector
                    .css('opacity', 0)
                    .slideDown('slow')
                    .animate(
                        { opacity: 1 , fontSize:'+=.13vw'},
                        { queue: false, duration: 'slow' },
                        'linear'
                    )
                    .delay(delay)
                    .slideUp('slow',function () {
                        dfd.resolve("promise");
                    });

                return dfd.promise();
            }

            var box_animation = function(selector){
                selector
                    .css('opacity', 0)
                    .slideDown('slow')
                    .animate(
                        { opacity: 1 },
                        { queue: false, duration: 'slow' }
                    )
            }

            $.when(line_animation(line_1,1000))
            .then(function(){
                line_animation(line_2,2000)
                .then(function(){
                    line_animation(line_3,3000)
                    .then(function(){
                        line_animation(line_4,2000)
                        .then(function(){
                            box_animation(line_5);
                            box_animation(line_6);
                        })
                    })
                })
            });

        });

    })

}(jQuery));
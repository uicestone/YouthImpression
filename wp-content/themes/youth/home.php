<?= get_header("simple") ?>
<style>
#welcome-bar .welcome_pic{
    position: absolute;
    top: 0;
    height:230px;
    overflow: hidden;
}

#welcome-bar .welcome_pic ul{
    left:0;
    position: absolute;
}
#enter-btn{
    width:240px;
    height:160px;
    position: absolute;
    bottom: 0;
    right: 0;
}
</style>
<div id="home-wrap">
<div id="welcome-bar"></div>
<div class="welcome_pic">
    <ul>
        <li>
            <img src="<?= get_template_directory_uri(); ?>/images/welcome-p1.png" width="148" height="224" />
        </li>
        <li>
            <img src="<?= get_template_directory_uri(); ?>/images/welcome-p2.png" width="148" height="224" />
        </li>
        <li>
            <img src="<?= get_template_directory_uri(); ?>/images/welcome-p3.png" width="148" height="224" />
        </li>
        <li>
            <img src="<?= get_template_directory_uri(); ?>/images/welcome-p4.png" width="148" height="224" />
        </li>
    </ul>
</div>

<div id="welcome-wrap">
<div id="welcome-bg">
        <div id="welcome-bigPic" class="bigPic-welcome">
            <img src="<?= get_template_directory_uri(); ?>/images/welcome-bigPic.jpg" width="831" height="552" />
            <a href="<?php site_url(); ?>/index/" id="enter-btn"></a>
        </div>
    </div>
    <div class="index-weibo" style="clear: both; margin-top: 266px; width: 1334px; margin: 0 auto;">
        <a href="#">
            <img src="<?= get_template_directory_uri(); ?>/images/index-weibo.png" width="171" height="39" /></a>
    </div>
</div>
</div>
<script>
jQuery.fx.interval = 45;
(function(){
    var container = $(".welcome_pic");
    var ul = container.find("ul");
    var items = $(".welcome_pic li");
    var count = items.length;
    var one_width = (items.width() + parseInt(items.css("margin-right")));
    var width =  0;
    var maxwidth = $(window).width();
    while(width < maxwidth + one_width * 4){
        for(var i = 0; i < count; i++){
            ul.append(items.eq(i).clone());
            width += one_width;
        }
    }
    ul.find("li").each(function(i,li){
        $(li).css("left",i*158);
    });

    function scroll(){
        ul.animate({
            left: - one_width * 4
        },10000,'linear',function(){
            ul.css("left","0");
            scroll();
        });
    }
    
    scroll();
})();

</script>

<?php get_footer(); ?>
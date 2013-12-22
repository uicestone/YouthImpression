<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" />
<?php wp_head(); ?>
</head>
<body>
<style>
#welcome-bar{
    position: relative;
}
#welcome-bar .welcome_pic{
    position: absolute;
    top: 0;
    height:230px;
    overflow: hidden;
}

#welcome-bar .welcome_pic ul{
    width:3000px;
    left:0;
    position: absolute;
}
#welcome-bigPic{
    position: relative;
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
<div id="welcome-bg">
    <div id="welcome-bar">
        <div id="welcome-bigPic" class="bigPic-welcome">
            <img src="<?= get_template_directory_uri(); ?>/images/welcome-bigPic.png" width="831" height="552" />

            <a href="<?php site_url(); ?>/index/" id="enter-btn"></a>
        </div>
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
    </div>
    <div class="index-weibo" style="clear: both; margin-top: 266px; width: 1334px; margin: 0 auto;">
        <a href="#">
            <img src="<?= get_template_directory_uri(); ?>/images/index-weibo.png" width="171" height="39" /></a>
    </div>
</div>

<script>
(function(){
    var container = $(".welcome_pic");
    var ul = container.find("ul");
    var items = $(".welcome_pic li");
    var count = items.length;
    var one_width = (items.width() + parseInt(items.css("margin-right")));
    var width =  0;
    var maxwidth = container.width();
    while(width < maxwidth + one_width * 4){
        for(var i = 0; i < count; i++){
            ul.append(items.eq(i).clone());
            width += one_width;
        }
    }

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
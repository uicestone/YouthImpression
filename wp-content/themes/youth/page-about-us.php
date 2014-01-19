<?php get_header(); ?>
<div id="aboutus-bg">
    <div class="aboutUs-video">
        <div class="about-video" data-video="">
            <a href="http://v.youku.com/v_show/id_XNjQ2MzY0ODE2.html" target="_blank"><img src="<?= get_template_directory_uri(); ?>/images/about-video.png" width="231" height="133" /></a>
        </div>
        <div class="about-txt">
            <h2>导演：胡博</h2>
            <ul>
                <li>华东师范大学 传播系影视编导专业</li>
                <li>上海电视台SMG，IPTV互动影视制作人</li>
                <li>2006年—2012年青春映画微电影拍摄100部导演</li>
            </ul>
        </div>
    </div>
    <div class="back-btn" style="clear: both;">
        <a href="#"><img src="<?= get_template_directory_uri(); ?>/images/back.png" width="60" height="24" /></a>
    </div>
</div>


<div id="shadow" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background-color:black;opacity:.5"></div>
<div id="pop" style="width:903px;display:none;z-index:999;">
  <div style=" background:url(images/v-l.png) no-repeat; width: 55px; height:500px; float:left; color: #999;">
  <ul style="list-style:none; width:32px; padding:0; padding-left: 12px; padding-top:134px; margin:0;">
    <li style="padding-bottom:3px;">分享</li>
    <li style="padding-bottom:7px;"><a href="#"><img src="<?= get_template_directory_uri(); ?>/images/weibo-icon.jpg" width="32" height="32" style="line-height:0; display:block;"></a></li>
    <li style="padding-bottom:7px;"><a href="#"><img src="<?= get_template_directory_uri(); ?>/images/renren.jpg" width="32" height="32" style="line-height:0; display:block;"></a></li>
    <li style="padding-bottom:7px;"><a href="#"><img src="<?= get_template_directory_uri(); ?>/images/qq.jpg" width="32" height="32" style="line-height:0; display:block;"></a></li>
    <li style="padding-bottom:7px;"><a href="#"><img src="<?= get_template_directory_uri(); ?>/images/kaixin.jpg" width="32" height="32" style="line-height:0; display:block;"></a></li>
    <li><a href="#"><img src="<?= get_template_directory_uri(); ?>/images/douban.jpg" width="32" height="32"></a></li>
  </ul>
  </div>
  <div class="video-container">
    <img src="<?= get_template_directory_uri(); ?>/images/v-r.png" width="848" height="500">
    <div class="video"></div>
  </div>
</div>

<script>

(function(){
var shadow = $("#shadow");
var pop = $("#pop");
shadow.on("click",function(){
    closeVideo();
});
var player = null;

/*$(".about-video").on("click",function(e){
    e.preventDefault();
    openVideo($(this).attr("data-video"));
});*/

// 视频弹层
function openVideo(videoSrc,href){
    pop.show();
    if(!player){
        var video = $("<video src='" + videoSrc + "' width='820' height='470'></video>");
        $(".video-container .video").empty().append(video);
        player = new MediaElementPlayer("#pop video");
    }else{
        player.setSrc(videoSrc);
    }
    function pos(){
        pop.css({
            position:"fixed",
            top:$(window).height()/2 - 500/2,
            left:$(window).width()/2 - 900/2 - 30
        });
    }
    $(window).on("resize",function(){
        pos();
    });
    shadow.show();
    pos();
}

function closeVideo(){
    player && player.pause();
    pop.hide();
    shadow.hide();
}

})();
</script>
<?php get_footer(); ?>

<?php get_header(); ?>
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/waterfall.css">
<link rel='stylesheet' id='mediaelement-css'  href='<?= includes_url() ?>/js/mediaelement/mediaelementplayer.min.css?ver=2.13.0' type='text/css' media='all' />
<link rel='stylesheet' id='wp-mediaelement-css'  href='<?= includes_url() ?>/js/mediaelement/wp-mediaelement.css?ver=3.8' type='text/css' media='all' />
<script type='text/javascript' src='<?= includes_url() ?>/js/mediaelement/mediaelement-and-player.min.js?ver=2.13.0'></script>
<script type='text/javascript' src='<?= includes_url() ?>/js/mediaelement/wp-mediaelement.js?ver=3.8'></script>
<!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
<style>
#video-banner .prev,#video-banner .next{
-webkit-user-select: none;  /* Chrome all / Safari all */
-moz-user-select: none;     /* Firefox all */
-ms-user-select: none;      /* IE 10+ */
/* No support for these yet, use at own risk */
-o-user-select: none;
user-select: none;
}
#pop .video-container{
    width: 848px; 
    height: 500px;
    float:right;
    position: relative;
}

#pop .video-container img{
    width: 848px; 
    height: 500px;
    position: absolute;
    top: 0;
    left: 0;
}
#pop .mejs-container{
    position: absolute;
    /*width: 830px;
    height: 500px;*/
    top: 15px;
    left: 15px;
    background-color: #000;
}
</style>
<script src="<?= get_template_directory_uri(); ?>/js/waterfall.js"></script>
<div id="content-all2">    
    <div id="video-banner">
        <ul class="slides">
            <?php foreach(get_posts(array('category_name'=>'video')) as $post){?>
            <li data-video="http://qcyh.lc/wp-content/uploads/2013/12/echo-hereweare.mp4" data-desc="<?php echo $post->post_title; ?>"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_post_thumbnail($post->ID,'all-video-slide'); ?></a></li>
            <?php } ?>
        </ul>

        <div class="prev">
            <div class="arr"></div> 
            <span class="txt"></span>
        </div>
        <div class="next">
            <span class="txt"></span>
            <div class="arr"></div> 
        </div>

        <div class="left-shadow"></div>
        <div class="right-shadow"></div>
    </div> 
    

    <div id="video-all-7">
    </div>       
  <div class="back-btn">
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
var page = 1;
$('#video-all-7').waterfall({
    imgClass: 'wf_img',    // 图片类名
    colWidth: 189,            // 列宽
    marginLeft: 15,            // 每列的左间宽
    marginTop: 15,            // 每列的上间宽
    perNum: 'auto',            // 每次下拉时显示多少个(int)(默认是列数)
    isAnimation: true,        // 是否使用动画效果
    ajaxTimes: 3,    // 限制加载的次数(int) 字符串'infinite'表示无限加载 
    ajaxFunc: function(succ,err){
        $.getJSON('/all-video/more/?posts_per_page=5?paged=' + page, function(data){
            succ(data);
            page+=1;
        },err);
    },
    createHtml: function(data){
        return '<a class="item" title="' + data.post_name + '" href="' + data.permlink + '">' + data.post_thumbnail + '<div class="desc">' +data.post_name+ '</div></a>';
    }
});

})();

// slides
(function(){
var ul = $(".slides");
var slides = ul.find("li");
var length = slides.length;
var prev = $("#video-banner").find(".prev");
var next = $("#video-banner").find(".next");
prev.find(".txt").html(slides.eq(0).attr("data-desc"));
next.find(".txt").html(slides.eq(2).attr("data-desc"));
var marginLeft = 298;
var width = 792;
var current = 1;
var start = 1;
var stage = 3;
var sliding = false;

// console.log(slides.clone());
ul.append(slides.clone());
// console.log(slides.clone().length);
slides.clone().insertBefore(ul.find("li:eq(0)"));
ul.css("left",parseInt(ul.css("left")) - width * length);

var startLeft = parseInt(ul.css("left"));
prev.on("click",function(e){
    if(sliding == true){return;}
    sliding = true;
    e.preventDefault();
    current -= 1;
    var current_slides = $(".slides li");
    var prevli = current_slides.eq(current).prev();
    var nextli = current_slides.eq(current).next();

    prevli = prevli.length ? prevli : current_slides.last();
    nextli = nextli.length ? nextli : current_slides.first();

    prev.find(".txt").html(prevli.attr("data-desc"));
    next.find(".txt").html(nextli.attr("data-desc"));

    ul.animate({
        left:parseInt(ul.css("left")) + width
    },function(){
        if(current == start - length){
            ul.css("left",startLeft);
            current = start;
        }
        sliding = false;
    });
});

next.on("click",function(){ 
    if(sliding == true){return;}
    sliding = true;
    current += 1;
    var current_slides = $(".slides li");
    var prevli = current_slides.eq(current).prev();
    var nextli = current_slides.eq(current).next();

    prevli = prevli.length ? prevli : current_slides.last();
    nextli = nextli.length ? nextli : current_slides.first();

    prev.find(".txt").html(prevli.attr("data-desc"));
    next.find(".txt").html(nextli.attr("data-desc"));
    
    ul.animate({
        left:parseInt(ul.css("left")) - width
    },function(){
        if(current == start + length){
            ul.css("left",startLeft);
            current = start;
        }
        sliding = false;
    });
});

})();


(function(){
var shadow = $("#shadow");
var pop = $("#pop");
shadow.on("click",function(){
    closeVideo();
});
var player = null;

$(".slides").on("click","li",function(e){
    e.preventDefault();
    openVideo($(this).attr("data-video"));
});
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

<?php get_header(); ?>
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/waterfall.css">
<script src="<?= get_template_directory_uri(); ?>/js/waterfall.js"></script>
<div id="content-all2">    
	<div id="video-banner">
		<ul class="slides">
        	<li><a href="#"><img src="http://s.cn.bing.net/az/hprichbg/rb/DyedSilkPieceHanging_ZH-CN8207662295_1366x768.jpg" /></a></li>
        	<li><a href="#"><img src="http://s.cn.bing.net/az/hprichbg/rb/DyedSilkPieceHanging_ZH-CN8207662295_1366x768.jpg" /></a></li>            	
            <li><a href="#"><img src="http://s.cn.bing.net/az/hprichbg/rb/DyedSilkPieceHanging_ZH-CN8207662295_1366x768.jpg" /></a></li>
		</ul>

		<div class="prev">
			<div class="arr"></div>	
			prev
		</div>
		<div class="next">
			next
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


<script src="<?= get_template_directory_uri(); ?>/js/slide.js"></script>
<script>
var slides = $(".slides li");
var prev = $("#video-banner").find(".prev");
var next = $("#video-banner").find(".next");
Slide({
	current:1,
	autoplay:false,
	circle:false,
    prev:prev,
    next:next,
    slides:slides,
    change:function(last,current,n){
    	$(".slides").animate({
    		left:-n*792 + 298
    	});
    }
});

$('#video-all-7').waterfall({
    imgClass: 'wf_img',    // 图片类名
    colWidth: 189,            // 列宽
    marginLeft: 15,            // 每列的左间宽
    marginTop: 15,            // 每列的上间宽
    perNum: 'auto',            // 每次下拉时显示多少个(int)(默认是列数)
    isAnimation: true,        // 是否使用动画效果
    ajaxTimes: 'infinite',    // 限制加载的次数(int) 字符串'infinite'表示无限加载 
    ajaxFunc: function(succ,err){
    	$.ajax({
			 type: 'GET',
			 url: '<?= get_template_directory_uri(); ?>/js/waterfall_jsonp.js?callback=?',
			 cache: false,
			 dataType:'jsonp',
			 jsonpCallback: 'wf_callback',
			 timeout: 6000,
			 success: succ,
			 error: err
		});
    },
    createHtml: function(data){
    	return '<a class="item" href="' + data.href + '"><img class="wf_img" src="' + data.imgSrc + '" /><div class="desc">' +data.describe+ '</div></a>';
    }
});





</script>

<?php get_footer(); ?>

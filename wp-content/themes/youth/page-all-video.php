<?php get_header(); ?>
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
    	<a href="http://v.youku.com/v_show/id_XNjQ2Mjc1OTc2.html"><img src="<?= get_template_directory_uri(); ?>/images/video-all1.png" width="190" height="264" /></a>
    	<a href="http://v.youku.com/v_show/id_XNjQ2Mjk3MzI4.html"><img src="<?= get_template_directory_uri(); ?>/images/video-all2.png" width="189" height="301" /></a>
    	<a href="http://v.youku.com/v_show/id_XNjQ2MzAwMTU2.html"><img src="<?= get_template_directory_uri(); ?>/images/video-all3.png" width="189" height="194" /></a>
    	<a href="http://v.youku.com/v_show/id_XNjQ2MjgzMjM2.html"><img src="<?= get_template_directory_uri(); ?>/images/video-all4.png" width="189" height="253" /></a>
    	<a href="http://v.youku.com/v_show/id_XNjQ2Mjg3ODM2.html"><img src="<?= get_template_directory_uri(); ?>/images/video-all5.png" width="189" height="201" /></a>
    	<a href="http://v.youku.com/v_show/id_XNjQ2Mjk1MzAw.html"><img src="<?= get_template_directory_uri(); ?>/images/video-all6.png" width="189" height="253" /></a>
    	<a href="http://v.youku.com/v_show/id_XNjQ2MzY0ODE2.html" class="post1"><img src="<?= get_template_directory_uri(); ?>/images/video-all7.png" width="190" height="221" /></a>
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
</script>

<?php get_footer(); ?>

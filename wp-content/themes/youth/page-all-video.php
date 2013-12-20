<?php get_header(); ?>
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/waterfall.css">
<script src="<?= get_template_directory_uri(); ?>/js/waterfall.js"></script>
<div id="content-all2">    
	<div id="video-banner">
		<ul class="slides">
        	<li data-desc="A"><a href="#"><img src="http://stimgcn1.s-msn.com/msnportal/dict/bingcenter/desktop/bg_desktop1.jpg" /></a></li>
        	<li data-desc="B"><a href="#"><img src="http://s.cn.bing.net/az/hprichbg/rb/DyedSilkPieceHanging_ZH-CN8207662295_1366x768.jpg" /></a></li>            	
            <li data-desc="C"><a href="#"><img src="http://ppcdn.500px.org/52454318/5a85c84af40c52aab42a6c23104954255b4c6634/2048.jpg" /></a></li>
		</ul>

		<div class="prev">
			<div class="arr"></div>	
			<span class="txt">A</span>
		</div>
		<div class="next">
			<span class="txt">C</span>
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



// done ugly but working endless slide
var slides = $(".slides li");
var prev = $("#video-banner").find(".prev");
var next = $("#video-banner").find(".next");
Slide({
    current:1,
    autoplay:false,
    endless:true,
    prev:prev,
    next:next,
    slides:slides,
    change:function(last,current,n,cur,direction){
        var total = slides.length;
        var prev_num = n - 1 < 0 ? total - 1 : (n - 1);
        var next_num = n + 1 >= total ? 0 : (n + 1); 
        prev.find(".txt").html(slides.eq(prev_num).attr("data-desc"));
        next.find(".txt").html(slides.eq(next_num).attr("data-desc"));


        if(direction === "prev"){
            if(cur == 1 || cur == 2){
                $(".slides").animate({
                    left:-(n+2) * 792 + 298
                },function(){
                    console.log(n,cur);
                });
            }else{
                $(".slides").animate({
                    left:-1 * 792 + 298
                },function(){
                    $(".slides").css("left",-2870);
                });
            }
        }else{
            if(cur == 0 || cur == 1){
                $(".slides").animate({
                    left:-(n+2) * 792 + 298
                },function(){
                    console.log(n,cur);
                });
            }else{
                $(".slides").animate({
                    left:-5 * 792 + 298
                },function(){
                    $(".slides").css("left",-1286);
                });
            }
        }
    }
});




</script>

<?php get_footer(); ?>

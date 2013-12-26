<?php get_header(); ?>


 <div id="content-all">    
    <div id="Product-content1">
        <ul>
	    <?php foreach(get_posts(array('category_name'=>'product')) as $index => $product){ ?>
	    <li class="<?php if($index===0){?>active<?php } ?>"><a href="<?php echo get_permalink($product->ID); ?>"><?php echo get_the_post_thumbnail($product->ID,'product-slide'); ?></a></li>
	    <?php } ?>
        </ul>
    </div>
    <div class="Pro-click">
        <div class="prev">
            <a href="javascript:;" class="arr-left"><img src="<?= get_template_directory_uri(); ?>/images/left-icon.png" width="11" height="17" /></a>
        </div>
        <ul>
            <li><a href="javascript:;"><img src="<?= get_template_directory_uri(); ?>/images/pro-nowClick.png" width="13" height="13" /></a></li>
            <li><a href="javascript:;"><img src="<?= get_template_directory_uri(); ?>/images/pro-noClick.png" width="13" height="13" /></a></li>
            <li><a href="javascript:;"><img src="<?= get_template_directory_uri(); ?>/images/pro-noClick.png" width="13" height="13" /></a></li>
            <li><a href="javascript:;"><img src="<?= get_template_directory_uri(); ?>/images/pro-noClick.png" width="13" height="13" /></a></li>
        </ul>
        <div class="next">
            <a href="javascript:;" class="arr-right"><img src="<?= get_template_directory_uri(); ?>/images/right-icon.png" width="11" height="17" /></a>
        </div>
    </div>
    <div class="back-btn">
        <a href="#"><img src="<?= get_template_directory_uri(); ?>/images/back.png" width="60" height="24" /></a>
    </div>
</div>


<script src="<?= get_template_directory_uri(); ?>/js/slide.js"></script>
<script>
var slides = $("#Product-content1 li");
var prev = $(".Pro-click").find(".prev");
var next = $(".Pro-click").find(".next");
var triggers = $(".Pro-click").find("li");
Slide({
    autoplay:true,
    prev:prev,
    next:next,
    triggers:triggers,
    slides:slides,
    change:function(last,current){
        last.fadeOut(700);
        current.fadeIn(700);
    },
    afterChange:function(n){
        triggers.find("img").attr("src","<?= get_template_directory_uri(); ?>/images/pro-noClick.png");
        triggers.eq(n).find("img").attr("src","<?= get_template_directory_uri(); ?>/images/pro-nowClick.png");
    }
});
</script>

<?php get_footer(); ?>

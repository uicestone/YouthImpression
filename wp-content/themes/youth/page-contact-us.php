<?php get_header(); ?>
<div id="contactus-bg2">
    <div id="contactus-bg">
        <div id="content-all">  
            <div class="contactUs-content">
            	<div class="map-left">
                	<img src="<?= get_template_directory_uri(); ?>/images/map.jpg" width="570" height="459" />
                    <h4>地址：闸北区彭江路602号大宁德必易园e栋308室</h4>
                    <h1>青春映画 <span style="font-size:28px;">个人影视制作机构</span></h1>
                    <h3>公司内配置了高清影院、虚拟演播室、专业录音棚、高清摄录设备融合时尚元素和现代简约风格，旨在打造成为江城影像文化坐标</h3>
                </div>
                <div class="contactus-rightall">
                	<h1>请留下您的联系方式 我们将与您一对一服务</h1>
			<?php echo do_shortcode('[contact-form-7 id="28" title="联系我们"]'); ?>
                </div>
            </div>
            <div class="back-btn">
                <a href="#"><img src="<?= get_template_directory_uri(); ?>/images/back.png" width="60" height="24" /></a>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

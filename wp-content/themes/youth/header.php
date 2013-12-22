<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php wp_head(); ?>
</head>

<body>
<div id="home-wrap">
<?php if(is_home()){ ?>
<div id="index_logo"><img src="<?= get_template_directory_uri(); ?>/images/index-logo.png" width="79" height="125" /></div>
<?php }else{ ?>
<div id="header-allbg">
    <div id="header">
        <div class="logo">
            
            <a href="<?php site_url(); ?>/index/"><img src="<?= get_template_directory_uri(); ?>/images/logo.png" width="103" height="85" /></a>
        </div>
        <div class="header_nav">
	    <?php wp_nav_menu(array('nav'=>'primary','container'=>false)); ?>
        </div>
        <div class="weibo">
            <span><a href="#">新浪微博账号登入</a></span>
            <a href="#"><img src="<?= get_template_directory_uri(); ?>/images/weibo.png" width="36" height="36" /></a>
        </div>
    </div>
</div>
<?php } ?>
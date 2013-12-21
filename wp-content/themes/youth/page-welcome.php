<?php get_header(); ?>
<div id="welcome-bg">
    <div id="welcome-bar">
        <div id="welcome-bigPic" class="bigPic-welcome">
            <a href="#">
                <img src="<?= get_template_directory_uri(); ?>/images/welcome-bigPic.png" width="831" height="552" /></a>
        </div>
        <div class="welcome_pic">
            <ul>
                <li>
                    <img src="<?= get_template_directory_uri(); ?>/images/welcome-p1.png" width="148" height="224" />
                </li>
                <li style="margin-right:775px;">
                    <img src="<?= get_template_directory_uri(); ?>/images/welcome-p2.png" width="148" height="224" />
                </li>
                <li>
                    <img src="<?= get_template_directory_uri(); ?>/images/welcome-p3.png" width="148" height="224" />
                </li>
                <li style="margin-right:0;">
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

<?php get_footer(); ?>
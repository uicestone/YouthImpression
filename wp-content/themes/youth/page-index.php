<?php get_header("simple"); ?>
    <div id="index-bg">
      <div class="index-menu">
            <div id="product_index" class="index-product">
            <a href="/product"><img src="<?= get_template_directory_uri(); ?>/images/index-product.png" width="191" height="195" /></a>
            </div>
          <div id="about_index" class="index-about">
            <a href="/about-us"><img src="<?= get_template_directory_uri(); ?>/images/index-about.png" width="159" height="163" /></a>
          </div>
          <div id="work_index" class="index-work">
            <a href="/all-video"><img src="<?= get_template_directory_uri(); ?>/images/index-work.png" width="195" height="199" /></a>
          </div>
          <div id="contactus_index" class="index-contact">
            <a href="/contact-us"><img src="<?= get_template_directory_uri(); ?>/images/index_contact.png" width="193" height="195" /></a>
          </div>
          <div id="hubo_index" class="index-hubo">
            <a href="/hubo"><img src="<?= get_template_directory_uri(); ?>/images/index_hubo.png" width="190" height="193" /></a>
          </div>
    </div>
        <div class="index-weibo" style="clear: both; margin-bottom: 50px; margin: 0 auto;">
            <a href="#"><img src="<?= get_template_directory_uri(); ?>/images/index-weibo.png" width="171" height="39" /></a>
        </div>
    </div>


<?php get_footer(); ?>

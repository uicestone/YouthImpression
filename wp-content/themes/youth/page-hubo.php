<?php get_header(); ?>
<div id="hubo-bg">
    <img src="<?= get_template_directory_uri(); ?>/images/people-bg.jpg" width="1013" height="642" />
    <div class="hubo-time">
            <ul>
                <li class="year" data-track-left="13" id="year-2004" style="background:url(<?= get_template_directory_uri(); ?>/images/hubo-circ.png) no-repeat; padding-left: 22px;"><a href="#">2004</a><img src="<?= get_template_directory_uri(); ?>/images/hubo-line.png" width="90" height="18" /></li>
                <li class="year" data-track-left="168" id="year-2007" style="background:url(<?= get_template_directory_uri(); ?>/images/hubo-circ.png) no-repeat; padding-left: 22px;"><a href="#">2007</a><img src="<?= get_template_directory_uri(); ?>/images/hubo-line.png" width="90" height="18" /></li>
                <li class="year" data-track-left="349" id="year-2010" style="background:url(<?= get_template_directory_uri(); ?>/images/hubo-circ.png) no-repeat; padding-left: 22px;"><a href="#">2010</a><img src="<?= get_template_directory_uri(); ?>/images/hubo-line.png" width="90" height="18" /></li>
                <li class="year" data-track-left="531" id="year-2011" style="background:url(<?= get_template_directory_uri(); ?>/images/hubo-circ.png) no-repeat; padding-left: 22px;"><a href="#">2011</a><img src="<?= get_template_directory_uri(); ?>/images/hubo-line.png" width="90" height="18" /></li>
                <li class="year" data-track-left="379" id="year-2012" style="background:url(<?= get_template_directory_uri(); ?>/images/hubo-circ.png) no-repeat; padding-left: 22px;"><a href="#">2012</a><img src="<?= get_template_directory_uri(); ?>/images/hubo-line.png" width="90" height="18" /></li>
                <li class="year" data-track-left="551" id="year-2013" style="background:url(<?= get_template_directory_uri(); ?>/images/hubo-circ2.png) no-repeat; padding-left: 22px;"><a href="#">2013</a></li>
            </ul>
            <div class="hubo-track" id="track" style="text-align: right; display: block;">
                <a href="#"><img src="<?= get_template_directory_uri(); ?>/images/hubo-2013.png" /></a>
            </div>
            <div class="back-btn" style="clear: both; width: 1016px;display: block;">
                <a href="#"><img src="<?= get_template_directory_uri(); ?>/images/back.png" width="60" height="24" /></a>
            </div>
    </div>
</div>

<script>
var track = $("#track a");
$(".year a").on("mouseenter",function(){
    var year = $(this).parent();
    var left = year.attr("data-track-left");
    var year = year.attr("id").split("-")[1];
    track.find("img").attr("src","<?= get_template_directory_uri(); ?>/images/hubo-" + year + ".png");
    track.css({
        left:left + "px"
    });
});
var left = $(".year").last().attr("data-track-left") + "px";
console.log(left);
track.css("left",left);
track.show();
</script>

<?php get_footer(); ?>

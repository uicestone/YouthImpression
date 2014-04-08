<?php

query_posts(array('category_name'=>'video','tag'=>'瀑布流','posts_per_page'=>12,'paged'=>get_query_var('paged')));

$posts = array();

while(have_posts()){
	the_post();
	
	$attachments = get_children(array('post_parent'=>get_the_ID(), 'post_type'=>'attachment'));
	
	$attachment = array_shift($attachments);
	
	$posts[]=array(
		'ID'=>get_the_ID(),
		'post_name'=>urldecode(get_the_title()),
		'post_thumbnail'=>get_the_post_thumbnail(null,'all-video-waterfall'),
		'permlink'=>get_the_content(),
		'video'=>$attachment ? wp_get_attachment_url($attachment->ID) : false
	);
}

wp_reset_query();

header('Content-Type: application/json');

echo json_encode($posts);

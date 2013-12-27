<?php

query_posts(array('category_name'=>'video','tag'=>'瀑布流','posts_per_page'=>12));

$posts = array();

while(have_posts()){
	the_post();
	
	$attachment = array_shift(get_children(array('post_parent'=>get_the_ID(), 'post_type'=>'attachment')));
	
	$posts[]=array(
		'ID'=>get_the_ID(),
		'post_name'=>urldecode($post->post_name),
		'post_thumbnail'=>get_the_post_thumbnail(null,'all-video-waterfall'),
		'permlink'=>get_the_content(),
		'video'=>$attachment ? wp_get_attachment_url($attachment->ID) : false
	);
}

wp_reset_query();

header('Content-Type: application/json');

echo json_encode($posts);

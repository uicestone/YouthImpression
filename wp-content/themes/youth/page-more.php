<?php

query_posts(array('category_name'=>'video','posts_per_page'=>12));

$posts = array();

while(have_posts()){
	the_post();
	
	$attachment = get_children(array('post_type'=>'attachment'));
	
	$posts[]=array(
		'ID'=>get_the_ID(),
		'post_name'=>urldecode($post->post_name),
		'post_thumbnail'=>get_the_post_thumbnail(null,'all-video-waterfall'),
		'permlink'=>get_permalink(),
		'video'=>$attachment ? wp_get_attachment_url($attachment->ID) : false
	);
}

wp_reset_query();

header('Content-Type: application/json');

echo json_encode($posts);

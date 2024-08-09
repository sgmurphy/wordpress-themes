<?php

// https://wordpress.org/plugins/disqus-comment-system/

add_action('dsq_before_comments', function() {
	echo '<div class="ct-comments">';
});
	
add_action('dsq_after_comments', function() {
	echo '</div>';
});
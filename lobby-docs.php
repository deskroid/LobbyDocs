<?php
	
	/*
	Plugin Name: Lobby Docs
	Plugin URI: http://lobby.vip.wordpress.com/wordpress-com-documentation
	Description: Custom plugin for displaying "WPcom only" banner at the top of docs moved to VIP Lobby
	Version: 1.0
	Author: deskroid
	Author URI: https://deskroid.blog
	License: GPL2
	*/
	
	add_filter( 'the_content', 'vip_add_content' );
	
	function vip_add_content($content) {
		global $post;
		
		if (in_category( 2, $post ) && !is_feed() && !is_home()) {
			$original = $content;
			$content = include "banner.html";
			$content = trim($content,"1");
			$content .= $original;
			return $content;
		}
	}

	
<?php 

if(is_home() || is_single()) {
	get_template_part('template-parts/headers/blog');
} else {
	get_template_part('template-parts/headers/common');
}
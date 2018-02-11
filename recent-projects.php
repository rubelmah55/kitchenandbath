<?php 
/*
Template name: Recent Projects
*/
get_header(); 
$page_id = get_queried_object_id();
 ?>
	<?php if(get_field('bannar_enabledisable')) : ?>
	<div class="about_banner" style="background-image: url(<?php the_field('bannar_bg_image', $page_id); ?>);
    ">
		<div class="container">
			<div class="row text-center">
				<div class="col-md-12">
					<h1 class="page_title"><?php the_field('about_bannar_title', $page_id); ?></h1>
					<?php if(get_field('banner_sub_title', $page_id)) : ?>
					<h3><?php the_field('banner_sub_title', $page_id) ?></h3>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if(get_field('page_content_enable_disable')) : ?>
	<div class="page_single">
		<div class="container">
			<div class="row">
		  	<div class="col-xs-12 col-sm-12 col-md-12">
		  		<h3><?php the_field('page_title', $page_id); ?></h3>
		  		<div class="separator big text-center">
		  			<span class="fa fa-stop"></span>
		  			<span class="fa fa-stop"></span>
		  			<span class="fa fa-stop"></span>
		  		</div>
		  	</div>
		  </div>
			<div class="row">
				<?php 
			  		$gallery_id = get_field('gallery_id');
			  		echo do_shortcode('[ubergrid id='.$gallery_id.']'); 
			  	?>
				<div class="separator bottom big text-center">
		  			<span class="fa fa-stop"></span>
		  			<span class="fa fa-stop"></span>
		  			<span class="fa fa-stop"></span>
		  		</div>
			</div>
		</div>
	</div><!-- /page_single -->
	<?php endif; ?>

 <?php get_footer(); ?>

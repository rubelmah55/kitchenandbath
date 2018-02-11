<?php 
/*
Template name: Cabinetry
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
					<?php if(get_field('bannar_sub_title')) : ?>
					<h3><?php the_field('bannar_sub_title', $page_id) ?></h3>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if(get_field('page_content_enable_disable')) : ?>
	<div class="page_single">
		<div class="container">
			<div class="row text-center">
		  	<div class="col-xs-12 col-sm-12 col-md-12">
		  		<h3><?php the_field('page_title', $page_id); ?></h3>
		  		<div class="separator big text-center">
		  			<span class="fa fa-stop"></span>
		  			<span class="fa fa-stop"></span>
		  			<span class="fa fa-stop"></span>
		  		</div>
		  	</div>
		  </div>
			<div class="row text-center">
				<?php 
					$products_gallery = get_field('dealer_images', $page_id);
					foreach ($products_gallery as $products_gal ) :
				 ?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<a href="<?php echo $products_gal['url']; ?>" target="_blank"><img src="<?php echo $products_gal['image']; ?>"  alt=""></a>
				</div>
				<?php endforeach; ?>

				<div class="separator big text-center">
		  			<span class="fa fa-stop"></span>
		  			<span class="fa fa-stop"></span>
		  			<span class="fa fa-stop"></span>
		  		</div>
			</div>
		</div>
	</div><!-- /page_single -->
	<?php endif; ?>

 <?php get_footer(); ?>
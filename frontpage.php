<?php 
/*
Template name: FrontPage
*/
get_header(); 
$page_id = get_queried_object_id();
?>
	<?php if(get_field('banner_enabledisable')) : ?>
		<div class="slider_area">
			<?php 
				$gallery = get_field('banner_bg', $page_id);
				foreach ($gallery as $gal ) :
			 ?>
			<div class="slider_item" style="background: url(<?php echo $gal['url'] ?>);">
				<div class="banner_content">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h2>We strive to make every project a seamless, professional process.We offer quality products, expert design services and detailed craftsmanship.</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<!-- /slider_area -->
	<?php if(get_field('call_to_action_enabledisable')) : ?>
		<div class="call_to_action" style="background-color: <?php the_field('call_to_action_bg_color'); ?>;">
			<div class="container">
			  <div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8">
						<h2><?php the_field('call_to_action_text'); ?> <a href="tel:<?php the_field('phone_number', 'options') ?>" class="phone"><?php the_field('phone_number', 'options') ?></a></h2>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 text-right">
					<?php if(get_field('call_to_action_button_text')) : ?>				
						<a href="<?php the_field('call_to_action_button_url'); ?>" class="btn"><?php the_field('call_to_action_button_text'); ?> »</a>
					<?php endif; ?>
					</div>
			  </div>
			</div>
		</div><!-- /call_to_action -->
	<?php endif; ?>
	
	<?php if(get_field('gallery_enabledisable')) : ?>
		<section class="recentwork_area" style="background-color: #fff">
			<div class="container">
				<div class="row">
			  	<div class="col-xs-12 col-sm-12 col-md-12">
			  		<h3 class="area_title"><?php the_field('gallery_title'); ?></h3>
			  		<div class="separator text-center">
			  			<span class="fa fa-stop"></span>
			  			<span class="fa fa-stop"></span>
			  			<span class="fa fa-stop"></span>
			  		</div>
			  	</div>
			  </div>
			  <div class="row">

			  	<?php 
			  		$gallery_id = get_field('gallery_uber_id');
			  	echo do_shortcode('[ubergrid id='.$gallery_id.']'); ?>
			  </div>
			</div>
		</section><!-- End Gallery Section -->
	<?php endif; ?>

	<?php if(get_field('dealer_enabledisable')) : ?>
	<?php if(get_field('dealer_title_text')) : ?>
		<div class="products" style="background: <?php the_field('product_bg_color'); ?>">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-12 col-sm-12 col-xs 12">
						<h3><?php the_field('dealer_title_text'); ?></h3>
					</div>
				</div>
			</div>
		</div><!-- End Products Section -->
	<?php endif; ?>
		<section id="dealer">
			<div class="container">
				<div class="row text-center">
					<?php 
						$products_gallery = get_field('product_image');
						foreach ($products_gallery as $products_gal ) :
					 ?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<a href="<?php echo $products_gal['url']; ?>" target="_blank"><img src="<?php echo $products_gal['image']; ?>"  alt=""></a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section><!-- End Dealer Section -->
	<?php endif; ?>

	<?php if(get_field('contact_enabledisable')) : ?>
		<section class="contact_us_area" style="background: <?php the_field('contact_bg_color'); ?>">
			<div class="container">
				<div class="row">
			  	<div class="col-xs-12 col-sm-12 col-md-12">
			  		<h3 class="area_title"><?php the_field('contact_title'); ?></h3>
			  		<div class="separator text-center">
			  			<span class="fa fa-stop"></span>
			  			<span class="fa fa-stop"></span>
			  			<span class="fa fa-stop"></span>
			  		</div>
			  	</div>
			  </div><!-- /row -->

			  <div class="row">
			  	<div class="col-md-4 col-sm-4 col-xs-12">
			  		<div class="contact_left">
			  			<p><b><?php the_field('company_name'); ?></b>
			  			<?php 
			  				$bussines_inf = get_field('company_info');
			  				foreach ($bussines_inf as $bussines) :
			  			 ?>
			  				<br>
							<b><?php echo $bussines['title']; ?> </b><?php echo $bussines['text']; ?>
						<?php endforeach; ?>

			  			</p>

			  			<p><strong>​​<?php the_field('contact_today_title'); ?></strong>
							<?php 
								$contact_today_item = get_field('contact_today_service_item');
								foreach ($contact_today_item as $contact_today) :
							 ?>
			  				<br><?php echo $contact_today['service_item']; ?>
			  			<?php endforeach; ?>
						</p>
							<ul class="social_media list-inline">
								<?php 
									$social_media = get_field('social', 'options');
										foreach ($social_media as $social_m) :
								?>						
									<li><a href="<?php echo $social_m['icon_link'] ?>"><i class="fa <?php echo $social_m['icon_class'] ?>"></i></a></li>
								<?php endforeach; ?>
							</ul>
			  		</div><!-- /contact_left -->
			  	</div>

			  	<div class="col-md-8 col-sm-8 col-xs-12">
			  		<div class="contact_right">
			  			<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
			  		</div><!-- /contact_right -->
			  	</div>
			  </div><!-- /row -->
			</div><!-- /container -->
		</section><!-- /contact_us_area -->
	<?php endif; ?>

<?php get_footer(); ?>
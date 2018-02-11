<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top: 0 !important;">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
		<?php $mrinterlock_header_bg = get_theme_mod( 'mrinterlock_header_bg' ); ?>
		<div class="header blog_header" style="background-color: <?php echo $mrinterlock_header_bg['header_bg']; ?>">
			<div class="logo text-center">
				<?php 
					$mrinterlock_logo = get_theme_mod( 'mrinterlock_logo' );
					if ( $mrinterlock_logo ){
					echo '<a href="'. esc_url( home_url( '/' ) ) .'"><img src="'. $mrinterlock_logo .'" alt="" /></a>';
					} else {
						echo '<h2>Mr.Interlock</h2>';
					}
				?>
			</div>
			<!-- Navbar -->
			<div class="navbar navbar-default main_menu">
			  	<div class="container">
					<div class="navbar-header">
					  	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
					  	</button>
					</div>
					
					<div class="collapse navbar-collapse">

					  	<?php wp_nav_menu( array(
								'menu'               => 'blog',
								'theme_location'	 => 'blog',
								'depth'				 => 2,
								'container'			 => 'false',
								'menu_class' 		 => 'nav navbar-nav',
								'menu_id' 			 => '',
								'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
								'walker' 			 => new wp_bootstrap_navwalker()
								) ); 
							?>
			
					</div><!-- /collapse -->
			  	</div><!-- /container-fluid -->
			</div><!--/ Navbar -->
		</div>
		
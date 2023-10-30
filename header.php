<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">

		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">

		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<div class="off-canvas-wrapper">

			<!-- Load off-canvas container. Feel free to remove if not using. -->
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>

			<div class="off-canvas-content" data-off-canvas-content>

				<header class="header" role="banner">

					 <!-- This navs will be applied to the topbar, above all content
						  To see additional nav styles, visit the /parts directory -->
						<div class="container ">
							<?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>
						</div>

					 <!-- Hero 5 - Bootstrap Brain Component -->
					 <?php if (is_front_page()) : ?>
					<div class="bootstrap-carousel">
						<?php
						// Array selecionando 4 posts para o carrossel:
						$args = array(
							'post_type' => 'page',
							'meta_query' => array(
								array(
									'key' => 'categoria_carrossel',
									'value' => 'slider', // Substitua 'slider' pela categoria desejada
								)
							),
							'posts_per_page' => 4,
							'order' => 'DESC'
						);

						$catquery = new WP_Query($args);
						if ($catquery->have_posts()) :
							?>
							<div id="carousel-campanhas" class="carousel slide" data-bs-ride="carousel">
								<!--<div class="carousel-indicators">
									<?php for ($i = 0; $i < $catquery->post_count; $i++) : ?>
										<a type="button" data-bs-target="#carousel-campanhas" data-bs-slide-to="<?php echo $i; ?>" <?php if ($i == 0) echo 'class="active"'; ?>></a>
									<?php endfor; ?>
								</div>-->
								<div class="carousel-inner">
									<?php while ($catquery->have_posts()) : $catquery->the_post(); ?>
										<div class="carousel-item<?php if ($catquery->current_post === 0) echo ' active'; ?>">
											<?php if (has_post_thumbnail()) : ?>
												<div class="carousel-overlay"></div> <!-- Sobreposição escura -->
												<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
													<?php the_post_thumbnail('full', array('class' => 'd-block w-100')); ?>
												</a>
											<?php endif; ?>
											<div class="carousel-caption d-md-block position-absolute ml-0 caption-campanhas d-flex align-items-center justify-content-center text-center">
												<h2 class="display-5"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="text-white"><?php the_title(); ?> </a></h2>
												<p><?php the_excerpt(); ?></p>
											</div>
										</div>
									<?php endwhile; ?>
								</div>
								<a class="carousel-control-prev" href="#carousel-campanhas" role="button" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Anterior</span>
									</a>
									<a class="carousel-control-next" href="#carousel-campanhas" role="button" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Próximo</span>
									</a>
							</div>
						<?php endif;
						wp_reset_postdata(); ?>
						<?php else :
								 if (has_post_thumbnail()) { ?>
									<div class="mx-100 vh-30 d-flex justify-content-center align-items-center bg-central" style="background: rgb(38,27,21);
										background: linear-gradient(0deg, rgba(38,27,21,0.804359243697479) 7%, rgba(20,19,17,0.3085609243697479) 47%, rgba(20,19,17,0.7763480392156863) 97%), url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);">
										<h1 class="text-white"><?php the_title(); ?></h1>
									</div>
								<?php }
							else {
							?>
							<div class="bg-danger" style="min-height: 250px"></div>
						<?php } endif; ?>




				</header> <!-- end .header -->

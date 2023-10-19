<?php
/**
 * The template for displaying the footer.
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
 ?>

				<footer class="footer" role="contentinfo">
				<div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
			<?php if (is_active_sidebar('footer-widget-1')) : ?>
				<?php dynamic_sidebar('footer-widget-1'); ?>
			<?php endif; ?>
        </div>

        <div class="col-lg-2 col-6 footer-links">
			<?php if (is_active_sidebar('footer-widget-2')) : ?>
				<?php dynamic_sidebar('footer-widget-2'); ?>
			<?php endif; ?>
        </div>

        <div class="col-lg-2 col-6 footer-links">
			<?php if (is_active_sidebar('footer-widget-3')) : ?>
				<?php dynamic_sidebar('footer-widget-3'); ?>
			<?php endif; ?>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
			<?php if (is_active_sidebar('footer-widget-4')) : ?>
				<?php dynamic_sidebar('footer-widget-4'); ?>
			<?php endif; ?>
        </div>
      </div>
    </div>
					<div class="inner-footer grid-x grid-margin-x grid-padding-x">
						<div class="small-12 medium-12 large-12 cell">
							<nav role="navigation">
	    						<?php joints_footer_links(); ?>
	    					</nav>
	    				</div>

						<div class="small-12 medium-12 large-12 cell">
							<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
						</div>

					</div> <!-- end #inner-footer -->

				</footer> <!-- end .footer -->

			</div>  <!-- end .off-canvas-content -->

		</div> <!-- end .off-canvas-wrapper -->

		<?php wp_footer(); ?>

	</body>

</html> <!-- end page -->
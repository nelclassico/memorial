<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="top-bar position-absolute menu-transparent" id="top-bar-menu">
	<div class="container d-flex justify-content-center">
		<div class="top-bar-left float-left">
			<ul class="menu">
				<li>
					<?php
					// Verifique se há uma marca personalizada definida no Personalizador
					if (has_custom_logo()) {
						the_custom_logo();
					} else {
						// Se nenhuma marca personalizada estiver definida, exiba o nome do site
						echo '<a href="' . home_url() . '">' . bloginfo('name') . '</a>';
					}
					?>
				</li>
			</ul>
		</div>
		<div class="top-bar-right show-for-medium">
			<?php joints_top_nav(); ?>
		</div>
		<div class="top-bar-right float-right show-for-small-only">
			<ul class="menu">
				<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
				<li><a data-toggle="off-canvas"><?php _e( 'Menu', 'jointswp' ); ?></a></li>
			</ul>
		</div>
	</div>
</div>

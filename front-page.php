<?php
/**
 *
* Template Name: Front-page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header(); ?>

	<div class="content">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <main class="main small-12 medium-12 large-12 cell" role="main">

<!-- Seu código HTML para o cabeçalho da página inicial aqui -->
<?php
// Verifique o valor do controle personalizado 'secao-sobre-toggle'
$secao_sobre_ativada = get_theme_mod('secao-sobre-toggle', true); // Obtém o valor com um valor padrão de true

// Verifique se a seção Sobre deve ser exibida com base no valor do controle personalizado
if ($secao_sobre_ativada) {
    // Exibir o conteúdo da seção Sobre
    // Aqui você coloca o código HTML e PHP para a seção Sobre
    // Por exemplo, seu código atual da seção Sobre pode ser colocado aqui
?>
<div class="container-xxl py-5">
    <div class="row g-5">
        <div class="col-lg-6">
            <div class="row g-3">
                <div class="col-6 text-end aos-init aos-animate" data-aos="zoom-in">
                    <?php
                    $imagem1 = get_theme_mod('custom_home_imagem_1');
                    if ($imagem1) :
                    ?>
                        <img class="img-fluid bg-white w-100 mb-3 wow fadeIn img-borda-redonda" data-wow-delay="0.1s" src="<?php echo esc_url($imagem1); ?>" alt="">
                    <?php endif; ?>

                    <?php
                    $imagem2 = get_theme_mod('custom_home_imagem_2');
                    if ($imagem2) :
                    ?>
                        <img class="img-fluid bg-white w-50 wow fadeIn img-borda-redonda" data-wow-delay="0.2s" src="<?php echo esc_url($imagem2); ?>" alt="">
                    <?php endif; ?>
                </div>
				<div class="col-6">
                    <?php
                    $imagem3 = get_theme_mod('custom_home_imagem_3');
                    if ($imagem3) :
                    ?>
                        <img class="img-fluid bg-white w-50 mb-3 wow fadeIn aos-init aos-animate img-borda-redonda" data-wow-delay="0.1s" src="<?php echo esc_url($imagem3); ?>" alt="">
                    <?php endif; ?>

                    <?php
                    $imagem4 = get_theme_mod('custom_home_imagem_4');
                    if ($imagem4) :
                    ?>
                        <img class="img-fluid bg-white w-100 wow fadeIn img-borda-redonda" data-wow-delay="0.2s" src="<?php echo esc_url($imagem4); ?>" alt="">
                    <?php endif; ?>
                </div>
                <!-- ... Repita para as outras imagens -->
            </div>
        </div>
        <div class="col-lg-6 wow fadeIn aos-init aos-animate" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <div class="section-title">
                <p class="fs-5 fw-medium fst-italic text-primary">Sobre o Memorial</p>
                <h2 class="display-6"><?php echo get_theme_mod('custom_home_title'); ?></h2>
            </div>
            <div class="row g-3 mb-4">
                <p class="mb-0"><?php echo wp_kses_post(get_theme_mod('custom_home_text')); ?></p>
            </div>
        </div>
    </div>
</div>
<?php
}
?>

<?php
// Verifique o valor do controle personalizado 'secao-sobre-toggle'
$secao_decretos_ativada = get_theme_mod('secao-decretos-toggle', true); // Obtém o valor com um valor padrão de true

// Verifique se a seção Sobre deve ser exibida com base no valor do controle personalizado
if ($secao_decretos_ativada) {
    // Exibir o conteúdo da seção Sobre
    // Aqui você coloca o código HTML e PHP para a seção Sobre
    // Por exemplo, seu código atual da seção Sobre pode ser colocado aqui
?>
<section id="second-custom-section" class="why-us section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up" >
        <div class="row">
            <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="content">
                    <h3><?php echo get_theme_mod('custom_second_title', 'Título Personalizado da Segunda Sessão'); ?></h3>
                    <p>
                        <?php echo get_theme_mod('custom_second_text', 'Texto Personalizado da Segunda Sessão'); ?>
                    </p>
                </div>

          <div class="accordion-list accordion accordion-flush aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
					<ul class="accordion-header">
						<?php
						// Loop para exibir os valores dos campos
						for ($i = 1; $i <= 4; $i++) {
							$title = get_theme_mod('custom_second_title_' . $i);
							$text = get_theme_mod('custom_second_text_' . $i);

							// Verifique se há um URL de imagem para exibir
							if (!empty($title)) {
						?>
								<li class="accordion-button">
									<a data-bs-toggle="collapse" class="collapse collapsed" data-bs-target="#accordion-list-<?php echo $i; ?>" aria-expanded="false"><span><?php echo $i; ?></span> <?php echo $title; ?></a>
								</li>
                <div id="accordion-list-<?php echo $i; ?>" class="accordion-collapse collapse" data-bs-parent=".accordion-list">
                  <div class="accordion-body">
                      <?php if (!empty($text)) : ?>
                        <p><?php echo wp_kses_post($text); ?></p>
                      <?php endif; ?>
                    </div>
									</div>
						<?php
							}
						}
						?>
					</ul>
				</div>
            </div>

			<div class="col-lg-5 align-items-stretch order-1 order-lg-2 img aos-init aos-animate" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;" data-aos="zoom-in" data-aos-delay="150">
			<?php	$image_url = get_theme_mod('custom_second_image'); ?>
			<img src="<?php echo esc_url($image_url); ?>" alt="Imagem <?php echo $i; ?>"class="img-fluid img-borda-redonda">
			</div>
        </div>
    </div>
</section>
<?php
}
?>
<?php
// Verifique o valor do controle personalizado 'secao-sobre-toggle'
$call_ativada = get_theme_mod('call-action-toggle', true); // Obtém o valor com um valor padrão de true

// Verifique se a seção Sobre deve ser exibida com base no valor do controle personalizado
if ($call_ativada) {
    // Exibir o conteúdo da seção Sobre
    // Aqui você coloca o código HTML e PHP para a seção Sobre
    // Por exemplo, seu código atual da seção Sobre pode ser colocado aqui
?>
<section id="cta" class="cta" style="background: linear-gradient(rgba(2, 2, 2, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo esc_url(get_theme_mod('custom_call_background_image')); ?>') fixed center center;">
      <div class="container aos-init aos-animate" data-aos="zoom-in">
        <div class="text-center">
          <h3><?php echo get_theme_mod('call_action_title'); ?></h3>
          <p> <?php echo get_theme_mod('call_action_text', 'Texto Personalizado da Segunda Sessão'); ?></p>
        </div>
      </div>
</section>
<?php
}
?>
<?php
// Verifique o valor do controle personalizado 'secao-sobre-toggle'
$secao_cultural_ativada = get_theme_mod('espaco_cultural-toggle', true); // Obtém o valor com um valor padrão de true

// Verifique se a seção Sobre deve ser exibida com base no valor do controle personalizado
if ($secao_cultural_ativada) {
    // Exibir o conteúdo da seção Sobre
    // Aqui você coloca o código HTML e PHP para a seção Sobre
    // Por exemplo, seu código atual da seção Sobre pode ser colocado aqui
?>

<section id="team" class="team">
      <div class="container-xxl aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
          <h2><?php echo get_theme_mod('espaco_title'); ?></h2>
          <p><?php echo get_theme_mod('espaco_text', 'Texto Personalizado da Segunda Sessão'); ?></p>
        </div>

        <div class="row justify-content-center aos-init aos-animate" data-aos="zoom-in">
            <div class="row">
              <?php
                // Fazer um loop pelos itens
                for ($i = 1; $i <= 4; $i++) { // Assumindo que você tem 4 campos de imagem personalizados
                  $title = get_theme_mod('espaco_cultural_title_' . $i );
                  $text = get_theme_mod('espaco_cultural_text_' . $i);
                  $image = get_theme_mod('espaco_cultural_image_' . $i);

                  // Verificar se o título existe (você pode ajustar isso conforme necessário)
                  if (!empty($title)) {
                ?>

              <div class="col-xl-3 col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up">
                <div class="member">
                  <img src="<?php echo esc_url($image); ?>" class="img-fluid" alt="">
                  <p class="text-white"><?php echo wp_kses_post($title); ?></p>
                  <div class="member-info">
                    <div class="member-info-content  p-3">
                      <h4><?php echo wp_kses_post($title); ?></h4>
                      <span><?php echo wp_kses_post($text); ?></span>
                    </div>
                  </div>
                </div>
              </div> <!-- End Member Item -->

			  <?php
					}
				}
				?>

          </div>
        </div>

      </div>
    </section>
<?php
}
?>

<?php
// Verifique o valor do controle personalizado 'secao-sobre-toggle'
$acervo_ativada = get_theme_mod('secao-acervo-toggle', true); // Obtém o valor com um valor padrão de true

// Verifique se a seção Sobre deve ser exibida com base no valor do controle personalizado
if ($acervo_ativada) {
    // Exibir o conteúdo da seção Sobre
    // Aqui você coloca o código HTML e PHP para a seção Sobre
    // Por exemplo, seu código atual da seção Sobre pode ser colocado aqui
?>
<section class="acervo">
  <div class="container-xxl aos-init aos-animate" data-aos="fade-up">
    <div class="section-title">
      <h2 class="display-6"><?php echo get_theme_mod('custom_galery_title'); ?></h2>
      <p><?php echo get_theme_mod('custom_galery_text', 'Texto Personalizado da Segunda Sessão'); ?></p>
    </div>
    <div class="row" id="gallery">
        <!-- Conteúdo da galeria será adicionado aqui -->
        <div id="galeria-isotope">
          <div class="galeria-filtro">
              <button data-filter="*">Todas</button>
              <?php
              // Recupere todas as categorias de galeria
              $categorias = get_terms('categoria-galeria');

              // Verifique se há categorias
              if (!empty($categorias) && !is_wp_error($categorias)) {
                  foreach ($categorias as $categoria) {
                      echo '<button data-filter=".' . $categoria->slug . '">' . $categoria->name . '</button>';
                  }
              }
              ?>
          </div>
          <div class="galeria-itens aos-init aos-animate" data-aos="zoom-in">
          <?php
              // Recupere todas as galerias
              $args = array(
                  'post_type' => 'galeria',
                  'posts_per_page' => -1,
              );

              $query = new WP_Query($args);

              if ($query->have_posts()) {
                  while ($query->have_posts()) {
                      $query->the_post();
                      $categorias = get_the_terms(get_the_ID(), 'categoria-galeria');
                      $categoria_classes = '';

                      foreach ($categorias as $categoria) {
                          $categoria_classes .= $categoria->slug . ' ';
                      }

                      // Verifique se a categoria atual é diferente de "Todas"
                      if ($atts['categoria'] !== '*') {
                          echo '<div id="gallery-lightbox" class="galeria-item ' . $categoria_classes . '" data-toggle="modal" data-target="#lightbox">';
                          //echo '<h2>' . get_the_title() . '</h2>';
                          $conteudo = get_the_content();

                        // Use uma expressão regular para encontrar todas as tags <img>
                        preg_match_all('/<img[^>]+>/i', $conteudo, $imagens);

                        // Itera sobre as imagens encontradas
                        foreach ($imagens[0] as $imagem) {
                            // Adicione os atributos personalizados à imagem
                            $imagem_com_atributos = str_replace('<img', '<img data-target="#indicators" data-slide-to="0"', $imagem);
                            echo $imagem_com_atributos;
                        }
                          //echo '<div class="galeria-conteudo">' . get_the_content() . '</div>';
                          echo '</div>';
                      } else {
                          // Se a categoria for "Todas", não exiba o título
                          echo '<div class="galeria-item ' . $categoria_classes . '" data-toggle="modal" data-target="#lightbox">';
                          // Obtém o conteúdo do post
                        $conteudo = get_the_content();

                        // Use uma expressão regular para encontrar todas as tags <img>
                        preg_match_all('/<img[^>]+>/i', $conteudo, $imagens);

                        // Itera sobre as imagens encontradas
                        foreach ($imagens[0] as $imagem) {
                            // Adicione os atributos personalizados à imagem
                            $imagem_com_atributos = str_replace('<img', '<img data-target="#indicators" data-slide-to="0"', $imagem);
                            echo $imagem_com_atributos;
                        }
                          //echo '<div class="galeria-conteudo">' . get_the_content() . '</div>';
                          echo '</div>';
                      }
                  }
                  ?>

                  <?php
              } else {
                  echo 'Nenhuma galeria encontrada.';
              }

              wp_reset_postdata();
              ?>
            </div>
          </div>
      </div>
  </div>
</section>
<?php
}
?>
<?php
// Verifique o valor do controle personalizado 'secao-sobre-toggle'
$agendamentos_ativada = get_theme_mod('agendamento-toggle', true); // Obtém o valor com um valor padrão de true

// Verifique se a seção Sobre deve ser exibida com base no valor do controle personalizado
if ($agendamentos_ativada) {
    // Exibir o conteúdo da seção Sobre
    // Aqui você coloca o código HTML e PHP para a seção Sobre
    // Por exemplo, seu código atual da seção Sobre pode ser colocado aqui
?>

    <section id="contact" class="contact">
    <div class="container aos-init aos-animate" data-aos="fade-up">
      <div class="row gx-lg-0 gy-4">
        <div class="col-lg-4">
          <div class="section-header">
          <h2 class="display-6"><?php echo get_theme_mod('agendamento_title'); ?></h2>
          <p><?php echo get_theme_mod('agendamento_text', 'Texto Personalizado da Segunda Sessão'); ?></p>
          </div>
        </div>
        <div class="col-lg-8">
            <!-- Conteúdo do formulário de contato aqui, conforme necessário -->
            <?php
            $agendamento_shortcode = get_theme_mod('agendamento_shortcode'); // Obtém o valor do controle personalizado

            // Verifica se o shortcode não está vazio
            if (!empty($agendamento_shortcode)) {
                echo do_shortcode($agendamento_shortcode); // Renderiza o shortcode
            }
            ?>
        </div><!-- End Contact Form -->

      </div>

    </div>
</section>
<?php
}
?>





<!-- Seu código HTML para o restante da página inicial aqui -->

<?php
get_footer();
?>


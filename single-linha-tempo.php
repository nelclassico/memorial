<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>

<div class="content container-fluid">

    <div class="inner-content">
        <?php
        while (have_posts()) : the_post();
            // Verifique se o tipo de postagem é "linha-tempo"
            if (get_post_type() === 'linha-tempo') {
                // Obtém o ID da postagem atual
                $post_id = get_the_ID();

                // Recupere os itens da linha do tempo diretamente da postagem atual
                $timeline_items = array();

                $conteudos = get_post_meta($post_id, 'conteudos', true);

                if ($conteudos && is_array($conteudos)) {
                    foreach ($conteudos as $conteudo) {
                        $date = isset($conteudo['data']) ? $conteudo['data'] : '';
                        $title = isset($conteudo['titulo']) ? $conteudo['titulo'] : '';
                        $content = isset($conteudo['conteudo']) ? $conteudo['conteudo'] : '';

                        if ($date && $title && $content) {
                            $timeline_items[] = array(
                                'date' => $date,
                                'content' => $content,
                                'title' => $title,
                            );
                        }
                    }
                }

                // Agora, você pode usar os itens da linha do tempo para criar o conteúdo do shortcode
                ob_start();
                ?>
                <div id="timelineCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="timeline-horizontal"></div>
                        <?php
                        $item_count = 0;
                        for ($i = 0; $i < count($timeline_items); $i += 5):
                            $active_class = $item_count === 0 ? 'active' : '';
                            ?>
                            <div class="carousel-item <?php echo $active_class; ?>">
                                <div class="timeline-container">
                                    <?php for ($j = $i; $j < $i + 5; $j++): ?>
                                        <?php if (isset($timeline_items[$j])): ?>
                                            <div class="timeline-item">
                                                <div class="timeline-title year">
                                                    <h5 class="timeline-title-h"><span><?php echo esc_html($timeline_items[$j]['title']); ?></span></h5>
                                                </div>
                                                <div class="timeline-card">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="timeline-line-right"></div>
                                                            <div class="timeline-date">
                                                                <h5><?php echo esc_html($timeline_items[$j]['date']); ?></h5>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <?php echo wpautop($timeline_items[$j]['content']); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        <?php
                        $item_count++;
                        endfor;
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#timelineCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#timelineCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
                <?php
                // Saia do loop para evitar a exibição duplicada do conteúdo da linha do tempo
                break;
            }
        endwhile;
        ?>
    </div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>

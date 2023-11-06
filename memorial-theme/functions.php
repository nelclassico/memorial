<?php
/**
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

// Theme support options
require_once(get_template_directory().'/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php');

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php');

// Inclua o arquivo customizer.php
require_once(get_template_directory().'/parts/customizer.php');

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php');

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php');

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php');

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php');

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php');

function enqueue_bootstrap_and_custom_walker() {
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    // Enqueue Bootstrap CSS and JavaScript
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css', array(), '5.3.0');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
    wp_enqueue_script('theme-js', get_template_directory_uri() . '/assets/scripts/meu-js.js', array('jquery'), null, true);


    /* Include your custom nav walker
    require_once get_template_directory() . '/custom-navwalker.php';
    */
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_and_custom_walker');

function adicionar_biblioteca_aos() {
    wp_enqueue_script('aos', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array('jquery'), null, true);
    wp_enqueue_style('aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css');
}
add_action('wp_enqueue_scripts', 'adicionar_biblioteca_aos');


function adicionar_fontes_personalizadas() {
    // Registre a fonte personalizada
    wp_enqueue_style('font-pala', get_template_directory_uri() . '/assets/fonts/pala.ttf');
    wp_enqueue_style('font-palab', get_template_directory_uri() . '/assets/fonts/palab.ttf');
    wp_enqueue_style('font-palabi', get_template_directory_uri() . '/assets/fonts/palabi.ttf');
    wp_enqueue_style('font-palai', get_template_directory_uri() . '/assets/fonts/palai.ttf');
}

add_action('wp_enqueue_scripts', 'adicionar_fontes_personalizadas');


function adicionar_scripts_e_estilos_isotope() {
    wp_enqueue_script('isotope', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js', array('jquery'), '3.0.6', true);
}
add_action('wp_enqueue_scripts', 'adicionar_scripts_e_estilos_isotope');

function adicionar_lightbox_scripts() {
    wp_enqueue_style('lightbox-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css');
    wp_enqueue_script('lightbox-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js', array('jquery'), '2.11.3', true);
}
add_action('wp_enqueue_scripts', 'adicionar_lightbox_scripts');


function adicionar_scripts_e_estilos() {
    wp_enqueue_style('lightbox-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css');
    wp_enqueue_script('lightbox-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js', array('jquery'), '2.11.3', true);
    wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);
}
add_action('wp_enqueue_scripts', 'adicionar_scripts_e_estilos');


function enqueue_metabox_styles() {
    // Altere o caminho e o nome do arquivo CSS conforme necessário
    wp_enqueue_style('metabox-styles', get_template_directory_uri() . '/assets/styles/metabox-styles.css', array(), '1.0.0', 'all'); // Aumente a prioridade aqui
}

add_action('admin_enqueue_scripts', 'enqueue_metabox_styles', 999); // Aumente a prioridade aqui





// Registrar o Custom Post Type "Linha do Tempo"
function registrar_post_type_linha() {
    $labels = array(
        'name' => 'Linha do Tempo',
        'singular_name' => 'Item de Linha do Tempo',
        'menu_name' => 'Linha do Tempo',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'rewrite' => false,
        'menu_icon' => 'dashicons-book',
        'supports' => array('title', 'thumbnail'), // Adicione suporte para campos personalizados.
    );

    register_post_type('linha-tempo', $args);
}

add_action('init', 'registrar_post_type_linha');

// Adicionar metabox para campos personalizados
function adicionar_metabox_timeline() {
    add_meta_box(
        'metabox-timeline', // ID único do metabox
        'Campos Personalizados', // Título do metabox
        'renderizar_metabox_timeline', // Função de renderização do metabox
        'linha-tempo', // Nome do tipo de post
        'normal', // Contexto do metabox (normal, lado, avançado)
        'high' // Prioridade do metabox (high, core, default, low)
    );
}

add_action('add_meta_boxes', 'adicionar_metabox_timeline');

// Função para renderizar o metabox
function renderizar_metabox_timeline($post) {

    // Recupere o ID do post atual
    $post_id = $post->ID;

   // Recupere o valor do shortcode, se existir
   $shortcode = get_post_meta($post_id, 'linha_do_tempo', true);

    // Se não houver um shortcode, crie um com base no ID do post
    if (empty($shortcode)) {
        $shortcode = '[linha_do_tempo id="' . $post_id . '"]';
        update_post_meta($post_id, 'linha_do_tempo', $shortcode);
    }

    // Exiba o shortcode
    echo '<p>Shortcode:</p>';
    echo '<input type="text" readonly="readonly" value="' . esc_attr($shortcode) . '" class="large-text" />';


    // Recupere os valores dos campos personalizados, se eles existirem
    $conteudos = get_post_meta($post->ID, 'conteudos', true);

    // Inicialize com um array vazio se não houver conteúdo
    if (empty($conteudos)) {
        $conteudos = array();
    }
    ?>

    <div id="conteudos-container">
        <?php foreach ($conteudos as $index => $conteudo): ?>
            <div class="conteudo" style="margin-bottom: 10px;">
                <label for="titulo_<?php echo $index; ?>">Data:</label><br>
                <input type="text" name="conteudos[<?php echo $index; ?>][titulo]" value="<?php echo esc_attr($conteudo['titulo']); ?>" /><br>

                <label for="data_<?php echo $index; ?>">Título:</label><br>
                <input type="text" name="conteudos[<?php echo $index; ?>][data]" value="<?php echo esc_attr($conteudo['data']); ?>" /><br>

                <label for="conteudo_<?php echo $index; ?>">Conteúdo:</label><br>
                <textarea name="conteudos[<?php echo $index; ?>][conteudo]" class="wp-editor-area" rows="10" cols="50"><?php echo wp_kses_post($conteudo['conteudo']); ?></textarea><br>

                <label for="posicao_<?php echo $index; ?>">Posição:</label><br>
                <input type="number" name="conteudos[<?php echo $index; ?>][posicao]" value="<?php echo esc_attr($conteudo['posicao']); ?>" />

                <!-- Adicione um botão Excluir -->
                <button class="excluir-conteudo button">Excluir</button><br>
        <hr>
            </div>
        <?php endforeach; ?>
    </div>

    <button id="adicionar-conteudo" class="button">Adicionar Conteúdo</button>


    <script>
    jQuery(document).ready(function($) {
        // Adicionar novo conteúdo
        $('#adicionar-conteudo').on('click', function() {
            var index = $('#conteudos-container .conteudo').length;

            var novoConteudo = `
                <div class="conteudo" style="margin-bottom: 10px;">
                    <label for="titulo_${index}">Data:</label><br>
                    <input type="text" name="conteudos[${index}][titulo]" id="titulo_${index}" /><br>

                    <label for="data_${index}">Título:</label><br>
                    <input type="text" name="conteudos[${index}][data]" id="data_${index}" /><br>

                    <label for="conteudo_${index}">Conteúdo:</label><br>
                    <textarea name="conteudos[${index}][conteudo]" class="wp-editor-area" rows="10" cols="50"></textarea><br>

                    <label for="posicao_<?php echo $index; ?>">Posição:</label><br>
                    <input type="number" name="conteudos[<?php echo $index; ?>][posicao]" value="<?php echo esc_attr($conteudo['posicao']); ?>" />

                    <!-- Adicione um botão Excluir -->
                    <button class="excluir-conteudo button">Excluir</button>
                    <hr>
                    </div>

            `;

            // Anexe o editor visual do WordPress ao novo conteúdo
            $('#conteudos-container').append(novoConteudo);


                // Inicialize o editor visual do WordPress
                var editorId = 'conteudo_' + index;
                tinymce.EditorManager.execCommand('mceAddEditor', true, editorId);

                return false;
            });

        // Excluir conteúdo existente
        $('#conteudos-container').on('click', '.excluir-conteudo', function() {
            if (confirm('Tem certeza de que deseja excluir este item da linha do tempo?')) {
                $(this).closest('.conteudo').remove();
            }
        });
    });
    </script>

    <?php
    // Adicione o shortcode ao final do conteúdo do metabox
    echo do_shortcode($shortcode);
}



// Salvar os dados dos campos personalizados
function salvar_metabox_timeline($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if ($post_id && isset($_POST['post_type']) && 'linha-tempo' == $_POST['post_type']) {
        $conteudos = $_POST['conteudos'];

        // Reorganizar os itens com base na posição
        usort($conteudos, function($a, $b) {
            return intval($a['posicao']) - intval($b['posicao']);
        });

        update_post_meta($post_id, 'conteudos', $conteudos);

        // Salvar o valor do campo shortcode
        if (isset($_POST['linha_do_tempo'])) {
            $shortcode = sanitize_text_field($_POST['linha_do_tempo']);
            update_post_meta($post_id, 'linha_do_tempo', $shortcode);
        }
    }
}

add_action('save_post', 'salvar_metabox_timeline');



// Função para renderizar o shortcode da linha do tempo
function linha_do_tempo_shortcode($atts) {
    // Certifique-se de que $post_id está definido
    if (!isset($atts['id'])) {
        return 'ID da publicação não especificado.';
    }

    $post_id = $atts['id'];

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
    return ob_get_clean();
}

add_shortcode('linha_do_tempo', 'linha_do_tempo_shortcode');



// Personalizar o estilo do TinyMCE (Editor Visual)
function personalizar_estilo_tinymce($in) {
    $in['content_css'] = get_template_directory_uri() . '/custom-editor-style.css'; // Substitua pelo caminho correto do seu arquivo CSS

    return $in;
}
add_filter('tiny_mce_before_init', 'personalizar_estilo_tinymce');



// Registrar o Custom Post Type "Sobre"
function registrar_post_type_sobre() {
    $labels = array(
        'name' => 'Sobre',
        'singular_name' => 'Sobre',
        'menu_name' => 'Sobre',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'rewrite' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'), // Adicione suporte para campos personalizados.
    );

    register_post_type('sobre', $args);
}

add_action('init', 'registrar_post_type_sobre');



// Registrar campos personalizados para o Custom Post Type "Sobre"
function registrar_campos_personalizados_sobre() {
    add_post_type_support('sobre', 'custom-fields'); // Adicionar suporte para campos personalizados.

    register_post_meta('sobre', 'custom_home_imagem_1', array(
        'type' => 'string', // Tipo de dado do campo (string, integer, etc.).
        'single' => true, // Se é um campo único ou múltiplo.
        'show_in_rest' => true, // Permitir que o campo seja acessado via API REST (para uso no Gutenberg, por exemplo).
    ));

    register_post_meta('sobre', 'custom_home_imagem_2', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));

    register_post_meta('sobre', 'custom_home_imagem_3', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));

    register_post_meta('sobre', 'custom_home_imagem_4', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Adicione mais campos personalizados conforme necessário.

}

add_action('init', 'registrar_campos_personalizados_sobre');


// Função para registrar o Custom Post Type "Galeria"
function criar_post_type_galeria() {
    register_post_type('galeria',
        array(
            'labels' => array(
                'name' => __('Galerias'),
                'singular_name' => __('Galeria')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail')
        )
    );
}
add_action('init', 'criar_post_type_galeria');

function criar_taxonomia_categoria_galeria() {
    register_taxonomy(
        'categoria-galeria',
        'galeria',
        array(
            'label' => __('Categorias de Galeria'),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'criar_taxonomia_categoria_galeria');

function shortcode_galeria($atts) {
    $atts = shortcode_atts(array(
        'categoria' => '*', // Categoria padrão
    ), $atts);

    $args = array(
        'post_type' => 'galeria',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'categoria-galeria',
                'field' => 'slug',
                'terms' => $atts['categoria'],
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $output = '';
        while ($query->have_posts()) {
            $query->the_post();
            $categorias = get_the_terms(get_the_ID(), 'categoria-galeria');
            $categoria_classes = '';

            foreach ($categorias as $categoria) {
                $categoria_classes .= $categoria->slug . ' ';
            }

            $output .= '<div class="galeria-item ' . $categoria_classes . '">';
            $output .= '<h2>' . get_the_title() . '</h2>';
            $output .= get_the_content(); // Adicione o conteúdo desejado aqui
            $output .= '</div>';
        }
    } else {
        $output = 'Nenhuma galeria encontrada.';
    }

    wp_reset_postdata();

    // Inclua o script Isotope diretamente aqui
    $output .= '<script>
        jQuery(document).ready(function($) {
            var $container = $("#galeria-isotope .galeria-itens");

            $container.isotope({
                itemSelector: ".galeria-item",
                layoutMode: "fitRows"
            });

            $("#galeria-isotope .galeria-filtro button").on("click", function() {
                var filtro = $(this).data("filter");
                $container.isotope({ filter: filtro });
            });
        });
    </script>';

    return $output;
}
add_shortcode('exibir_galeria', 'shortcode_galeria');





function register_footer_widgets() {
    register_sidebar(array(
        'name' => 'Footer Widget 1',
        'id' => 'footer-widget-1',
        'description' => 'Adicione widgets aqui para o footer - Coluna 1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => 'Footer Widget 2',
        'id' => 'footer-widget-2',
        'description' => 'Adicione widgets aqui para o footer - Coluna 2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => 'Footer Widget 3',
        'id' => 'footer-widget-3',
        'description' => 'Adicione widgets aqui para o footer - Coluna 3',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => 'Footer Widget 4',
        'id' => 'footer-widget-4',
        'description' => 'Adicione widgets aqui para o footer - Coluna 4',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}

add_action('widgets_init', 'register_footer_widgets');


function carregar_owl_carousel() {
    wp_enqueue_script('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/2.3.4/owl.carousel.min.js', array('jquery'), '2.3.4', true);
    wp_enqueue_style('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/2.3.4/owl.carousel.min.css');
}

add_action('wp_enqueue_scripts', 'carregar_owl_carousel');

function adicionar_metabox_categoria_carrossel() {
    add_meta_box(
        'categoria_carrossel',
        'Categoria para o Carrossel',
        'exibir_metabox_categoria_carrossel',
        'page',
        'side',
        'default'
    );
}

function exibir_metabox_categoria_carrossel($post) {
    $categoria_carrossel = get_post_meta($post->ID, 'categoria_carrossel', true);
    ?>
    <label for="categoria_carrossel">Selecione a categoria para o carrossel:</label>
    <input type="checkbox" id="categoria_carrossel" name="categoria_carrossel" value="slider" <?php checked($categoria_carrossel, 'slider'); ?>>
    <label for="categoria_carrossel">Slider</label>
    <?php
}

function salvar_metabox_categoria_carrossel($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['categoria_carrossel'])) {
        update_post_meta($post_id, 'categoria_carrossel', sanitize_text_field($_POST['categoria_carrossel']));
    }
}

add_action('add_meta_boxes', 'adicionar_metabox_categoria_carrossel');
add_action('save_post', 'salvar_metabox_categoria_carrossel');



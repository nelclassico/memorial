<?php


if (class_exists('WP_Customize_Control')) {
    class WP_Customize_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>
            <?php
        }
    }
}



function custom_theme_customize_register($wp_customize) {

    // customizer.php

// Adicione um painel para agrupar as seções
$wp_customize->add_panel('front-page', array(
    'title' => 'Front Page', // Título do painel
    'priority' => 10, // Prioridade de exibição
));
    // Seção para os campos personalizados da front-page
    $wp_customize->add_section('custom_front_page', array(
        'title' => 'Front Page',
        'priority' => 30,
    ));

     // Seção para os campos personalizados
     $wp_customize->add_section('sobre_section', array(
        'title' => 'Seção Sobre',
        'priority' => 30,
        'panel' => 'front-page', // Associe esta subseção à seção "front-page"
    ));

    // Adicione um botão para ativar ou desativar a Seção Sobre
    $wp_customize->add_setting('secao-sobre-toggle', array(
        'default' => true, // Pode definir como "true" ou "false" para ativar ou desativar por padrão
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('secao-sobre-toggle', array(
        'label' => 'Ativar/Desativar Seção Sobre',
        'section' => 'sobre_section',
        'type' => 'checkbox',
    ));

    // Campo para o título da seção
    $wp_customize->add_setting('custom_home_title', array(
        'default' => 'Título Personalizado',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('custom_home_title', array(
        'label' => 'Título da Seção Sobre',
        'section' => 'sobre_section',
        'type' => 'text',
    ));

    // Campo para o texto da seção
    $wp_customize->add_setting('custom_home_text', array(
        'default' => 'Texto Personalizado',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('custom_home_text', array(
        'label' => 'Texto da Seção Sobre' ,
        'section' => 'sobre_section',
        'type' => 'textarea',
    ));

    // Campo para a primeira imagem
    $wp_customize->add_setting('custom_home_imagem_1', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_home_imagem_1', array(
        'label' => 'Imagem 1',
        'section' => 'sobre_section',
    )));

    // Campo para a segunda imagem
    $wp_customize->add_setting('custom_home_imagem_2', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_home_imagem_2', array(
        'label' => 'Imagem 2',
        'section' => 'sobre_section',
    )));

    // Campo para a terceira imagem
    $wp_customize->add_setting('custom_home_imagem_3', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_home_imagem_3', array(
        'label' => 'Imagem 3',
        'section' => 'sobre_section',
    )));

    // Campo para a quarta imagem
    $wp_customize->add_setting('custom_home_imagem_4', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_home_imagem_4', array(
        'label' => 'Imagem 4',
        'section' => 'sobre_section',
    )));


    // Segunda Sessão Personalizada
    $wp_customize->add_section('custom_second_section', array(
        'title' => 'Seção Decretos',
        'priority' => 40,
        'panel' => 'front-page', // Associe esta subseção à seção "front-page"
    ));

    // Adicione um botão para ativar ou desativar a Seção Sobre
      $wp_customize->add_setting('secao-decretos-toggle', array(
        'default' => true, // Pode definir como "true" ou "false" para ativar ou desativar por padrão
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('secao-decretos-toggle', array(
        'label' => 'Ativar/Desativar Seção Sobre',
        'section' => 'custom_second_section',
        'type' => 'checkbox',
    ));

    // Campo para o título da segunda sessão
    $wp_customize->add_setting('custom_second_title', array(
        'default' => 'Título Personalizado',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('custom_second_title', array(
        'label' => 'Título',
        'section' => 'custom_second_section',
        'type' => 'text',
    ));

    // Campo para o texto da segunda sessão
    $wp_customize->add_setting('custom_second_text', array(
        'default' => 'Texto Personalizado',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('custom_second_text', array(
        'label' => 'Texto da Segunda Sessão',
        'section' => 'custom_second_section',
        'type' => 'textarea',
    ));
      // Campo para a imagem da segunda sessão
    $wp_customize->add_setting('custom_second_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_second_image', array(
        'label' => 'Imagem da Segunda Sessão',
        'section' => 'custom_second_section',
    )));


   // Loop para criar campos de imagem e texto
   for ($i = 1; $i <= 4; $i++) {

        // Campo para o título da segunda sessão
        $wp_customize->add_setting('custom_second_title_' . $i, array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        ));

        $wp_customize->add_control('custom_second_title_' . $i, array(
            'label' => 'Título ' . $i . ' da Segunda Sessão',
            'section' => 'custom_second_section',
            'type' => 'text',
        ));

        // Campo para o texto da segunda sessão
        $wp_customize->add_setting('custom_second_text_' . $i, array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        ));

        $wp_customize->add_control('custom_second_text_' . $i, array(
            'label' => 'Texto ' . $i . ' da Segunda Sessão',
            'section' => 'custom_second_section',
            'type' => 'textarea',
        ));
    }


    // Campo para a imagem de fundo da segunda sessão
    $wp_customize->add_section('call_action_section', array(
        'title' => 'Call Action',
        'priority' => 60,
        'panel' => 'front-page', // Associe esta subseção à seção "front-page"
    ));

    // Adicione um botão para ativar ou desativar a Seção Sobre
    $wp_customize->add_setting('call-action-toggle', array(
        'default' => true, // Pode definir como "true" ou "false" para ativar ou desativar por padrão
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('call-action-toggle', array(
        'label' => 'Ativar/Desativar Seção Call Action',
        'section' => 'call_action_section',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('call_action_title', array(
        'default' => 'Título Personalizado',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('call_action_title', array(
        'label' => 'Título',
        'section' => 'call_action_section',
        'type' => 'text',
    ));

     // Campo para o texto da segunda sessão
     $wp_customize->add_setting('call_action_text', array(
        'default' => 'Texto Personalizado',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('call_action_text', array(
        'label' => 'Texto Para Call Action',
        'section' => 'call_action_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('custom_call_background_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_call_background_image', array(
        'label' => 'Imagem de Fundo da Segunda Sessão',
        'section' => 'call_action_section',
    )));



    // Segunda Sessão Personalizada
    $wp_customize->add_section('espaco_cultural_section', array(
        'title' => 'Espaço Cultural',
        'priority' => 70,
        'panel' => 'front-page', // Associe esta subseção à seção "front-page"
    ));

     // Adicione um botão para ativar ou desativar a Seção Sobre
     $wp_customize->add_setting('espaco_cultural-toggle', array(
        'default' => true, // Pode definir como "true" ou "false" para ativar ou desativar por padrão
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('espaco_cultural-toggle', array(
        'label' => 'Ativar/Desativar Seção Espaco Cultural',
        'section' => 'espaco_cultural_section',
        'type' => 'checkbox',
    ));

    // Campo para o título da sessão espaço cultural
    $wp_customize->add_setting('espaco_title', array(
        'default' => 'Título Personalizado',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('espaco_title', array(
        'label' => 'Título',
        'section' => 'espaco_cultural_section',
        'type' => 'text',
    ));

    // Campo para o texto da sessão espaço cultural
    $wp_customize->add_setting('espaco_text', array(
        'default' => 'Texto Personalizado',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('espaco_text', array(
        'label' => 'Texto da Segunda Sessão',
        'section' => 'espaco_cultural_section',
        'type' => 'textarea',
    ));


   // Loop para criar campos de imagem e texto
   for ($i = 1; $i <= 4; $i++) {

        // Campo para o título da segunda sessão
        $wp_customize->add_setting('espaco_cultural_title_' . $i, array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        ));

        $wp_customize->add_control('espaco_cultural_title_' . $i, array(
            'label' => 'Título ' . $i . ' da Segunda Sessão',
            'section' => 'espaco_cultural_section',
            'type' => 'text',
        ));

        // Campo para o texto da segunda sessão
        $wp_customize->add_setting('espaco_cultural_text_' . $i, array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        ));

        $wp_customize->add_control('espaco_cultural_text_' . $i, array(
            'label' => 'Texto ' . $i . ' da Segunda Sessão',
            'section' => 'espaco_cultural_section',
            'type' => 'textarea',
        ));

         // Campo para a imagem da segunda sessão
         $wp_customize->add_setting('espaco_cultural_image_' . $i, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'espaco_cultural_image_' . $i, array(
            'label' => 'Imagem ' . $i . ' da Segunda Sessão',
            'section' => 'espaco_cultural_section',
        )));
    }


    // Campo para a sessão de Agendamento
    $wp_customize->add_section('agendamento_section', array(
        'title' => 'Agendamento',
        'priority' => 80,
        'panel' => 'front-page', // Associe esta subseção à seção "front-page"
    ));

     // Adicione um botão para ativar ou desativar a Seção Sobre
     $wp_customize->add_setting('agendamento-toggle', array(
        'default' => true, // Pode definir como "true" ou "false" para ativar ou desativar por padrão
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('agendamento-toggle', array(
        'label' => 'Ativar/Desativar Seção Agendamento',
        'section' => 'agendamento_section',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('agendamento_title', array(
        'default' => 'Entre em contato',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('agendamento_title', array(
        'label' => 'Título',
        'section' => 'agendamento_section',
        'type' => 'text',
    ));

     // Campo para o texto da Agendamento
     $wp_customize->add_setting('agendamento_text', array(
        'default' => 'Preencha o formulário para entrar em contato com a gente',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('agendamento_text', array(
        'label' => 'Texto Para Call Action',
        'section' => 'agendamento_section',
        'type' => 'textarea',
    ));

    // Adicione um controle personalizado para inserir shortcodes
    $wp_customize->add_setting('agendamento_shortcode', array(
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('agendamento_shortcode', array(
        'label' => 'Inserir Shortcode',
        'section' => 'agendamento_section', // Substitua pela seção em que deseja exibir o controle
        'type' => 'shortcode',
        'description' => 'Insira aqui o shortcode que deseja usar.', // Uma descrição opcional para o controle
    ));



     // Campo para a sessão de Agendamento
     $wp_customize->add_section('acervo_section', array(
        'title' => 'Acervo',
        'priority' => 90,
        'panel' => 'front-page', // Associe esta subseção à seção "front-page"
    ));




     // Adicione um botão para ativar ou desativar a Seção Sobre
     $wp_customize->add_setting('secao-acervo-toggle', array(
        'default' => true, // Pode definir como "true" ou "false" para ativar ou desativar por padrão
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('secao-acervo-toggle', array(
        'label' => 'Ativar/Desativar Seção Acervo',
        'section' => 'acervo_section',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('custom_galery_title', array(
        'default' => 'Entre em contato',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('custom_galery_title', array(
        'label' => 'Título',
        'section' => 'acervo_section',
        'type' => 'text',
    ));

     // Campo para o texto da Agendamento
     $wp_customize->add_setting('custom_galery_text', array(
        'default' => 'Preencha o formulário para entrar em contato com a gente',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('custom_galery_text', array(
        'label' => 'Texto Para Call Action',
        'section' => 'acervo_section',
        'type' => 'textarea',
    ));

}

add_action('customize_register', 'custom_theme_customize_register');



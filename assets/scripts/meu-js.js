jQuery(document).ready(function($) {
    AOS.init({
        duration: 800,  // Duração da animação em milissegundos
        easing: 'ease-in-out',  // Tipo de animação
    });
});

jQuery(document).ready(function($) {
    var $container = $('#galeria-isotope .galeria-itens');

    $container.isotope({
        itemSelector: '.galeria-item',
        layoutMode: 'fitRows'
    });

    $('#galeria-isotope .galeria-filtro button').on('click', function() {
        var filtro = $(this).data('filter');
        $container.isotope({ filter: filtro });
    });
});


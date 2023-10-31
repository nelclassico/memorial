jQuery(document).ready(function($) {
    AOS.init({
        duration: 800,  // Duração da animação em milissegundos
        easing: 'ease-in-out',  // Tipo de animação
    });
});
/*
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
*/
jQuery(document).ready(function($) {
    var $container = $('#galeria-isotope .galeria-itens');

    function setItemLayout() {
      var $items = $container.find('.galeria-item');
      $items.removeClass('galeria-imagem-lado-a-lado');

      var filter = $container.data('isotope').options.filter;
      if (filter !== '*') {
        // Adicione uma classe para organizar as imagens lado a lado
        $items.addClass('galeria-imagem-lado-a-lado');
      }
    }

    $container.isotope({
      itemSelector: '.galeria-item',
      layoutMode: 'fitRows',
      filter: '*' // Defina o filtro '*' automaticamente
    });

    setItemLayout();

    $('#galeria-isotope .galeria-filtro button').on('click', function() {
      var filtro = $(this).data('filter');
      $container.isotope({ filter: filtro });
      setItemLayout();
    });
  });

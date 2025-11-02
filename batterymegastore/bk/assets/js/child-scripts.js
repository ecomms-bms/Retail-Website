jQuery(document).ready(function($) {

  $('.open-pricematch').magnificPopup({
    type: 'inline',
    midClick: true,
    items: {
      src: '#pricematch-popup',
      type: 'inline'
    },
    mainClass: 'mfp newsletter-popup mfp-zoom-in',
    removalDelay: 400,
    fixedBgPos: true,
    fixedContentPos: true,
    closeBtnInside: true,
    closeMarkup: '<button title="%title%" class="mfp-close"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" enable-background="new 0 0 64 64"><g fill="none" stroke="#000" stroke-width="2" stroke-miterlimit="10"><path d="m18.947 17.15l26.1 25.903"></path><path d="m19.05 43.15l25.902-26.1"></path></g></svg></span></button>',
  });

});

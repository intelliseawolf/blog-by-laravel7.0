import 'magnific-popup';
export default {
  deep: true,
  bind(data) {
    jQuery(data).magnificPopup({
      type: 'image',
      delegate: 'a',
      mainClass: 'mfp-with-zoom', // this class is for CSS animation below
      preloader: true,
      zoom: {
        enabled: false, // By default it's false, so don't forget to enable it
      },
      image: {
        titleSrc: 'title'
      },
      gallery: {
        enabled: true, // set to true to enable gallery
        preload: [0, 2], // read about this option in next Lazy-loading section
        navigateByImgClick: true,
        arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button
        tPrev: Config.translations.previous,
        tNext: Config.translations.next,
        tCounter: '<span class="mfp-counter">%curr% ' + Config.translations.of + ' %total%</span>' // markup of counter
      }
    });
  }
}

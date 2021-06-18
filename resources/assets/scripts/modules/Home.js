
import { NewsletterModal } from '../layouts/NewsletterModal'

export const Home = {
  onLoad: function() {
    if ($('.template-home').length) {
      Home.loadBestSellers();
      NewsletterModal.onLoad();
    }
  },
  loadBestSellers: function() {
    if ($('#best-sellers').length) {
      $('#best-sellers .slick').slick({
        slidesToShow: 3,
        dots: true,
        // centerMode: true,
        responsive: [
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      });
      $('#best-sellers .slick').slideDown();
    }
  },
};

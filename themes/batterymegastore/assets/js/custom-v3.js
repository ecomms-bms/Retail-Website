/* global slick, BMS_CART */

(function($) {
  var CART = {
    DOM: {
      proceedToCheckout: $('.woocommerce-cart.woocommerce-page .wc-proceed-to-checkout'),
      batteryAgreement: $('.woocommerce-cart.woocommerce-page .js-cart-battery-agreement'),
    },
    classes: {
      show: 'show',
      lock: 'locked'
    },
    checkoutButtonsInit: function() {
      if (CART.DOM.proceedToCheckout.length) {
        CART.DOM.proceedToCheckout.addClass(CART.classes.show);

        if (CART.DOM.batteryAgreement.length) {
          CART.DOM.proceedToCheckout.addClass(CART.classes.show);
        }
      }
    },
    batteryAgreementHandler: function() {
      if (CART.DOM.batteryAgreement.length) {
        var checkbox = CART.DOM.batteryAgreement.find('.input-checkbox');
        var checked = sessionStorage.getItem('batteryAgreement');

        checkbox.on('change', function(e) {
          sessionStorage.setItem('batteryAgreement', e.target.checked ? 'yes' : 'no');
          sessionStorage.removeItem('batteryAgreementCartSkipped');

          if (CART.DOM.proceedToCheckout.length) {
            CART.DOM.proceedToCheckout.toggleClass(CART.classes.show, !e.target.checked);
          }
        });

        if (checked === 'yes') {
          checkbox.prop('checked', true);
          checkbox.trigger('change');
        }
      }
    },
    checkoutBatteryAgreementHandler: function() {
      $(document.body).on( 'updated_checkout', function(e, data) {
        var checkoutBatteryAgreement = $('.woocommerce-checkout.woocommerce-page .js-cart-battery-agreement');

        if (checkoutBatteryAgreement.length) {
          var checkbox = checkoutBatteryAgreement.find('.input-checkbox');
          var checked = sessionStorage.getItem('batteryAgreement');
          var cartSkipped = sessionStorage.getItem('batteryAgreementCartSkipped');

          checkbox.on('change', function(e) {
            sessionStorage.setItem('batteryAgreement', e.target.checked ? 'yes' : 'no');
          });

          if (checked === 'yes') {
            checkbox.prop('checked', true);
            checkbox.trigger('change');
          } else {
            checkoutBatteryAgreement.addClass(CART.classes.show);
            sessionStorage.setItem('batteryAgreementCartSkipped', 'yes');
          }

          if (cartSkipped === 'yes') {
            checkoutBatteryAgreement.addClass(CART.classes.show);
          }
        }
      });
    },
    clearSession: function() {
      sessionStorage.removeItem('batteryAgreement');
      sessionStorage.removeItem('batteryAgreementCartSkipped');
    }
  };

  var PRODUCT = {
    accordion: function() {
      var selectors = {
        accordion: '.js-accordion',
        button: '.js-accordion-button',
        content: '.js-accordion-content',
        item: '.js-accordion-item',
      }

      var accordion = $(selectors.accordion);

      if (!accordion.length) {
        return;
      }

      var classes = {
        active: 'is-active',
      }

      var buttons = $(selectors.button);

      $.each(buttons, function(i, b) {
        $(b).on('click', function() {
          var button = $(this);
          var item = button.closest(selectors.item);
          var activeItem = $(`${selectors.item}.${classes.active}`);
          var itemContent = item.find(selectors.content);

          if (
            activeItem.length &&
            activeItem.attr('id') !== item.attr('id')
          ) {
            var activeItemContent = activeItem.find(selectors.content);
            var activeItemButton = activeItem.find(selectors.button);
            activeItemContent.slideUp(300);
            activeItem.removeClass(classes.active);
            activeItemButton.attr('aria-expanded', false);
          }

          if (item.hasClass(classes.active)) {
            itemContent.slideUp(300);
            item.removeClass(classes.active);
            button.attr('aria-expanded', false);
          } else {
            itemContent.slideDown(300);
            item.addClass(classes.active);
            button.attr('aria-expanded', true);
          }
        });
      });
    },
    relatedPosts: function() {
      var selectors = {
        section: '.js-product-faq-and-posts-section',
        carousel: '.js-product-related-posts-carousel'
      }

      var carousel = $(selectors.carousel);

      if (!carousel.length) {
        return;
      }

      var classes = {
        one: 'has-1col-layout',
        two: 'has-2col-layout'
      }

      var section = $(selectors.section);
      var itemsToShow = carousel.attr('data-items') || 4;

      if (!section.hasClass(classes.two)) {
        itemsToShow = 4;
      }

      carousel.slick({
        slidesToShow: itemsToShow,
        // infinite: false,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
            }
          }
        ]
      });
    },
    layoutCheck: function() {
      var selectors = {
        section: '.js-product-faq-and-posts-section',
        posts: '.js-product-related-posts',
        faq: '.js-product-faq'
      }

      var classes = {
        one: 'has-1col-layout',
        two: 'has-2col-layout'
      }

      var section = $(selectors.section);

      if (section.length) {
        var posts = $(selectors.posts);
        var faq = $(selectors.faq);

        if (section.hasClass(classes.two) && (!posts.length || !faq.length)) {
          section.removeClass(classes.two);
        }
      }
    }
  }

  $(document).ready(function() {
    if (BMS_CART.isCart) {
      CART.checkoutButtonsInit();
      CART.batteryAgreementHandler();
      CART.checkoutBatteryAgreementHandler();
    } else {
      CART.clearSession();
    }

    if (BMS_CART.isProduct) {
      PRODUCT.layoutCheck();
      PRODUCT.relatedPosts();
    }

    if (BMS_CART.isCategory || BMS_CART.isProduct) {
      PRODUCT.accordion();
    }
  });
})(jQuery);

!(function (e) {
    (woodmartThemeModule.singleProductTabsAccordion = function () {
        var o = e(".woocommerce-tabs"),
            a = o.find(".wd-accordion-item .entry-content");
        o.length <= 0 ||
            "accordion" === o.data("layout") ||
            e(".site-content").hasClass("wd-builder-on") ||
            (woodmartThemeModule.$window.width() <= 1024
                ? o.hasClass("tabs-layout-accordion") ||
                  (o
                      .removeClass("tabs-layout-tabs wc-tabs-wrapper")
                      .addClass(
                          "tabs-layout-accordion wd-accordion wd-style-default"
                      ),
                  a
                      .addClass("wd-accordion-content wd-scroll")
                      .find(".wc-tab-inner")
                      .addClass("wd-scroll-content"),
                  e(".single-product-page")
                      .removeClass("tabs-type-tabs")
                      .addClass("tabs-type-accordion"),
                  "first" !== o.data("state") &&
                      a
                          .first()
                          .hide()
                          .siblings(".wd-active")
                          .removeClass("wd-active"))
                : o.hasClass("tabs-layout-tabs") ||
                  (o
                      .addClass("tabs-layout-tabs wc-tabs-wrapper")
                      .removeClass(
                          "tabs-layout-accordion wd-accordion wd-style-default"
                      ),
                  a
                      .removeClass("wd-accordion-content wd-scroll")
                      .find(".wc-tab-inner")
                      .removeClass("wd-scroll-content"),
                  e(".single-product-page")
                      .addClass("tabs-type-tabs")
                      .removeClass("tabs-type-accordion"),
                  o.find(".wd-nav a").first().trigger("click"))
            );
    }),
        woodmartThemeModule.$window.on(
            "resize",
            woodmartThemeModule.debounce(function () {
                woodmartThemeModule.singleProductTabsAccordion(),
                    woodmartThemeModule.accordion(),
                    woodmartThemeModule.$document.trigger(
                        "resize.vcRowBehaviour"
                    );
            }, 300)
        ),
        e(document).ready(function () {
            woodmartThemeModule.singleProductTabsAccordion();
        });
})(jQuery);

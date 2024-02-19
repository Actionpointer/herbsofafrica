var woodmartThemeModule = {};
!(function (m) {
    woodmartThemeModule.supports_html5_storage = !1;
    try {
        (woodmartThemeModule.supports_html5_storage =
            "sessionStorage" in window && null !== window.sessionStorage),
            window.sessionStorage.setItem("wd", "test"),
            window.sessionStorage.removeItem("wd");
    } catch (e) {
        woodmartThemeModule.supports_html5_storage = !1;
    }
    (woodmartThemeModule.$window = m(window)),
        (woodmartThemeModule.$document = m(document)),
        (woodmartThemeModule.$body = m("body")),
        (woodmartThemeModule.windowWidth = woodmartThemeModule.$window.width()),
        (woodmartThemeModule.removeURLParameter = function (e, o) {
            var t = e.split("?");
            if (2 <= t.length) {
                for (
                    var n = encodeURIComponent(o) + "=",
                        d = t[1].split(/[&;]/g),
                        a = d.length;
                    0 < a--;

                )
                    -1 !== d[a].lastIndexOf(n, 0) && d.splice(a, 1);
                return t[0] + (0 < d.length ? "?" + d.join("&") : "");
            }
            return e;
        }),
        (woodmartThemeModule.removeDuplicatedStylesFromHTML = function (e, a) {
            var r = m('<div class="temp-wrapper"></div>').append(e),
                l = r.find("link"),
                i = 0,
                s = !1;
            0 === l.length
                ? a(e)
                : (setTimeout(function () {
                      i <= l.length && !s && (a(m(r.html())), (s = !0));
                  }, 500),
                  l.each(function () {
                      void 0 !== m(this).attr("id") &&
                          -1 !==
                              m(this).attr("id").indexOf("theme_settings_") &&
                          m("head")
                              .find(
                                  'link[id*="theme_settings_"]:not([id*="theme_settings_default"])'
                              )
                              .remove();
                  }),
                  l.each(function () {
                      var e,
                          o,
                          t = m(this),
                          n = t.attr("id"),
                          d = t.attr("href");
                      void 0 !== n &&
                          ((e = -1 !== n.indexOf("theme_settings_")),
                          (o = -1 !== n.indexOf("theme_settings_default")),
                          t.remove(),
                          void 0 !== woodmart_page_css[n] || o
                              ? ++i >= l.length &&
                                !s &&
                                (a(m(r.html())), (s = !0))
                              : m("head").append(
                                    t.on("load", function () {
                                        i++,
                                            e || (woodmart_page_css[n] = d),
                                            i >= l.length &&
                                                !s &&
                                                (a(m(r.html())), (s = !0));
                                    })
                                ));
                  }));
        }),
        (woodmartThemeModule.debounce = function (n, d, a) {
            var r;
            return function () {
                var e = this,
                    o = arguments,
                    t = a && !r;
                clearTimeout(r),
                    (r = setTimeout(function () {
                        (r = null), a || n.apply(e, o);
                    }, d)),
                    t && n.apply(e, o);
            };
        }),
        (woodmartThemeModule.wdElementorAddAction = function (e, o) {
            woodmartThemeModule.$window.on(
                "elementor/frontend/init",
                function () {
                    elementorFrontend.isEditMode() &&
                        elementorFrontend.hooks.addAction(e, o);
                }
            );
        }),
        woodmartThemeModule.wdElementorAddAction(
            "frontend/element_ready/global",
            function (e) {
                e.attr("style") &&
                    0 === e.attr("style").indexOf("transform:translate3d") &&
                    !e.hasClass("wd-parallax-on-scroll") &&
                    e.attr("style", ""),
                    e.removeClass("wd-animated"),
                    e.data("wd-waypoint", ""),
                    e.removeClass("wd-anim-ready"),
                    woodmartThemeModule.$document.trigger(
                        "wdElementorGlobalReady"
                    );
            }
        ),
        m.each(
            [
                "frontend/element_ready/column",
                "frontend/element_ready/container",
            ],
            function (e, o) {
                woodmartThemeModule.wdElementorAddAction(o, function (e) {
                    e.attr("style") &&
                        0 ===
                            e.attr("style").indexOf("transform:translate3d") &&
                        !e.hasClass("wd-parallax-on-scroll") &&
                        e.attr("style", ""),
                        e.removeClass("wd-animated"),
                        e.data("wd-waypoint", ""),
                        e.removeClass("wd-anim-ready"),
                        setTimeout(function () {
                            woodmartThemeModule.$document.trigger(
                                "wdElementorColumnReady"
                            );
                        }, 100);
                });
            }
        ),
        (woodmartThemeModule.setupMainCarouselArg = function () {
            woodmartThemeModule.$mainCarouselWrapper = m(
                ".woocommerce-product-gallery"
            );
            var e = 1;
            (woodmartThemeModule.$mainCarouselWrapper.hasClass(
                "thumbs-position-centered"
            ) ||
                woodmartThemeModule.$mainCarouselWrapper.hasClass(
                    "thumbs-position-carousel_two_columns"
                )) &&
                (e = 2),
                (woodmartThemeModule.mainCarouselArg = {
                    rtl: woodmartThemeModule.$body.hasClass("rtl"),
                    items: e,
                    autoplay: woodmart_settings.product_slider_autoplay,
                    autoplayTimeout: 3e3,
                    loop: woodmart_settings.product_slider_autoplay,
                    center: woodmartThemeModule.$mainCarouselWrapper.hasClass(
                        "thumbs-position-centered"
                    ),
                    startPosition:
                        woodmartThemeModule.$mainCarouselWrapper.hasClass(
                            "thumbs-position-centered"
                        )
                            ? woodmart_settings.centered_gallery_start
                            : 0,
                    dots:
                        "yes" === woodmart_settings.product_slider_dots ||
                        (woodmartThemeModule.$mainCarouselWrapper
                            .find(".woocommerce-product-gallery__wrapper")
                            .data("hide_pagination_control") &&
                            "yes" !==
                                woodmartThemeModule.$mainCarouselWrapper
                                    .find(
                                        ".woocommerce-product-gallery__wrapper"
                                    )
                                    .data("hide_pagination_control")),
                    nav: !0,
                    autoHeight:
                        "yes" === woodmart_settings.product_slider_auto_height,
                    navText: !1,
                    navClass: [
                        "owl-prev wd-btn-arrow",
                        "owl-next wd-btn-arrow",
                    ],
                });
        }),
        (woodmartThemeModule.shopLoadMoreBtn =
            ".wd-products-load-more.load-on-scroll"),
        woodmartThemeModule.$window.on("elementor/frontend/init", function () {
            elementorFrontend.isEditMode() &&
                "enabled" === woodmart_settings.elementor_no_gap &&
                (m.each(
                    [
                        "frontend/element_ready/section",
                        "frontend/element_ready/container",
                    ],
                    function (e, o) {
                        woodmartThemeModule.wdElementorAddAction(
                            o,
                            function (e) {
                                e.attr("style") &&
                                    0 ===
                                        e
                                            .attr("style")
                                            .indexOf("transform:translate3d") &&
                                    !e.hasClass("wd-parallax-on-scroll") &&
                                    e.attr("style", ""),
                                    e.removeClass("wd-animated"),
                                    e.data("wd-waypoint", ""),
                                    e.removeClass("wd-anim-ready"),
                                    woodmartThemeModule.$document.trigger(
                                        "wdElementorSectionReady"
                                    );
                            }
                        ),
                            elementorFrontend.hooks.addAction(o, function (e) {
                                var o,
                                    t = e.data("model-cid");
                                void 0 !==
                                    elementorFrontend.config.elements.data[t] &&
                                    ((o = ""),
                                    void 0 !==
                                        elementorFrontend.config.elements.data[
                                            t
                                        ].attributes.elType &&
                                        ("container" ===
                                        elementorFrontend.config.elements.data[
                                            t
                                        ].attributes.elType
                                            ? (o =
                                                  elementorFrontend.config
                                                      .elements.data[t]
                                                      .attributes.boxed_width
                                                      .size)
                                            : "section" ===
                                                  elementorFrontend.config
                                                      .elements.data[t]
                                                      .attributes.elType &&
                                              (o =
                                                  elementorFrontend.config
                                                      .elements.data[t]
                                                      .attributes.content_width
                                                      .size)),
                                    o || e.addClass("wd-negative-gap"));
                            });
                    }
                ),
                elementor.channels.editor.on(
                    "change:section change:container",
                    function (e) {
                        var o,
                            t = e.elementSettingsModel.changed;
                        (void 0 === t.content_width &&
                            void 0 === t.boxed_width) ||
                            ((o = []),
                            void 0 !== t.content_width
                                ? (o = t.content_width.size)
                                : void 0 !== t.boxed_width &&
                                  (o = t.boxed_width.size),
                            (t = e._parent.model.id),
                            (e = m(".elementor-element-" + t)),
                            o
                                ? e.removeClass("wd-negative-gap")
                                : e.addClass("wd-negative-gap"));
                    }
                ));
        }),
        woodmartThemeModule.$window.on("load", function () {
            m(".wd-preloader")
                .delay(parseInt(woodmart_settings.preloader_delay))
                .addClass("preloader-hide"),
                m(".wd-preloader-style").remove(),
                setTimeout(function () {
                    m(".wd-preloader").remove();
                }, 200);
        }),
        (woodmartThemeModule.googleMapsCallback = function () {
            return "";
        });
})(jQuery),
    (window.onload = function () {
        function o(e) {
            jQuery(window).trigger("wdEventStarted"), t();
        }
        var e = [
                "keydown",
                "scroll",
                "mouseover",
                "touchmove",
                "touchstart",
                "mousedown",
                "mousemove",
            ],
            t = function () {
                e.forEach(function (e) {
                    window.removeEventListener(e, o);
                });
            };
        e.forEach(function (e) {
            window.addEventListener(e, o);
        });
    });

!(function (g) {
    woodmartThemeModule.$document.on(
        "wdProductsTabsLoaded wdSearchFullScreenContentLoaded wdUpdateWishlist wdRecentlyViewedProductLoaded",
        function () {
            woodmartThemeModule.productsLoadMore();
        }
    ),
        g.each(
            [
                "frontend/element_ready/wd_products.default",
                "frontend/element_ready/wd_products_tabs.default",
            ],
            function (o, e) {
                woodmartThemeModule.wdElementorAddAction(e, function () {
                    woodmartThemeModule.productsLoadMore();
                });
            }
        ),
        (woodmartThemeModule.productsLoadMore = function () {
            var w,
                h = !1,
                f =
                    (g(".wd-products-element").each(function () {
                        var o,
                            e,
                            d,
                            t,
                            a,
                            r,
                            s,
                            n,
                            l,
                            i,
                            m = g(this),
                            u = [],
                            c = m.find(".wd-products-holder");
                        function p() {
                            (i = woodmartThemeModule.$window.height() / 2),
                                woodmartThemeModule.$window.outerWidth(!0),
                                (s = m.outerWidth(!0)),
                                (a = woodmartThemeModule.$window.scrollTop()),
                                (i = m.offset().top - i),
                                (r = m.offset().left - l),
                                (s = s + m.offset().left + l - d.outerWidth()),
                                (n = e.outerHeight()),
                                (n = m.height() - n),
                                (n = i + n),
                                woodmartThemeModule.$window.width() <= 1024 &&
                                    ((r += 35), (s -= 35)),
                                e.css({ left: r + "px" }),
                                d.css({ left: s + "px" }),
                                a < i || n < a
                                    ? (o.removeClass("show-arrow"),
                                      t.addClass("hidden-loader"))
                                    : (o.addClass("show-arrow"),
                                      t.removeClass("hidden-loader"));
                        }
                        c.hasClass("pagination-arrows") &&
                            ((u[parseInt(c.data("paged"))] = {
                                items: c.html(),
                                status: "have-posts",
                            }),
                            (c = woodmartThemeModule.$body),
                            (o = m.find(".products-footer")),
                            (e = o.find(".wd-products-load-prev")),
                            (d = o.find(".wd-products-load-next")),
                            (t = m.find(".wd-products-loader")),
                            (l = 50),
                            c.hasClass("rtl") &&
                                ((e = d),
                                (d = o.find(".wd-products-load-prev"))),
                            woodmartThemeModule.$window.on(
                                "scroll",
                                function () {
                                    p();
                                }
                            ),
                            setTimeout(function () {
                                p();
                            }, 500),
                            m
                                .find(
                                    ".wd-products-load-prev, .wd-products-load-next"
                                )
                                .on("click", function (o) {
                                    o.preventDefault();
                                    o = g(this);
                                    if (!h && !o.hasClass("disabled")) {
                                        (h = !0), clearInterval(w);
                                        var t = o.parent().parent().prev(),
                                            a = o
                                                .parent()
                                                .find(".wd-products-load-next"),
                                            r = o
                                                .parent()
                                                .find(".wd-products-load-prev"),
                                            e = t.data("atts"),
                                            d = woodmart_settings.ajaxurl,
                                            s = t.attr("data-paged");
                                        if (
                                            (s++,
                                            o.hasClass("wd-products-load-prev"))
                                        ) {
                                            if (s < 2) return;
                                            s -= 2;
                                        }
                                        f(
                                            "arrows",
                                            e,
                                            d,
                                            "woodmart_get_products_shortcode",
                                            "json",
                                            "POST",
                                            s,
                                            t,
                                            o,
                                            u,
                                            function (o) {
                                                var e,
                                                    d =
                                                        t.hasClass(
                                                            "products-bordered-grid"
                                                        ) ||
                                                        t.hasClass(
                                                            "products-bordered-grid-ins"
                                                        );
                                                d ||
                                                    t.addClass(
                                                        "wd-animated-products"
                                                    ),
                                                    o.items.length &&
                                                        (t
                                                            .html(o.items)
                                                            .attr(
                                                                "data-paged",
                                                                s
                                                            ),
                                                        t
                                                            .imagesLoaded()
                                                            .progress(
                                                                function () {
                                                                    t.parent().trigger(
                                                                        "recalc"
                                                                    );
                                                                }
                                                            ),
                                                        woodmartThemeModule.$document.trigger(
                                                            "wood-images-loaded"
                                                        ),
                                                        woodmartThemeModule.$document.trigger(
                                                            "wdArrowsLoadProducts"
                                                        )),
                                                    woodmartThemeModule.$window.width() <
                                                        768 &&
                                                        g("html, body")
                                                            .stop()
                                                            .animate(
                                                                {
                                                                    scrollTop:
                                                                        t.offset()
                                                                            .top -
                                                                        150,
                                                                },
                                                                400
                                                            ),
                                                    d ||
                                                        ((e = 0),
                                                        (w = setInterval(
                                                            function () {
                                                                t
                                                                    .find(
                                                                        ".product-grid-item"
                                                                    )
                                                                    .eq(e)
                                                                    .addClass(
                                                                        "wd-animated"
                                                                    ),
                                                                    e++;
                                                            },
                                                            100
                                                        ))),
                                                    1 < s
                                                        ? r.removeClass(
                                                              "disabled"
                                                          )
                                                        : r.addClass(
                                                              "disabled"
                                                          ),
                                                    "no-more-posts" === o.status
                                                        ? a.addClass("disabled")
                                                        : a.removeClass(
                                                              "disabled"
                                                          );
                                            }
                                        );
                                    }
                                }));
                    }),
                    woodmartThemeModule.clickOnScrollButton(
                        woodmartThemeModule.shopLoadMoreBtn,
                        !1,
                        woodmart_settings.infinit_scroll_offset
                    ),
                    woodmartThemeModule.$document
                        .off("click", ".wd-products-load-more")
                        .on("click", ".wd-products-load-more", function (o) {
                            var e, d, t, a, r, s, n;
                            o.preventDefault(),
                                h ||
                                    ((h = !0),
                                    (e = g(this)),
                                    (d = e
                                        .parent()
                                        .siblings(".wd-products-holder")),
                                    (o =
                                        "woodmart_get_products_" +
                                        (t = d.data("source"))),
                                    (a = woodmart_settings.ajaxurl),
                                    (r = "POST"),
                                    (s = d.data("atts")),
                                    (n = d.data("paged")),
                                    n++,
                                    "main_loop" === t &&
                                        ((a = g(this).attr("href")),
                                        (r = "GET")),
                                    f(
                                        "load-more",
                                        s,
                                        a,
                                        o,
                                        "json",
                                        r,
                                        n,
                                        d,
                                        e,
                                        [],
                                        function (o) {
                                            o.items.length &&
                                                (d.hasClass("grid-masonry")
                                                    ? l(d, o.items)
                                                    : d.append(o.items),
                                                "no-more-posts" !== o.status &&
                                                    d
                                                        .imagesLoaded()
                                                        .progress(function () {
                                                            woodmartThemeModule.clickOnScrollButton(
                                                                woodmartThemeModule.shopLoadMoreBtn,
                                                                !0,
                                                                woodmart_settings.infinit_scroll_offset
                                                            );
                                                        }),
                                                woodmartThemeModule.$document.trigger(
                                                    "wood-images-loaded"
                                                ),
                                                woodmartThemeModule.$document.trigger(
                                                    "wdLoadMoreLoadProducts"
                                                ),
                                                d.data("paged", n)),
                                                "main_loop" === t &&
                                                    (e.attr("href", o.nextPage),
                                                    "no-more-posts" ===
                                                        o.status &&
                                                        e.hide().remove()),
                                                "no-more-posts" === o.status &&
                                                    e.hide();
                                        }
                                    ));
                        }),
                    function (o, e, d, t, a, r, s, n, l, i, m) {
                        e = { atts: e, paged: s, action: t, woo_ajax: 1 };
                        if (
                            ("GET" === r &&
                                ((d = woodmartThemeModule.removeURLParameter(
                                    d,
                                    "loop"
                                )),
                                (d = woodmartThemeModule.removeURLParameter(
                                    d,
                                    "woo_ajax"
                                ))),
                            i[s])
                        )
                            return (
                                n.addClass("loading"),
                                void setTimeout(function () {
                                    m(i[s]), n.removeClass("loading"), (h = !1);
                                }, 300)
                            );
                        "arrows" === o &&
                            n
                                .addClass("loading")
                                .parent()
                                .addClass("element-loading"),
                            l.addClass("loading"),
                            "woodmart_get_products_main_loop" === t &&
                                (e = {
                                    loop: n
                                        .find(".product")
                                        .last()
                                        .data("loop"),
                                    woo_ajax: 1,
                                }),
                            g.ajax({
                                url: d,
                                data: e,
                                dataType: a,
                                method: r,
                                success: function (e) {
                                    woodmartThemeModule.removeDuplicatedStylesFromHTML(
                                        e.items,
                                        function (o) {
                                            (e.items = o),
                                                (i[s] = e),
                                                m(e),
                                                "yes" ===
                                                    woodmart_settings.load_more_button_page_url_opt &&
                                                    "no" !==
                                                        woodmart_settings.load_more_button_page_url &&
                                                    e.currentPage &&
                                                    (window.history.pushState(
                                                        "",
                                                        "",
                                                        e.currentPage +
                                                            window.location
                                                                .search
                                                    ),
                                                    g(
                                                        ".woocommerce-breadcrumb"
                                                    ).replaceWith(
                                                        e.breadcrumbs
                                                    ));
                                        }
                                    );
                                },
                                error: function () {
                                    console.log("ajax error");
                                },
                                complete: function () {
                                    "arrows" === o &&
                                        n
                                            .removeClass("loading")
                                            .parent()
                                            .removeClass("element-loading"),
                                        l.removeClass("loading"),
                                        (h = !1);
                                },
                            });
                    }),
                l = function (o, e) {
                    e = g(e);
                    o.append(e).isotope("appended", e),
                        o.imagesLoaded().progress(function () {
                            o.isotope("layout");
                        });
                };
        }),
        g(document).ready(function () {
            woodmartThemeModule.productsLoadMore();
        });
})(jQuery);

!(function (c) {
    (woodmartThemeModule.wishlist = function () {
        var d = "woodmart_wishlist_count",
            i = "woodmart_wishlist_products";
        if (
            (woodmartThemeModule.$body.hasClass("logged-in") &&
                (d += "_logged"),
            woodmart_settings.is_multisite &&
                ((d += "_" + woodmart_settings.current_blog_id),
                (i += "_" + woodmart_settings.current_blog_id)),
            "undefined" != typeof Cookies)
        ) {
            var e = Cookies.get(d),
                t = 0;
            if (void 0 !== e)
                try {
                    t = JSON.parse(e);
                } catch (e) {
                    console.log("cant parse cookies json");
                }
            (void 0 !== woodmart_settings.wishlist_expanded &&
                "yes" === woodmart_settings.wishlist_expanded) ||
                a(t),
                woodmartThemeModule.$body.on(
                    "click",
                    ".wd-wishlist-btn a",
                    function (e) {
                        var t = c(this);
                        if (t.hasClass("added")) return !0;
                        e.preventDefault();
                        var o,
                            e = t.data("product-id"),
                            s = t.data("key");
                        woodmartThemeModule.$body.hasClass("logged-in") ||
                        "undefined" == typeof Cookies
                            ? (t.addClass("loading"),
                              void 0 !== woodmart_settings.wishlist_expanded &&
                              "yes" === woodmart_settings.wishlist_expanded &&
                              "disable" !==
                                  woodmart_settings.wishlist_show_popup &&
                              woodmartThemeModule.$body.hasClass("logged-in")
                                  ? woodmartThemeModule.$document.trigger(
                                        "wdShowWishlistGroupPopup",
                                        [e, s]
                                    )
                                  : n(e, "", s))
                            : ((s = {}),
                              void 0 !== (o = Cookies.get(i)) &&
                                  o &&
                                  ((o = JSON.parse(o)),
                                  Object.keys(o).length && (s = o)),
                              (s[e] = { product_id: e }),
                              a((o = Object.keys(s).length)),
                              Cookies.set(i, JSON.stringify(s), {
                                  expires: 7,
                                  path: "/",
                                  secure: woodmart_settings.cookie_secure_param,
                              }),
                              Cookies.set(d, o, {
                                  expires: 7,
                                  path: "/",
                                  secure: woodmart_settings.cookie_secure_param,
                              }),
                              l(t));
                    }
                ),
                woodmartThemeModule.$body.on(
                    "click",
                    ".wd-wishlist-remove",
                    function (e) {
                        e.preventDefault();
                        var t,
                            o = c(this),
                            e = "";
                        o.parents(".wd-wishlist-group").length &&
                            (e = o
                                .parents(".wd-wishlist-group")
                                .data("group-id")),
                            o.addClass("loading"),
                            woodmartThemeModule.$body.hasClass("logged-in") ||
                            "undefined" == typeof Cookies ||
                            1 ===
                                o
                                    .parents(".products.elements-grid")
                                    .find(".product-grid-item").length
                                ? r(
                                      o.data("product-id"),
                                      e,
                                      o.parents(".wd-products-holder"),
                                      function () {
                                          o.removeClass("loading");
                                      }
                                  )
                                : (o.parents(".product-grid-item").remove(),
                                  (e = {}),
                                  void 0 !== (t = Cookies.get(i)) &&
                                      t &&
                                      ((e = JSON.parse(t)),
                                      Object.keys(e).length &&
                                          delete e[o.data("product-id")]),
                                  a((t = Object.keys(e).length)),
                                  Cookies.set(i, JSON.stringify(e), {
                                      expires: 7,
                                      path: "/",
                                      secure: woodmart_settings.cookie_secure_param,
                                  }),
                                  Cookies.set(d, t, {
                                      expires: 7,
                                      path: "/",
                                      secure: woodmart_settings.cookie_secure_param,
                                  }));
                    }
                ),
                woodmartThemeModule.$body.on(
                    "click",
                    ".wd-wishlist-checkbox",
                    function (e) {
                        var t = c(this),
                            o = t.parents(".product-grid-item"),
                            t = t
                                .parents(".wd-products-element")
                                .siblings(".wd-wishlist-bulk-action"),
                            s = t.find(".wd-wishlist-select-all");
                        o.toggleClass("wd-current-product"),
                            s.hasClass("wd-selected") &&
                                t.hasClass("wd-visible") &&
                                !o.hasClass("wd-current-product") &&
                                s.removeClass("wd-selected"),
                            o.siblings(".product").length ===
                                o.siblings(".wd-current-product").length &&
                                o.hasClass("wd-current-product") &&
                                s.addClass("wd-selected"),
                            o.siblings(".wd-current-product").length ||
                            !t.hasClass("wd-visible") ||
                            o.hasClass("wd-current-product")
                                ? t.addClass("wd-visible")
                                : t.removeClass("wd-visible");
                    }
                ),
                woodmartThemeModule.$body.on(
                    "click",
                    ".wd-wishlist-remove-action > a",
                    function (e) {
                        e.preventDefault();
                        var t = c(this),
                            e = t
                                .parents(".wd-wishlist-bulk-action")
                                .siblings(".wd-products-element")
                                .find(".products"),
                            o = e.find(".wd-current-product"),
                            s = [],
                            d = "";
                        o.length &&
                            confirm(woodmart_settings.wishlist_remove_notice) &&
                            (t.addClass("loading"),
                            t.parents(".wd-wishlist-group").length &&
                                (d = t
                                    .parents(".wd-wishlist-group")
                                    .data("group-id")),
                            o.each(function () {
                                s.push(c(this).data("id"));
                            }),
                            r(s, d, e, function () {
                                t
                                    .parents(".wd-wishlist-bulk-action")
                                    .removeClass("wd-visible"),
                                    t.removeClass("loading");
                            }));
                    }
                ),
                woodmartThemeModule.$body.on(
                    "click",
                    ".wd-wishlist-select-all > a",
                    function (e) {
                        e.preventDefault();
                        var e = c(this).parent(),
                            t = e
                                .parents(".wd-wishlist-bulk-action")
                                .siblings(".wd-products-element")
                                .find(".products");
                        e.hasClass("wd-selected")
                            ? (t
                                  .find(".product")
                                  .removeClass("wd-current-product")
                                  .find(".wd-wishlist-checkbox")
                                  .prop("checked", !1),
                              e.removeClass("wd-selected"),
                              e
                                  .parents(".wd-wishlist-bulk-action")
                                  .removeClass("wd-visible"))
                            : (t
                                  .find(".product")
                                  .addClass("wd-current-product")
                                  .find(".wd-wishlist-checkbox")
                                  .prop("checked", !0),
                              e.addClass("wd-selected"));
                    }
                ),
                woodmartThemeModule.$document.on(
                    "wdAddProductToWishlist",
                    function (e, t, o, s, d) {
                        n(t, o, s, d);
                    }
                ),
                woodmartThemeModule.$document.on(
                    "wdRemoveProductToWishlist",
                    function (e, t, o, s, d) {
                        r(t, o, s, d);
                    }
                ),
                woodmartThemeModule.$document.on(
                    "wdUpdateWishlistContent",
                    function (e, t) {
                        var o;
                        (t = t),
                            (o = c(".wd-wishlist-content")),
                            a(t.count),
                            0 < o.length &&
                                !o.hasClass("wd-wishlist-preview") &&
                                woodmartThemeModule.removeDuplicatedStylesFromHTML(
                                    t.wishlist_content,
                                    function (e) {
                                        o.replaceWith(e),
                                            woodmartThemeModule.$document.trigger(
                                                "wdUpdateWishlist"
                                            );
                                    }
                                );
                    }
                );
        }
        function a(e) {
            var t = c(".wd-header-wishlist");
            0 < t.length && t.find(".wd-tools-count").text(e);
        }
        function n(e, t, o, s = "") {
            var d = c("a[data-product-id=" + e + "]");
            c.ajax({
                url: woodmart_settings.ajaxurl,
                data: {
                    action: "woodmart_add_to_wishlist",
                    product_id: e,
                    group: t,
                    key: o,
                },
                dataType: "json",
                method: "GET",
                success: function (e) {
                    e
                        ? (e.count && a(e.count),
                          e.fragments &&
                              (woodmartThemeModule.$document.trigger(
                                  "wdWishlistSaveFragments",
                                  [e.fragments, e.hash]
                              ),
                              c.each(e.fragments, function (t, e) {
                                  woodmartThemeModule.removeDuplicatedStylesFromHTML(
                                      e,
                                      function (e) {
                                          c(t).replaceWith(e);
                                      }
                                  );
                              })),
                          l(d))
                        : console.log(
                              "something wrong loading wishlist data ",
                              e
                          ),
                        s && s();
                },
                error: function () {
                    console.log(
                        "We cant add to wishlist. Something wrong with AJAX response. Probably some PHP conflict."
                    );
                },
                complete: function () {
                    d.removeClass("loading");
                },
            });
        }
        function r(e, t, s, d = "") {
            var o = "";
            void 0 !== s.data("atts") &&
                ((o = s.data("atts")).ajax_page = s.attr("data-paged")),
                c.ajax({
                    url: woodmart_settings.ajaxurl,
                    data: {
                        action: "woodmart_remove_from_wishlist",
                        product_id: e,
                        group_id: t,
                        key: woodmart_settings.wishlist_page_nonce,
                        atts: o,
                    },
                    dataType: "json",
                    method: "GET",
                    success: function (e) {
                        var t, o;
                        e.wishlist_content
                            ? (a(e.count),
                              (t = e),
                              (o = s.parents(".wd-products-element")).length &&
                                  !c(".wd-wishlist-content").hasClass(
                                      "wd-wishlist-preview"
                                  ) &&
                                  woodmartThemeModule.removeDuplicatedStylesFromHTML(
                                      t.wishlist_content,
                                      function (e) {
                                          o.replaceWith(e),
                                              woodmartThemeModule.$document.trigger(
                                                  "wdUpdateWishlist"
                                              );
                                      }
                                  ),
                              setTimeout(function () {
                                  var e = c(
                                      ".wd-wishlist-content .wd-pagination"
                                  ).find("a.page-numbers");
                                  e.length &&
                                      e.each(function () {
                                          var e = c(this),
                                              t = e
                                                  .attr("href")
                                                  .split("product-page=")[1],
                                              t = parseInt(t);
                                          e.attr(
                                              "href",
                                              window.location.origin +
                                                  window.location.pathname +
                                                  "?product-page=" +
                                                  t
                                          );
                                      });
                              }, 500))
                            : console.log(
                                  "something wrong loading wishlist data ",
                                  e
                              ),
                            e.fragments &&
                                woodmartThemeModule.$document.trigger(
                                    "wdUpdateWishlistFragments",
                                    [e.fragments, e.hash]
                                ),
                            d && d();
                    },
                    error: function () {
                        console.log(
                            "We cant remove from wishlist. Something wrong with AJAX response. Probably some PHP conflict."
                        );
                    },
                });
        }
        function l(e) {
            var t = e.data("added-text");
            (0 < e.find("span").length ? e.find("span") : e).text(t),
                e.addClass("added"),
                woodmartThemeModule.$document.trigger("added_to_wishlist"),
                woodmartThemeModule.$document.trigger("wdUpdateTooltip", e);
        }
    }),
        c(document).ready(function () {
            woodmartThemeModule.wishlist();
        });
})(jQuery);

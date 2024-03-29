!(function (m) {
    (woodmartThemeModule.checkoutQuantity = function () {
        var s;
        woodmartThemeModule.$document.on(
            "change input",
            ".woocommerce-checkout-review-order-table .quantity .qty",
            function () {
                var t = m(this),
                    e = t.val(),
                    a = t.attr("name"),
                    o = a.substring(a.indexOf("[") + 1, a.indexOf("]")),
                    a = t.attr("max"),
                    r = woodmart_settings.cart_hash_key,
                    n = woodmart_settings.fragment_name;
                clearTimeout(s),
                    parseInt(e) > parseInt(a) && (e = a),
                    (s = setTimeout(function () {
                        m.ajax({
                            url: woodmart_settings.ajaxurl,
                            data: {
                                action: "woodmart_update_cart_item",
                                item_id: o,
                                qty: e,
                            },
                            success: function (t) {
                                t &&
                                    t.fragments &&
                                    (m.each(t.fragments, function (t, e) {
                                        m(t).replaceWith(e);
                                    }),
                                    woodmartThemeModule.supports_html5_storage &&
                                        (sessionStorage.setItem(
                                            n,
                                            JSON.stringify(t.fragments)
                                        ),
                                        localStorage.setItem(r, t.cart_hash),
                                        sessionStorage.setItem(r, t.cart_hash),
                                        t.cart_hash &&
                                            sessionStorage.setItem(
                                                "wc_cart_created",
                                                new Date().getTime()
                                            )),
                                    woodmartThemeModule.$body.trigger(
                                        "wc_fragments_refreshed"
                                    )),
                                    m("form.checkout").trigger("update");
                            },
                            dataType: "json",
                            method: "GET",
                        });
                    }, 500));
            }
        );
    }),
        m(document).ready(function () {
            woodmartThemeModule.checkoutQuantity();
        });
})(jQuery);

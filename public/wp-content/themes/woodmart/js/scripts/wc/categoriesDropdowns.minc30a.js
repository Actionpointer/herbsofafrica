!(function (t) {
    woodmartThemeModule.$document.on("wdShopPageInit", function () {
        woodmartThemeModule.categoriesDropdowns();
    }),
        (woodmartThemeModule.categoriesDropdowns = function () {
            t(".dropdown_product_cat").on("change", function () {
                var o,
                    e = t(this);
                "" !== e.val()
                    ? ((o =
                          0 < (o = woodmart_settings.home_url).indexOf("?")
                              ? o + "&product_cat=" + e.val()
                              : o + "?product_cat=" + e.val()),
                      (location.href = o))
                    : (location.href = woodmart_settings.shop_url);
            }),
                t(".widget_product_categories").each(function () {
                    var o = t(this).find("select");
                    t().selectWoo &&
                        o.selectWoo({
                            minimumResultsForSearch: 5,
                            width: "100%",
                            allowClear: !0,
                            placeholder:
                                woodmart_settings.product_categories_placeholder,
                            language: {
                                noResults: function () {
                                    return woodmart_settings.product_categories_no_results;
                                },
                            },
                        });
                });
        }),
        t(document).ready(function () {
            woodmartThemeModule.categoriesDropdowns();
        });
})(jQuery);

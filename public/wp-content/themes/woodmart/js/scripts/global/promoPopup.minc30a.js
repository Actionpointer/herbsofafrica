!(function (r) {
    (woodmartThemeModule.promoPopup = function () {
        var o = woodmart_settings.promo_version;
        if (
            "undefined" != typeof Cookies &&
            !(
                woodmartThemeModule.$body.hasClass(
                    "page-template-maintenance"
                ) ||
                "yes" !== woodmart_settings.enable_popup ||
                ("yes" === woodmart_settings.promo_popup_hide_mobile &&
                    woodmartThemeModule.windowWidth < 768) ||
                ("confirmed" !== Cookies.get("woodmart_age_verify") &&
                    "yes" === woodmart_settings.age_verify) || 1==1
            )
        ) {
            function e() {
                r.magnificPopup.open({
                    items: { src: ".wd-promo-popup" },
                    type: "inline",
                    removalDelay: 500,
                    tClose: woodmart_settings.close,
                    tLoading: woodmart_settings.loading,
                    callbacks: {
                        beforeOpen: function () {
                            this.st.mainClass =
                                "mfp-move-horizontal wd-promo-popup-wrapper";
                        },
                        close: function () {
                            Cookies.set("woodmart_popup_" + o, "shown", {
                                expires: parseInt(
                                    woodmart_settings.promo_version_cookie_expires
                                ),
                                path: "/",
                                secure: woodmart_settings.cookie_secure_param,
                            });
                        },
                    },
                }),
                    woodmartThemeModule.$document.trigger("wood-images-loaded");
            }
            var t = !1,
                s = Cookies.get("woodmart_shown_pages");
            if (
                (r(".woodmart-open-newsletter").on("click", function (o) {
                    o.preventDefault(), e();
                }),
                (s = s || 0) < woodmart_settings.popup_pages)
            )
                return (
                    s++,
                    Cookies.set("woodmart_shown_pages", s, {
                        expires: 7,
                        path: "/",
                        secure: woodmart_settings.cookie_secure_param,
                    }),
                    !1
                );
            "shown" !== Cookies.get("woodmart_popup_" + o) &&
                ("scroll" === woodmart_settings.popup_event
                    ? woodmartThemeModule.$window.on("scroll", function () {
                          if (t) return !1;
                          woodmartThemeModule.$document.scrollTop() >=
                              woodmart_settings.popup_scroll && (e(), (t = !0));
                      })
                    : setTimeout(function () {
                          e();
                      }, woodmart_settings.popup_delay));
        }
    }),
        r(document).ready(function () {
            woodmartThemeModule.promoPopup();
        });
})(jQuery);

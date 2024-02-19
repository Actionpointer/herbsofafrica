!(function (d) {
    (woodmartThemeModule.menuSetUp = function () {
        var n = d(".wd-nav, .wd-header-cats"),
            o = "wd-opened";
        function e() {
            woodmartThemeModule.$window.width() <= 1024
                ? n
                      .find(" > .menu-item-has-children.wd-event-hover")
                      .each(function () {
                          d(this)
                              .data("original-event", "hover")
                              .removeClass("wd-event-hover")
                              .addClass("wd-event-click");
                      })
                : n.find(" > .wd-event-click").each(function () {
                      var e = d(this);
                      "hover" === e.data("original-event") &&
                          e
                              .removeClass("wd-event-click")
                              .addClass("wd-event-hover");
                  });
        }
        d(".mobile-nav")
            .find("ul.wd-nav-mobile")
            .find(" > li")
            .has(".wd-dropdown-menu")
            .addClass("menu-item-has-children"),
            woodmartThemeModule.$document.on(
                "click",
                ".wd-nav .wd-event-click > a, .wd-header-cats.wd-event-click > span",
                function (e) {
                    e.preventDefault();
                    e = d(this);
                    e.parent().siblings().hasClass(o) &&
                        e.parent().siblings().removeClass(o),
                        e.parent().toggleClass(o);
                }
            ),
            woodmartThemeModule.$document.on("click", function (e) {
                e = e.target;
                !(0 < d("." + o).length) ||
                    d(e).is(".wd-event-hover") ||
                    d(e).parents().is(".wd-event-hover") ||
                    d(e)
                        .parents()
                        .is("." + o) ||
                    d(e).is("." + o) ||
                    (n.find(".wd-event-click." + o).removeClass(o),
                    n.hasClass("wd-event-click") && n.removeClass(o),
                    d(".wd-close-side").removeClass(
                        "wd-close-side-opened wd-location-header"
                    ));
            }),
            "yes" ===
                woodmart_settings.menu_item_hover_to_click_on_responsive &&
                (e(),
                woodmartThemeModule.$window.on(
                    "resize",
                    woodmartThemeModule.debounce(function () {
                        e();
                    }, 300)
                ));
    }),
        d(document).ready(function () {
            woodmartThemeModule.menuSetUp();
        });
})(jQuery);

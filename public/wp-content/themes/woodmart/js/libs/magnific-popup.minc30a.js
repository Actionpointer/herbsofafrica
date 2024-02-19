!(function (e) {
    "function" == typeof define && define.amd
        ? define(["jquery"], e)
        : "object" == typeof exports
        ? e(require("jquery"))
        : e(window.jQuery || window.Zepto);
})(function (l) {
    function e() {}
    function d(e, t) {
        m.ev.on(n + e + b, t);
    }
    function u(e, t, n, i) {
        var o = document.createElement("div");
        return (
            (o.className = "mfp-" + e),
            n && (o.innerHTML = n),
            i ? t && t.appendChild(o) : ((o = l(o)), t && o.appendTo(t)),
            o
        );
    }
    function p(e, t) {
        m.ev.triggerHandler(n + e, t),
            m.st.callbacks &&
                ((e = e.charAt(0).toLowerCase() + e.slice(1)),
                m.st.callbacks[e] &&
                    m.st.callbacks[e].apply(m, Array.isArray(t) ? t : [t]));
    }
    function f(e) {
        return (
            (e === j && m.currTemplate.closeBtn) ||
                ((m.currTemplate.closeBtn = l(
                    m.st.closeMarkup.replace("%title%", m.st.tClose)
                )),
                (j = e)),
            m.currTemplate.closeBtn
        );
    }
    function r() {
        l.magnificPopup.instance ||
            ((m = new e()).init(), (l.magnificPopup.instance = m));
    }
    function L() {
        v && (c.after(v.addClass(s)).detach(), (v = null));
    }
    function o() {
        t && l(document.body).removeClass(t);
    }
    function F() {
        o(), m.req && m.req.abort();
    }
    var m,
        i,
        g,
        a,
        h,
        j,
        s,
        c,
        v,
        t,
        y = "Close",
        N = "BeforeClose",
        C = "MarkupParse",
        w = "Open",
        W = "Change",
        n = "mfp",
        b = "." + n,
        I = "mfp-ready",
        R = "mfp-removing",
        x = "mfp-prevent-close",
        k = !!window.jQuery,
        T = l(window),
        S =
            ((l.magnificPopup = {
                instance: null,
                proto: (e.prototype = {
                    constructor: e,
                    init: function () {
                        var e = navigator.appVersion;
                        (m.isIE7 = -1 !== e.indexOf("MSIE 7.")),
                            (m.isIE8 = -1 !== e.indexOf("MSIE 8.")),
                            (m.isLowIE = m.isIE7 || m.isIE8),
                            (m.isAndroid = /android/gi.test(e)),
                            (m.isIOS = /iphone|ipad|ipod/gi.test(e)),
                            (m.supportsTransition = (function () {
                                var e = document.createElement("p").style,
                                    t = ["ms", "O", "Moz", "Webkit"];
                                if (void 0 !== e.transition) return !0;
                                for (; t.length; )
                                    if (t.pop() + "Transition" in e) return !0;
                                return !1;
                            })()),
                            (m.probablyMobile =
                                m.isAndroid ||
                                m.isIOS ||
                                /(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(
                                    navigator.userAgent
                                )),
                            (g = l(document)),
                            (m.popupsCache = {});
                    },
                    open: function (e) {
                        if (!1 === e.isObj) {
                            (m.items = e.items.toArray()), (m.index = 0);
                            for (var t, n = e.items, i = 0; i < n.length; i++)
                                if (
                                    (t = (t = n[i]).parsed ? t.el[0] : t) ===
                                    e.el[0]
                                ) {
                                    m.index = i;
                                    break;
                                }
                        } else
                            (m.items = Array.isArray(e.items)
                                ? e.items
                                : [e.items]),
                                (m.index = e.index || 0);
                        if (!m.isOpen) {
                            (m.types = []),
                                (h = ""),
                                e.mainEl && e.mainEl.length
                                    ? (m.ev = e.mainEl.eq(0))
                                    : (m.ev = g),
                                e.key
                                    ? (m.popupsCache[e.key] ||
                                          (m.popupsCache[e.key] = {}),
                                      (m.currTemplate = m.popupsCache[e.key]))
                                    : (m.currTemplate = {}),
                                (m.st = l.extend(
                                    !0,
                                    {},
                                    l.magnificPopup.defaults,
                                    e
                                )),
                                (m.fixedContentPos =
                                    "auto" === m.st.fixedContentPos
                                        ? !m.probablyMobile
                                        : m.st.fixedContentPos),
                                m.st.modal &&
                                    ((m.st.closeOnContentClick = !1),
                                    (m.st.closeOnBgClick = !1),
                                    (m.st.showCloseBtn = !1),
                                    (m.st.enableEscapeKey = !1)),
                                m.bgOverlay ||
                                    ((m.bgOverlay = u("bg").on(
                                        "click" + b,
                                        function () {
                                            m.close();
                                        }
                                    )),
                                    (m.wrap = u("wrap")
                                        .attr("tabindex", -1)
                                        .on("click" + b, function (e) {
                                            m._checkIfClose(e.target) &&
                                                m.close();
                                        })),
                                    (m.container = u("container", m.wrap))),
                                (m.contentContainer = u("content")),
                                m.st.preloader &&
                                    (m.preloader = u(
                                        "preloader",
                                        m.container,
                                        m.st.tLoading
                                    ));
                            var o = l.magnificPopup.modules;
                            for (i = 0; i < o.length; i++) {
                                var r =
                                    (r = o[i]).charAt(0).toUpperCase() +
                                    r.slice(1);
                                m["init" + r].call(m);
                            }
                            p("BeforeOpen"),
                                m.st.showCloseBtn &&
                                    (m.st.closeBtnInside
                                        ? (d(C, function (e, t, n, i) {
                                              n.close_replaceWith = f(i.type);
                                          }),
                                          (h += " mfp-close-btn-in"))
                                        : m.wrap.append(f())),
                                m.st.alignTop && (h += " mfp-align-top"),
                                m.fixedContentPos
                                    ? m.wrap.css({
                                          overflow: m.st.overflowY,
                                          overflowX: "hidden",
                                          overflowY: m.st.overflowY,
                                      })
                                    : m.wrap.css({
                                          top: T.scrollTop(),
                                          position: "absolute",
                                      }),
                                (!1 !== m.st.fixedBgPos &&
                                    ("auto" !== m.st.fixedBgPos ||
                                        m.fixedContentPos)) ||
                                    m.bgOverlay.css({
                                        height: g.height(),
                                        position: "absolute",
                                    }),
                                m.st.enableEscapeKey &&
                                    g.on("keyup" + b, function (e) {
                                        27 === e.keyCode && m.close();
                                    }),
                                T.on("resize" + b, function () {
                                    m.updateSize();
                                }),
                                m.st.closeOnContentClick ||
                                    (h += " mfp-auto-cursor"),
                                h && m.wrap.addClass(h);
                            var a = (m.wH = T.height()),
                                s = {},
                                c =
                                    (m.fixedContentPos &&
                                        m._hasScrollBar(a) &&
                                        (c = m._getScrollbarSize()) &&
                                        (s.marginRight = c),
                                    m.fixedContentPos &&
                                        (m.isIE7
                                            ? l("body, html").css(
                                                  "overflow",
                                                  "hidden"
                                              )
                                            : (s.overflow = "hidden")),
                                    m.st.mainClass);
                            return (
                                m.isIE7 && (c += " mfp-ie7"),
                                c && m._addClassToMFP(c),
                                m.updateItemHTML(),
                                p("BuildControls"),
                                l("html").css(s),
                                m.bgOverlay
                                    .add(m.wrap)
                                    .prependTo(
                                        m.st.prependTo || l(document.body)
                                    ),
                                (m._lastFocusedEl = document.activeElement),
                                setTimeout(function () {
                                    m.content
                                        ? (m._addClassToMFP(I), m._setFocus())
                                        : m.bgOverlay.addClass(I),
                                        g.on("focusin" + b, m._onFocusIn);
                                }, 16),
                                (m.isOpen = !0),
                                m.updateSize(a),
                                p(w),
                                e
                            );
                        }
                        m.updateItemHTML();
                    },
                    close: function () {
                        m.isOpen &&
                            (p(N),
                            (m.isOpen = !1),
                            m.st.removalDelay &&
                            !m.isLowIE &&
                            m.supportsTransition
                                ? (m._addClassToMFP(R),
                                  setTimeout(function () {
                                      m._close();
                                  }, m.st.removalDelay))
                                : m._close());
                    },
                    _close: function () {
                        p(y);
                        var e = R + " " + I + " ";
                        m.bgOverlay.detach(),
                            m.wrap.detach(),
                            m.container.empty(),
                            m.st.mainClass && (e += m.st.mainClass + " "),
                            m._removeClassFromMFP(e),
                            m.fixedContentPos &&
                                ((e = { marginRight: "" }),
                                m.isIE7
                                    ? l("body, html").css("overflow", "")
                                    : (e.overflow = ""),
                                l("html").css(e)),
                            g.off("keyup.mfp focusin" + b),
                            m.ev.off(b),
                            m.wrap
                                .attr("class", "mfp-wrap")
                                .removeAttr("style"),
                            m.bgOverlay.attr("class", "mfp-bg"),
                            m.container.attr("class", "mfp-container"),
                            !m.st.showCloseBtn ||
                                (m.st.closeBtnInside &&
                                    !0 !== m.currTemplate[m.currItem.type]) ||
                                (m.currTemplate.closeBtn &&
                                    m.currTemplate.closeBtn.detach()),
                            (m.currItem = null),
                            (m.content = null),
                            (m.currTemplate = null),
                            (m.prevHeight = 0),
                            p("AfterClose");
                    },
                    updateSize: function (e) {
                        var t;
                        m.isIOS
                            ? ((t =
                                  document.documentElement.clientWidth /
                                  window.innerWidth),
                              (t = window.innerHeight * t),
                              m.wrap.css("height", t),
                              (m.wH = t))
                            : (m.wH = e || T.height()),
                            m.fixedContentPos || m.wrap.css("height", m.wH),
                            p("Resize");
                    },
                    updateItemHTML: function () {
                        var e = m.items[m.index],
                            t =
                                (m.contentContainer.detach(),
                                m.content && m.content.detach(),
                                (e = e.parsed ? e : m.parseEl(m.index)).type),
                            n =
                                (p("BeforeChange", [
                                    m.currItem ? m.currItem.type : "",
                                    t,
                                ]),
                                (m.currItem = e),
                                m.currTemplate[t] ||
                                    ((n = !!m.st[t] && m.st[t].markup),
                                    p("FirstMarkupParse", n),
                                    (m.currTemplate[t] = !n || l(n))),
                                a &&
                                    a !== e.type &&
                                    m.container.removeClass(
                                        "mfp-" + a + "-holder"
                                    ),
                                m[
                                    "get" +
                                        t.charAt(0).toUpperCase() +
                                        t.slice(1)
                                ](e, m.currTemplate[t]));
                        m.appendContent(n, t),
                            (e.preloaded = !0),
                            p(W, e),
                            (a = e.type),
                            m.container.prepend(m.contentContainer),
                            p("AfterChange");
                    },
                    appendContent: function (e, t) {
                        (m.content = e)
                            ? m.st.showCloseBtn &&
                              m.st.closeBtnInside &&
                              !0 === m.currTemplate[t]
                                ? m.content.find(".mfp-close").length ||
                                  m.content.append(f())
                                : (m.content = e)
                            : (m.content = ""),
                            p("BeforeAppend"),
                            m.container.addClass("mfp-" + t + "-holder"),
                            m.contentContainer.append(m.content);
                    },
                    parseEl: function (e) {
                        var t,
                            n = m.items[e];
                        if (
                            (n = n.tagName
                                ? { el: l(n) }
                                : ((t = n.type), { data: n, src: n.src })).el
                        ) {
                            for (var i = m.types, o = 0; o < i.length; o++)
                                if (n.el.hasClass("mfp-" + i[o])) {
                                    t = i[o];
                                    break;
                                }
                            (n.src = n.el.attr("data-mfp-src")),
                                n.src || (n.src = n.el.attr("href"));
                        }
                        return (
                            (n.type = t || m.st.type || "inline"),
                            (n.index = e),
                            (n.parsed = !0),
                            (m.items[e] = n),
                            p("ElementParse", n),
                            m.items[e]
                        );
                    },
                    addGroup: function (t, n) {
                        function e(e) {
                            (e.mfpEl = this), m._openClick(e, t, n);
                        }
                        var i = "click.magnificPopup";
                        ((n = n || {}).mainEl = t),
                            n.items
                                ? ((n.isObj = !0), t.off(i).on(i, e))
                                : ((n.isObj = !1),
                                  n.delegate
                                      ? t.off(i).on(i, n.delegate, e)
                                      : (n.items = t).off(i).on(i, e));
                    },
                    _openClick: function (e, t, n) {
                        if (
                            (void 0 !== n.midClick
                                ? n
                                : l.magnificPopup.defaults
                            ).midClick ||
                            (2 !== e.which && !e.ctrlKey && !e.metaKey)
                        ) {
                            var i = (
                                void 0 !== n.disableOn
                                    ? n
                                    : l.magnificPopup.defaults
                            ).disableOn;
                            if (i)
                                if ("function" == typeof i) {
                                    if (!i.call(m)) return !0;
                                } else if (T.width() < i) return !0;
                            e.type &&
                                (e.preventDefault(),
                                m.isOpen && e.stopPropagation()),
                                (n.el = l(e.mfpEl)),
                                n.delegate && (n.items = t.find(n.delegate)),
                                m.open(n);
                        }
                    },
                    updateStatus: function (e, t) {
                        var n;
                        m.preloader &&
                            (i !== e && m.container.removeClass("mfp-s-" + i),
                            (n = {
                                status: e,
                                text: (t =
                                    t || "loading" !== e ? t : m.st.tLoading),
                            }),
                            p("UpdateStatus", n),
                            (e = n.status),
                            m.preloader.html((t = n.text)),
                            m.preloader.find("a").on("click", function (e) {
                                e.stopImmediatePropagation();
                            }),
                            m.container.addClass("mfp-s-" + e),
                            (i = e));
                    },
                    _checkIfClose: function (e) {
                        if (!l(e).hasClass(x)) {
                            var t = m.st.closeOnContentClick,
                                n = m.st.closeOnBgClick;
                            if (t && n) return !0;
                            if (
                                !m.content ||
                                l(e).hasClass("mfp-close") ||
                                (m.preloader && e === m.preloader[0])
                            )
                                return !0;
                            if (
                                e === m.content[0] ||
                                l.contains(m.content[0], e)
                            ) {
                                if (t) return !0;
                            } else if (n && l.contains(document, e)) return !0;
                            return !1;
                        }
                    },
                    _addClassToMFP: function (e) {
                        m.bgOverlay.addClass(e), m.wrap.addClass(e);
                    },
                    _removeClassFromMFP: function (e) {
                        this.bgOverlay.removeClass(e), m.wrap.removeClass(e);
                    },
                    _hasScrollBar: function (e) {
                        return (
                            (m.isIE7
                                ? g.height()
                                : document.body.scrollHeight) >
                            (e || T.height())
                        );
                    },
                    _setFocus: function () {
                        (m.st.focus
                            ? m.content.find(m.st.focus).eq(0)
                            : m.wrap
                        ).trigger("focus");
                    },
                    _onFocusIn: function (e) {
                        if (
                            e.target !== m.wrap[0] &&
                            !l.contains(m.wrap[0], e.target)
                        )
                            return m._setFocus(), !1;
                    },
                    _parseMarkup: function (o, e, t) {
                        var r;
                        t.data && (e = l.extend(t.data, e)),
                            p(C, [o, e, t]),
                            l.each(e, function (e, t) {
                                if (void 0 === t || !1 === t) return !0;
                                var n, i;
                                1 < (r = e.split("_")).length
                                    ? 0 < (n = o.find(b + "-" + r[0])).length &&
                                      ("replaceWith" === (i = r[1])
                                          ? n[0] !== t[0] && n.replaceWith(t)
                                          : "img" === i
                                          ? n.is("img")
                                              ? n.attr("src", t)
                                              : n.replaceWith(
                                                    '<img src="' +
                                                        t +
                                                        '" class="' +
                                                        n.attr("class") +
                                                        '" />'
                                                )
                                          : n.attr(r[1], t))
                                    : o.find(b + "-" + e).html(t);
                            });
                    },
                    _getScrollbarSize: function () {
                        var e;
                        return (
                            void 0 === m.scrollbarSize &&
                                (((e =
                                    document.createElement(
                                        "div"
                                    )).style.cssText =
                                    "width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;"),
                                document.body.appendChild(e),
                                (m.scrollbarSize =
                                    e.offsetWidth - e.clientWidth),
                                document.body.removeChild(e)),
                            m.scrollbarSize
                        );
                    },
                }),
                modules: [],
                open: function (e, t) {
                    return (
                        r(),
                        ((e = e ? l.extend(!0, {}, e) : {}).isObj = !0),
                        (e.index = t || 0),
                        this.instance.open(e)
                    );
                },
                close: function () {
                    return (
                        l.magnificPopup.instance &&
                        l.magnificPopup.instance.close()
                    );
                },
                registerModule: function (e, t) {
                    t.options && (l.magnificPopup.defaults[e] = t.options),
                        l.extend(this.proto, t.proto),
                        this.modules.push(e);
                },
                defaults: {
                    disableOn: 0,
                    key: null,
                    midClick: !1,
                    mainClass: "",
                    preloader: !0,
                    focus: "",
                    closeOnContentClick: !1,
                    closeOnBgClick: !0,
                    closeBtnInside: !0,
                    showCloseBtn: !0,
                    enableEscapeKey: !0,
                    modal: !1,
                    alignTop: !1,
                    removalDelay: 0,
                    prependTo: null,
                    fixedContentPos: "auto",
                    fixedBgPos: "auto",
                    overflowY: "auto",
                    closeMarkup:
                        '<button title="%title%" type="button" class="mfp-close">&times;</button>',
                    tClose: "Close (Esc)",
                    tLoading: "Loading...",
                },
            }),
            (l.fn.magnificPopup = function (e) {
                r();
                var t,
                    n,
                    i,
                    o = l(this);
                return (
                    "string" == typeof e
                        ? "open" === e
                            ? ((t = k
                                  ? o.data("magnificPopup")
                                  : o[0].magnificPopup),
                              (n = parseInt(arguments[1], 10) || 0),
                              (i = t.items
                                  ? t.items[n]
                                  : ((i = o),
                                    (i = t.delegate
                                        ? i.find(t.delegate)
                                        : i).eq(n))),
                              m._openClick({ mfpEl: i }, o, t))
                            : m.isOpen &&
                              m[e].apply(
                                  m,
                                  Array.prototype.slice.call(arguments, 1)
                              )
                        : ((e = l.extend(!0, {}, e)),
                          k
                              ? o.data("magnificPopup", e)
                              : (o[0].magnificPopup = e),
                          m.addGroup(o, e)),
                    o
                );
            }),
            "inline"),
        _ =
            (l.magnificPopup.registerModule(S, {
                options: {
                    hiddenClass: "hide",
                    markup: "",
                    tNotFound: "Content not found",
                },
                proto: {
                    initInline: function () {
                        m.types.push(S),
                            d(y + "." + S, function () {
                                L();
                            });
                    },
                    getInline: function (e, t) {
                        var n, i, o;
                        return (
                            L(),
                            e.src
                                ? ((n = m.st.inline),
                                  (i = l(e.src)).length
                                      ? ((o = i[0].parentNode) &&
                                            o.tagName &&
                                            (c ||
                                                ((s = n.hiddenClass),
                                                (c = u(s)),
                                                (s = "mfp-" + s)),
                                            (v = i
                                                .after(c)
                                                .detach()
                                                .removeClass(s))),
                                        m.updateStatus("ready"))
                                      : (m.updateStatus("error", n.tNotFound),
                                        (i = l("<div>"))),
                                  (e.inlineElement = i))
                                : (m.updateStatus("ready"),
                                  m._parseMarkup(t, {}, e),
                                  t)
                        );
                    },
                },
            }),
            "ajax");
    l.magnificPopup.registerModule(_, {
        options: {
            settings: null,
            cursor: "mfp-ajax-cur",
            tError: '<a href="%url%">The content</a> could not be loaded.',
        },
        proto: {
            initAjax: function () {
                m.types.push(_),
                    (t = m.st.ajax.cursor),
                    d(y + "." + _, F),
                    d("BeforeChange." + _, F);
            },
            getAjax: function (i) {
                t && l(document.body).addClass(t), m.updateStatus("loading");
                var e = l.extend(
                    {
                        url: i.src,
                        success: function (e, t, n) {
                            e = { data: e, xhr: n };
                            p("ParseAjax", e),
                                m.appendContent(l(e.data), _),
                                (i.finished = !0),
                                o(),
                                m._setFocus(),
                                setTimeout(function () {
                                    m.wrap.addClass(I);
                                }, 16),
                                m.updateStatus("ready"),
                                p("AjaxContentAdded");
                        },
                        error: function () {
                            o(),
                                (i.finished = i.loadError = !0),
                                m.updateStatus(
                                    "error",
                                    m.st.ajax.tError.replace("%url%", i.src)
                                );
                        },
                    },
                    m.st.ajax.settings
                );
                return (m.req = l.ajax(e)), "";
            },
        },
    });
    var E;
    l.magnificPopup.registerModule("image", {
        options: {
            markup: '<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>',
            cursor: "mfp-zoom-out-cur",
            titleSrc: "title",
            verticalFit: !0,
            tError: '<a href="%url%">The image</a> could not be loaded.',
        },
        proto: {
            initImage: function () {
                var e = m.st.image,
                    t = ".image";
                m.types.push("image"),
                    d(w + t, function () {
                        "image" === m.currItem.type &&
                            e.cursor &&
                            l(document.body).addClass(e.cursor);
                    }),
                    d(y + t, function () {
                        e.cursor && l(document.body).removeClass(e.cursor),
                            T.off("resize" + b);
                    }),
                    d("Resize" + t, m.resizeImage),
                    m.isLowIE && d("AfterChange", m.resizeImage);
            },
            resizeImage: function () {
                var e,
                    t = m.currItem;
                t &&
                    t.img &&
                    m.st.image.verticalFit &&
                    ((e = 0),
                    m.isLowIE &&
                        (e =
                            parseInt(t.img.css("padding-top"), 10) +
                            parseInt(t.img.css("padding-bottom"), 10)),
                    t.img.css("max-height", m.wH - e));
            },
            _onImageHasSize: function (e) {
                e.img &&
                    ((e.hasSize = !0),
                    E && clearInterval(E),
                    (e.isCheckingImgSize = !1),
                    p("ImageHasSize", e),
                    e.imgHidden &&
                        (m.content && m.content.removeClass("mfp-loading"),
                        (e.imgHidden = !1)));
            },
            findImageSize: function (t) {
                function n(e) {
                    E && clearInterval(E),
                        (E = setInterval(function () {
                            0 < o.naturalWidth
                                ? m._onImageHasSize(t)
                                : (200 < i && clearInterval(E),
                                  3 === ++i
                                      ? n(10)
                                      : 40 === i
                                      ? n(50)
                                      : 100 === i && n(500));
                        }, e));
                }
                var i = 0,
                    o = t.img[0];
                n(1);
            },
            getImage: function (e, t) {
                function n() {
                    e &&
                        (e.img[0].complete
                            ? (e.img.off(".mfploader"),
                              e === m.currItem &&
                                  (m._onImageHasSize(e),
                                  m.updateStatus("ready")),
                              (e.hasSize = !0),
                              (e.loaded = !0),
                              p("ImageLoadComplete"))
                            : ++r < 200
                            ? setTimeout(n, 100)
                            : i());
                }
                function i() {
                    e &&
                        (e.img.off(".mfploader"),
                        e === m.currItem &&
                            (m._onImageHasSize(e),
                            m.updateStatus(
                                "error",
                                a.tError.replace("%url%", e.src)
                            )),
                        (e.hasSize = !0),
                        (e.loaded = !0),
                        (e.loadError = !0));
                }
                var o,
                    r = 0,
                    a = m.st.image,
                    s = t.find(".mfp-img");
                return (
                    s.length &&
                        (((o = document.createElement("img")).className =
                            "mfp-img"),
                        e.el &&
                            e.el.find("img").length &&
                            (o.alt = e.el.find("img").attr("alt")),
                        (e.img = l(o)
                            .on("load.mfploader", n)
                            .on("error.mfploader", i)),
                        (o.src = e.src),
                        s.is("img") && (e.img = e.img.clone()),
                        0 < (o = e.img[0]).naturalWidth
                            ? (e.hasSize = !0)
                            : o.width || (e.hasSize = !1)),
                    m._parseMarkup(
                        t,
                        {
                            title: (function (e) {
                                if (e.data && void 0 !== e.data.title)
                                    return e.data.title;
                                var t = m.st.image.titleSrc;
                                if (t) {
                                    if ("function" == typeof t)
                                        return t.call(m, e);
                                    if (e.el) return e.el.attr(t) || "";
                                }
                                return "";
                            })(e),
                            img_replaceWith: e.img,
                        },
                        e
                    ),
                    m.resizeImage(),
                    e.hasSize
                        ? (E && clearInterval(E),
                          e.loadError
                              ? (t.addClass("mfp-loading"),
                                m.updateStatus(
                                    "error",
                                    a.tError.replace("%url%", e.src)
                                ))
                              : (t.removeClass("mfp-loading"),
                                m.updateStatus("ready")))
                        : (m.updateStatus("loading"),
                          (e.loading = !0),
                          e.hasSize ||
                              ((e.imgHidden = !0),
                              t.addClass("mfp-loading"),
                              m.findImageSize(e))),
                    t
                );
            },
        },
    });
    function P(e) {
        var t;
        m.currTemplate[A] &&
            (t = m.currTemplate[A].find("iframe")).length &&
            (e || (t[0].src = "//about:blank"),
            m.isIE8 && t.css("display", e ? "block" : "none"));
    }
    function z(e) {
        var t = m.items.length;
        return t - 1 < e ? e - t : e < 0 ? t + e : e;
    }
    function Z(e, t, n) {
        return e.replace(/%curr%/gi, t + 1).replace(/%total%/gi, n);
    }
    l.magnificPopup.registerModule("zoom", {
        options: {
            enabled: !1,
            easing: "ease-in-out",
            duration: 300,
            opener: function (e) {
                return e.is("img") ? e : e.find("img");
            },
        },
        proto: {
            initZoom: function () {
                var e,
                    t,
                    n,
                    i,
                    o,
                    r,
                    a = m.st.zoom,
                    s = ".zoom";
                a.enabled &&
                    m.supportsTransition &&
                    ((t = a.duration),
                    (n = function (e) {
                        var e = e
                                .clone()
                                .removeAttr("style")
                                .removeAttr("class")
                                .addClass("mfp-animated-image"),
                            t = "all " + a.duration / 1e3 + "s " + a.easing,
                            n = {
                                position: "fixed",
                                zIndex: 9999,
                                left: 0,
                                top: 0,
                                "-webkit-backface-visibility": "hidden",
                            },
                            i = "transition";
                        return (
                            (n["-webkit-" + i] =
                                n["-moz-" + i] =
                                n["-o-" + i] =
                                n[i] =
                                    t),
                            e.css(n),
                            e
                        );
                    }),
                    (i = function () {
                        m.content.css("visibility", "visible");
                    }),
                    d("BuildControls" + s, function () {
                        m._allowZoom() &&
                            (clearTimeout(o),
                            m.content.css("visibility", "hidden"),
                            (e = m._getItemToZoom())
                                ? ((r = n(e)).css(m._getOffset()),
                                  m.wrap.append(r),
                                  (o = setTimeout(function () {
                                      r.css(m._getOffset(!0)),
                                          (o = setTimeout(function () {
                                              i(),
                                                  setTimeout(function () {
                                                      r.remove(),
                                                          (e = r = null),
                                                          p(
                                                              "ZoomAnimationEnded"
                                                          );
                                                  }, 16);
                                          }, t));
                                  }, 16)))
                                : i());
                    }),
                    d(N + s, function () {
                        if (m._allowZoom()) {
                            if (
                                (clearTimeout(o), (m.st.removalDelay = t), !e)
                            ) {
                                if (!(e = m._getItemToZoom())) return;
                                r = n(e);
                            }
                            r.css(m._getOffset(!0)),
                                m.wrap.append(r),
                                m.content.css("visibility", "hidden"),
                                setTimeout(function () {
                                    r.css(m._getOffset());
                                }, 16);
                        }
                    }),
                    d(y + s, function () {
                        m._allowZoom() && (i(), r && r.remove(), (e = null));
                    }));
            },
            _allowZoom: function () {
                return "image" === m.currItem.type;
            },
            _getItemToZoom: function () {
                return !!m.currItem.hasSize && m.currItem.img;
            },
            _getOffset: function (e) {
                var e = e
                        ? m.currItem.img
                        : m.st.zoom.opener(m.currItem.el || m.currItem),
                    t = e.offset(),
                    n = parseInt(e.css("padding-top"), 10),
                    i = parseInt(e.css("padding-bottom"), 10),
                    e =
                        ((t.top -= l(window).scrollTop() - n),
                        {
                            width: e.width(),
                            height:
                                (k ? e.innerHeight() : e[0].offsetHeight) -
                                i -
                                n,
                        });
                return (
                    (O =
                        void 0 === O
                            ? void 0 !==
                              document.createElement("p").style.MozTransform
                            : O)
                        ? (e["-moz-transform"] = e.transform =
                              "translate(" + t.left + "px," + t.top + "px)")
                        : ((e.left = t.left), (e.top = t.top)),
                    e
                );
            },
        },
    });
    var O,
        M,
        B,
        A = "iframe",
        H =
            (l.magnificPopup.registerModule(A, {
                options: {
                    markup: '<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',
                    srcAction: "iframe_src",
                    patterns: {
                        youtube: {
                            index: "youtube.com",
                            id: "v=",
                            src: "//www.youtube.com/embed/%id%?autoplay=1",
                        },
                        vimeo: {
                            index: "vimeo.com/",
                            id: "/",
                            src: "//player.vimeo.com/video/%id%?autoplay=1",
                        },
                        gmaps: {
                            index: "//maps.google.",
                            src: "%id%&output=embed",
                        },
                    },
                },
                proto: {
                    initIframe: function () {
                        m.types.push(A),
                            d("BeforeChange", function (e, t, n) {
                                t !== n && (t === A ? P() : n === A && P(!0));
                            }),
                            d(y + "." + A, function () {
                                P();
                            });
                    },
                    getIframe: function (e, t) {
                        var n = e.src,
                            i = m.st.iframe,
                            o =
                                (l.each(i.patterns, function () {
                                    if (-1 < n.indexOf(this.index))
                                        return (
                                            this.id &&
                                                (n =
                                                    "string" == typeof this.id
                                                        ? n.substr(
                                                              n.lastIndexOf(
                                                                  this.id
                                                              ) +
                                                                  this.id
                                                                      .length,
                                                              n.length
                                                          )
                                                        : this.id.call(
                                                              this,
                                                              n
                                                          )),
                                            (n = this.src.replace("%id%", n)),
                                            !1
                                        );
                                }),
                                {});
                        return (
                            i.srcAction && (o[i.srcAction] = n),
                            m._parseMarkup(t, o, e),
                            m.updateStatus("ready"),
                            t
                        );
                    },
                },
            }),
            l.magnificPopup.registerModule("gallery", {
                options: {
                    enabled: !1,
                    arrowMarkup:
                        '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
                    preload: [0, 2],
                    navigateByImgClick: !0,
                    arrows: !0,
                    tPrev: "Previous (Left arrow key)",
                    tNext: "Next (Right arrow key)",
                    tCounter: "%curr% of %total%",
                },
                proto: {
                    initGallery: function () {
                        var r = m.st.gallery,
                            e = ".mfp-gallery",
                            i = Boolean(l.fn.mfpFastClick);
                        if (((m.direction = !0), !r || !r.enabled)) return !1;
                        (h += " mfp-gallery"),
                            d(w + e, function () {
                                r.navigateByImgClick &&
                                    m.wrap.on(
                                        "click" + e,
                                        ".mfp-img",
                                        function () {
                                            if (1 < m.items.length)
                                                return m.next(), !1;
                                        }
                                    ),
                                    g.on("keydown" + e, function (e) {
                                        37 === e.keyCode
                                            ? m.prev()
                                            : 39 === e.keyCode && m.next();
                                    });
                            }),
                            d("UpdateStatus" + e, function (e, t) {
                                t.text &&
                                    (t.text = Z(
                                        t.text,
                                        m.currItem.index,
                                        m.items.length
                                    ));
                            }),
                            d(C + e, function (e, t, n, i) {
                                var o = m.items.length;
                                n.counter =
                                    1 < o ? Z(r.tCounter, i.index, o) : "";
                            }),
                            d("BuildControls" + e, function () {
                                var e, t, n;
                                1 < m.items.length &&
                                    r.arrows &&
                                    !m.arrowLeft &&
                                    ((t = r.arrowMarkup),
                                    (e = m.arrowLeft =
                                        l(
                                            t
                                                .replace(/%title%/gi, r.tPrev)
                                                .replace(/%dir%/gi, "left")
                                        ).addClass(x)),
                                    (t = m.arrowRight =
                                        l(
                                            t
                                                .replace(/%title%/gi, r.tNext)
                                                .replace(/%dir%/gi, "right")
                                        ).addClass(x)),
                                    e[(n = i ? "mfpFastClick" : "click")](
                                        function () {
                                            m.prev();
                                        }
                                    ),
                                    t[n](function () {
                                        m.next();
                                    }),
                                    m.isIE7 &&
                                        (u("b", e[0], !1, !0),
                                        u("a", e[0], !1, !0),
                                        u("b", t[0], !1, !0),
                                        u("a", t[0], !1, !0)),
                                    m.container.append(e.add(t)));
                            }),
                            d(W + e, function () {
                                m._preloadTimeout &&
                                    clearTimeout(m._preloadTimeout),
                                    (m._preloadTimeout = setTimeout(
                                        function () {
                                            m.preloadNearbyImages(),
                                                (m._preloadTimeout = null);
                                        },
                                        16
                                    ));
                            }),
                            d(y + e, function () {
                                g.off(e),
                                    m.wrap.off("click" + e),
                                    m.arrowLeft &&
                                        i &&
                                        m.arrowLeft
                                            .add(m.arrowRight)
                                            .destroyMfpFastClick(),
                                    (m.arrowRight = m.arrowLeft = null);
                            });
                    },
                    next: function () {
                        (m.direction = !0),
                            (m.index = z(m.index + 1)),
                            m.updateItemHTML();
                    },
                    prev: function () {
                        (m.direction = !1),
                            (m.index = z(m.index - 1)),
                            m.updateItemHTML();
                    },
                    goTo: function (e) {
                        (m.direction = e >= m.index),
                            (m.index = e),
                            m.updateItemHTML();
                    },
                    preloadNearbyImages: function () {
                        for (
                            var e = m.st.gallery.preload,
                                t = Math.min(e[0], m.items.length),
                                n = Math.min(e[1], m.items.length),
                                i = 1;
                            i <= (m.direction ? n : t);
                            i++
                        )
                            m._preloadItem(m.index + i);
                        for (i = 1; i <= (m.direction ? t : n); i++)
                            m._preloadItem(m.index - i);
                    },
                    _preloadItem: function (e) {
                        var t;
                        (e = z(e)),
                            m.items[e].preloaded ||
                                ((t = m.items[e]).parsed || (t = m.parseEl(e)),
                                p("LazyLoad", t),
                                "image" === t.type &&
                                    (t.img = l('<img class="mfp-img" />')
                                        .on("load.mfploader", function () {
                                            t.hasSize = !0;
                                        })
                                        .on("error.mfploader", function () {
                                            (t.hasSize = !0),
                                                (t.loadError = !0),
                                                p("LazyLoadError", t);
                                        })
                                        .attr("src", t.src)),
                                (t.preloaded = !0));
                    },
                },
            }),
            "retina");
    function q() {
        T.off("touchmove" + B + " touchend" + B);
    }
    l.magnificPopup.registerModule(H, {
        options: {
            replaceSrc: function (e) {
                return e.src.replace(/\.\w+$/, function (e) {
                    return "@2x" + e;
                });
            },
            ratio: 1,
        },
        proto: {
            initRetina: function () {
                var n, i;
                1 < window.devicePixelRatio &&
                    ((n = m.st.retina),
                    (i = n.ratio),
                    1 < (i = isNaN(i) ? i() : i) &&
                        (d("ImageHasSize." + H, function (e, t) {
                            t.img.css({
                                "max-width": t.img[0].naturalWidth / i,
                                width: "100%",
                            });
                        }),
                        d("ElementParse." + H, function (e, t) {
                            t.src = n.replaceSrc(t, i);
                        })));
            },
        },
    }),
        (M = "ontouchstart" in window),
        (B = ".mfpFastClick"),
        (l.fn.mfpFastClick = function (c) {
            return l(this).each(function () {
                var t,
                    n,
                    i,
                    o,
                    r,
                    a,
                    s,
                    e = l(this);
                M &&
                    e.on("touchstart" + B, function (e) {
                        (r = !1),
                            (s = 1),
                            (a = (e.originalEvent || e).touches[0]),
                            (i = a.clientX),
                            (o = a.clientY),
                            T.on("touchmove" + B, function (e) {
                                (a = (e.originalEvent || e).touches),
                                    (s = a.length),
                                    (a = a[0]),
                                    (10 < Math.abs(a.clientX - i) ||
                                        10 < Math.abs(a.clientY - o)) &&
                                        ((r = !0), q());
                            }).on("touchend" + B, function (e) {
                                q(),
                                    r ||
                                        1 < s ||
                                        ((t = !0),
                                        e.preventDefault(),
                                        clearTimeout(n),
                                        (n = setTimeout(function () {
                                            t = !1;
                                        }, 1e3)),
                                        c());
                            });
                    }),
                    e.on("click" + B, function () {
                        t || c();
                    });
            });
        }),
        (l.fn.destroyMfpFastClick = function () {
            l(this).off("touchstart" + B + " click" + B),
                M && T.off("touchmove" + B + " touchend" + B);
        }),
        r();
});

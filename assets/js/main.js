var GLOBAL = this;
function randomVersion() {
    return "?v=" + Math.round(999999 * Math.random())
}
"undefined" == typeof path_resource && (path_resource = "");
var path_resource = themeData.direc_url;
var globalCssList = [path_resource + "css/pure.css", path_resource + "css/helper.css", path_resource + "css/sweetalert2.css", path_resource + "js/plugins/nanoscroller/nanoscroller.css"],
    globalJsList = [path_resource + "js/libraries/jquery.min.js",
        path_resource + "js/plugins/crismaster/crismaster.min.js",
        path_resource + "js/plugins/digitop/helper.js",
        path_resource + "js/plugins/digitop/popup.js",
        path_resource + "js/plugins/digitop/preloader.js",
        path_resource + "js/plugins/slick/slick.js",
        path_resource + "js/plugins/nanoscroller/jquery.nanoscroller.min.js",
        path_resource + "js/plugins/scrollmagic/ScrollMagic.min.js",
        path_resource + "js/plugins/scrollmagic/plugins/animation.gsap.min.js",
        path_resource + "js/plugins/scrollmagic/plugins/debug.addIndicators.min.js",
        path_resource + "js/modules/common.js"],
    GLoader = {
        version: 1.2,
        loadScript: function(e, s) {
            var t = !1,
                r = e.indexOf(".js") > -1 ? "js" : "css",
                o = {
                    status: !1,
                    message: ""
                },
                a = "js" == r ? document.createElement("script") : document.createElement("link");
            function n() {
                t || (t = !0, o.status = !0, o.message = "Script was loaded successfully", s && s(o))
            }
            a.setAttribute("data-loader", "GLoader"), "js" == r ? (a.setAttribute("type", "text/javascript"), a.setAttribute("src", e + randomVersion())) : (a.setAttribute("rel", "stylesheet"), a.setAttribute("type", "text/css"), a.setAttribute("href", e)), a.onload = n, a.onreadystatechange = function() {
                t || "complete" === a.readyState && n()
            }, a.onerror = function() {
                t || (t = !0, o.status = !1, o.message = "Failed to load script.", s && s(o))
            }, "js" == r ? document.body.appendChild(a) : document.head.appendChild(a)
        },
        isExisted: function(e) {
            for (var s = document.getElementsByTagName("script"), t = !1, r = 0; r < s.length; r++)
                if (s[r].src) {
                    var o = s[r].src;
                    String(o).toLowerCase().indexOf(e.toLowerCase()) >= 0 && (t = !0)
                }
            return t
        },
        loadScripts: function(e, s) {
            var t = 0,
                r = e.length;
            this.loadScript(e[t], function o(a) {
                t++;
                t == r ? (a.status = !0, a.message = "All scripts were loaded.", s && s(a)) : (GLoader.isExisted(e[t]), GLoader.loadScript(e[t], o))
            })
        },
        loadPhoto: function(e, s, t) {
            var r = new Image;
            r.onload = function() {
                void 0 !== t && t(e)
            }, r.onerror = function() {
                void 0 !== t && t(null)
            }, r.src = e
        },
        loadPhotos: function(e, s, t) {
            var r = e,
                o = 0,
                a = r.length,
                n = {
                    status: !1,
                    message: ""
                },
                i = [],
                c = r[o];
            this.loadPhoto(c, s, function e(l) {
                o++;
                o == a ? (n.status = !0, n.message = "All photos were loaded.", n.photos = i, t && t(n)) : (i.push(l), c = r[o], GLoader.loadPhoto(c, s, e))
            })
        }
    };

function lazyLoadAll() {
    for (var e = document.getElementsByTagName("img"), s = 0; s < e.length; s++) e[s].getAttribute("data-src") && e[s].setAttribute("src", e[s].getAttribute("data-src"))
}
var MAIN = {
    init: function() {
        lazyLoadAll();
        var e = [];
        globalCssList.forEach(function(s) {
            e.push(s)
        }), globalJsList.forEach(function(s) {
            e.push(s)
        }), GLoader.loadScripts(e, function(e) {
            var s = document.getElementsByTagName("main")[0];
            if (s) {
                var t = s.getAttribute("id");
                t && GLoader.loadScript(path_resource + "js/pages/" + t + ".js", function(e) {
                    GLOBAL[t] && void 0 !== GLOBAL[t].init && GLOBAL[t].init()
                })
            }
        })
    }
};
MAIN.init();
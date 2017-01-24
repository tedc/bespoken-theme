(function(t) {
    "use strict";
    var n = "undefined" != typeof e && e.exports && "undefined" != typeof t ? t : window;
    !function(t) {
        var e = t.GreenSockGlobals || t,
            n = function(t) {
                var n,
                    i = t.split("."),
                    r = e;
                for (n = 0; n < i.length; n++)
                    r[i[n]] = r = r[i[n]] || {};
                return r
            },
            i = n("com.greensock.utils"),
            r = function w(t) {
                var e = t.nodeType,
                    n = "";
                if (1 === e || 9 === e || 11 === e) {
                    if ("string" == typeof t.textContent)
                        return t.textContent;
                    for (t = t.firstChild; t; t = t.nextSibling)
                        n += w(t)
                } else if (3 === e || 4 === e)
                    return t.nodeValue;
                return n
            },
            o = document,
            s = o.defaultView ? o.defaultView.getComputedStyle : function() {},
            a = /([A-Z])/g,
            l = function(t, e, n, i) {
                var r;
                return (n = n || s(t, null)) ? (t = n.getPropertyValue(e.replace(a, "-$1").toLowerCase()), r = t || n.length ? t : n[e]) : t.currentStyle && (n = t.currentStyle, r = n[e]), i ? r : parseInt(r, 10) || 0
            },
            u = function(t) {
                return !!(t.length && t[0] && (t[0].nodeType && t[0].style && !t.nodeType || t[0].length && t[0][0]))
            },
            c = function(t) {
                var e,
                    n,
                    i,
                    r = [],
                    o = t.length;
                for (e = 0; e < o; e++)
                    if (n = t[e], u(n))
                        for (i = n.length, i = 0; i < n.length; i++)
                            r.push(n[i]);
                    else
                        r.push(n);
                return r
            },
            h = ")eefec303079ad17405c",
            f = /(?:<br>|<br\/>|<br \/>)/gi,
            p = o.all && !o.addEventListener,
            d = "<div style='position:relative;display:inline-block;" + (p ? "*display:inline;*zoom:1;'" : "'"),
            m = function(t) {
                t = t || "";
                var e = t.indexOf("++") !== -1,
                    n = 1;
                return e && (t = t.split("++").join("")), function() {
                    return d + (t ? " class='" + t + (e ? n++ : "") + "'>" : ">")
                }
            },
            v = i.SplitText = e.SplitText = function(t, e) {
                if ("string" == typeof t && (t = v.selector(t)), !t)
                    throw "cannot split a null element.";
                this.elements = u(t) ? c(t) : [t], this.chars = [], this.words = [], this.lines = [], this._originals = [], this.vars = e || {}, this.split(e)
            },
            g = function x(t, e, n) {
                var i = t.nodeType;
                if (1 === i || 9 === i || 11 === i)
                    for (t = t.firstChild; t; t = t.nextSibling)
                        x(t, e, n);
                else
                    3 !== i && 4 !== i || (t.nodeValue = t.nodeValue.split(e).join(n))
            },
            y = function(t, e) {
                for (var n = e.length; --n > -1;)
                    t.push(e[n])
            },
            _ = function(t, e, n, i, a) {
                f.test(t.innerHTML) && (t.innerHTML = t.innerHTML.replace(f, h));
                var u,
                    c,
                    p,
                    d,
                    v,
                    _,
                    b,
                    w,
                    x,
                    T,
                    k,
                    j,
                    O,
                    C,
                    E = r(t),
                    P = e.type || e.split || "chars,words,lines",
                    S = P.indexOf("lines") !== -1 ? [] : null,
                    A = P.indexOf("words") !== -1,
                    M = P.indexOf("chars") !== -1,
                    R = "absolute" === e.position || e.absolute === !0,
                    D = R ? "&#173; " : " ",
                    I = -999,
                    N = s(t),
                    L = l(t, "paddingLeft", N),
                    F = l(t, "borderBottomWidth", N) + l(t, "borderTopWidth", N),
                    B = l(t, "borderLeftWidth", N) + l(t, "borderRightWidth", N),
                    z = l(t, "paddingTop", N) + l(t, "paddingBottom", N),
                    H = l(t, "paddingLeft", N) + l(t, "paddingRight", N),
                    X = l(t, "textAlign", N, !0),
                    q = t.clientHeight,
                    V = t.clientWidth,
                    Y = "</div>",
                    W = m(e.wordsClass),
                    U = m(e.charsClass),
                    $ = (e.linesClass || "").indexOf("++") !== -1,
                    G = e.linesClass,
                    K = E.indexOf("<") !== -1,
                    Q = !0,
                    Z = [],
                    J = [],
                    tt = [];
                for ($ && (G = G.split("++").join("")), K && (E = E.split("<").join("{{LT}}")), u = E.length, d = W(), v = 0; v < u; v++)
                    if (b = E.charAt(v), ")" === b && E.substr(v, 20) === h)
                        d += (Q ? Y : "") + "<BR/>", Q = !1, v !== u - 20 && E.substr(v + 20, 20) !== h && (d += " " + W(), Q = !0), v += 19;
                    else if (" " === b && " " !== E.charAt(v - 1) && v !== u - 1 && E.substr(v - 20, 20) !== h) {
                        for (d += Q ? Y : "", Q = !1; " " === E.charAt(v + 1);)
                            d += D, v++;
                        ")" === E.charAt(v + 1) && E.substr(v + 1, 20) === h || (d += D + W(), Q = !0)
                    } else
                        "{" === b && "{{LT}}" === E.substr(v, 6) ? (d += M ? U() + "{{LT}}</div>" : "{{LT}}", v += 5) : d += M && " " !== b ? U() + b + "</div>" : b;
                for (t.innerHTML = d + (Q ? Y : ""), K && g(t, "{{LT}}", "<"), _ = t.getElementsByTagName("*"), u = _.length, w = [], v = 0; v < u; v++)
                    w[v] = _[v];
                if (S || R)
                    for (v = 0; v < u; v++)
                        x = w[v], p = x.parentNode === t, (p || R || M && !A) && (T = x.offsetTop, S && p && T !== I && "BR" !== x.nodeName && (c = [], S.push(c), I = T), R && (x._x = x.offsetLeft, x._y = T, x._w = x.offsetWidth, x._h = x.offsetHeight), S && (A !== p && M || (c.push(x), x._x -= L), p && v && (w[v - 1]._wordEnd = !0), "BR" === x.nodeName && x.nextSibling && "BR" === x.nextSibling.nodeName && S.push([])));
                for (v = 0; v < u; v++)
                    x = w[v], p = x.parentNode === t, "BR" !== x.nodeName ? (R && (j = x.style, A || p || (x._x += x.parentNode._x, x._y += x.parentNode._y), j.left = x._x + "px", j.top = x._y + "px", j.position = "absolute", j.display = "block", j.width = x._w + 1 + "px", j.height = x._h + "px"), A ? p && "" !== x.innerHTML ? J.push(x) : M && Z.push(x) : p ? (t.removeChild(x), w.splice(v--, 1), u--) : !p && M && (T = !S && !R && x.nextSibling, t.appendChild(x), T || t.appendChild(o.createTextNode(" ")), Z.push(x))) : S || R ? (t.removeChild(x), w.splice(v--, 1), u--) : A || t.appendChild(x);
                if (S) {
                    for (R && (k = o.createElement("div"), t.appendChild(k), O = k.offsetWidth + "px", T = k.offsetParent === t ? 0 : t.offsetLeft, t.removeChild(k)), j = t.style.cssText, t.style.cssText = "display:none;"; t.firstChild;)
                        t.removeChild(t.firstChild);
                    for (C = !R || !A && !M, v = 0; v < S.length; v++) {
                        for (c = S[v], k = o.createElement("div"), k.style.cssText = "display:block;text-align:" + X + ";position:" + (R ? "absolute;" : "relative;"), G && (k.className = G + ($ ? v + 1 : "")), tt.push(k), u = c.length, _ = 0; _ < u; _++)
                            "BR" !== c[_].nodeName && (x = c[_], k.appendChild(x), C && (x._wordEnd || A) && k.appendChild(o.createTextNode(" ")), R && (0 === _ && (k.style.top = x._y + "px", k.style.left = L + T + "px"), x.style.top = "0px", T && (x.style.left = x._x - T + "px")));
                        0 === u && (k.innerHTML = "&nbsp;"), A || M || (k.innerHTML = r(k).split(String.fromCharCode(160)).join(" ")), R && (k.style.width = O, k.style.height = x._h + "px"), t.appendChild(k)
                    }
                    t.style.cssText = j
                }
                R && (q > t.clientHeight && (t.style.height = q - z + "px", t.clientHeight < q && (t.style.height = q + F + "px")), V > t.clientWidth && (t.style.width = V - H + "px", t.clientWidth < V && (t.style.width = V + B + "px"))), y(n, Z), y(i, J), y(a, tt)
            },
            b = v.prototype;
        b.split = function(t) {
            this.isSplit && this.revert(), this.vars = t || this.vars, this._originals.length = this.chars.length = this.words.length = this.lines.length = 0;
            for (var e = this.elements.length; --e > -1;)
                this._originals[e] = this.elements[e].innerHTML, _(this.elements[e], this.vars, this.chars, this.words, this.lines);
            return this.chars.reverse(), this.words.reverse(), this.lines.reverse(), this.isSplit = !0, this
        }, b.revert = function() {
            if (!this._originals)
                throw "revert() call wasn't scoped properly.";
            for (var t = this._originals.length; --t > -1;)
                this.elements[t].innerHTML = this._originals[t];
            return this.chars = [], this.words = [], this.lines = [], this.isSplit = !1, this
        }, v.selector = t.$ || t.jQuery || function(e) {
            var n = t.$ || t.jQuery;
            return n ? (v.selector = n, n(e)) : "undefined" == typeof document ? e : document.querySelectorAll ? document.querySelectorAll(e) : document.getElementById("#" === e.charAt(0) ? e.substr(1) : e)
        }, v.version = "0.3.4"
    }(n), function(t) {
        var i = function() {
            return (n.GreenSockGlobals || n)[t]
        };
        "function" == typeof define && define.amd ? define(["TweenLite"], i) : "undefined" != typeof e && e.exports && (e.exports = i())
    }("SplitText")
}).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {});
var _gsScope = "undefined" != typeof module && module.exports && "undefined" != typeof global ? global : this || window;
!function(e) {
    "use strict";
    var t = e.GreenSockGlobals || e,
        i = function(e) {
            var i,
                n = e.split("."),
                r = t;
            for (i = 0; i < n.length; i++)
                r[n[i]] = r = r[n[i]] || {};
            return r
        },
        n = i("com.greensock.utils"),
        o = "SplitText",
        a = function(e) {
            var t = e.nodeType,
                i = "";
            if (1 === t || 9 === t || 11 === t) {
                if ("string" == typeof e.textContent)
                    return e.textContent;
                for (e = e.firstChild; e; e = e.nextSibling)
                    i += a(e)
            } else if (3 === t || 4 === t)
                return e.nodeValue;
            return i
        },
        h = document,
        p = h.defaultView ? h.defaultView.getComputedStyle : function() {},
        f = /([A-Z])/g,
        u = function(e, t, i, n) {
            var r;
            return (i = i || p(e, null)) ? (e = i.getPropertyValue(t.replace(f, "-$1").toLowerCase()), r = e || i.length ? e : i[t]) : e.currentStyle && (i = e.currentStyle, r = i[t]), n ? r : parseInt(r, 10) || 0
        },
        c = function(e) {
            return e.length && e[0] && (e[0].nodeType && e[0].style && !e.nodeType || e[0].length && e[0][0]) ? !0 : !1
        },
        g = function(e) {
            var t,
                i,
                n,
                r = [],
                o = e.length;
            for (t = 0; o > t; t++)
                if (i = e[t], c(i))
                    for (n = i.length, n = 0; n < i.length; n++)
                        r.push(i[n]);
                else
                    r.push(i);
            return r
        },
        C = /(?:\r|\n|\t\t)/g,
        S = /(?:\s\s+)/g,
        x = 55296,
        y = 56319,
        m = 56320,
        v = 127462,
        b = 127487,
        _ = 127995,
        T = 127999,
        N = function(e) {
            return (e.charCodeAt(0) - x << 10) + (e.charCodeAt(1) - m) + 65536
        },
        w = h.all && !h.addEventListener,
        A = " style='position:relative;display:inline-block;" + (w ? "*display:inline;*zoom:1;'" : "'"),
        L = function(e, t) {
            e = e || "";
            var i = -1 !== e.indexOf("++"),
                n = 1;
            return i && (e = e.split("++").join("")), function() {
                return "<" + t + A + (e ? " class='" + e + (i ? n++ : "") + "'>" : ">")
            }
        },
        B = n.SplitText = t.SplitText = function(t, i) {
            if ("string" == typeof t && (t = B.selector(t)), !t)
                throw "cannot split a null element.";
            this.elements = c(t) ? g(t) : [t], this.chars = [], this.words = [], this.lines = [], this._originals = [], this.vars = i || {}, void this.split(i)
        },
        O = function(e, t, i) {
            var n = e.nodeType;
            if (1 === n || 9 === n || 11 === n)
                for (e = e.firstChild; e; e = e.nextSibling)
                    O(e, t, i);
            else
                (3 === n || 4 === n) && (e.nodeValue = e.nodeValue.split(t).join(i))
        },
        V = function(e, t) {
            for (var i = t.length; --i > -1;)
                e.push(t[i])
        },
        W = function(e) {
            var t,
                i = [],
                n = e.length;
            for (t = 0; t !== n; i.push(e[t++]))
                ;
            return i
        },
        H = function(e, t, i) {
            for (var n; e && e !== t;) {
                if (n = e._next || e.nextSibling)
                    return n.textContent.charAt(0) === i;
                e = e.parentNode || e._parent
            }
            return !1
        },
        E = function(e) {
            var t,
                i,
                n = W(e.childNodes),
                r = n.length;
            for (t = 0; r > t; t++)
                i = n[t], i._isSplit ? E(i) : (t && 3 === i.previousSibling.nodeType ? i.previousSibling.nodeValue += 3 === i.nodeType ? i.nodeValue : i.firstChild.nodeValue : 3 !== i.nodeType && e.insertBefore(i.firstChild, i), e.removeChild(i))
        },
        k = function(e, t, i, n, r, o, s) {
            var l,
                d,
                a,
                f,
                c,
                g,
                C,
                S,
                x,
                y,
                m,
                v,
                b = p(e),
                _ = u(e, "paddingLeft", b),
                T = -999,
                N = u(e, "borderBottomWidth", b) + u(e, "borderTopWidth", b),
                w = u(e, "borderLeftWidth", b) + u(e, "borderRightWidth", b),
                A = u(e, "paddingTop", b) + u(e, "paddingBottom", b),
                L = u(e, "paddingLeft", b) + u(e, "paddingRight", b),
                B = .2 * u(e, "fontSize"),
                W = u(e, "textAlign", b, !0),
                k = [],
                R = [],
                j = [],
                M = t.wordDelimiter || " ",
                G = t.span ? "span" : "div",
                $ = t.type || t.split || "chars,words,lines",
                q = r && -1 !== $.indexOf("lines") ? [] : null,
                z = -1 !== $.indexOf("words"),
                D = -1 !== $.indexOf("chars"),
                F = "absolute" === t.position || t.absolute === !0,
                I = t.linesClass,
                P = -1 !== (I || "").indexOf("++"),
                Q = [];
            for (q && 1 === e.children.length && e.children[0]._isSplit && (e = e.children[0]), P && (I = I.split("++").join("")), d = e.getElementsByTagName("*"), a = d.length, c = [], l = 0; a > l; l++)
                c[l] = d[l];
            if (q || F)
                for (l = 0; a > l; l++)
                    f = c[l], g = f.parentNode === e, (g || F || D && !z) && (v = f.offsetTop, q && g && Math.abs(v - T) > B && "BR" !== f.nodeName && (C = [], q.push(C), T = v), F && (f._x = f.offsetLeft, f._y = v, f._w = f.offsetWidth, f._h = f.offsetHeight), q && ((f._isSplit && g || !D && g || z && g || !z && f.parentNode.parentNode === e && !f.parentNode._isSplit) && (C.push(f), f._x -= _, H(f, e, M) && (f._wordEnd = !0)), "BR" === f.nodeName && f.nextSibling && "BR" === f.nextSibling.nodeName && q.push([])));
            for (l = 0; a > l; l++)
                f = c[l], g = f.parentNode === e, "BR" !== f.nodeName ? (F && (x = f.style, z || g || (f._x += f.parentNode._x, f._y += f.parentNode._y), x.left = f._x + "px", x.top = f._y + "px", x.position = "absolute", x.display = "block", x.width = f._w + 1 + "px", x.height = f._h + "px"), !z && D ? f._isSplit ? (f._next = f.nextSibling, f.parentNode.appendChild(f)) : f.parentNode._isSplit ? (f._parent = f.parentNode, !f.previousSibling && f.firstChild && (f.firstChild._isFirst = !0), f.nextSibling && " " === f.nextSibling.textContent && !f.nextSibling.nextSibling && Q.push(f.nextSibling), f._next = f.nextSibling && f.nextSibling._isFirst ? null : f.nextSibling, f.parentNode.removeChild(f), c.splice(l--, 1), a--) : g || (v = !f.nextSibling && H(f.parentNode, e, M), f.parentNode._parent && f.parentNode._parent.appendChild(f), v && f.parentNode.appendChild(h.createTextNode(" ")), t.span && (f.style.display = "inline"), k.push(f)) : f.parentNode._isSplit && !f._isSplit && "" !== f.innerHTML ? R.push(f) : D && !f._isSplit && (t.span && (f.style.display = "inline"), k.push(f))) : q || F ? (f.parentNode && f.parentNode.removeChild(f), c.splice(l--, 1), a--) : z || e.appendChild(f);
            for (l = Q.length; --l > -1;)
                Q[l].parentNode.removeChild(Q[l]);
            if (q) {
                for (F && (y = h.createElement(G), e.appendChild(y), m = y.offsetWidth + "px", v = y.offsetParent === e ? 0 : e.offsetLeft, e.removeChild(y)), x = e.style.cssText, e.style.cssText = "display:none;"; e.firstChild;)
                    e.removeChild(e.firstChild);
                for (S = " " === M && (!F || !z && !D), l = 0; l < q.length; l++) {
                    for (C = q[l], y = h.createElement(G), y.style.cssText = "display:block;text-align:" + W + ";position:" + (F ? "absolute;" : "relative;"), I && (y.className = I + (P ? l + 1 : "")), j.push(y), a = C.length, d = 0; a > d; d++)
                        "BR" !== C[d].nodeName && (f = C[d], y.appendChild(f), S && f._wordEnd && y.appendChild(h.createTextNode(" ")), F && (0 === d && (y.style.top = f._y + "px", y.style.left = _ + v + "px"), f.style.top = "0px", v && (f.style.left = f._x - v + "px")));
                    0 === a ? y.innerHTML = "&nbsp;" : z || D || (E(y), O(y, String.fromCharCode(160), " ")), F && (y.style.width = m, y.style.height = f._h + "px"), e.appendChild(y)
                }
                e.style.cssText = x
            }
            F && (s > e.clientHeight && (e.style.height = s - A + "px", e.clientHeight < s && (e.style.height = s + N + "px")), o > e.clientWidth && (e.style.width = o - L + "px", e.clientWidth < o && (e.style.width = o + w + "px"))), V(i, k), V(n, R), V(r, j)
        },
        R = function(e, t, i, n) {
            var r,
                o,
                s,
                l,
                d,
                p,
                f,
                u,
                c,
                g = t.span ? "span" : "div",
                m = t.type || t.split || "chars,words,lines",
                w = (-1 !== m.indexOf("words"), -1 !== m.indexOf("chars")),
                A = "absolute" === t.position || t.absolute === !0,
                L = t.wordDelimiter || " ",
                B = " " !== L ? "" : A ? "&#173; " : " ",
                V = t.span ? "</span>" : "</div>",
                W = !0,
                H = h.createElement("div"),
                E = e.parentNode;
            for (E.insertBefore(H, e), H.textContent = e.nodeValue, E.removeChild(e), e = H, r = a(e), f = -1 !== r.indexOf("<"), t.reduceWhiteSpace !== !1 && (r = r.replace(S, " ").replace(C, "")), f && (r = r.split("<").join("{{LT}}")), d = r.length, o = (" " === r.charAt(0) ? B : "") + i(), s = 0; d > s; s++)
                if (p = r.charAt(s), p === L && r.charAt(s - 1) !== L && s) {
                    for (o += W ? V : "", W = !1; r.charAt(s + 1) === L;)
                        o += B, s++;
                    s === d - 1 ? o += B : ")" !== r.charAt(s + 1) && (o += B + i(), W = !0)
                } else
                    "{" === p && "{{LT}}" === r.substr(s, 6) ? (o += w ? n() + "{{LT}}</" + g + ">" : "{{LT}}", s += 5) : p.charCodeAt(0) >= x && p.charCodeAt(0) <= y || r.charCodeAt(s + 1) >= 65024 && r.charCodeAt(s + 1) <= 65039 ? (u = N(r.substr(s, 2)), c = N(r.substr(s + 2, 2)), l = (v > u || u > b || v > c || c > b) && (_ > c || c > T) ? 2 : 4, o += w && " " !== p ? n() + r.substr(s, l) + "</" + g + ">" : r.substr(s, l), s += l - 1) : o += w && " " !== p ? n() + p + "</" + g + ">" : p;
            e.outerHTML = o + (W ? V : ""), f && O(E, "{{LT}}", "<")
        },
        j = function(e, t, i, n) {
            var r,
                o,
                s = W(e.childNodes),
                l = s.length,
                d = "absolute" === t.position || t.absolute === !0;
            if (3 !== e.nodeType || l > 1) {
                for (t.absolute = !1, r = 0; l > r; r++)
                    o = s[r], (3 !== o.nodeType || /\S+/.test(o.nodeValue)) && (d && 3 !== o.nodeType && "inline" === u(o, "display", null, !0) && (o.style.display = "inline-block", o.style.position = "relative"), o._isSplit = !0, j(o, t, i, n));
                return t.absolute = d, void (e._isSplit = !0)
            }
            R(e, t, i, n)
        },
        M = B.prototype;
    M.split = function(e) {
        this.isSplit && this.revert(), this.vars = e = e || this.vars, this._originals.length = this.chars.length = this.words.length = this.lines.length = 0;
        for (var t, i, n, r = this.elements.length, o = e.span ? "span" : "div", s = ("absolute" === e.position || e.absolute === !0, L(e.wordsClass, o)), l = L(e.charsClass, o); --r > -1;)
            n = this.elements[r], this._originals[r] = n.innerHTML, t = n.clientHeight, i = n.clientWidth, j(n, e, s, l), k(n, e, this.chars, this.words, this.lines, i, t);
        return this.chars.reverse(), this.words.reverse(), this.lines.reverse(), this.isSplit = !0, this
    }, M.revert = function() {
        if (!this._originals)
            throw "revert() call wasn't scoped properly.";
        for (var e = this._originals.length; --e > -1;)
            this.elements[e].innerHTML = this._originals[e];
        return this.chars = [], this.words = [], this.lines = [], this.isSplit = !1, this
    }, B.selector = e.$ || e.jQuery || function(t) {
        var i = e.$ || e.jQuery;
        return i ? (B.selector = i, i(t)) : "undefined" == typeof document ? t : document.querySelectorAll ? document.querySelectorAll(t) : document.getElementById("#" === t.charAt(0) ? t.substr(1) : t)
    }, B.version = "0.5.6"
}(_gsScope), function(e) {
    "use strict";
    var t = function() {
        return (_gsScope.GreenSockGlobals || _gsScope)[e]
    };
    "function" == typeof define && define.amd ? define([], t) : "undefined" != typeof module && module.exports && (module.exports = t())
}("SplitText");

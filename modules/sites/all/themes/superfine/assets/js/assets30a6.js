

//JQuery Twitter Feed. Coded by Tom Elliott @ www.webdevdoor.com (2013) based on https://twitter.com/javascripts/blogger.js
//Requires JSON output from authenticating script: http://www.webdevdoor.com/php/authenticating-twitter-feed-timeline-oauth/
/**
(function($) {
    $(document).ready(function() {
    function t(t) {
        return t = t.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(t) {
            return '<a href="' + t + '" >' + t + "</a>"
        }), t = t.replace(/\B@([_a-z0-9]+)/gi, function(t) {
            return '<a href="http://twitter.com/' + t.substring(1) + '" style="font-weight:lighter;" target="_blank">' + t.charAt(0) + t.substring(1) + "</a>"
        }), t = t.replace(/\B#([_a-z0-9]+)/gi, function(t) {
            return '<a href="https://twitter.com/search?q=' + t.substring(1) + '" style="font-weight:lighter;" target="_blank">' + t.charAt(0) + t.substring(1) + "</a>"
        })
    }

    function e(t) {
        var e = t.split(" ");
        t = e[1] + " " + e[2] + ", " + e[5] + " " + e[3];
        var i = Date.parse(t),
            r = arguments.length > 1 ? arguments[1] : new Date,
            a = parseInt((r.getTime() - i) / 1e3),
            n = t.substr(4, 2) + " " + t.substr(0, 3);
        return a += 60 * r.getTimezoneOffset(), 60 > a ? "1m" : 120 > a ? "1m" : 3600 > a ? parseInt(a / 60).toString() + "m" : 7200 > a ? "1h" : 86400 > a ? parseInt(a / 3600).toString() + "h" : 172800 > a ? n : n
    }
    var i = 10,
        r = !1,
        a = !0,
        n = !0,
        s = !1,
        o = !1,
        c = "",
        d = "";
    d += '<div id="loading-container"><img src="assets/images/ajax-loader.gif" alt="tweet loader" /></div>', $("#twitter-feed").html(c + d), $.getJSON("assets/php/get-tweets.php", function(d) {
        for (var p = "", w = 1, u = 0; u < d.length; u++) {
            var h = d[u].user.name,
                l = d[u].user.screen_name,
                f = d[u].user.profile_image_url_https,
                g = d[u].text,
                m = !1,
                v = !1,
                _ = d[u].id_str;
            "undefined" != typeof d[u].retweeted_status && (f = d[u].retweeted_status.user.profile_image_url_https, h = d[u].retweeted_status.user.name, l = d[u].retweeted_status.user.screen_name, _ = d[u].retweeted_status.id_str, g = d[u].retweeted_status.text, m = !0), "@" == d[u].text.substr(0, 1) && (v = !0), (1 == a || 0 == m && 0 == a) && (1 == r || 0 == r && 0 == v) && d[u].text.length > 1 && i >= w && (1 == n && (g = t(g)), 1 == w && (p += c), p += '<div class="twitter-article" id="tw' + w + '">', p += '<div class="twitter-pic"><a href="https://twitter.com/' + l + '" target="_blank"><img src="' + f + '"images/twitter-feed-icon.png" width="42" height="42" alt="twitter icon" /></a></div>', p += '<div class="twitter-text"><p><span class="tweetprofilelink"><a href="https://twitter.com/' + l + '" target="_blank">@' + h + '</a></span> - <span class="tweet-time"><a href="https://twitter.com/' + l + "/status/" + _ + '" target="_blank">' + e(d[u].created_at) + "</a></span> - " + g + "</p>", 1 == m && 1 == o && (p += '<div id="retweet-indicator"></div>'), 1 == s && (p += '<div id="twitter-actions"><div class="intent" id="intent-reply"><a href="https://twitter.com/intent/tweet?in_reply_to=' + _ + '" title="Reply"></a></div><div class="intent" id="intent-retweet"><a href="https://twitter.com/intent/retweet?tweet_id=' + _ + '" title="Retweet"></a></div><div class="intent" id="intent-fave"><a href="https://twitter.com/intent/favorite?tweet_id=' + _ + '" title="Favourite"></a></div></div>'), p += "</div>", p += "</div>", w++)
        }
        $("#twitter-feed").html(p), 1 == s && ($(".twitter-article").hover(function() {
            $(this).find("#twitter-actions").css({
                display: "block",
                opacity: 0,
                "margin-top": -20
            }), $(this).find("#twitter-actions").animate({
                opacity: 1,
                "margin-top": 0
            }, 200)
        }, function() {
            $(this).find("#twitter-actions").animate({
                opacity: 0,
                "margin-top": -20
            }, 120, function() {
                $(this).css("display", "none")
            })
        }), $("#twitter-actions a").click(function() {
            var t = $(this).attr("href");
            return window.open(t, "tweet action window", "width=580,height=500"), !1
        })), animatetweets()
    }).error(function(t) {
        var e = "";
        e = 0 === t.status ? "Connection problem. Check file path and www vs non-www in getJSON request" : 404 == t.status ? "Requested page not found. [404]" : 500 == t.status ? "Internal Server Error [500]." : "parsererror" === exception ? "Requested JSON parse failed." : "timeout" === exception ? "Time out error." : "abort" === exception ? "Ajax request aborted." : "Uncaught Error.\n" + t.responseText, $("#twitter-feed").html("error: " + e)
    })
});
}(jQuery))
**/


/* count down */
! function(a) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], a) : a(jQuery)
}(function(a) {
    "use strict";

    function b(a) {
        if (a instanceof Date) return a;
        if (String(a).match(h)) return String(a).match(/^[0-9]*$/) && (a = Number(a)), String(a).match(/\-/) && (a = String(a).replace(/\-/g, "index.html")), new Date(a);
        throw new Error("Couldn't cast `" + a + "` to a date object.")
    }

    function c(a) {
        var b = a.toString().replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
        return new RegExp(b)
    }

    function d(a) {
        return function(b) {
            var d = b.match(/%(-|!)?[A-Z]{1}(:[^;]+;)?/gi);
            if (d)
                for (var f = 0, g = d.length; g > f; ++f) {
                    var h = d[f].match(/%(-|!)?([a-zA-Z]{1})(:[^;]+;)?/),
                        j = c(h[0]),
                        k = h[1] || "",
                        l = h[3] || "",
                        m = null;
                    h = h[2], i.hasOwnProperty(h) && (m = i[h], m = Number(a[m])), null !== m && ("!" === k && (m = e(l, m)), "" === k && 10 > m && (m = "0" + m.toString()), b = b.replace(j, m.toString()))
                }
            return b = b.replace(/%%/, "%")
        }
    }

    function e(a, b) {
        var c = "s",
            d = "";
        return a && (a = a.replace(/(:|;|\s)/gi, "").split(/\,/), 1 === a.length ? c = a[0] : (d = a[0], c = a[1])), 1 === Math.abs(b) ? d : c
    }
    var f = 100,
        g = [],
        h = [];
    h.push(/^[0-9]*$/.source), h.push(/([0-9]{1,2}\/){2}[0-9]{4}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), h.push(/[0-9]{4}([\/\-][0-9]{1,2}){2}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), h = new RegExp(h.join("|"));
    var i = {
            Y: "years",
            m: "months",
            w: "weeks",
            d: "days",
            D: "totalDays",
            H: "hours",
            M: "minutes",
            S: "seconds"
        },
        j = function(b, c, d) {
            this.el = b, this.$el = a(b), this.interval = null, this.offset = {}, this.instanceNumber = g.length, g.push(this), this.$el.data("countdown-instance", this.instanceNumber), d && (this.$el.on("update.countdown", d), this.$el.on("stoped.countdown", d), this.$el.on("finish.countdown", d)), this.setFinalDate(c), this.start()
        };
    a.extend(j.prototype, {
        start: function() {
            null !== this.interval && clearInterval(this.interval);
            var a = this;
            this.update(), this.interval = setInterval(function() {
                a.update.call(a)
            }, f)
        },
        stop: function() {
            clearInterval(this.interval), this.interval = null, this.dispatchEvent("stoped")
        },
        toggle: function() {
            this.interval ? this.stop() : this.start()
        },
        pause: function() {
            this.stop()
        },
        resume: function() {
            this.start()
        },
        remove: function() {
            this.stop.call(this), g[this.instanceNumber] = null, delete this.$el.data().countdownInstance
        },
        setFinalDate: function(a) {
            this.finalDate = b(a)
        },
        update: function() {
            return 0 === this.$el.closest("html").length ? void this.remove() : (this.totalSecsLeft = this.finalDate.getTime() - (new Date).getTime(), this.totalSecsLeft = Math.ceil(this.totalSecsLeft / 1e3), this.totalSecsLeft = this.totalSecsLeft < 0 ? 0 : this.totalSecsLeft, this.offset = {
                    seconds: this.totalSecsLeft % 60,
                    minutes: Math.floor(this.totalSecsLeft / 60) % 60,
                    hours: Math.floor(this.totalSecsLeft / 60 / 60) % 24,
                    days: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
                    totalDays: Math.floor(this.totalSecsLeft / 60 / 60 / 24),
                    weeks: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7),
                    months: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 30),
                    years: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 365)
                }, void(0 === this.totalSecsLeft ? (this.stop(), this.dispatchEvent("finish")) : this.dispatchEvent("update")))
        },
        dispatchEvent: function(b) {
            var c = a.Event(b + ".countdown");
            c.finalDate = this.finalDate, c.offset = a.extend({}, this.offset), c.strftime = d(this.offset), this.$el.trigger(c)
        }
    }), a.fn.countdown = function() {
        var b = Array.prototype.slice.call(arguments, 0);
        return this.each(function() {
            var c = a(this).data("countdown-instance");
            if (void 0 !== c) {
                var d = g[c],
                    e = b[0];
                j.prototype.hasOwnProperty(e) ? d[e].apply(d, b.slice(1)) : null === String(e).match(/^[$A-Z_][0-9A-Z_$]*$/i) ? (d.setFinalDate.call(d, e), d.start()) : a.error("Method %s does not exist on jQuery.countdown".replace(/\%s/gi, e))
            } else new j(this, b[0], b[1])
        })
    }
});

/* jquery nav */
! function(t, n, i) {
    var s = function(s, e) {
        this.elem = s, this.$elem = t(s), this.options = e, this.metadata = this.$elem.data("plugin-options"), this.$win = t(n), this.sections = {}, this.didScroll = !1, this.$doc = t(i), this.docHeight = this.$doc.height()
    };
    s.prototype = {
        defaults: {
            navItems: "a",
            currentClass: "current",
            changeHash: !1,
            easing: "swing",
            filter: "",
            scrollSpeed: 750,
            scrollThreshold: .5,
            begin: !1,
            end: !1,
            scrollChange: !1
        },
        init: function() {
            return this.config = t.extend({}, this.defaults, this.options, this.metadata), this.$nav = this.$elem.find(this.config.navItems), "" !== this.config.filter && (this.$nav = this.$nav.filter(this.config.filter)), this.$nav.on("click.onePageNav", t.proxy(this.handleClick, this)), this.getPositions(), this.bindInterval(), this.$win.on("resize.onePageNav", t.proxy(this.getPositions, this)), this
        },
        adjustNav: function(t, n) {
            t.$elem.find("." + t.config.currentClass).removeClass(t.config.currentClass), n.addClass(t.config.currentClass)
        },
        bindInterval: function() {
            var t, n = this;
            n.$win.on("scroll.onePageNav", function() {
                n.didScroll = !0
            }), n.t = setInterval(function() {
                t = n.$doc.height(), n.didScroll && (n.didScroll = !1, n.scrollChange()), t !== n.docHeight && (n.docHeight = t, n.getPositions())
            }, 250)
        },
        getHash: function(t) {
            return t.attr("href").split("#")[1]
        },
        getPositions: function() {
            var n, i, s, e = this;
            e.$nav.each(function() {
                n = e.getHash(t(this)), s = t("#" + n), s.length && (i = s.offset().top, e.sections[n] = Math.round(i))
            })
        },
        getSection: function(t) {
            var n = null,
                i = Math.round(this.$win.height() * this.config.scrollThreshold);
            for (var s in this.sections) this.sections[s] - i < t && (n = s);
            return n
        },
        handleClick: function(i) {
            var s = this,
                e = t(i.currentTarget),
                o = e.parent(),
                a = "#" + s.getHash(e);
            o.hasClass(s.config.currentClass) || (s.config.begin && s.config.begin(), s.adjustNav(s, o), s.unbindInterval(), s.scrollTo(a, function() {
                s.config.changeHash && (n.location.hash = a), s.bindInterval(), s.config.end && s.config.end()
            })), i.preventDefault()
        },
        scrollChange: function() {
            var t, n = this.$win.scrollTop(),
                i = this.getSection(n);
            null !== i && (t = this.$elem.find('a[href$="#' + i + '"]').parent(), t.hasClass(this.config.currentClass) || (this.adjustNav(this, t), this.config.scrollChange && this.config.scrollChange(t)))
        },
        scrollTo: function(n, i) {
            var s = t(n).offset().top;
            t("html, body").animate({
                scrollTop: s
            }, this.config.scrollSpeed, this.config.easing, i)
        },
        unbindInterval: function() {
            clearInterval(this.t), this.$win.unbind("scroll.onePageNav")
        }
    }, s.defaults = s.prototype.defaults, t.fn.onePageNav = function(t) {
        return this.each(function() {
            new s(this, t).init()
        })
    }
}(jQuery, window, document);

/*! odometer 0.4.7 */

(function() {
    var a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z, A, B, C, D, E, F, G = [].slice;
    q = '<span class="odometer-value"></span>', n = '<span class="odometer-ribbon"><span class="odometer-ribbon-inner">' + q + "</span></span>", d = '<span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner">' + n + "</span></span>", g = '<span class="odometer-formatting-mark"></span>', c = "(,ddd).dd", h = /^\(?([^)]*)\)?(?:(.)(d+))?$/, i = 30, f = 2e3, a = 20, j = 2, e = .5, k = 1e3 / i, b = 1e3 / a, o = "transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd", y = document.createElement("div").style, p = null != y.transition || null != y.webkitTransition || null != y.mozTransition || null != y.oTransition, w = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame, l = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver, s = function(a) {
        var b;
        return b = document.createElement("div"), b.innerHTML = a, b.children[0]
    }, v = function(a, b) {
        return a.className = a.className.replace(new RegExp("(^| )" + b.split(" ").join("|") + "( |$)", "gi"), " ")
    }, r = function(a, b) {
        return v(a, b), a.className += " " + b
    }, z = function(a, b) {
        var c;
        return null != document.createEvent ? (c = document.createEvent("HTMLEvents"), c.initEvent(b, !0, !0), a.dispatchEvent(c)) : void 0
    }, u = function() {
        var a, b;
        return null != (a = null != (b = window.performance) && "function" == typeof b.now ? b.now() : void 0) ? a : +new Date
    }, x = function(a, b) {
        return null == b && (b = 0), b ? (a *= Math.pow(10, b), a += .5, a = Math.floor(a), a /= Math.pow(10, b)) : Math.round(a)
    }, A = function(a) {
        return 0 > a ? Math.ceil(a) : Math.floor(a)
    }, t = function(a) {
        return a - x(a)
    }, C = !1, (B = function() {
        var a, b, c, d, e;
        if (!C && null != window.jQuery) {
            for (C = !0, d = ["html", "text"], e = [], b = 0, c = d.length; c > b; b++) a = d[b], e.push(function(a) {
                var b;
                return b = window.jQuery.fn[a], window.jQuery.fn[a] = function(a) {
                    var c;
                    return null == a || null == (null != (c = this[0]) ? c.odometer : void 0) ? b.apply(this, arguments) : this[0].odometer.update(a)
                }
            }(a));
            return e
        }
    })(), setTimeout(B, 0), m = function() {
        function a(b) {
            var c, d, e, g, h, i, l, m, n, o, p = this;
            if (this.options = b, this.el = this.options.el, null != this.el.odometer) return this.el.odometer;
            this.el.odometer = this, m = a.options;
            for (d in m) g = m[d], null == this.options[d] && (this.options[d] = g);
            null == (h = this.options).duration && (h.duration = f), this.MAX_VALUES = this.options.duration / k / j | 0, this.resetFormat(), this.value = this.cleanValue(null != (n = this.options.value) ? n : ""), this.renderInside(), this.render();
            try {
                for (o = ["innerHTML", "innerText", "textContent"], i = 0, l = o.length; l > i; i++) e = o[i], null != this.el[e] && ! function(a) {
                    return Object.defineProperty(p.el, a, {
                        get: function() {
                            var b;
                            return "innerHTML" === a ? p.inside.outerHTML : null != (b = p.inside.innerText) ? b : p.inside.textContent
                        },
                        set: function(a) {
                            return p.update(a)
                        }
                    })
                }(e)
            } catch (q) {
                c = q, this.watchForMutations()
            }
        }
        return a.prototype.renderInside = function() {
            return this.inside = document.createElement("div"), this.inside.className = "odometer-inside", this.el.innerHTML = "", this.el.appendChild(this.inside)
        }, a.prototype.watchForMutations = function() {
            var a, b = this;
            if (null != l) try {
                return null == this.observer && (this.observer = new l(function() {
                    var a;
                    return a = b.el.innerText, b.renderInside(), b.render(b.value), b.update(a)
                })), this.watchMutations = !0, this.startWatchingMutations()
            } catch (c) {
                a = c
            }
        }, a.prototype.startWatchingMutations = function() {
            return this.watchMutations ? this.observer.observe(this.el, {
                    childList: !0
                }) : void 0
        }, a.prototype.stopWatchingMutations = function() {
            var a;
            return null != (a = this.observer) ? a.disconnect() : void 0
        }, a.prototype.cleanValue = function(a) {
            var b;
            return "string" == typeof a && (a = a.replace(null != (b = this.format.radix) ? b : ".", "<radix>"), a = a.replace(/[.,]/g, ""), a = a.replace("<radix>", "."), a = parseFloat(a, 10) || 0), x(a, this.format.precision)
        }, a.prototype.bindTransitionEnd = function() {
            var a, b, c, d, e, f, g = this;
            if (!this.transitionEndBound) {
                for (this.transitionEndBound = !0, b = !1, e = o.split(" "), f = [], c = 0, d = e.length; d > c; c++) a = e[c], f.push(this.el.addEventListener(a, function() {
                    return b ? !0 : (b = !0, setTimeout(function() {
                            return g.render(), b = !1, z(g.el, "odometerdone")
                        }, 0), !0)
                }, !1));
                return f
            }
        }, a.prototype.resetFormat = function() {
            var a, b, d, e, f, g, i, j;
            if (a = null != (i = this.options.format) ? i : c, a || (a = "d"), d = h.exec(a), !d) throw new Error("Odometer: Unparsable digit format");
            return j = d.slice(1, 4), g = j[0], f = j[1], b = j[2], e = (null != b ? b.length : void 0) || 0, this.format = {
                repeating: g,
                radix: f,
                precision: e
            }
        }, a.prototype.render = function(a) {
            var b, c, d, e, f, g, h;
            for (null == a && (a = this.value), this.stopWatchingMutations(), this.resetFormat(), this.inside.innerHTML = "", f = this.options.theme, b = this.el.className.split(" "), e = [], g = 0, h = b.length; h > g; g++) c = b[g], c.length && ((d = /^odometer-theme-(.+)$/.exec(c)) ? f = d[1] : /^odometer(-|$)/.test(c) || e.push(c));
            return e.push("odometer"), p || e.push("odometer-no-transitions"), e.push(f ? "odometer-theme-" + f : "odometer-auto-theme"), this.el.className = e.join(" "), this.ribbons = {}, this.formatDigits(a), this.startWatchingMutations()
        }, a.prototype.formatDigits = function(a) {
            var b, c, d, e, f, g, h, i, j, k;
            if (this.digits = [], this.options.formatFunction)
                for (d = this.options.formatFunction(a), j = d.split("").reverse(), f = 0, h = j.length; h > f; f++) c = j[f], c.match(/0-9/) ? (b = this.renderDigit(), b.querySelector(".odometer-value").innerHTML = c, this.digits.push(b), this.insertDigit(b)) : this.addSpacer(c);
            else
                for (e = !this.format.precision || !t(a) || !1, k = a.toString().split("").reverse(), g = 0, i = k.length; i > g; g++) b = k[g], "." === b && (e = !0), this.addDigit(b, e)
        }, a.prototype.update = function(a) {
            var b, c = this;
            return a = this.cleanValue(a), (b = a - this.value) ? (v(this.el, "odometer-animating-up odometer-animating-down odometer-animating"), b > 0 ? r(this.el, "odometer-animating-up") : r(this.el, "odometer-animating-down"), this.stopWatchingMutations(), this.animate(a), this.startWatchingMutations(), setTimeout(function() {
                    return c.el.offsetHeight, r(c.el, "odometer-animating")
                }, 0), this.value = a) : void 0
        }, a.prototype.renderDigit = function() {
            return s(d)
        }, a.prototype.insertDigit = function(a, b) {
            return null != b ? this.inside.insertBefore(a, b) : this.inside.children.length ? this.inside.insertBefore(a, this.inside.children[0]) : this.inside.appendChild(a)
        }, a.prototype.addSpacer = function(a, b, c) {
            var d;
            return d = s(g), d.innerHTML = a, c && r(d, c), this.insertDigit(d, b)
        }, a.prototype.addDigit = function(a, b) {
            var c, d, e, f;
            if (null == b && (b = !0), "-" === a) return this.addSpacer(a, null, "odometer-negation-mark");
            if ("." === a) return this.addSpacer(null != (f = this.format.radix) ? f : ".", null, "odometer-radix-mark");
            if (b)
                for (e = !1;;) {
                    if (!this.format.repeating.length) {
                        if (e) throw new Error("Bad odometer format without digits");
                        this.resetFormat(), e = !0
                    }
                    if (c = this.format.repeating[this.format.repeating.length - 1], this.format.repeating = this.format.repeating.substring(0, this.format.repeating.length - 1), "d" === c) break;
                    this.addSpacer(c)
                }
            return d = this.renderDigit(), d.querySelector(".odometer-value").innerHTML = a, this.digits.push(d), this.insertDigit(d)
        }, a.prototype.animate = function(a) {
            return p && "count" !== this.options.animation ? this.animateSlide(a) : this.animateCount(a)
        }, a.prototype.animateCount = function(a) {
            var c, d, e, f, g, h = this;
            if (d = +a - this.value) return f = e = u(), c = this.value, (g = function() {
                var i, j, k;
                return u() - f > h.options.duration ? (h.value = a, h.render(), void z(h.el, "odometerdone")) : (i = u() - e, i > b && (e = u(), k = i / h.options.duration, j = d * k, c += j, h.render(Math.round(c))), null != w ? w(g) : setTimeout(g, b))
            })()
        }, a.prototype.getDigitCount = function() {
            var a, b, c, d, e, f;
            for (d = 1 <= arguments.length ? G.call(arguments, 0) : [], a = e = 0, f = d.length; f > e; a = ++e) c = d[a], d[a] = Math.abs(c);
            return b = Math.max.apply(Math, d), Math.ceil(Math.log(b + 1) / Math.log(10))
        }, a.prototype.getFractionalDigitCount = function() {
            var a, b, c, d, e, f, g;
            for (e = 1 <= arguments.length ? G.call(arguments, 0) : [], b = /^\-?\d*\.(\d*?)0*$/, a = f = 0, g = e.length; g > f; a = ++f) d = e[a], e[a] = d.toString(), c = b.exec(e[a]), e[a] = null == c ? 0 : c[1].length;
            return Math.max.apply(Math, e)
        }, a.prototype.resetDigits = function() {
            return this.digits = [], this.ribbons = [], this.inside.innerHTML = "", this.resetFormat()
        }, a.prototype.animateSlide = function(a) {
            var b, c, d, f, g, h, i, j, k, l, m, n, o, p, q, s, t, u, v, w, x, y, z, B, C, D, E;
            if (s = this.value, j = this.getFractionalDigitCount(s, a), j && (a *= Math.pow(10, j), s *= Math.pow(10, j)), d = a - s) {
                for (this.bindTransitionEnd(), f = this.getDigitCount(s, a), g = [], b = 0, m = v = 0; f >= 0 ? f > v : v > f; m = f >= 0 ? ++v : --v) {
                    if (t = A(s / Math.pow(10, f - m - 1)), i = A(a / Math.pow(10, f - m - 1)), h = i - t, Math.abs(h) > this.MAX_VALUES) {
                        for (l = [], n = h / (this.MAX_VALUES + this.MAX_VALUES * b * e), c = t; h > 0 && i > c || 0 > h && c > i;) l.push(Math.round(c)), c += n;
                        l[l.length - 1] !== i && l.push(i), b++
                    } else l = function() {
                        E = [];
                        for (var a = t; i >= t ? i >= a : a >= i; i >= t ? a++ : a--) E.push(a);
                        return E
                    }.apply(this);
                    for (m = w = 0, y = l.length; y > w; m = ++w) k = l[m], l[m] = Math.abs(k % 10);
                    g.push(l)
                }
                for (this.resetDigits(), D = g.reverse(), m = x = 0, z = D.length; z > x; m = ++x)
                    for (l = D[m], this.digits[m] || this.addDigit(" ", m >= j), null == (u = this.ribbons)[m] && (u[m] = this.digits[m].querySelector(".odometer-ribbon-inner")), this.ribbons[m].innerHTML = "", 0 > d && (l = l.reverse()), o = C = 0, B = l.length; B > C; o = ++C) k = l[o], q = document.createElement("div"), q.className = "odometer-value", q.innerHTML = k, this.ribbons[m].appendChild(q), o === l.length - 1 && r(q, "odometer-last-value"), 0 === o && r(q, "odometer-first-value");
                return 0 > t && this.addDigit("-"), p = this.inside.querySelector(".odometer-radix-mark"), null != p && p.parent.removeChild(p), j ? this.addSpacer(this.format.radix, this.digits[j - 1], "odometer-radix-mark") : void 0
            }
        }, a
    }(), m.options = null != (E = window.odometerOptions) ? E : {}, setTimeout(function() {
        var a, b, c, d, e;
        if (window.odometerOptions) {
            d = window.odometerOptions, e = [];
            for (a in d) b = d[a], e.push(null != (c = m.options)[a] ? (c = m.options)[a] : c[a] = b);
            return e
        }
    }, 0), m.init = function() {
        var a, b, c, d, e, f;
        if (null != document.querySelectorAll) {
            for (b = document.querySelectorAll(m.options.selector || ".odometer"), f = [], c = 0, d = b.length; d > c; c++) a = b[c], f.push(a.odometer = new m({
                el: a,
                value: null != (e = a.innerText) ? e : a.textContent
            }));
            return f
        }
    }, null != (null != (F = document.documentElement) ? F.doScroll : void 0) && null != document.createEventObject ? (D = document.onreadystatechange, document.onreadystatechange = function() {
            return "complete" === document.readyState && m.options.auto !== !1 && m.init(), null != D ? D.apply(this, arguments) : void 0
        }) : document.addEventListener("DOMContentLoaded", function() {
            return m.options.auto !== !1 ? m.init() : void 0
        }, !1), "function" == typeof define && define.amd ? define(["jquery"], function() {
            return m
        }) : "undefined" != typeof exports && null !== exports ? module.exports = m : window.Odometer = m
}).call(this);



// SmoothScroll v0.9.9
// Licensed under the terms of the MIT license.

// People involved
// - Balazs Galambosi: maintainer (CHANGELOG.txt)
// - Patrick Brunner (patrickb1991@gmail.com)
// - Michael Herf: ssc_pulse Algorithm
if (navigator.platform.toUpperCase().indexOf('MAC') === -1 && !navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini|BlackBerry)/) && jQuery(window).width() > 991) {
    function ssc_init() {
        if (!document.body) return;
        var e = document.body;
        var t = document.documentElement;
        var n = window.innerHeight;
        var r = e.scrollHeight;
        ssc_root = document.compatMode.indexOf("CSS") >= 0 ? t : e;
        ssc_activeElement = e;
        ssc_initdone = true;
        if (top != self) {
            ssc_frame = true
        } else if (r > n && (e.offsetHeight <= n || t.offsetHeight <= n)) {
            ssc_root.style.height = "auto";
            if (ssc_root.offsetHeight <= n) {
                var i = document.createElement("div");
                i.style.clear = "both";
                e.appendChild(i)
            }
        }
        if (!ssc_fixedback) {
            e.style.backgroundAttachment = "scroll";
            t.style.backgroundAttachment = "scroll"
        }
        if (ssc_keyboardsupport) {
            ssc_addEvent("keydown", ssc_keydown)
        }
    }

    function ssc_scrollArray(e, t, n, r) {
        r || (r = 1e3);
        ssc_directionCheck(t, n);
        ssc_que.push({
            x: t,
            y: n,
            lastX: t < 0 ? .99 : -.99,
            lastY: n < 0 ? .99 : -.99,
            start: +(new Date)
        });
        if (ssc_pending) {
            return
        }
        var i = function() {
            var s = +(new Date);
            var o = 0;
            var u = 0;
            for (var a = 0; a < ssc_que.length; a++) {
                var f = ssc_que[a];
                var l = s - f.start;
                var c = l >= ssc_animtime;
                var h = c ? 1 : l / ssc_animtime;
                if (ssc_pulseAlgorithm) {
                    h = ssc_pulse(h)
                }
                var p = f.x * h - f.lastX >> 0;
                var d = f.y * h - f.lastY >> 0;
                o += p;
                u += d;
                f.lastX += p;
                f.lastY += d;
                if (c) {
                    ssc_que.splice(a, 1);
                    a--
                }
            }
            if (t) {
                var v = e.scrollLeft;
                e.scrollLeft += o;
                if (o && e.scrollLeft === v) {
                    t = 0
                }
            }
            if (n) {
                var m = e.scrollTop;
                e.scrollTop += u;
                if (u && e.scrollTop === m) {
                    n = 0
                }
            }
            if (!t && !n) {
                ssc_que = []
            }
            if (ssc_que.length) {
                setTimeout(i, r / ssc_framerate + 1)
            } else {
                ssc_pending = false
            }
        };
        setTimeout(i, 0);
        ssc_pending = true
    }

    function ssc_wheel(e) {
        if (!ssc_initdone) {
            ssc_init()
        }
        var t = e.target;
        var n = ssc_overflowingAncestor(t);
        if (!n || e.defaultPrevented || ssc_isNodeName(ssc_activeElement, "embed") || ssc_isNodeName(t, "embed") && /\.pdf/i.test(t.src)) {
            return true
        }
        var r = e.wheelDeltaX || 0;
        var i = e.wheelDeltaY || 0;
        if (!r && !i) {
            i = e.wheelDelta || 0
        }
        if (Math.abs(r) > 1.2) {
            r *= ssc_stepsize / 120
        }
        if (Math.abs(i) > 1.2) {
            i *= ssc_stepsize / 120
        }
        ssc_scrollArray(n, -r, -i);
        e.preventDefault()
    }

    function ssc_keydown(e) {
        var t = e.target;
        var n = e.ctrlKey || e.altKey || e.metaKey;
        if (/input|textarea|embed/i.test(t.nodeName) || t.isContentEditable || e.defaultPrevented || n) {
            return true
        }
        if (ssc_isNodeName(t, "button") && e.keyCode === ssc_key.spacebar) {
            return true
        }
        var r, i = 0,
            s = 0;
        var o = ssc_overflowingAncestor(ssc_activeElement);
        var u = o.clientHeight;
        if (o == document.body) {
            u = window.innerHeight
        }
        switch (e.keyCode) {
            case ssc_key.up:
                s = -ssc_arrowscroll;
                break;
            case ssc_key.down:
                s = ssc_arrowscroll;
                break;
            case ssc_key.spacebar:
                r = e.shiftKey ? 1 : -1;
                s = -r * u * .9;
                break;
            case ssc_key.pageup:
                s = -u * .9;
                break;
            case ssc_key.pagedown:
                s = u * .9;
                break;
            case ssc_key.home:
                s = -o.scrollTop;
                break;
            case ssc_key.end:
                var a = o.scrollHeight - o.scrollTop - u;
                s = a > 0 ? a + 10 : 0;
                break;
            case ssc_key.left:
                i = -ssc_arrowscroll;
                break;
            case ssc_key.right:
                i = ssc_arrowscroll;
                break;
            default:
                return true
        }
        ssc_scrollArray(o, i, s);
        e.preventDefault()
    }

    function ssc_mousedown(e) {
        ssc_activeElement = e.target
    }

    function ssc_setCache(e, t) {
        for (var n = e.length; n--;) ssc_cache[ssc_uniqueID(e[n])] = t;
        return t
    }

    function ssc_overflowingAncestor(e) {
        var t = [];
        var n = ssc_root.scrollHeight;
        do {
            var r = ssc_cache[ssc_uniqueID(e)];
            if (r) {
                return ssc_setCache(t, r)
            }
            t.push(e);
            if (n === e.scrollHeight) {
                if (!ssc_frame || ssc_root.clientHeight + 10 < n) {
                    return ssc_setCache(t, document.body)
                }
            } else if (e.clientHeight + 10 < e.scrollHeight) {
                overflow = getComputedStyle(e, "").getPropertyValue("overflow");
                if (overflow === "scroll" || overflow === "auto") {
                    return ssc_setCache(t, e)
                }
            }
        } while (e = e.parentNode)
    }

    function ssc_addEvent(e, t, n) {
        window.addEventListener(e, t, n || false)
    }

    function ssc_removeEvent(e, t, n) {
        window.removeEventListener(e, t, n || false)
    }

    function ssc_isNodeName(e, t) {
        return e.nodeName.toLowerCase() === t.toLowerCase()
    }

    function ssc_directionCheck(e, t) {
        e = e > 0 ? 1 : -1;
        t = t > 0 ? 1 : -1;
        if (ssc_direction.x !== e || ssc_direction.y !== t) {
            ssc_direction.x = e;
            ssc_direction.y = t;
            ssc_que = []
        }
    }

    function ssc_pulse_(e) {
        var t, n, r;
        e = e * ssc_pulseScale;
        if (e < 1) {
            t = e - (1 - Math.exp(-e))
        } else {
            n = Math.exp(-1);
            e -= 1;
            r = 1 - Math.exp(-e);
            t = n + r * (1 - n)
        }
        return t * ssc_pulseNormalize
    }

    function ssc_pulse(e) {
        if (e >= 1) return 1;
        if (e <= 0) return 0;
        if (ssc_pulseNormalize == 1) {
            ssc_pulseNormalize /= ssc_pulse_(1)
        }
        return ssc_pulse_(e)
    }
    var ssc_framerate = 150;
    var ssc_animtime = 500;
    var ssc_stepsize = 150;
    var ssc_pulseAlgorithm = true;
    var ssc_pulseScale = 6;
    var ssc_pulseNormalize = 1;
    var ssc_keyboardsupport = true;
    var ssc_arrowscroll = 50;
    var ssc_frame = false;
    var ssc_direction = {
        x: 0,
        y: 0
    };
    var ssc_initdone = false;
    var ssc_fixedback = true;
    var ssc_root = document.documentElement;
    var ssc_activeElement;
    var ssc_key = {
        left: 37,
        up: 38,
        right: 39,
        down: 40,
        spacebar: 32,
        pageup: 33,
        pagedown: 34,
        end: 35,
        home: 36
    };
    var ssc_que = [];
    var ssc_pending = false;
    var ssc_cache = {};
    setInterval(function() {
        ssc_cache = {}
    }, 10 * 1e3);
    var ssc_uniqueID = function() {
        var e = 0;
        return function(t) {
            return t.ssc_uniqueID || (t.ssc_uniqueID = e++)
        }
    }();
    var ischrome = /chrome/.test(navigator.userAgent.toLowerCase());
    if (ischrome) {
        ssc_addEvent("mousedown", ssc_mousedown);
        ssc_addEvent("mousewheel", ssc_wheel);
        ssc_addEvent("load", ssc_init)
    }
}! function(t) {
    var o = 0;
    t.fn.scrolled = function(a, n) {
        "function" == typeof a && (n = a, a = 300);
        var c = "scrollTimer" + o++;
        this.scroll(function() {
            var o = t(this),
                e = o.data(c);
            e && clearTimeout(e), e = setTimeout(function() {
                o.removeData(c), n.call(o[0])
            }, a), o.data(c, e)
        })
    }
}(jQuery);


/*!
 * animsition v4.0.0
 * A simple and easy jQuery plugin for CSS animated page transitions.
 * http://blivesta.github.io/animsition
 * License : MIT
 * Author : blivesta (http://blivesta.com/)
 */
! function(t) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
}(function(t) {
    "use strict";
    var n = "animsition",
        i = {
            init: function(a) {
                a = t.extend({
                    inClass: "fade-in",
                    outClass: "fade-out",
                    inDuration: 1500,
                    outDuration: 800,
                    linkElement: ".animsition-link",
                    loading: !0,
                    loadingParentElement: "body",
                    loadingClass: "animsition-loading",
                    loadingInner: "",
                    timeout: !1,
                    timeoutCountdown: 5e3,
                    onLoadEvent: !0,
                    browser: ["animation-duration", "-webkit-animation-duration"],
                    overlay: !1,
                    overlayClass: "animsition-overlay-slide",
                    overlayParentElement: "body",
                    transition: function(t) {
                        window.location.href = t
                    }
                }, a), i.settings = {
                    timer: !1,
                    data: {
                        inClass: "animsition-in-class",
                        inDuration: "animsition-in-duration",
                        outClass: "animsition-out-class",
                        outDuration: "animsition-out-duration",
                        overlay: "animsition-overlay"
                    },
                    events: {
                        inStart: "animsition.inStart",
                        inEnd: "animsition.inEnd",
                        outStart: "animsition.outStart",
                        outEnd: "animsition.outEnd"
                    }
                };
                var o = i.supportCheck.call(this, a);
                if (!o && a.browser.length > 0 && (!o || !this.length)) return "console" in window || (window.console = {}, window.console.log = function(t) {
                    return t
                }), this.length || console.log("Animsition: Element does not exist on page."), o || console.log("Animsition: Does not support this browser."), i.destroy.call(this);
                var e = i.optionCheck.call(this, a);
                return e && i.addOverlay.call(this, a), a.loading && i.addLoading.call(this, a), this.each(function() {
                    var o = this,
                        e = t(this),
                        s = t(window),
                        r = t(document),
                        l = e.data(n);
                    l || (a = t.extend({}, a), e.data(n, {
                        options: a
                    }), a.timeout && i.addTimer.call(o), s.on("load." + n + " pageshow." + n, function() {
                        i.settings.timer && clearTimeout(i.settings.timer), i["in"].call(o)
                    }), a.onLoadEvent || s.off("load." + n + " pageshow." + n), s.on("unload." + n, function() {}), r.on("click." + n, a.linkElement, function(n) {
                        n.preventDefault();
                        var a = t(this),
                            e = a.attr("href");
                        2 === n.which || n.metaKey || n.shiftKey || -1 !== navigator.platform.toUpperCase().indexOf("WIN") && n.ctrlKey ? window.open(e, "_blank") : i.out.call(o, a, e)
                    }))
                })
            },
            addOverlay: function(n) {
                t(n.overlayParentElement).prepend('<div class="' + n.overlayClass + '"></div>')
            },
            addLoading: function(n) {
                t(n.loadingParentElement).append('<div class="' + n.loadingClass + '">' + n.loadingInner + "</div>")
            },
            removeLoading: function() {
                var i = t(this),
                    a = i.data(n).options,
                    o = t(a.loadingParentElement).children("." + a.loadingClass);
                o.fadeOut().remove()
            },
            addTimer: function() {
                var a = this,
                    o = t(this),
                    e = o.data(n).options;
                i.settings.timer = setTimeout(function() {
                    i["in"].call(a), t(window).off("load." + n + " pageshow." + n)
                }, e.timeoutCountdown)
            },
            supportCheck: function(n) {
                var i = t(this),
                    a = n.browser,
                    o = a.length,
                    e = !1;
                0 === o && (e = !0);
                for (var s = 0; o > s; s++)
                    if ("string" == typeof i.css(a[s])) {
                        e = !0;
                        break
                    }
                return e
            },
            optionCheck: function(n) {
                var a, o = t(this);
                return a = n.overlay || o.data(i.settings.data.overlay) ? !0 : !1
            },
            animationCheck: function(i, a, o) {
                var e = t(this),
                    s = e.data(n).options,
                    r = typeof i,
                    l = !a && "number" === r,
                    d = a && "string" === r && i.length > 0;
                return l || d ? i = i : a && o ? i = s.inClass : !a && o ? i = s.inDuration : a && !o ? i = s.outClass : a || o || (i = s.outDuration), i
            },
            "in": function() {
                var a = this,
                    o = t(this),
                    e = o.data(n).options,
                    s = o.data(i.settings.data.inDuration),
                    r = o.data(i.settings.data.inClass),
                    l = i.animationCheck.call(a, s, !1, !0),
                    d = i.animationCheck.call(a, r, !0, !0),
                    u = i.optionCheck.call(a, e);
                e.loading && i.removeLoading.call(a), u ? i.inOverlay.call(a, d, l) : i.inDefault.call(a, d, l)
            },
            inDefault: function(n, a) {
                var o = t(this);
                o.css({
                    "animation-duration": a + "ms"
                }).addClass(n).trigger(i.settings.events.inStart).animateCallback(function() {
                    o.removeClass(n).css({
                        opacity: 1
                    }).trigger(i.settings.events.inEnd)
                })
            },
            inOverlay: function(a, o) {
                var e = t(this),
                    s = e.data(n).options;
                e.css({
                    opacity: 1
                }).trigger(i.settings.events.inStart), t(s.overlayParentElement).children("." + s.overlayClass).css({
                    "animation-duration": o + "ms"
                }).addClass(a).animateCallback(function() {
                    e.trigger(i.settings.events.inEnd)
                })
            },
            out: function(a, o) {
                var e = this,
                    s = t(this),
                    r = s.data(n).options,
                    l = a.data(i.settings.data.outClass),
                    d = s.data(i.settings.data.outClass),
                    u = a.data(i.settings.data.outDuration),
                    c = s.data(i.settings.data.outDuration),
                    m = l ? l : d,
                    g = u ? u : c,
                    f = i.animationCheck.call(e, m, !0, !1),
                    h = i.animationCheck.call(e, g, !1, !1),
                    v = i.optionCheck.call(e, r);
                v ? i.outOverlay.call(e, f, h, o) : i.outDefault.call(e, f, h, o)
            },
            outDefault: function(a, o, e) {
                var s = t(this),
                    r = s.data(n).options;
                s.css({
                    "animation-duration": o + 1 + "ms"
                }).addClass(a).trigger(i.settings.events.outStart).animateCallback(function() {
                    s.trigger(i.settings.events.outEnd), r.transition(e)
                })
            },
            outOverlay: function(a, o, e) {
                var s = this,
                    r = t(this),
                    l = r.data(n).options,
                    d = r.data(i.settings.data.inClass),
                    u = i.animationCheck.call(s, d, !0, !0);
                t(l.overlayParentElement).children("." + l.overlayClass).css({
                    "animation-duration": o + 1 + "ms"
                }).removeClass(u).addClass(a).trigger(i.settings.events.outStart).animateCallback(function() {
                    r.trigger(i.settings.events.outEnd), l.transition(e)
                })
            },
            destroy: function() {
                return this.each(function() {
                    var i = t(this);
                    t(window).off("." + n), i.css({
                        opacity: 1
                    }).removeData(n)
                })
            }
        };
    t.fn.animateCallback = function(n) {
        var i = "animationend webkitAnimationEnd";
        return this.each(function() {
            var a = t(this);
            a.on(i, function() {
                return a.off(i), n.call(this)
            })
        })
    }, t.fn.animsition = function(a) {
        return i[a] ? i[a].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof a && a ? void t.error("Method " + a + " does not exist on jQuery." + n) : i.init.apply(this, arguments)
    }
});

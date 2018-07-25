/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || Function("return this")() || (1,eval)("this");
} catch(e) {
	// This works if the window reference is available
	if(typeof window === "object")
		g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(2);
module.exports = __webpack_require__(32);


/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

;
(() => {
    'use strict';

    /*variables*/

    /*main slider*/
    const mainArrElem = document.querySelectorAll('.slider_main .slider_main_elem');
    const mainLeft = document.querySelector('.slider_main .control_left');
    const mainRight = document.querySelector('.slider_main .control_right');
    /*victory slider*/
    const victorySlider = document.querySelector('.victory_slider');
    const victorySliderEl = document.querySelectorAll('.victory_slider .victory_slider_elem');
    const victorySliderDot = document.querySelector('.victory_slider .victory_slider_dot');
    /*menu*/
    const header = document.querySelector('.header_main');
    const menu = document.querySelector('.nav_main');
    /*quote slider*/
    const quote = document.querySelector('.quote_slider');
    const quoteElem = document.querySelectorAll('.quote_slider .quote_slider_elem');
    /*certificate slider*/
    const certificate = document.querySelector('.footer_certificate');
    const certificateElem = document.querySelector('.certificate_wrap');
    /*scroll mews*/
    const arrScrollNews = document.querySelectorAll('.news_min_content');
    /*shape parallax*/
    const blockShape = document.querySelector('.main_section');
    const arrShape = document.querySelectorAll('.main_section [class^="shape"]');
    /*scroll up*/
    const btnUp = document.querySelector('.btn_up');
    /*animations block*/
    const arrAnimation = document.querySelectorAll('.animation');
    /*open feedback*/
    const btnFeedback = document.querySelectorAll('.get_feedback');
    const popupFeedback = document.querySelector('.feed_back_popup');
    const popupBg = document.querySelector('.main_popup_bg');
    let mobileBoll = false;
    /*feedback send*/
    const feedback = document.querySelectorAll('.feedback');
    /*phone mask*/
    const myInput = document.querySelectorAll('input[type=tel]');
    /*btn send form popup*/
    const btnSuccessful = document.querySelector('.send_successful_close');
    /*year*/
    const yearFooter = document.querySelector('.site_map .site_map_year');
    /*dote scroll*/
    const arrDoteScroll = document.querySelectorAll('.dote_scroll');
    const doteBlock = document.querySelector('.dote_block');

    /*paralax all*/
    let Parallax = __webpack_require__(3);
    let p = new Parallax('.parallax').init();
    /*menu*/
    if (menu) {
        (__webpack_require__(5))(header, menu)
    }

    /*main slider*/
    if (mainLeft && mainRight) {
        (__webpack_require__(7))(mainArrElem, mainLeft, mainRight);
    }
    /*victory slider*/
    if (victorySlider) {
        (__webpack_require__(8))(victorySlider, victorySliderEl, victorySliderDot);
    }
    /*quote slider*/
    if (quote) {
        (__webpack_require__(9))(quote, quoteElem);
    }
    /*certificate slider*/
    if (certificate) {
        (__webpack_require__(10))(certificate, certificateElem);
    }
    /*scroll news*/
    if (arrScrollNews) {
        (__webpack_require__(11))(arrScrollNews);
    }
    /*shape parallax*/
    let shapeMove = null;
    if (blockShape) {
        shapeMove = __webpack_require__(12);
    }
    /*scroll up*/
    if (btnUp) {
        let scrollUp = __webpack_require__(14);
        btnUp.addEventListener('click', () => {
            scrollUp(50);
        })
    }
    /*animation*/
    let addAnimation = null;
    if (arrAnimation.length > 0) {
        addAnimation = __webpack_require__(15);
        addAnimation(arrAnimation);
    }
    /*feedback send*/
    if (btnSuccessful !== null) {
        btnSuccessful.addEventListener('click', function () {
            this.parentElement.parentElement.classList.remove('active');
        });
    }

    if (feedback.length > 0) {
        (__webpack_require__(16))(feedback, popupFeedback, popupBg);
    }

    /*open feedback*/
    if (btnFeedback.length > 0 && popupFeedback) {
        for (let i = 0; i < btnFeedback.length; i++) {
            btnFeedback[i].addEventListener('click', () => {
                popupBg.classList.add('active');
                popupFeedback.classList.add('active');
                if (mobileBoll) {
                    document.body.style.overflow = 'hidden';
                }
            });
        }
        popupFeedback.querySelector('.close_feedback').addEventListener('click', () => {
            popupBg.classList.remove('active');
            popupFeedback.classList.remove('active');
            document.body.removeAttribute('style');

        });
        popupBg.addEventListener('click', function () {
            this.classList.remove('active');
            popupFeedback.classList.remove('active');
            document.body.removeAttribute('style');
        });
    }

    /*phone mask*/
    if (myInput) {
        let vanillaTextMask = __webpack_require__(29);
        let phoneMask = ['+', '3', '8', '(', /\d/, /\d/, /\d/, ')', ' ', /\d/, /\d/, /\d/, '-', /\d/, /\d/, '-', /\d/, /\d/];

        for (let i = 0; i < myInput.length; i++) {
            vanillaTextMask.maskInput({
                inputElement: myInput[i],
                mask: phoneMask,
                keepCharPositions: true
            });
        }
    }

    /*social icon*/
    let headerContainer = document.querySelector('.header_main .container');
    let languages = document.querySelector('.header_main .container>.languages');
    let newLanguages = null;
    if (languages !== null) {
        newLanguages = languages.cloneNode(true);
    }

    /*main scroll*/
    window.addEventListener('scroll', () => {
        let scrolled = window.pageYOffset || document.documentElement.scrollTop;

        /*shape parallax*/
        if (blockShape) {
            shapeMove(blockShape, arrShape, scrolled)
        }
        /*animation*/
        if (arrAnimation.length > 0) {
            addAnimation(arrAnimation);
        }

    });

    /*main mobile*/
    if (window.innerWidth < 768) {
        headerContainer.removeChild(languages);
        menu.appendChild(newLanguages);
        /*feedback*/
        mobileBoll = true;
    }
    window.addEventListener('resize', function () {
        try {
            if (this.innerWidth < 768) {
                /*social icon*/
                let languages = header.querySelector('.container>.languages');
                let timeLanguages = newLanguages.cloneNode(true);
                headerContainer.removeChild(languages);
                menu.appendChild(timeLanguages);

                /*feedback*/
                mobileBoll = true;
            } else {
                /*social icon*/
                let noLanguages = menu.querySelector('.languages');
                let timeLanguages = newLanguages.cloneNode(true);
                menu.removeChild(noLanguages);
                headerContainer.appendChild(timeLanguages);

                /*feedback*/
                mobileBoll = false;
            }
        } catch (err) {

        }
    });
    /*year*/
    if (yearFooter !== null) {
        let dayYear = new Date();
        yearFooter.innerHTML = dayYear.getFullYear();
    }

    /*dote scroll*/
    if (arrDoteScroll.length > 0 && doteBlock !== null) {
        (__webpack_require__(30))(arrDoteScroll, doteBlock, header);

    }


})();


/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

// use here your library name
module.exports = __webpack_require__(4)

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;(function (global, factory) {
  if (true) {
    !(__WEBPACK_AMD_DEFINE_ARRAY__ = [module], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
  } else if (typeof exports !== "undefined") {
    factory(module);
  } else {
    var mod = {
      exports: {}
    };
    factory(mod);
    global.Parallax = mod.exports;
  }
})(this, function (module) {
  'use strict';

  function _classCallCheck(instance, Constructor) {
    if (!(instance instanceof Constructor)) {
      throw new TypeError("Cannot call a class as a function");
    }
  }

  var _createClass = function () {
    function defineProperties(target, props) {
      for (var i = 0; i < props.length; i++) {
        var descriptor = props[i];
        descriptor.enumerable = descriptor.enumerable || false;
        descriptor.configurable = true;
        if ("value" in descriptor) descriptor.writable = true;
        Object.defineProperty(target, descriptor.key, descriptor);
      }
    }

    return function (Constructor, protoProps, staticProps) {
      if (protoProps) defineProperties(Constructor.prototype, protoProps);
      if (staticProps) defineProperties(Constructor, staticProps);
      return Constructor;
    };
  }();

  function $$(selector, ctx) {
    var els = void 0;

    if (typeof selector == 'string') {
      els = (ctx || document).querySelectorAll(selector);
    } else {
      els = selector;
    }

    return Array.prototype.slice.call(els);
  }

  function extend(src) {
    var obj = void 0,
        args = arguments;
    for (var i = 1; i < args.length; ++i) {
      if (obj = args[i]) {
        for (var key in obj) {
          src[key] = obj[key];
        }
      }
    }
    return src;
  }

  function isUndefined(val) {
    return typeof val == 'undefined';
  }

  function toCamel(string) {
    return string.replace(/-(\w)/g, function (_, c) {
      return c.toUpperCase();
    });
  }

  function elementData(el, attr) {
    if (attr) return el.dataset[attr] || el.getAttribute('data-' + attr);else return el.dataset || Array.prototype.slice.call(el.attributes).reduce(function (ret, attribute) {
      if (/data-/.test(attribute.name)) ret[toCamel(attribute.name)] = attribute.value;
      return ret;
    }, {});
  }

  function prefix(obj, prop) {
    var prefixes = ['ms', 'o', 'Moz', 'webkit'];
    var i = prefixes.length;
    while (i--) {
      var _prefix = prefixes[i],
          p = _prefix ? _prefix + prop[0].toUpperCase() + prop.substr(1) : prop.toLowerCase() + prop.substr(1);
      if (p in obj) {
        return p;
      }
    }
    return '';
  }

  var observable = function observable(el) {

    el = el || {};

    var callbacks = {},
        slice = Array.prototype.slice;

    Object.defineProperties(el, {
      on: {
        value: function value(event, fn) {
          if (typeof fn == 'function') (callbacks[event] = callbacks[event] || []).push(fn);
          return el;
        },
        enumerable: false,
        writable: false,
        configurable: false
      },

      off: {
        value: function value(event, fn) {
          if (event == '*' && !fn) callbacks = {};else {
            if (fn) {
              var arr = callbacks[event];
              for (var i = 0, cb; cb = arr && arr[i]; ++i) {
                if (cb == fn) arr.splice(i--, 1);
              }
            } else delete callbacks[event];
          }
          return el;
        },
        enumerable: false,
        writable: false,
        configurable: false
      },

      one: {
        value: function value(event, fn) {
          function on() {
            el.off(event, on);
            fn.apply(el, arguments);
          }
          return el.on(event, on);
        },
        enumerable: false,
        writable: false,
        configurable: false
      },

      trigger: {
        value: function value(event) {
          var arglen = arguments.length - 1,
              args = new Array(arglen),
              fns,
              fn,
              i;

          for (i = 0; i < arglen; i++) {
            args[i] = arguments[i + 1];
          }

          fns = slice.call(callbacks[event] || [], 0);

          for (i = 0; fn = fns[i]; ++i) {
            fn.apply(el, args);
          }

          if (callbacks['*'] && event != '*') el.trigger.apply(el, ['*', event].concat(args));

          return el;
        },
        enumerable: false,
        writable: false,
        configurable: false
      }
    });

    return el;
  };

  var rAF = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.msRequestAnimationFrame || window.oRequestAnimationFrame || function (cb) {
    setTimeout(cb, 1000 / 60);
  };
  var RESIZE_DELAY = 20;

  var Stage = function () {
    function Stage() {
      _classCallCheck(this, Stage);

      observable(this);
      this.resizeTimer = null;
      this.tick = false;
      this.bind();
    }

    _createClass(Stage, [{
      key: 'bind',
      value: function bind() {
        var _this = this;

        window.addEventListener('scroll', function () {
          return _this.scroll();
        }, true);
        window.addEventListener('mousewheel', function () {
          return _this.scroll();
        }, true);
        window.addEventListener('touchmove', function () {
          return _this.scroll();
        }, true);
        window.addEventListener('resize', function () {
          return _this.resize();
        }, true);
        window.addEventListener('orientationchange', function () {
          return _this.resize();
        }, true);
        window.onload = function () {
          return _this.scroll();
        };

        return this;
      }
    }, {
      key: 'scroll',
      value: function scroll() {
        var _this2 = this;

        if (this.tick) return this;
        this.tick = !this.tick;
        rAF(function () {
          return _this2.update();
        });
        return this;
      }
    }, {
      key: 'update',
      value: function update() {
        this.trigger('scroll', this.scrollTop);
        this.tick = !this.tick;
        return this;
      }
    }, {
      key: 'resize',
      value: function resize() {
        var _this3 = this;

        if (this.resizeTimer) clearTimeout(this.resizeTimer);
        this.resizeTimer = setTimeout(function () {
          return _this3.trigger('resize', _this3.size);
        }, RESIZE_DELAY);
        return this;
      }
    }, {
      key: 'scrollTop',
      get: function get() {
        var top = (window.pageYOffset || document.scrollTop) - (document.clientTop || 0);
        return window.isNaN(top) ? 0 : top;
      }
    }, {
      key: 'height',
      get: function get() {
        return window.innerHeight;
      }
    }, {
      key: 'width',
      get: function get() {
        return window.innerWidth;
      }
    }, {
      key: 'size',
      get: function get() {
        return {
          width: this.width,
          height: this.height
        };
      }
    }]);

    return Stage;
  }();

  var TRANSFORM_PREFIX = function (div) {
    return prefix(div.style, 'transform');
  }(document.createElement('div'));
  var HAS_MATRIX = function (div) {
    div.style[TRANSFORM_PREFIX] = 'matrix(1, 0, 0, 1, 0, 0)';
    return (/matrix/g.test(div.style.cssText)
    );
  }(document.createElement('div'));

  var Canvas = function () {
    function Canvas(img, opts) {
      _classCallCheck(this, Canvas);

      observable(this);
      this.opts = opts;
      this.img = img;
      this.wrapper = img.parentNode;
      this.isLoaded = false;

      this.initial = img.cloneNode(true);
    }

    _createClass(Canvas, [{
      key: 'load',
      value: function load() {
        var _this4 = this;

        if (!this.img.width || !this.img.height || !this.img.complete) {
          this.img.onload = function () {
            return _this4.onImageLoaded();
          };
        } else {
          this.onImageLoaded();
        }

        return this;
      }
    }, {
      key: 'destroy',
      value: function destroy() {
        this.img.parentNode.replaceChild(this.initial, this.img);
        this.off('*');
      }
    }, {
      key: 'onImageLoaded',
      value: function onImageLoaded() {
        this.isLoaded = true;
        this.update();
        this.img.style.willChange = 'transform';
        this.trigger('loaded', this.img);
        return this;
      }
    }, {
      key: 'update',
      value: function update() {
        var iw = this.img.naturalWidth || this.img.width,
            ih = this.img.naturalHeight || this.img.height,
            ratio = iw / ih,
            size = this.size;

        var nh = void 0,
            nw = void 0,
            offsetTop = void 0,
            offsetLeft = void 0;

        if (size.width / ratio <= size.height) {
          nw = size.height * ratio;
          nh = size.height;
        } else {
          nw = size.width;
          nh = size.width / ratio;
        }

        if (nh <= size.height + size.height * this.opts.safeHeight) {
          nw += nw * this.opts.safeHeight;
          nh += nh * this.opts.safeHeight;
        }

        offsetTop = -~~((nh - size.height) / 2);
        offsetLeft = -~~((nw - size.width) / 2);

        this.img.width = nw;
        this.img.height = nh;
        this.img.style.top = offsetTop + 'px';
        this.img.style.left = offsetLeft + 'px';

        return this;
      }
    }, {
      key: 'draw',
      value: function draw(_ref) {
        var scrollTop = _ref.scrollTop,
            width = _ref.width,
            height = _ref.height;

        var size = this.size,
            perc = (this.offset.top + size.height * this.opts.center + height / 2 - scrollTop) / height - 1,
            offset = ~~(perc * (this.img.height / size.height / 2 * this.opts.intensity) * 10);

        this.img.style[TRANSFORM_PREFIX] = HAS_MATRIX ? 'matrix(1,0,0,1, 0, ' + -offset + ')' : 'translate(0, ' + -offset + 'px)';

        return this;
      }
    }, {
      key: 'bounds',
      get: function get() {
        return this.wrapper.getBoundingClientRect();
      }
    }, {
      key: 'offset',
      get: function get() {
        return {
          top: this.wrapper.offsetTop,
          left: this.wrapper.offsetLeft
        };
      }
    }, {
      key: 'size',
      get: function get() {
        var props = this.bounds;
        return {
          height: props.height | 0,
          width: props.width | 0
        };
      }
    }]);

    return Canvas;
  }();

  var stage = void 0;

  var Parallax = function () {
    function Parallax() {
      var selector = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
      var opts = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

      _classCallCheck(this, Parallax);

      observable(this);

      this.opts = opts;
      this.selector = selector;
      this.canvases = [];
      this.bound = false;

      if (selector !== null) {
        this.add(selector);
      }

      if (!stage) stage = new Stage();

      return this;
    }

    _createClass(Parallax, [{
      key: 'init',
      value: function init() {

        if (this.bound) {
          throw 'The parallax instance has already been initialized';
        }

        if (!this.canvases.length && this.selector !== null) {
          console.warn('No images were found with the selector "' + this.selector + '"');
        } else {
          this.imagesLoaded = 0;
          this.bind();
        }

        return this;
      }
    }, {
      key: 'bind',
      value: function bind() {
        var _this5 = this;

        this._onResize = function () {
          for (var _len = arguments.length, args = Array(_len), _key = 0; _key < _len; _key++) {
            args[_key] = arguments[_key];
          }

          return _this5.resize.apply(_this5, args);
        };
        this._onScroll = function () {
          for (var _len2 = arguments.length, args = Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
            args[_key2] = arguments[_key2];
          }

          return _this5.scroll.apply(_this5, args);
        };

        stage.on('resize', this._onResize);
        stage.on('scroll', this._onScroll);

        this.canvases.forEach(function (canvas) {
          canvas.one('loaded', function () {
            return _this5.onCanvasLoaded(canvas);
          });
          canvas.load();
        });

        this.bound = true;

        return this;
      }
    }, {
      key: 'refresh',
      value: function refresh() {
        this.onResize(stage.size).onScroll(stage.scrollTop);
        return this;
      }
    }, {
      key: 'onCanvasLoaded',
      value: function onCanvasLoaded(canvas) {
        this.trigger('image:loaded', canvas.img, canvas);
        this.imagesLoaded++;
        canvas.draw(stage);
        if (this.imagesLoaded == this.canvases.length) this.trigger('images:loaded');
        return this;
      }
    }, {
      key: 'scroll',
      value: function scroll(scrollTop) {
        var offsetYBounds = this.opts.offsetYBounds,
            _stage = stage,
            height = _stage.height,
            width = _stage.width;


        var i = this.canvases.length;

        while (i--) {
          var canvas = this.canvases[i],
              canvasHeight = canvas.size.height,
              canvasOffset = canvas.offset;

          if (canvas.isLoaded && scrollTop + stage.height + offsetYBounds > canvasOffset.top && canvasOffset.top + canvasHeight > scrollTop - offsetYBounds) {
            canvas.draw({ height: height, scrollTop: scrollTop, width: width });
            this.trigger('draw', canvas.img);
          }
        }

        this.trigger('update', scrollTop);

        return this;
      }
    }, {
      key: 'add',
      value: function add(els) {
        var _this6 = this;

        var canvases = this.createCanvases($$(els));

        if (this.bound) {
          canvases.forEach(function (canvas) {
            canvas.one('loaded', function () {
              return _this6.onCanvasLoaded(canvas);
            });
            canvas.load();
          });
        }

        this.canvases = this.canvases.concat(canvases);

        return this;
      }
    }, {
      key: 'remove',
      value: function remove(els) {
        var _this7 = this;

        $$(els).forEach(function (el) {
          var i = _this7.canvases.length;
          while (i--) {
            if (el == _this7.canvases[i].img) {
              _this7.canvases[i].destroy();
              _this7.canvases.splice(i, 1);
              break;
            }
          }
        });
        return this;
      }
    }, {
      key: 'destroy',
      value: function destroy() {
        this.off('*');
        this.canvases = [];
        stage.off('resize', this._onResize).off('scroll', this._onScroll);
        return this;
      }
    }, {
      key: 'resize',
      value: function resize(size) {
        var i = this.canvases.length;
        while (i--) {
          var canvas = this.canvases[i];
          if (!canvas.isLoaded) return;
          canvas.update().draw(stage);
        }
        this.trigger('resize');
        return this;
      }
    }, {
      key: 'createCanvases',
      value: function createCanvases(els) {
        var _this8 = this;

        return els.map(function (el) {
          var data = elementData(el);
          return new Canvas(el, {
            intensity: !isUndefined(data.intensity) ? +data.intensity : _this8.opts.intensity,
            center: !isUndefined(data.center) ? +data.center : _this8.opts.center,
            safeHeight: !isUndefined(data.safeHeight) ? +data.safeHeight : _this8.opts.safeHeight
          });
        });
      }
    }, {
      key: 'opts',
      set: function set(opts) {
        this._defaults = {
          offsetYBounds: 50,
          intensity: 30,
          center: 0.5,

          safeHeight: 0.15 };
        extend(this._defaults, opts);
      },
      get: function get() {
        return this._defaults;
      }
    }]);

    return Parallax;
  }();

  module.exports = Parallax;
});

/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

const scrollMenu = __webpack_require__(6);
module.exports = (header, menu, boll) => {


    let arrHoverList = menu.querySelectorAll('.list_page>li');
    let scrollNav = menu.querySelector('.scroll_nav>i');
    let btn = header.querySelector('.btn_nav_open');
    let bgMenu = document.querySelector('.menu_popup_bg');
    let linkFirst = menu.querySelectorAll('.list_page>li>a');

    btn.addEventListener('click', function () {

        menu.classList.toggle('active');
        bgMenu.classList.toggle('active');

        if (this.classList.toggle('active') && window.innerWidth < 769) {
            menu.style.height = `calc(100vh - ${header.clientHeight}px)`;
            document.body.style.overflow = 'hidden';
        } else {
            document.body.removeAttribute('style');
            menu.removeAttribute('style');
        }
    });
    bgMenu.addEventListener('click', function () {
        this.classList.remove('active');
        btn.classList.remove('active');
        menu.classList.remove('active');
    });

    for (let i = 0; i < arrHoverList.length; i++) {
        arrHoverList[i].addEventListener('mouseover', () => {
            let topMove = arrHoverList[i].offsetTop + (arrHoverList[i].clientHeight / 2 - scrollNav.clientHeight / 2);
            scrollNav.style.top = `${topMove}px`;
        });
        arrHoverList[i].addEventListener('mouseout', () => {
            scrollNav.style.top = `5%`;
        })
    }

    scrollMenu(header);


    /*mobile touch*/
    for (let i = 0; i < linkFirst.length; i++) {
        linkFirst[i].addEventListener('click', function (e) {
            if (e.target.classList.contains('open_more_menu')) {
                e.preventDefault();
                for (let o = 0; o < linkFirst.length; o++) {
                    if (linkFirst[o].parentElement !== this.parentElement) {
                        linkFirst[o].parentElement.classList.remove('active');
                    }
                }
                this.parentElement.classList.toggle('active');
            }
        })
    }

};

/***/ }),
/* 6 */
/***/ (function(module, exports) {

module.exports = function (head) {
    let yak = 1;
    document.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            head.classList.add('active');
            if (yak) {
                setTimeout(() => {
                    head.classList.add('top_head');
                    yak = 0;
                }, 100)
            }
        } else {
            head.classList.remove('active', 'top_head');
            yak = 1;
        }
    });
};


/***/ }),
/* 7 */
/***/ (function(module, exports) {

module.exports = (arrElem, left, right) => {


    let yak = 0;
    let interval = null;
    let timeout = null;

    arrElem[0].classList.add('active');

    right.addEventListener('click', () => {
        clearInterval(interval);
        clearTimeout(timeout);
        moveSlider(arrElem, true);
        timeout = setTimeout(() => {
            modeDef();
        }, 4000)
    });

    left.addEventListener('click', () => {
        clearInterval(interval);
        clearTimeout(timeout);
        moveSlider(arrElem, false);
        timeout = setTimeout(() => {
            modeDef();
        }, 4000)
    });

    function moveSlider(arr, boll) {
        for (let i = 0; i < arr.length; i++) {
            arr[i].classList.remove('active');
        }
        yak = lastElem(arr, yak, boll);
        arr[yak].classList.add('active');
    }

    function lastElem(arr, int, boll) {
        if (boll) {
            return (arr[int + 1]) ? int + 1 : 0;
        } else {
            return (arr[int - 1]) ? int - 1 : arr.length - 1;
        }
    }

    function modeDef() {
        interval = setInterval(() => {
            moveSlider(arrElem, true);
        }, 5000);
    }

    for (let i = 0; i < arrElem.length; i++) {
        let btnSli = arrElem[i].querySelector('.btn');

        btnSli.addEventListener('mouseenter', () => {
            clearInterval(interval);
            clearTimeout(timeout);
        });
        btnSli.addEventListener('mouseleave', () => {
            modeDef();
        });
    }


    document.addEventListener('keyup', (e) => {
        let heightSlider = document.querySelector('.section_top').clientHeight / 2;
        let bollBtn = document.body.scrollTop < heightSlider;

        if (e.keyCode === 39 && bollBtn) {
            clearInterval(interval);
            clearTimeout(timeout);
            moveSlider(arrElem, true);
            timeout = setTimeout(() => {
                modeDef();
            }, 4000);

            right.classList.add('active');
            setTimeout(() => {
                right.classList.remove('active');
            }, 500);
        } else if (e.keyCode === 37 && bollBtn) {
            clearInterval(interval);
            clearTimeout(timeout);
            moveSlider(arrElem, false);
            timeout = setTimeout(() => {
                modeDef();
            }, 4000);

            left.classList.add('active');
            setTimeout(() => {
                left.classList.remove('active');
            }, 500);

        }
    });

    modeDef();
};

/***/ }),
/* 8 */
/***/ (function(module, exports) {

module.exports = (slider, elem, dot) => {
    let yak = 0;
    let dotArr = 0;
    let wrapSlider = slider.querySelector('.victory_slider_wrap');
    let stopInt = null;
    let stopTime = null;
    let maxHeight = 0;

    for (let i = 0; i < elem.length; i++) {
        let doteEl = document.createElement('i');
        dot.appendChild(doteEl);
        doteEl.addEventListener('click', function () {
            for (let y = 0; y < elem.length; y++) {
                elem[y].classList.remove('active');
                dot.querySelectorAll('i')[y].classList.remove('active');
            }
            this.classList.add('active');
            elem[i].classList.add('active');
            yak = i;

            clearInterval(stopInt);
            clearTimeout(stopTime);
            stopTime = setTimeout(() => {
                moveDef();
            }, 3000);
        });
        maxHeight = (maxHeight < elem[i].clientHeight) ? elem[i].clientHeight : maxHeight;
    }
    wrapSlider.style.height = `${maxHeight}px`;

    dotArr = dot.querySelectorAll('i');
    elem[0].classList.add('active');
    dotArr[0].classList.add('active');

    function lastElem(arr, int, boll) {
        if (boll) {
            return (arr[int + 1]) ? int + 1 : 0;
        } else {
            return (arr[int - 1]) ? int - 1 : arr.length - 1;
        }
    }

    function moveSlider(arrEl, arrDot, boll) {
        for (let i = 0; i < arrEl.length; i++) {
            arrEl[i].classList.remove('active');
            arrDot[i].classList.remove('active');
        }
        yak = lastElem(arrEl, yak, boll);
        arrEl[yak].classList.add('active');
        arrDot[yak].classList.add('active');
    }


    function moveDef() {
        stopInt = setInterval(() => {
            moveSlider(elem, dotArr, true);
        }, 5000);
    }

    moveDef();


    /*touch slider*/
    let initialPoint;
    let finalPoint;
    slider.addEventListener('touchstart', function (event) {
        initialPoint = event.changedTouches[0];
    }, false);
    slider.addEventListener('touchend', function (event) {
        finalPoint = event.changedTouches[0];
        let xAbs = Math.abs(initialPoint.pageX - finalPoint.pageX);
        if (xAbs > 20) {
            if (finalPoint.pageX < initialPoint.pageX) {
                moveSlider(elem, dotArr, true);
            } else {
                moveSlider(elem, dotArr, false);
            }
        }
    }, false);
};

/***/ }),
/* 9 */
/***/ (function(module, exports) {

module.exports = (wrap, arrELem) => {
    let yak = 0;
    let wrapQuote = wrap.querySelector('.quote_slider_wrap');
    let maxHeight = 0;

    for (let i = 0; i < arrELem.length; i++) {
        maxHeight = (maxHeight < arrELem[i].clientHeight) ? arrELem[i].clientHeight : maxHeight;
        arrELem[i].classList.add('move');
    }
    wrapQuote.style.height = `${maxHeight}px`;

    arrELem[0].classList.add('active');
    setInterval(() => {
        moveSlider(arrELem, true);
    }, 4000);

    function lastElem(arr, y, boll) {
        if (boll) {
            return (arr[y + 1]) ? y + 1 : 0;
        } else {
            return (arr[y - 1]) ? y - 1 : arr.length - 1;
        }
    }

    function moveSlider(arr, boll) {
        for (let i = 0; i < arr.length; i++) {
            arr[i].classList.remove('active');
        }
        yak = lastElem(arr, yak, boll);
        arr[yak].classList.add('active');
    }


    /*touch slider*/
    let initialPoint;
    let finalPoint;
    wrap.addEventListener('touchstart', function (event) {
        initialPoint = event.changedTouches[0];
    }, false);
    wrap.addEventListener('touchend', function (event) {
        finalPoint = event.changedTouches[0];
        let xAbs = Math.abs(initialPoint.pageX - finalPoint.pageX);
        if (xAbs > 20) {
            if (finalPoint.pageX < initialPoint.pageX) {
                moveSlider(arrELem, true);
            } else {
                moveSlider(arrELem, false);
            }
        }
    }, false);

};

/***/ }),
/* 10 */
/***/ (function(module, exports) {

module.exports = (slider, wrap) => {
    window.addEventListener('load', () => {
        let step = 0;
        let yak = true;
        let sliderPercent = slider.clientWidth / 100;
        let leftMove = wrap.clientWidth / sliderPercent - 100;

        function animate() {

            requestAnimationFrame(function animate() {
                sliderPercent = slider.clientWidth / 100;
                leftMove = wrap.clientWidth / sliderPercent - 100;

                wrap.style.transform = `translate3d(-${step}%,0,0)`;

                if (step <= 0) {
                    yak = true;
                } else if (step > leftMove) {
                    yak = false;
                }
                step += (yak) ? .02 : -.02;

                requestAnimationFrame(animate);
            });
        }

        if (slider.clientWidth < wrap.clientWidth) {
            animate();
        } else {
            wrap.classList.add('small');
        }


    });
};

/***/ }),
/* 11 */
/***/ (function(module, exports) {

module.exports = (arrBlock) => {

    for (let i = 0; i < arrBlock.length; i++) {
        let wrapScroll = arrBlock[i].querySelector('.range_slider>input');
        let wrap = arrBlock[i].querySelector('.news_min_text_wrap');

        if (wrap.clientHeight < wrap.scrollHeight) {

            wrapScroll.addEventListener('input', function () {
                wrap.scrollTop = this.value * ((wrap.scrollHeight - wrap.offsetHeight) / 100);
            });
            wrap.addEventListener('scroll', function () {
                wrapScroll.value = Math.floor(wrap.scrollTop * 100 / (wrap.scrollHeight - wrap.offsetHeight));
            })
        } else {
            arrBlock[i].querySelector('.range_slider').style.display = 'none';
        }

    }


};

/***/ }),
/* 12 */
/***/ (function(module, exports, __webpack_require__) {

const scrollBlock = __webpack_require__(13);

module.exports = (block, arrLine, scroll) => {

    let percentages = scrollBlock(block, scroll);

    for (let i = 0; i < arrLine.length; i++) {
        arrLine[i].style.transform = `translate3d(0,${percentages}%,0)`
    }


};

/***/ }),
/* 13 */
/***/ (function(module, exports) {

let del = 0;
let start = 0;

function percentages(step, row) {
    return Math.round(row / (step / 100));
}

module.exports = (block, scroll) => {


    let min = block.getBoundingClientRect().top - window.innerHeight * .8;
    let max = block.getBoundingClientRect().bottom - window.innerHeight * .8;
    let step = min - max;
    let boll = (min > 0 && max < 0 || min < 0 && max > 0 );


    if (del < scroll && boll) {
        start = percentages(step, min);

    } else if (del > scroll && boll) {
        start = percentages(step, min);
    }
    del = scroll;

    return start;


};

/***/ }),
/* 14 */
/***/ (function(module, exports) {

module.exports = function (st) {
    let nom = window.pageYOffset;

    function animate(draw, duration) {
        requestAnimationFrame(function animate(time) {
            duration -= st;
            draw();
            if (0 < duration) {
                requestAnimationFrame(animate);
            }
        });
    }

    animate(function () {
        window.scrollBy(0, -st);
    }, nom);

};


/***/ }),
/* 15 */
/***/ (function(module, exports) {

module.exports = (arr) => {


    for (let i = 0; i < arr.length; i++) {
        let min = arr[i].getBoundingClientRect().top - window.innerHeight * .7;

        if (min < 0) {
            arr[i].classList.add('active');
        }
        else {
            arr[i].classList.remove('active');
        }
    }

};

/***/ }),
/* 16 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = (arrForm, popup, bg) => {
    let XMLHttpRequestPromise = __webpack_require__(17);
    let popupSuccessful = document.querySelector('.send_successful');

    /*function encode data form*/
    function encode(wrap, name) {
        try {
            let data = wrap.querySelector(`[name=${name}]`).value;
            if (name !== 'price') {
                wrap.querySelector(`[name=${name}]`).value = "";
            }
            return encodeURIComponent(data);
        } catch (err) {
            return encodeURIComponent(defTown.innerText);
        }
    }


    for (let i = 0; i < arrForm.length; i++) {
        let xhrPromise = new XMLHttpRequestPromise();
        arrForm[i].addEventListener('submit', function (subEL) {
            subEL.preventDefault();
            /*remove popup*/
            popup.classList.remove('active');
            bg.classList.remove('active');

            /*get ang send data*/
            let dataForm = `name=${encode(this, 'name')}&email=${encode(this, 'email')}&phone=${encode(this, 'phone')}&text=${encode(this, 'text')}`;
            popupSuccessful.classList.add('active');

            xhrPromise.send({
                method: 'POST',
                url: 'https://form.morgun.ua/form.php',
                data: dataForm
            })
                .then(function (results) {
                    if (results.status !== 200) {
                        throw new Error('request failed');
                    }
                    console.log(results);
                    popupSuccessful.classList.add('active');
                    setTimeout(() => {
                        popupSuccessful.classList.remove('active');
                    }, 4000)
                })
                .catch(function (e) {
                    console.error(e, 'XHR error');
                });

        })
    }

};

/***/ }),
/* 17 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(18);


/***/ }),
/* 18 */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {if (global.Promise == null) {
  global.Promise = __webpack_require__(19);
}

if (Object.assign == null) {
  Object.defineProperty(Object, 'assign', {
    enumerable: false,
    configurable: true,
    writable: true,
    value: __webpack_require__(23)
  });
}

module.exports = __webpack_require__(24);

/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0)))

/***/ }),
/* 19 */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global, setImmediate) {!function(t){"use strict";function e(t){if(t){var e=this;t(function(t){e.resolve(t)},function(t){e.reject(t)})}}function n(t,e){if("function"==typeof t.y)try{var n=t.y.call(i,e);t.p.resolve(n)}catch(o){t.p.reject(o)}else t.p.resolve(e)}function o(t,e){if("function"==typeof t.n)try{var n=t.n.call(i,e);t.p.resolve(n)}catch(o){t.p.reject(o)}else t.p.reject(e)}var r,i,c="fulfilled",u="rejected",s="undefined",f=function(){function e(){for(;n.length-o;){try{n[o]()}catch(e){t.console&&t.console.error(e)}n[o++]=i,o==r&&(n.splice(0,r),o=0)}}var n=[],o=0,r=1024,c=function(){if(typeof MutationObserver!==s){var t=document.createElement("div"),n=new MutationObserver(e);return n.observe(t,{attributes:!0}),function(){t.setAttribute("a",0)}}return typeof setImmediate!==s?function(){setImmediate(e)}:function(){setTimeout(e,0)}}();return function(t){n.push(t),n.length-o==1&&c()}}();e.prototype={resolve:function(t){if(this.state===r){if(t===this)return this.reject(new TypeError("Attempt to resolve promise with self"));var e=this;if(t&&("function"==typeof t||"object"==typeof t))try{var o=!0,i=t.then;if("function"==typeof i)return void i.call(t,function(t){o&&(o=!1,e.resolve(t))},function(t){o&&(o=!1,e.reject(t))})}catch(u){return void(o&&this.reject(u))}this.state=c,this.v=t,e.c&&f(function(){for(var o=0,r=e.c.length;r>o;o++)n(e.c[o],t)})}},reject:function(n){if(this.state===r){this.state=u,this.v=n;var i=this.c;i?f(function(){for(var t=0,e=i.length;e>t;t++)o(i[t],n)}):!e.suppressUncaughtRejectionError&&t.console&&t.console.log("You upset Zousan. Please catch rejections: ",n,n?n.stack:null)}},then:function(t,i){var u=new e,s={y:t,n:i,p:u};if(this.state===r)this.c?this.c.push(s):this.c=[s];else{var l=this.state,a=this.v;f(function(){l===c?n(s,a):o(s,a)})}return u},"catch":function(t){return this.then(null,t)},"finally":function(t){return this.then(t,t)},timeout:function(t,n){n=n||"Timeout";var o=this;return new e(function(e,r){setTimeout(function(){r(Error(n))},t),o.then(function(t){e(t)},function(t){r(t)})})}},e.resolve=function(t){var n=new e;return n.resolve(t),n},e.reject=function(t){var n=new e;return n.reject(t),n},e.all=function(t){function n(n,c){n&&"function"==typeof n.then||(n=e.resolve(n)),n.then(function(e){o[c]=e,r++,r==t.length&&i.resolve(o)},function(t){i.reject(t)})}for(var o=[],r=0,i=new e,c=0;c<t.length;c++)n(t[c],c);return t.length||i.resolve(o),i},typeof module!=s&&module.exports&&(module.exports=e),t.define&&t.define.amd&&t.define([],function(){return e}),t.Zousan=e,e.soon=f}("undefined"!=typeof global?global:this);
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0), __webpack_require__(20).setImmediate))

/***/ }),
/* 20 */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {var scope = (typeof global !== "undefined" && global) ||
            (typeof self !== "undefined" && self) ||
            window;
var apply = Function.prototype.apply;

// DOM APIs, for completeness

exports.setTimeout = function() {
  return new Timeout(apply.call(setTimeout, scope, arguments), clearTimeout);
};
exports.setInterval = function() {
  return new Timeout(apply.call(setInterval, scope, arguments), clearInterval);
};
exports.clearTimeout =
exports.clearInterval = function(timeout) {
  if (timeout) {
    timeout.close();
  }
};

function Timeout(id, clearFn) {
  this._id = id;
  this._clearFn = clearFn;
}
Timeout.prototype.unref = Timeout.prototype.ref = function() {};
Timeout.prototype.close = function() {
  this._clearFn.call(scope, this._id);
};

// Does not start the time, just sets up the members needed.
exports.enroll = function(item, msecs) {
  clearTimeout(item._idleTimeoutId);
  item._idleTimeout = msecs;
};

exports.unenroll = function(item) {
  clearTimeout(item._idleTimeoutId);
  item._idleTimeout = -1;
};

exports._unrefActive = exports.active = function(item) {
  clearTimeout(item._idleTimeoutId);

  var msecs = item._idleTimeout;
  if (msecs >= 0) {
    item._idleTimeoutId = setTimeout(function onTimeout() {
      if (item._onTimeout)
        item._onTimeout();
    }, msecs);
  }
};

// setimmediate attaches itself to the global object
__webpack_require__(21);
// On some exotic environments, it's not clear which object `setimmediate` was
// able to install onto.  Search each possibility in the same order as the
// `setimmediate` library.
exports.setImmediate = (typeof self !== "undefined" && self.setImmediate) ||
                       (typeof global !== "undefined" && global.setImmediate) ||
                       (this && this.setImmediate);
exports.clearImmediate = (typeof self !== "undefined" && self.clearImmediate) ||
                         (typeof global !== "undefined" && global.clearImmediate) ||
                         (this && this.clearImmediate);

/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0)))

/***/ }),
/* 21 */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global, process) {(function (global, undefined) {
    "use strict";

    if (global.setImmediate) {
        return;
    }

    var nextHandle = 1; // Spec says greater than zero
    var tasksByHandle = {};
    var currentlyRunningATask = false;
    var doc = global.document;
    var registerImmediate;

    function setImmediate(callback) {
      // Callback can either be a function or a string
      if (typeof callback !== "function") {
        callback = new Function("" + callback);
      }
      // Copy function arguments
      var args = new Array(arguments.length - 1);
      for (var i = 0; i < args.length; i++) {
          args[i] = arguments[i + 1];
      }
      // Store and register the task
      var task = { callback: callback, args: args };
      tasksByHandle[nextHandle] = task;
      registerImmediate(nextHandle);
      return nextHandle++;
    }

    function clearImmediate(handle) {
        delete tasksByHandle[handle];
    }

    function run(task) {
        var callback = task.callback;
        var args = task.args;
        switch (args.length) {
        case 0:
            callback();
            break;
        case 1:
            callback(args[0]);
            break;
        case 2:
            callback(args[0], args[1]);
            break;
        case 3:
            callback(args[0], args[1], args[2]);
            break;
        default:
            callback.apply(undefined, args);
            break;
        }
    }

    function runIfPresent(handle) {
        // From the spec: "Wait until any invocations of this algorithm started before this one have completed."
        // So if we're currently running a task, we'll need to delay this invocation.
        if (currentlyRunningATask) {
            // Delay by doing a setTimeout. setImmediate was tried instead, but in Firefox 7 it generated a
            // "too much recursion" error.
            setTimeout(runIfPresent, 0, handle);
        } else {
            var task = tasksByHandle[handle];
            if (task) {
                currentlyRunningATask = true;
                try {
                    run(task);
                } finally {
                    clearImmediate(handle);
                    currentlyRunningATask = false;
                }
            }
        }
    }

    function installNextTickImplementation() {
        registerImmediate = function(handle) {
            process.nextTick(function () { runIfPresent(handle); });
        };
    }

    function canUsePostMessage() {
        // The test against `importScripts` prevents this implementation from being installed inside a web worker,
        // where `global.postMessage` means something completely different and can't be used for this purpose.
        if (global.postMessage && !global.importScripts) {
            var postMessageIsAsynchronous = true;
            var oldOnMessage = global.onmessage;
            global.onmessage = function() {
                postMessageIsAsynchronous = false;
            };
            global.postMessage("", "*");
            global.onmessage = oldOnMessage;
            return postMessageIsAsynchronous;
        }
    }

    function installPostMessageImplementation() {
        // Installs an event handler on `global` for the `message` event: see
        // * https://developer.mozilla.org/en/DOM/window.postMessage
        // * http://www.whatwg.org/specs/web-apps/current-work/multipage/comms.html#crossDocumentMessages

        var messagePrefix = "setImmediate$" + Math.random() + "$";
        var onGlobalMessage = function(event) {
            if (event.source === global &&
                typeof event.data === "string" &&
                event.data.indexOf(messagePrefix) === 0) {
                runIfPresent(+event.data.slice(messagePrefix.length));
            }
        };

        if (global.addEventListener) {
            global.addEventListener("message", onGlobalMessage, false);
        } else {
            global.attachEvent("onmessage", onGlobalMessage);
        }

        registerImmediate = function(handle) {
            global.postMessage(messagePrefix + handle, "*");
        };
    }

    function installMessageChannelImplementation() {
        var channel = new MessageChannel();
        channel.port1.onmessage = function(event) {
            var handle = event.data;
            runIfPresent(handle);
        };

        registerImmediate = function(handle) {
            channel.port2.postMessage(handle);
        };
    }

    function installReadyStateChangeImplementation() {
        var html = doc.documentElement;
        registerImmediate = function(handle) {
            // Create a <script> element; its readystatechange event will be fired asynchronously once it is inserted
            // into the document. Do so, thus queuing up the task. Remember to clean up once it's been called.
            var script = doc.createElement("script");
            script.onreadystatechange = function () {
                runIfPresent(handle);
                script.onreadystatechange = null;
                html.removeChild(script);
                script = null;
            };
            html.appendChild(script);
        };
    }

    function installSetTimeoutImplementation() {
        registerImmediate = function(handle) {
            setTimeout(runIfPresent, 0, handle);
        };
    }

    // If supported, we should attach to the prototype of global, since that is where setTimeout et al. live.
    var attachTo = Object.getPrototypeOf && Object.getPrototypeOf(global);
    attachTo = attachTo && attachTo.setTimeout ? attachTo : global;

    // Don't get fooled by e.g. browserify environments.
    if ({}.toString.call(global.process) === "[object process]") {
        // For Node.js before 0.9
        installNextTickImplementation();

    } else if (canUsePostMessage()) {
        // For non-IE10 modern browsers
        installPostMessageImplementation();

    } else if (global.MessageChannel) {
        // For web workers, where supported
        installMessageChannelImplementation();

    } else if (doc && "onreadystatechange" in doc.createElement("script")) {
        // For IE 6–8
        installReadyStateChangeImplementation();

    } else {
        // For older browsers
        installSetTimeoutImplementation();
    }

    attachTo.setImmediate = setImmediate;
    attachTo.clearImmediate = clearImmediate;
}(typeof self === "undefined" ? typeof global === "undefined" ? this : global : self));

/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0), __webpack_require__(22)))

/***/ }),
/* 22 */
/***/ (function(module, exports) {

// shim for using process in browser
var process = module.exports = {};

// cached from whatever global is present so that test runners that stub it
// don't break things.  But we need to wrap it in a try catch in case it is
// wrapped in strict mode code which doesn't define any globals.  It's inside a
// function because try/catches deoptimize in certain engines.

var cachedSetTimeout;
var cachedClearTimeout;

function defaultSetTimout() {
    throw new Error('setTimeout has not been defined');
}
function defaultClearTimeout () {
    throw new Error('clearTimeout has not been defined');
}
(function () {
    try {
        if (typeof setTimeout === 'function') {
            cachedSetTimeout = setTimeout;
        } else {
            cachedSetTimeout = defaultSetTimout;
        }
    } catch (e) {
        cachedSetTimeout = defaultSetTimout;
    }
    try {
        if (typeof clearTimeout === 'function') {
            cachedClearTimeout = clearTimeout;
        } else {
            cachedClearTimeout = defaultClearTimeout;
        }
    } catch (e) {
        cachedClearTimeout = defaultClearTimeout;
    }
} ())
function runTimeout(fun) {
    if (cachedSetTimeout === setTimeout) {
        //normal enviroments in sane situations
        return setTimeout(fun, 0);
    }
    // if setTimeout wasn't available but was latter defined
    if ((cachedSetTimeout === defaultSetTimout || !cachedSetTimeout) && setTimeout) {
        cachedSetTimeout = setTimeout;
        return setTimeout(fun, 0);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedSetTimeout(fun, 0);
    } catch(e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't trust the global object when called normally
            return cachedSetTimeout.call(null, fun, 0);
        } catch(e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error
            return cachedSetTimeout.call(this, fun, 0);
        }
    }


}
function runClearTimeout(marker) {
    if (cachedClearTimeout === clearTimeout) {
        //normal enviroments in sane situations
        return clearTimeout(marker);
    }
    // if clearTimeout wasn't available but was latter defined
    if ((cachedClearTimeout === defaultClearTimeout || !cachedClearTimeout) && clearTimeout) {
        cachedClearTimeout = clearTimeout;
        return clearTimeout(marker);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedClearTimeout(marker);
    } catch (e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't  trust the global object when called normally
            return cachedClearTimeout.call(null, marker);
        } catch (e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error.
            // Some versions of I.E. have different rules for clearTimeout vs setTimeout
            return cachedClearTimeout.call(this, marker);
        }
    }



}
var queue = [];
var draining = false;
var currentQueue;
var queueIndex = -1;

function cleanUpNextTick() {
    if (!draining || !currentQueue) {
        return;
    }
    draining = false;
    if (currentQueue.length) {
        queue = currentQueue.concat(queue);
    } else {
        queueIndex = -1;
    }
    if (queue.length) {
        drainQueue();
    }
}

function drainQueue() {
    if (draining) {
        return;
    }
    var timeout = runTimeout(cleanUpNextTick);
    draining = true;

    var len = queue.length;
    while(len) {
        currentQueue = queue;
        queue = [];
        while (++queueIndex < len) {
            if (currentQueue) {
                currentQueue[queueIndex].run();
            }
        }
        queueIndex = -1;
        len = queue.length;
    }
    currentQueue = null;
    draining = false;
    runClearTimeout(timeout);
}

process.nextTick = function (fun) {
    var args = new Array(arguments.length - 1);
    if (arguments.length > 1) {
        for (var i = 1; i < arguments.length; i++) {
            args[i - 1] = arguments[i];
        }
    }
    queue.push(new Item(fun, args));
    if (queue.length === 1 && !draining) {
        runTimeout(drainQueue);
    }
};

// v8 likes predictible objects
function Item(fun, array) {
    this.fun = fun;
    this.array = array;
}
Item.prototype.run = function () {
    this.fun.apply(null, this.array);
};
process.title = 'browser';
process.browser = true;
process.env = {};
process.argv = [];
process.version = ''; // empty string to avoid regexp issues
process.versions = {};

function noop() {}

process.on = noop;
process.addListener = noop;
process.once = noop;
process.off = noop;
process.removeListener = noop;
process.removeAllListeners = noop;
process.emit = noop;
process.prependListener = noop;
process.prependOnceListener = noop;

process.listeners = function (name) { return [] }

process.binding = function (name) {
    throw new Error('process.binding is not supported');
};

process.cwd = function () { return '/' };
process.chdir = function (dir) {
    throw new Error('process.chdir is not supported');
};
process.umask = function() { return 0; };


/***/ }),
/* 23 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/*
object-assign
(c) Sindre Sorhus
@license MIT
*/


/* eslint-disable no-unused-vars */
var getOwnPropertySymbols = Object.getOwnPropertySymbols;
var hasOwnProperty = Object.prototype.hasOwnProperty;
var propIsEnumerable = Object.prototype.propertyIsEnumerable;

function toObject(val) {
	if (val === null || val === undefined) {
		throw new TypeError('Object.assign cannot be called with null or undefined');
	}

	return Object(val);
}

function shouldUseNative() {
	try {
		if (!Object.assign) {
			return false;
		}

		// Detect buggy property enumeration order in older V8 versions.

		// https://bugs.chromium.org/p/v8/issues/detail?id=4118
		var test1 = new String('abc');  // eslint-disable-line no-new-wrappers
		test1[5] = 'de';
		if (Object.getOwnPropertyNames(test1)[0] === '5') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test2 = {};
		for (var i = 0; i < 10; i++) {
			test2['_' + String.fromCharCode(i)] = i;
		}
		var order2 = Object.getOwnPropertyNames(test2).map(function (n) {
			return test2[n];
		});
		if (order2.join('') !== '0123456789') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test3 = {};
		'abcdefghijklmnopqrst'.split('').forEach(function (letter) {
			test3[letter] = letter;
		});
		if (Object.keys(Object.assign({}, test3)).join('') !==
				'abcdefghijklmnopqrst') {
			return false;
		}

		return true;
	} catch (err) {
		// We don't expect any of the above to throw, but better to be safe.
		return false;
	}
}

module.exports = shouldUseNative() ? Object.assign : function (target, source) {
	var from;
	var to = toObject(target);
	var symbols;

	for (var s = 1; s < arguments.length; s++) {
		from = Object(arguments[s]);

		for (var key in from) {
			if (hasOwnProperty.call(from, key)) {
				to[key] = from[key];
			}
		}

		if (getOwnPropertySymbols) {
			symbols = getOwnPropertySymbols(from);
			for (var i = 0; i < symbols.length; i++) {
				if (propIsEnumerable.call(from, symbols[i])) {
					to[symbols[i]] = from[symbols[i]];
				}
			}
		}
	}

	return to;
};


/***/ }),
/* 24 */
/***/ (function(module, exports, __webpack_require__) {


/*
 * Copyright 2015 Scott Brady
 * MIT License
 * https://github.com/scottbrady/xhr-promise/blob/master/LICENSE
 */
var ParseHeaders, XMLHttpRequestPromise;

ParseHeaders = __webpack_require__(25);


/*
 * Module to wrap an XMLHttpRequest in a promise.
 */

module.exports = XMLHttpRequestPromise = (function() {
  function XMLHttpRequestPromise() {}

  XMLHttpRequestPromise.DEFAULT_CONTENT_TYPE = 'application/x-www-form-urlencoded; charset=UTF-8';


  /*
   * XMLHttpRequestPromise.send(options) -> Promise
   * - options (Object): URL, method, data, etc.
   *
   * Create the XHR object and wire up event handlers to use a promise.
   */

  XMLHttpRequestPromise.prototype.send = function(options) {
    var defaults;
    if (options == null) {
      options = {};
    }
    defaults = {
      method: 'GET',
      data: null,
      headers: {},
      async: true,
      username: null,
      password: null,
      withCredentials: false
    };
    options = Object.assign({}, defaults, options);
    return new Promise((function(_this) {
      return function(resolve, reject) {
        var e, header, ref, value, xhr;
        if (!XMLHttpRequest) {
          _this._handleError('browser', reject, null, "browser doesn't support XMLHttpRequest");
          return;
        }
        if (typeof options.url !== 'string' || options.url.length === 0) {
          _this._handleError('url', reject, null, 'URL is a required parameter');
          return;
        }
        _this._xhr = xhr = new XMLHttpRequest;
        xhr.onload = function() {
          var responseText;
          _this._detachWindowUnload();
          try {
            responseText = _this._getResponseText();
          } catch (_error) {
            _this._handleError('parse', reject, null, 'invalid JSON response');
            return;
          }
          return resolve({
            url: _this._getResponseUrl(),
            status: xhr.status,
            statusText: xhr.statusText,
            responseText: responseText,
            headers: _this._getHeaders(),
            xhr: xhr
          });
        };
        xhr.onerror = function() {
          return _this._handleError('error', reject);
        };
        xhr.ontimeout = function() {
          return _this._handleError('timeout', reject);
        };
        xhr.onabort = function() {
          return _this._handleError('abort', reject);
        };
        _this._attachWindowUnload();
        xhr.open(options.method, options.url, options.async, options.username, options.password);
        if (options.withCredentials) {
          xhr.withCredentials = true;
        }
        if ((options.data != null) && !options.headers['Content-Type']) {
          options.headers['Content-Type'] = _this.constructor.DEFAULT_CONTENT_TYPE;
        }
        ref = options.headers;
        for (header in ref) {
          value = ref[header];
          xhr.setRequestHeader(header, value);
        }
        try {
          return xhr.send(options.data);
        } catch (_error) {
          e = _error;
          return _this._handleError('send', reject, null, e.toString());
        }
      };
    })(this));
  };


  /*
   * XMLHttpRequestPromise.getXHR() -> XMLHttpRequest
   */

  XMLHttpRequestPromise.prototype.getXHR = function() {
    return this._xhr;
  };


  /*
   * XMLHttpRequestPromise._attachWindowUnload()
   *
   * Fix for IE 9 and IE 10
   * Internet Explorer freezes when you close a webpage during an XHR request
   * https://support.microsoft.com/kb/2856746
   *
   */

  XMLHttpRequestPromise.prototype._attachWindowUnload = function() {
    this._unloadHandler = this._handleWindowUnload.bind(this);
    if (window.attachEvent) {
      return window.attachEvent('onunload', this._unloadHandler);
    }
  };


  /*
   * XMLHttpRequestPromise._detachWindowUnload()
   */

  XMLHttpRequestPromise.prototype._detachWindowUnload = function() {
    if (window.detachEvent) {
      return window.detachEvent('onunload', this._unloadHandler);
    }
  };


  /*
   * XMLHttpRequestPromise._getHeaders() -> Object
   */

  XMLHttpRequestPromise.prototype._getHeaders = function() {
    return ParseHeaders(this._xhr.getAllResponseHeaders());
  };


  /*
   * XMLHttpRequestPromise._getResponseText() -> Mixed
   *
   * Parses response text JSON if present.
   */

  XMLHttpRequestPromise.prototype._getResponseText = function() {
    var responseText;
    responseText = typeof this._xhr.responseText === 'string' ? this._xhr.responseText : '';
    switch ((this._xhr.getResponseHeader('Content-Type') || '').split(';')[0]) {
      case 'application/json':
      case 'text/javascript':
        responseText = JSON.parse(responseText + '');
    }
    return responseText;
  };


  /*
   * XMLHttpRequestPromise._getResponseUrl() -> String
   *
   * Actual response URL after following redirects.
   */

  XMLHttpRequestPromise.prototype._getResponseUrl = function() {
    if (this._xhr.responseURL != null) {
      return this._xhr.responseURL;
    }
    if (/^X-Request-URL:/m.test(this._xhr.getAllResponseHeaders())) {
      return this._xhr.getResponseHeader('X-Request-URL');
    }
    return '';
  };


  /*
   * XMLHttpRequestPromise._handleError(reason, reject, status, statusText)
   * - reason (String)
   * - reject (Function)
   * - status (String)
   * - statusText (String)
   */

  XMLHttpRequestPromise.prototype._handleError = function(reason, reject, status, statusText) {
    this._detachWindowUnload();
    return reject({
      reason: reason,
      status: status || this._xhr.status,
      statusText: statusText || this._xhr.statusText,
      xhr: this._xhr
    });
  };


  /*
   * XMLHttpRequestPromise._handleWindowUnload()
   */

  XMLHttpRequestPromise.prototype._handleWindowUnload = function() {
    return this._xhr.abort();
  };

  return XMLHttpRequestPromise;

})();


/***/ }),
/* 25 */
/***/ (function(module, exports, __webpack_require__) {

var trim = __webpack_require__(26)
  , forEach = __webpack_require__(27)
  , isArray = function(arg) {
      return Object.prototype.toString.call(arg) === '[object Array]';
    }

module.exports = function (headers) {
  if (!headers)
    return {}

  var result = {}

  forEach(
      trim(headers).split('\n')
    , function (row) {
        var index = row.indexOf(':')
          , key = trim(row.slice(0, index)).toLowerCase()
          , value = trim(row.slice(index + 1))

        if (typeof(result[key]) === 'undefined') {
          result[key] = value
        } else if (isArray(result[key])) {
          result[key].push(value)
        } else {
          result[key] = [ result[key], value ]
        }
      }
  )

  return result
}

/***/ }),
/* 26 */
/***/ (function(module, exports) {


exports = module.exports = trim;

function trim(str){
  return str.replace(/^\s*|\s*$/g, '');
}

exports.left = function(str){
  return str.replace(/^\s*/, '');
};

exports.right = function(str){
  return str.replace(/\s*$/, '');
};


/***/ }),
/* 27 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var isCallable = __webpack_require__(28);

var toStr = Object.prototype.toString;
var hasOwnProperty = Object.prototype.hasOwnProperty;

var forEachArray = function forEachArray(array, iterator, receiver) {
    for (var i = 0, len = array.length; i < len; i++) {
        if (hasOwnProperty.call(array, i)) {
            if (receiver == null) {
                iterator(array[i], i, array);
            } else {
                iterator.call(receiver, array[i], i, array);
            }
        }
    }
};

var forEachString = function forEachString(string, iterator, receiver) {
    for (var i = 0, len = string.length; i < len; i++) {
        // no such thing as a sparse string.
        if (receiver == null) {
            iterator(string.charAt(i), i, string);
        } else {
            iterator.call(receiver, string.charAt(i), i, string);
        }
    }
};

var forEachObject = function forEachObject(object, iterator, receiver) {
    for (var k in object) {
        if (hasOwnProperty.call(object, k)) {
            if (receiver == null) {
                iterator(object[k], k, object);
            } else {
                iterator.call(receiver, object[k], k, object);
            }
        }
    }
};

var forEach = function forEach(list, iterator, thisArg) {
    if (!isCallable(iterator)) {
        throw new TypeError('iterator must be a function');
    }

    var receiver;
    if (arguments.length >= 3) {
        receiver = thisArg;
    }

    if (toStr.call(list) === '[object Array]') {
        forEachArray(list, iterator, receiver);
    } else if (typeof list === 'string') {
        forEachString(list, iterator, receiver);
    } else {
        forEachObject(list, iterator, receiver);
    }
};

module.exports = forEach;


/***/ }),
/* 28 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var fnToStr = Function.prototype.toString;

var constructorRegex = /^\s*class\b/;
var isES6ClassFn = function isES6ClassFunction(value) {
	try {
		var fnStr = fnToStr.call(value);
		return constructorRegex.test(fnStr);
	} catch (e) {
		return false; // not a function
	}
};

var tryFunctionObject = function tryFunctionToStr(value) {
	try {
		if (isES6ClassFn(value)) { return false; }
		fnToStr.call(value);
		return true;
	} catch (e) {
		return false;
	}
};
var toStr = Object.prototype.toString;
var fnClass = '[object Function]';
var genClass = '[object GeneratorFunction]';
var hasToStringTag = typeof Symbol === 'function' && typeof Symbol.toStringTag === 'symbol';

module.exports = function isCallable(value) {
	if (!value) { return false; }
	if (typeof value !== 'function' && typeof value !== 'object') { return false; }
	if (typeof value === 'function' && !value.prototype) { return true; }
	if (hasToStringTag) { return tryFunctionObject(value); }
	if (isES6ClassFn(value)) { return false; }
	var strClass = toStr.call(value);
	return strClass === fnClass || strClass === genClass;
};


/***/ }),
/* 29 */
/***/ (function(module, exports, __webpack_require__) {

!function(e,r){ true?module.exports=r():"function"==typeof define&&define.amd?define([],r):"object"==typeof exports?exports.vanillaTextMask=r():e.vanillaTextMask=r()}(this,function(){return function(e){function r(n){if(t[n])return t[n].exports;var o=t[n]={exports:{},id:n,loaded:!1};return e[n].call(o.exports,o,o.exports,r),o.loaded=!0,o.exports}var t={};return r.m=e,r.c=t,r.p="",r(0)}([function(e,r,t){"use strict";function n(e){return e&&e.__esModule?e:{default:e}}function o(e){var r=e.inputElement,t=(0,u.default)(e),n=function(e){var r=e.target.value;return t.update(r)};return r.addEventListener("input",n),t.update(r.value),{textMaskInputElement:t,destroy:function(){r.removeEventListener("input",n)}}}Object.defineProperty(r,"__esModule",{value:!0}),r.conformToMask=void 0,r.maskInput=o;var i=t(2);Object.defineProperty(r,"conformToMask",{enumerable:!0,get:function(){return n(i).default}});var a=t(5),u=n(a);r.default=o},function(e,r){"use strict";Object.defineProperty(r,"__esModule",{value:!0}),r.placeholderChar="_",r.strFunction="function"},function(e,r,t){"use strict";function n(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:l,r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:u,t=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};if(!(0,i.isArray)(r)){if(("undefined"==typeof r?"undefined":o(r))!==a.strFunction)throw new Error("Text-mask:conformToMask; The mask property must be an array.");r=r(e,t),r=(0,i.processCaretTraps)(r).maskWithoutCaretTraps}var n=t.guide,s=void 0===n||n,f=t.previousConformedValue,d=void 0===f?l:f,c=t.placeholderChar,p=void 0===c?a.placeholderChar:c,v=t.placeholder,h=void 0===v?(0,i.convertMaskToPlaceholder)(r,p):v,m=t.currentCaretPosition,y=t.keepCharPositions,g=s===!1&&void 0!==d,b=e.length,C=d.length,k=h.length,x=r.length,P=b-C,T=P>0,O=m+(T?-P:0),M=O+Math.abs(P);if(y===!0&&!T){for(var w=l,S=O;S<M;S++)h[S]===p&&(w+=p);e=e.slice(0,O)+w+e.slice(O,b)}for(var _=e.split(l).map(function(e,r){return{char:e,isNew:r>=O&&r<M}}),j=b-1;j>=0;j--){var V=_[j].char;if(V!==p){var A=j>=O&&C===x;V===h[A?j-P:j]&&_.splice(j,1)}}var E=l,N=!1;e:for(var F=0;F<k;F++){var I=h[F];if(I===p){if(_.length>0)for(;_.length>0;){var L=_.shift(),R=L.char,J=L.isNew;if(R===p&&g!==!0){E+=p;continue e}if(r[F].test(R)){if(y===!0&&J!==!1&&d!==l&&s!==!1&&T){for(var W=_.length,q=null,z=0;z<W;z++){var B=_[z];if(B.char!==p&&B.isNew===!1)break;if(B.char===p){q=z;break}}null!==q?(E+=R,_.splice(q,1)):F--}else E+=R;continue e}N=!0}g===!1&&(E+=h.substr(F,k));break}E+=I}if(g&&T===!1){for(var D=null,G=0;G<E.length;G++)h[G]===p&&(D=G);E=null!==D?E.substr(0,D+1):l}return{conformedValue:E,meta:{someCharsRejected:N}}}Object.defineProperty(r,"__esModule",{value:!0});var o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};r.default=n;var i=t(3),a=t(1),u=[],l=""},function(e,r,t){"use strict";function n(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:s,r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:l.placeholderChar;if(!o(e))throw new Error("Text-mask:convertMaskToPlaceholder; The mask property must be an array.");if(e.indexOf(r)!==-1)throw new Error("Placeholder character must not be used as part of the mask. Please specify a character that is not present in your mask as your placeholder character.\n\n"+("The placeholder character that was received is: "+JSON.stringify(r)+"\n\n")+("The mask that was received is: "+JSON.stringify(e)));return e.map(function(e){return e instanceof RegExp?r:e}).join("")}function o(e){return Array.isArray&&Array.isArray(e)||e instanceof Array}function i(e){return"string"==typeof e||e instanceof String}function a(e){return"number"==typeof e&&void 0===e.length&&!isNaN(e)}function u(e){for(var r=[],t=void 0;t=e.indexOf(f),t!==-1;)r.push(t),e.splice(t,1);return{maskWithoutCaretTraps:e,indexes:r}}Object.defineProperty(r,"__esModule",{value:!0}),r.convertMaskToPlaceholder=n,r.isArray=o,r.isString=i,r.isNumber=a,r.processCaretTraps=u;var l=t(1),s=[],f="[]"},function(e,r){"use strict";function t(e){var r=e.previousConformedValue,t=void 0===r?o:r,i=e.previousPlaceholder,a=void 0===i?o:i,u=e.currentCaretPosition,l=void 0===u?0:u,s=e.conformedValue,f=e.rawValue,d=e.placeholderChar,c=e.placeholder,p=e.indexesOfPipedChars,v=void 0===p?n:p,h=e.caretTrapIndexes,m=void 0===h?n:h;if(0===l||!f.length)return 0;var y=f.length,g=t.length,b=c.length,C=s.length,k=y-g,x=k>0,P=0===g,T=k>1&&!x&&!P;if(T)return l;var O=x&&(t===s||s===c),M=0,w=void 0,S=void 0;if(O)M=l-k;else{var _=s.toLowerCase(),j=f.toLowerCase(),V=j.substr(0,l).split(o),A=V.filter(function(e){return _.indexOf(e)!==-1});S=A[A.length-1];var E=a.substr(0,A.length).split(o).filter(function(e){return e!==d}).length,N=c.substr(0,A.length).split(o).filter(function(e){return e!==d}).length,F=N!==E,I=void 0!==a[A.length-1]&&void 0!==c[A.length-2]&&a[A.length-1]!==d&&a[A.length-1]!==c[A.length-1]&&a[A.length-1]===c[A.length-2];!x&&(F||I)&&E>0&&c.indexOf(S)>-1&&void 0!==f[l]&&(w=!0,S=f[l]);for(var L=v.map(function(e){return _[e]}),R=L.filter(function(e){return e===S}).length,J=A.filter(function(e){return e===S}).length,W=c.substr(0,c.indexOf(d)).split(o).filter(function(e,r){return e===S&&f[r]!==e}).length,q=W+J+R+(w?1:0),z=0,B=0;B<C;B++){var D=_[B];if(M=B+1,D===S&&z++,z>=q)break}}if(x){for(var G=M,H=M;H<=b;H++)if(c[H]===d&&(G=H),c[H]===d||m.indexOf(H)!==-1||H===b)return G}else if(w){for(var K=M-1;K>=0;K--)if(s[K]===S||m.indexOf(K)!==-1||0===K)return K}else for(var Q=M;Q>=0;Q--)if(c[Q-1]===d||m.indexOf(Q)!==-1||0===Q)return Q}Object.defineProperty(r,"__esModule",{value:!0}),r.default=t;var n=[],o=""},function(e,r,t){"use strict";function n(e){return e&&e.__esModule?e:{default:e}}function o(e){var r={previousConformedValue:void 0,previousPlaceholder:void 0};return{state:r,update:function(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:e,o=n.inputElement,s=n.mask,d=n.guide,m=n.pipe,g=n.placeholderChar,b=void 0===g?v.placeholderChar:g,C=n.keepCharPositions,k=void 0!==C&&C,x=n.showMask,P=void 0!==x&&x;if("undefined"==typeof t&&(t=o.value),t!==r.previousConformedValue){("undefined"==typeof s?"undefined":l(s))===y&&void 0!==s.pipe&&void 0!==s.mask&&(m=s.pipe,s=s.mask);var T=void 0,O=void 0;if(s instanceof Array&&(T=(0,p.convertMaskToPlaceholder)(s,b)),s!==!1){var M=a(t),w=o.selectionEnd,S=r.previousConformedValue,_=r.previousPlaceholder,j=void 0;if(("undefined"==typeof s?"undefined":l(s))===v.strFunction){if(O=s(M,{currentCaretPosition:w,previousConformedValue:S,placeholderChar:b}),O===!1)return;var V=(0,p.processCaretTraps)(O),A=V.maskWithoutCaretTraps,E=V.indexes;O=A,j=E,T=(0,p.convertMaskToPlaceholder)(O,b)}else O=s;var N={previousConformedValue:S,guide:d,placeholderChar:b,pipe:m,placeholder:T,currentCaretPosition:w,keepCharPositions:k},F=(0,c.default)(M,O,N),I=F.conformedValue,L=("undefined"==typeof m?"undefined":l(m))===v.strFunction,R={};L&&(R=m(I,u({rawValue:M},N)),R===!1?R={value:S,rejected:!0}:(0,p.isString)(R)&&(R={value:R}));var J=L?R.value:I,W=(0,f.default)({previousConformedValue:S,previousPlaceholder:_,conformedValue:J,placeholder:T,rawValue:M,currentCaretPosition:w,placeholderChar:b,indexesOfPipedChars:R.indexesOfPipedChars,caretTrapIndexes:j}),q=J===T&&0===W,z=P?T:h,B=q?z:J;r.previousConformedValue=B,r.previousPlaceholder=T,o.value!==B&&(o.value=B,i(o,W))}}}}}function i(e,r){document.activeElement===e&&(g?b(function(){return e.setSelectionRange(r,r,m)},0):e.setSelectionRange(r,r,m))}function a(e){if((0,p.isString)(e))return e;if((0,p.isNumber)(e))return String(e);if(void 0===e||null===e)return h;throw new Error("The 'value' provided to Text Mask needs to be a string or a number. The value received was:\n\n "+JSON.stringify(e))}Object.defineProperty(r,"__esModule",{value:!0});var u=Object.assign||function(e){for(var r=1;r<arguments.length;r++){var t=arguments[r];for(var n in t)Object.prototype.hasOwnProperty.call(t,n)&&(e[n]=t[n])}return e},l="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};r.default=o;var s=t(4),f=n(s),d=t(2),c=n(d),p=t(3),v=t(1),h="",m="none",y="object",g="undefined"!=typeof navigator&&/Android/i.test(navigator.userAgent),b="undefined"!=typeof requestAnimationFrame?requestAnimationFrame:setTimeout}])});

/***/ }),
/* 30 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = (arrDote, doteBlock, header) => {
    const wrapDoteElem = doteBlock.querySelector('.dote_block_list');
    const downBtn = doteBlock.querySelector('.dote_block_next');
    const scrollFunc = __webpack_require__(31);
    const arrDoteTouch = [];
    const arrDoteLength = arrDote.length;
    let counter = 0;


    function whatBg(elem) {
        if (elem === arrDoteTouch[0]) {
            doteBlock.classList.add('white');
        } else {
            doteBlock.classList.remove('white');
        }
    }

    function setClass(int, arr) {
        for (let i = 0; i < arr.length; i++) {
            arr[i].classList.remove('active');
        }
        arr[int].classList.add('active');
    }

    function whatScroll() {
        for (let i = 0; i < arrDoteLength; i++) {
            if (arrDote[i].getBoundingClientRect().top < 100 && arrDote[i].getBoundingClientRect().top > -100) {
                setClass(i, arrDoteTouch);
                counter = i;
                if (i === 0) {
                    doteBlock.classList.add('white');
                } else {
                    doteBlock.classList.remove('white');
                }
            }
        }
    }

    downBtn.addEventListener('click', () => {
        if (counter < arrDoteLength - 1) {
            scrollFunc(arrDote[counter + 1], header);
        }
    });
    for (let i = 0; i < arrDoteLength; i++) {
        let elemDote = document.createElement('div');
        elemDote.className = 'dote_block_elem';

        elemDote.addEventListener('click', function () {
            whatBg(this);
            for (let i = 0; i < arrDoteTouch.length; i++) {
                arrDoteTouch[i].classList.remove('active');
            }
            elemDote.classList.add('active');
            scrollFunc(arrDote[i], header);
        });

        wrapDoteElem.appendChild(elemDote);
        arrDoteTouch.push(elemDote);
    }

    arrDoteTouch[0].classList.add('active');


    window.addEventListener('scroll', () => {
        whatScroll();
        if (counter === arrDoteLength - 1) {
            doteBlock.classList.add('up')
        } else {
            doteBlock.classList.remove('up')
        }
    });

};

/***/ }),
/* 31 */
/***/ (function(module, exports) {

module.exports = (block, header) => {

    let top = block.getBoundingClientRect().top;

    if (top > 0) {
        animatePlus(block);
    } else if (top < 0) {
        animateMinus(block);
    }

    function animatePlus(block) {
        let timeMove = 50;
        requestAnimationFrame(function animate() {
            let scrollTest = Math.floor(window.pageYOffset);
            window.scrollBy(0, timeMove += 3);
            let scrollStop = Math.floor(window.pageYOffset);
            if (0 < block.getBoundingClientRect().top - header.clientHeight && scrollTest !== scrollStop) {
                requestAnimationFrame(animate);
            }
            else {
                window.scrollBy(0, (block.getBoundingClientRect().top - header.clientHeight));
            }
        });
    }

    function animateMinus(block) {
        let timeMove = 50;
        requestAnimationFrame(function animate() {
            window.scrollBy(0, -(timeMove += 3));
            if (0 > block.getBoundingClientRect().top - header.clientHeight && window.pageYOffset !== 0) {
                requestAnimationFrame(animate);
            }
            else {
                window.scrollBy(0, (block.getBoundingClientRect().top - header.clientHeight));
            }
        });
    }
};

/***/ }),
/* 32 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);
//# sourceMappingURL=main.js.map
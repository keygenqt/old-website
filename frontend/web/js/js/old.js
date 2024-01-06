
// ------------------------------------------
// canvas-animate.js - v1.0.0
// Animate folder with images library
// Copyright (c) 2017 Vitaliy Zarubin (@keygenqt)
// MIT license
//
// ------------------------------------------

(function (root, factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define([], factory);
    } else if (typeof module === 'object' && module.exports) {
        // Node. Does not work with strict CommonJS, but
        // only CommonJS-like environments that support module.exports,
        // like Node.
        module.exports = factory();
    } else {
        // Browser globals (root is window)
        root.CanvasAnimate = factory();
    }
}(this, function () {
    var CanvasAnimate = function(el, options){
        "use strict";

        var self = Object.create(CanvasAnimate.prototype);

        self.element = [];
        self.par = [];
        self.can = [];
        self.ctx = [];

        if (el.indexOf('#') === -1) {
            self.element = document.getElementsByClassName(el.replace('.', ''));
        } else {
            self.element.push(document.getElementById(el.replace('#', '')));
        }

        self._options = {
            mode: 'cover', // cover, center
            start: 1,
            fps: 25,
            pad: 0,
            extension: 'jpg',
            debug: false
        };

        self._options = Object.assign(self._options, options);

        var pad = function (number, length) {
            var negative = number < 0;
            var str = '' + Math.abs(number);
            while (str.length < length) {
                str = '0' + str;
            }
            if (negative) str = '-' + str;
            return str;
        };

        var detectmob = function () {
           return !!(navigator.userAgent.match(/Android/i)
           || navigator.userAgent.match(/webOS/i)
           || navigator.userAgent.match(/iPhone/i)
           || navigator.userAgent.match(/iPad/i)
           || navigator.userAgent.match(/iPod/i)
           || navigator.userAgent.match(/BlackBerry/i)
           || navigator.userAgent.match(/Windows Phone/i));
        };

        self._options.fps = 1000 / self._options.fps;
        self._options.mob = detectmob();
        self._options.index = self._options.start;
        self._options.queryTime = 1;
        self._options.stop = false;
        self._options.img = new Image();

        if (self._options.desktopPath === undefined || self._options.desktopPath === undefined) {
            if (self._options.debug) {
                console.log('Specify the path to the folders - desktopPath adn mobilePath');
            }
            return;
        }

        self._options.desktopPath = self._options.desktopPath.length-1 === self._options.desktopPath.lastIndexOf('/') ? self._options.desktopPath : self._options.desktopPath + '/';
        self._options.mobilePath = self._options.mobilePath.length-1 === self._options.mobilePath.lastIndexOf('/') ? self._options.mobilePath : self._options.mobilePath + '/';

        var init = function() {
            for (var  i = 0; i<self.element.length; i++) {
                self.element[i].style.position = 'relative';

                var div = document.createElement('div');

                div.style.overflow = 'hidden';
                div.style.height = '100%';
                div.style.width = '100%';
                div.style.position = 'absolute';
                div.style.top = 0;
                div.style.left = 0;
                div.style.right = 0;

                var canvas = document.createElement('canvas');

                canvas.style.width = '100%';
                canvas.style.position = 'absolute';
                canvas.style.top = 0;
                canvas.style.left = 0;
                canvas.style.right = 0;

                self.par.push(div);
                self.can.push(canvas);
                self.ctx.push(canvas.getContext('2d'));

                div.appendChild(canvas);
                self.element[i].appendChild(div);

                self.resizeHandler = function () {
                    self.resize();
                    self.updateCanvas();
                };

                self.onloadHandler = function () {
                    setTimeout(function() { self.resizeHandler() }, 10);
                    setTimeout(function() { self.resizeHandler() }, 50);
                    setTimeout(function() { self.resizeHandler() }, 150);
                    setTimeout(function() { self.resizeHandler() }, 500);
                };

                window.addEventListener('resize', self.resizeHandler, false);
                window.addEventListener('load', self.onloadHandler, false);
            }
        };

        self.updateCanvas = function () {

            if (self._options.stop) {
                return;
            }

            var name = (self._options.pad ? pad(self._options.index, self._options.pad) : self._options.index) + '.' + self._options.extension;

            if (self._options.queryTime > 50 || self._options.mob) {
                self._options.img.src = self._options.mobilePath + name;
               if (!self._options.mob) {
                   var imgLarge = new Image();
                   imgLarge.src = self._options.desktopPath + name;
               }
            } else {
                self._options.img.src = self._options.desktopPath + name;
            }

            var startTime = (new Date).getTime();
            self._options.img.onload = function() {
                self._options.queryTime =(new Date).getTime() - startTime;

                for (var  i = 0; i<self.ctx.length; i++) {
                    if (self.can[i].width !== self._options.img.width) {
                        self.can[i].height = self._options.img.height;
                        self.can[i].width = self._options.img.width;
                    }
                    self.ctx[i].clearRect(0, 0, self.can[i].width, self.can[i].height);
                    self.ctx[i].drawImage(self._options.img, 0, 0);
                }

                self._options.index++;

                setTimeout(function() { self.updateCanvas(); }, self._options.fps);
            };
            self._options.img.onerror = function () {
                if (self._options.index !== self._options.start) {
                    self._options.index = self._options.start;
                    setTimeout(function() { self.updateCanvas(); }, self._options.fps);
                } else {
                    if (self._options.debug) {
                        console.log('Not found first image');
                    }
                }
            }
        };

        self.resize = function () {

            for (var  i = 0; i<self.can.length; i++) {
                if (self.par[i].clientHeight > self.can[i].clientHeight) {
                    var h = self.can[i].clientHeight;
                    self.can[i].style.height = self.par[i].clientHeight + 'px';
                    self.can[i].style.width = (self.can[i].clientWidth * self.par[i].clientHeight / h) + 'px';
                }
                else if (self.par[i].clientWidth > self.can[i].clientWidth) {
                    self.can[i].style.height = '';
                    self.can[i].style.width = '100%';
                }

                var bH = self.par[i].clientHeight,
                    bW = self.par[i].clientWidth,
                    cH = self.can[i].clientHeight,
                    cW = self.can[i].clientWidth;

                if (self._options.mode === 'cover') {
                    if (bH < cH) {
                        self.can[i].style.top = ((bH - cH) / 2) + 'px';
                    } else {
                        self.can[i].style.top = 0 + "px";
                    }
                }
                if (self._options.mode === 'cover' || self._options.mode === 'center') {
                    if (bW < cW) {
                        self.can[i].style.left = ((bW - cW) / 2) + 'px';
                    } else {
                        self.can[i].style.left = 0 + 'px';
                    }
                }
            }
        };

        self.start = function() {
            self._options.stop = false;
            self.updateCanvas();
        };

        self.pause = function() {
            self._options.stop = true;
        };

        self.isPause = function() {
            return self._options.stop;
        };

        self.destroy = function() {
            self._options.stop = true;
            for (var  i = 0; i<self.element.length; i++) {
                self.element[i].style.position = '';
                while (self.element[i].firstChild) {
                    self.element[i].removeChild(self.element[i].firstChild);
                }
            }
        };

        init();
        return self;
    };
    return CanvasAnimate;
}));
/*
 * Copyright 2020 Vitaliy Zarubin
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

(function ($) {
    $.fn.parallax = function (options) {

        const element = this;

        const settings = $.extend({
            image: "",
            height: 0,
        }, options);

        if (settings.image !== "") {
            $(element).append('<img style="position: absolute; width: 100%; top: 0;" src="'+settings.image+'" alt="">');
        }
        if (settings.height !== 0) {
            $(element).css('height', settings.height);
        }

        $(element).css('position', 'relative');
        $(element).css('overflow', 'hidden');

        $(window).bind("scroll resize", function (e) {
            let scroll = $(e.target).scrollTop();
            let body = document.body, html = document.documentElement;
            let hBody = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
            let image = element.find('img');
            let hImage = image.height();
            let hHide = hBody - $(window).height();
            let top = scroll * (hImage - element.height()) / hHide;
            image.css('top', top * -1);
        });

        return element;
    };
}(jQuery));
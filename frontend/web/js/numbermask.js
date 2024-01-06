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
    $.fn.numbermask = function (options) {

        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            return false;
        }

        const element = this;
        let value = '';

        const settings = $.extend({
            mask: "+# (###) ###-##-##"
        }, options);

        // block press Backspace
        let isRemove = false;

        // block shift + symbol keys
        let isShift = false;

        // search forward position
        const forward = function (pos) {
            const val = element.val();

            if (val.length === pos) {
                return false;
            }

            const s = val.substring(pos + 1, pos + 2);
            if (s === '_' || s.match(/\d/g)) {
                element.get(0).setSelectionRange(pos + 1, pos + 2);
            } else {
                if (val.length !== pos + 2) {
                    forward(pos + 1);
                }
            }
        };

        // search back position
        const back = function (pos) {
            const val = element.val();
            const s = val.substring(pos, pos - 1);

            if (s === '_' || s.match(/\d/g)) {
                element.get(0).setSelectionRange(pos - 1, pos);
            } else {
                if (pos - 1 > 0) {
                    back(pos - 1);
                }
            }
        };

        // keyup listener
        $(element).bind("keyup", function (e) {
            let val = element.val();
            if (val.replace(/\d/gi, '_') !== settings.mask.replace(/\#/g, "_")) {
                let pos = element[0].selectionStart;
                element.val(value);
                if (value.substring(pos, pos + 1).match(/\d/g)) {
                    element.get(0).setSelectionRange(pos-1, pos);
                } else {
                    element.get(0).setSelectionRange(pos, pos+1);
                }
            }
            if (val.length > settings.mask.length) {
                element.val(val.substring(0, settings.mask.length));
            }
            if (e.keyCode === 8) {
                isRemove = false;
            }
            if (e.keyCode === 16) {
                isShift = false;
            }
        });

        // keydown listener
        $(element).bind("keydown", function (e) {

            // press enter
            if (e.keyCode === 13) {
                $(element).closest('form').submit();
                return false;
            }

            if (isShift === true) {
                return false;
            }

            // press shift
            if (e.keyCode === 16) {
                isShift = true;
            }

            if (isRemove === true) {
                return false;
            }

            // press backspace
            if (e.keyCode === 8) {
                isRemove = true;
            }

            if (e.keyCode !== 37 && e.keyCode !== 39 && e.keyCode !== 8 && (e.keyCode > 57 || e.keyCode < 48)) {
                return false;
            }

            value = element.val();
            let pos = element[0].selectionStart;

            if (pos === 0 && e.keyCode === 8) {
                return false;
            }

            if (pos === settings.mask.length && e.keyCode !== 37 && e.keyCode !== 39 && e.keyCode !== 8) {
                return false;
            }

            // press backspace
            if (e.keyCode === 8) {
                const select2 = function (pos) {
                    if (value.substring(pos, pos + 1).match(/\d/g)) {
                        setTimeout(function () {
                            element.val(value.substring(0, pos) + "_" + value.substring(pos + 1, value.length));
                            element.get(0).setSelectionRange(pos, pos + 1);
                        }, 5);
                        return false;
                    } else {
                        if (pos > 0) {
                            select2(pos - 1);
                        }
                    }
                };
                if (pos > 0) {
                    select2(pos);
                }
            }

            // press <-
            if (e.keyCode === 37) {
                back(pos);
                return false;
            }

            // press ->
            if (e.keyCode === 39) {
                forward(pos);
                return false;
            }

        });

        $(element).bind("keypress click", function (e) {

            let pos = element[0].selectionStart;
            let val = element.val();

            // search position after set symbol
            const select = function (pos) {
                const s = val.substring(pos, pos + 1);
                if (s === '_' || s.match(/\d/g)) {
                    element.get(0).setSelectionRange(pos, pos + 1);
                    if (e.type === 'click') {
                        setTimeout(function () {
                            element.get(0).setSelectionRange(pos, pos + 1);
                        }, 5);
                    } else {
                        setTimeout(function () {
                            forward(pos);
                        }, 5);
                    }
                } else {
                    if (val.length !== pos + 1) {
                        select(pos + 1);
                    }
                }
            };
            if (val.length !== pos) {
                select(pos);
            }
        });

        // set mask
        if (element.val() === "") {
            setTimeout(function () {
                element.val(settings.mask.replace(/\#/g, "_"));
            }, 1);
        }

        return element;
    };
}(jQuery));
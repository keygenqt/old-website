/**
 * Touch module.
 *
 * @param {Object} Glide
 * @param {Object} Core
 * @return {Touch}
 */
var Touch = function(Glide, Core) {

    /**
     * Touch event object.
     *
     * @var {Object}
     */
    var touch;

    /**
     * Touch constructor.
     */
    function Touch() {

        this.dragging = false;

        // Bind touch event.
        if (Glide.options.touchDistance) {
            Glide.track.on({
                'touchstart.glide': $.proxy(this.start, this)
            });
        }

        // Bind mouse drag event.
        if (Glide.options.dragDistance) {
            Glide.track.on({
                'mousedown.glide': $.proxy(this.start, this)
            });
        }

    }

    /**
     * Unbind touch events.
     *
     * @return {Void}
     */
    Touch.prototype.unbind = function() {
        Glide.track
            .off('touchstart.glide mousedown.glide')
            .off('touchmove.glide mousemove.glide')
            .off('touchend.glide touchcancel.glide mouseup.glide mouseleave.glide');
    };

    /**
     * Start touch event.
     *
     * @param {Object} event
     * @return {Void}
     */
    Touch.prototype.start = function(event) {

        // Escape if events disabled
        // or already dragging.
        if (!Core.Events.disabled && !this.dragging) {

            // Store event.
            if (event.type === 'mousedown') {
                touch = event.originalEvent;
            } else {
                touch = event.originalEvent.touches[0] || event.originalEvent.changedTouches[0];
            }

            // Turn off jumping flag.
            Core.Transition.jumping = true;

            // Get touch start points.
            this.touchStartX = parseInt(touch.pageX);
            this.touchStartY = parseInt(touch.pageY);
            this.touchSin = null;
            this.dragging = true;

            Glide.track.on({
                'touchmove.glide mousemove.glide': Core.Helper.throttle($.proxy(this.move, this), Glide.options.throttle),
                'touchend.glide touchcancel.glide mouseup.glide mouseleave.glide': $.proxy(this.end, this)
            });

            // Detach clicks inside track.
            Core.Events
                .detachClicks()
                .call(Glide.options.swipeStart)
                .trigger('swipeStart');
            // Pause if autoplay.
            Core.Run.pause();

        }

    };

    /**
     * Touch move event.
     *
     * @param  {Object} event
     * @return {Void}
     */
    Touch.prototype.move = function(event) {

        // Escape if events not disabled
        // or not dragging.
        if (!Core.Events.disabled && this.dragging) {

            // Store event.
            if (event.type === 'mousemove') {
                touch = event.originalEvent;
            } else {
                touch = event.originalEvent.touches[0] || event.originalEvent.changedTouches[0];
            }

            // Calculate start, end points.
            var subExSx = parseInt(touch.pageX) - this.touchStartX;
            var subEySy = parseInt(touch.pageY) - this.touchStartY;
            // Bitwise subExSx pow.
            var powEX = Math.abs(subExSx << 2);
            // Bitwise subEySy pow.
            var powEY = Math.abs(subEySy << 2);
            // Calculate the length of the hypotenuse segment.
            var touchHypotenuse = Math.sqrt(powEX + powEY);
            // Calculate the length of the cathetus segment.
            var touchCathetus = Math.sqrt(Core.Helper.byAxis(powEY, powEX));

            // Calculate the sine of the angle.
            this.touchSin = Math.asin(touchCathetus / touchHypotenuse);
            // Save distance.
            this.distance = Core.Helper.byAxis(
                (touch.pageX - this.touchStartX),
                (touch.pageY - this.touchStartY)
            );

            // Make offset animation.
            // While angle is lower than 45 degree.
            if ((this.touchSin * 180 / Math.PI) < 45) {
                Core.Animation.make(Core.Helper.byAxis(subExSx, subEySy));
            }

            // Prevent clicks inside track.
            Core.Events
                .preventClicks()
                .call(Glide.options.swipeMove)
                .trigger('swipeMove');

            // While mode is vertical, we don't want to block scroll when we reach start or end of slider
            // In that case we need to escape before preventing default event.
            if (Core.Build.isMode('vertical')) {
                if (Core.Run.isStart() && subEySy > 0) {
                    return;
                }
                if (Core.Run.isEnd() && subEySy < 0) {
                    return;
                }
            }

            // While angle is lower than 45 degree.
            if ((this.touchSin * 180 / Math.PI) < 45) {
                // Prevent propagation.
                event.stopPropagation();
                // Prevent scrolling.
                event.preventDefault();
                // Add dragging class.
                Glide.track.addClass(Glide.options.classes.dragging);
            // Else escape from event, we don't want move slider.
            } else {
                return;
            }

        }

    };

    /**
     * Touch end event.
     *
     * @todo Check edge cases for slider type
     * @param {Onject} event
     */
    Touch.prototype.end = function(event) {

        // Escape if events not disabled
        // or not dragging.
        if (!Core.Events.disabled && this.dragging) {

            // Set distance limiter.
            var distanceLimiter;

            // Store event.
            if (event.type === 'mouseup' || event.type === 'mouseleave') {
                touch = event.originalEvent;
            } else {
                touch = event.originalEvent.touches[0] || event.originalEvent.changedTouches[0];
            }

            // Calculate touch distance.
            var touchDistance = Core.Helper.byAxis(
                (touch.pageX - this.touchStartX),
                (touch.pageY - this.touchStartY)
            );

            // Calculate degree.
            var touchDeg = this.touchSin * 180 / Math.PI;

            // Turn off jumping flag.
            Core.Transition.jumping = false;

            // If slider type is slider.
            if (Core.Build.isType('slider')) {

                // Prevent slide to right on first item (prev).
                if (Core.Run.isStart()) {
                    if (touchDistance > 0) {
                        touchDistance = 0;
                    }
                }

                // Prevent slide to left on last item (next).
                if (Core.Run.isEnd()) {
                    if (touchDistance < 0) {
                        touchDistance = 0;
                    }
                }

            }

            // Switch distance limit base on event type.
            if (event.type === 'mouseup' || event.type === 'mouseleave') {
                distanceLimiter = Glide.options.dragDistance;
            } else {
                distanceLimiter = Glide.options.touchDistance;
            }

            // While touch is positive and greater than
            // distance set in options move backward.
            if (touchDistance > distanceLimiter && touchDeg < 45) {
                Core.Run.make('<');
            }
            // While touch is negative and lower than negative
            // distance set in options move forward.
            else if (touchDistance < -distanceLimiter && touchDeg < 45) {
                Core.Run.make('>');
            }
            // While swipe don't reach distance apply previous transform.
            else {
                Core.Animation.make();
            }

            // After animation.
            Core.Animation.after(function() {
                // Enable events.
                Core.Events.enable();
                // If autoplay start auto run.
                Core.Run.play();
            });

            // Unset dragging flag.
            this.dragging = false;

            // Disable other events.
            Core.Events
                .attachClicks()
                .disable()
                .call(Glide.options.swipeEnd)
                .trigger('swipeEnd');

            // Remove dragging class and unbind events.
            Glide.track
                .removeClass(Glide.options.classes.dragging)
                .off('touchmove.glide mousemove.glide')
                .off('touchend.glide touchcancel.glide mouseup.glide mouseleave.glide');

        }

    };

    // Return class.
    return new Touch();

};

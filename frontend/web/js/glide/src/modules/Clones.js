/**
 * Clones module.
 *
 * @param {Object} Glide
 * @param {Object} Core
 * @return {Void}
 */
var Clones = function(Glide, Core) {

    /**
     * Clones position map.
     *
     * @type {Array}
     */
    var map = [0, 1];

    /**
     * Clones order pattern.
     *
     * @type {Array}
     */
    var pattern;

    /**
     * Clones constructor.
     */
    function Clones() {
        this.items = [];
        this.shift = 0;

        this.init();
    }

    /**
     * Init clones builder.
     *
     * @return {self}
     */
    Clones.prototype.init = function() {

        // Map clones order pattern.
        this.map();

        // Collect slides to clone
        // with created pattern.
        this.collect();

        return this;

    };

    /**
     * Generate clones pattern.
     *
     * @return {Void}
     */
    Clones.prototype.map = function() {
        var i;
        pattern = [];

        for (i = 0; i < map.length; i++) {
            pattern.push(-1 - i, i);
        }
    };

    /**
     * Collect clones with pattern.
     *
     * @return {Void}
     */
    Clones.prototype.collect = function() {
        var item;
        var i;

        for (i = 0; i < pattern.length; i++) {
            item = Glide.slides.eq(pattern[i])
                .clone().addClass(Glide.options.classes.clone);

            this.items.push(item);
        }
    };

    /**
     * Append cloned slides with generated pattern.
     *
     * @return {Void}
     */
    Clones.prototype.append = function() {
        var i;
        var item;

        for (i = 0; i < this.items.length; i++) {
            item = this.items[i][Glide.size](Glide[Glide.size]);

            // Append clone if pattern position is positive.
            if (pattern[i] >= 0) {
                item.appendTo(Glide.track);
            // Prepend clone if pattern position is negative.
            } else {
                item.prependTo(Glide.track);
            }
        }
    };

    /**
     * Remove all cloned slides.
     *
     * @return {self}
     */
    Clones.prototype.remove = function() {
        var i;

        for (i = 0; i < this.items.length; i++) {
            this.items[i].remove();
        }

        return this;
    };

    /**
     * Get size grow caused by clones.
     *
     * @return {Number}
     */
    Clones.prototype.getGrowth = function() {
        return Glide.width * this.items.length;
    };

    // Return class.
    return new Clones();

};

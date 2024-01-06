(function (root, factory) {
    if (typeof define === 'function' && define.amd) {
        define([], factory);
    } else if (typeof module === 'object' && module.exports) {
        module.exports = factory();
    } else {
        root.animator = factory();
    }
}(this, function () {
    const animator = function (el, options) {

        const self = Object.create(animator.prototype);

        self.element = null;

        if (el.indexOf('#') === -1) {
            self.element = document.getElementsByClassName(el.replace('.', ''));
        } else {
            self.element = document.getElementById(el.replace('#', ''));
        }

        self._options = {
            mask: '(###) ####-###',
            debug: false
        };

        self._options = Object.assign(self._options, options);

        const getIcon = function (country) {
            return "icon";
        };

        const init = function () {
            console.log(getIcon('test'));
            console.log(self.getCountry());
        };

        self.getCountry = function () {
            return "ru";
        };

        init();
        return self;
    };
    return animator;
}));
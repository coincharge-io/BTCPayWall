;
(function (window, $) {
    "use strict";

    var defaultConfig = {
        type: '',
        autoDismiss: false,
        container: '#btcpaywall_tipping_toast',
        autoDismissDelay: 4000,
        transitionDuration: 500
    };

    $.toast = function (config) {
        var size = arguments.length;
        var isString = typeof (config) === 'string';

        if (isString && size === 1) {
            config = {
                message: config
            };
        }

        if (isString && size === 2) {
            config = {
                message: arguments[1],
                type: arguments[0]
            };
        }

        return new toast(config);
    };

    var toast = function (config) {
        config = $.extend({}, defaultConfig, config);
        // show "x" or not
        var close = config.autoDismiss ? '' : '&times;';

        // toast template
        var toast = $([
            '<div class="btcpaywall_tipping_toast ' + config.type + '">',
            '<p>' + config.message + '</p>',
            '<div class="close">' + close + '</div>',
            '</div>'
        ].join(''));

        // handle dismiss
        toast.find('.close').on('click', function () {
            var toast = $(this).parent();

            toast.addClass('hide');

            setTimeout(function () {
                toast.remove();
            }, config.transitionDuration);
        });

        // append toast to toasts container
        $(config.container).append(toast);

        // transition in
        setTimeout(function () {
            toast.addClass('show');
        }, config.transitionDuration);

        // if auto-dismiss, start counting
        if (config.autoDismiss) {
            setTimeout(function () {
                toast.find('.close').click();
            }, config.autoDismissDelay);
        }

        return this;
    };
})(window, jQuery);


(function ($) {
    "use strict";

    $(document).ready(function () {
        $('.btcpaywall_tipping_templates button').click(function () {
            $(document).scrollTop(0);
            $.toast('The publish section below this paragraph is where you can publish and preview the form you\'ve chosen. By clicking the preview button, you can see how the form looks. If you\'re happy with how the form looks after customization, click the publish button. After you publish the form, a shortcode will be produced. This shortcode can be used to embed a form on a different page.');

        });
    })
})(jQuery);
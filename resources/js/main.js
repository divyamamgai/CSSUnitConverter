(function ($, w, wO, d, dO) {
    var $ConversionFrom,
        $ConversionFactorValue,
        $ConversionTo;
    dO
        .on('ready', function () {
            $ConversionFrom = $('#ConversionFrom', d);
            $ConversionFactorValue = $('#ConversionFactorValue', d);
            $ConversionTo = $('#ConversionTo', d);
        })
        .on('input', '#FromUnit', function () {
            var $This = $(this),
                Value = $This.val();
            if (Value.length > 0) {
                $ConversionFrom.html(Value);
            } else {
                $ConversionFrom.html($This.attr('placeholder'));
            }
        })
        .on('input', '#ToUnit', function () {
            var $This = $(this),
                Value = $This.val();
            if (Value.length > 0) {
                $ConversionTo.html(Value);
            } else {
                $ConversionTo.html($This.attr('placeholder'));
            }
        })
        .on('input', '#ConversionFactor', function () {
            var $This = $(this),
                Value = $This.val();
            if (Value.length > 0) {
                $ConversionFactorValue.html(Value);
            } else {
                $ConversionFactorValue.html($This.attr('placeholder'));
            }
        });
})(jQuery, window, jQuery(window), document, jQuery(document));
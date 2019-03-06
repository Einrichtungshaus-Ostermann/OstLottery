/**
 * Einrichtungshaus Ostermann GmbH & Co. KG - Lottery
 *
 * @package   OstLottery
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

;(function($) {

    // our plugin
    $.plugin( "ostLottery", {

        // on initialization
        init: function ()
        {
        },

        // on destroy
        destroy: function()
        {
            // call the parent
            this._destroy();
        }

    });

})(jQuery);

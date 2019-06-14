//

Ext.define('Shopware.apps.OstLottery.view.list.Window', {
    extend: 'Shopware.window.Listing',
    alias: 'widget.lottery-list-window',
    height: 450,
    title : 'Gewinnspiele',

    configure: function() {
        return {
            listingGrid: 'Shopware.apps.OstLottery.view.list.Lottery',
            listingStore: 'Shopware.apps.OstLottery.store.Lotteries'
        };
    }
});
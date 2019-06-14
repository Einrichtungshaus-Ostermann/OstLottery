//

Ext.define('Shopware.apps.OstLottery.store.Lotteries', {
    extend:'Shopware.store.Listing',

    configure: function() {
        return {
            controller: 'OstLottery'
        };
    },

    model: 'Shopware.apps.OstLottery.model.Lottery'
});
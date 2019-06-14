//

Ext.define('Shopware.apps.OstLottery.view.list.Lottery', {
    extend: 'Shopware.grid.Panel',
    alias:  'widget.lottery-listing-grid',
    region: 'center',

    configure: function() {
        return {
            detailWindow: 'Shopware.apps.OstLottery.view.detail.Window',
            columns: {
                name: { header: 'Name', flex: 3 },
                startDate: { header: 'Startzeitpunkt', flex: 1 },
                endDate: { header: 'Endzeitpunkt', flex: 1 },
                active: { header: 'Status', width: 60 }
            }
        };
    }
});

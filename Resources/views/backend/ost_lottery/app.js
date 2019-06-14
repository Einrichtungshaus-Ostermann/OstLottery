
Ext.define('Shopware.apps.OstLottery', {
    extend: 'Enlight.app.SubApplication',

    name:'Shopware.apps.OstLottery',

    loadPath: '{url action=load}',
    bulkLoad: true,

    controllers: [ 'Main' ],

    views: [
        'list.Window',
        'list.Lottery',

        'detail.Lottery',
        'detail.Window'
    ],

    models: [ 'Lottery' ],
    stores: [ 'Lotteries' ],

    launch: function() {
        return this.getController('Main').mainWindow;
    }
});
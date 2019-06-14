
Ext.define('Shopware.apps.OstLottery.model.Lottery', {
    extend: 'Shopware.data.Model',

    configure: function() {
        return {
            controller: 'OstLottery',
            detail: 'Shopware.apps.OstLottery.view.detail.Lottery'
        };
    },

    fields: [
        { name: 'id', type: 'int', useNull: true },
        { name: 'active', type: 'boolean' },
        { name: 'name', type: 'string' },
        { name: 'banner', type: 'string' },
        { name: 'startDate', type: 'date' },
        { name: 'endDate', type: 'date' },
        { name: 'emailSenderName', type: 'string' },
        { name: 'emailSenderAddress', type: 'string' },
        { name: 'emailSubject', type: 'string' },
        { name: 'emailTemplate', type: 'string' },
        { name: 'finishContent', type: 'string' }
    ],


});


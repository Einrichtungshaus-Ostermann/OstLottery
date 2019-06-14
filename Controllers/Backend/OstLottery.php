<?php declare(strict_types=1);

/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Lottery
 *
 * @package   OstLottery
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

use OstLottery\Models\Lottery;

class Shopware_Controllers_Backend_OstLottery extends Shopware_Controllers_Backend_Application
{
    /**
     * ...
     *
     * @var string
     */
    protected $model = Lottery::class;

    /**
     * ...
     *
     * @var string
     */
    protected $alias = 'lottery';

    /**
     * ...
     *
     * @return array
     */
    public function getWhitelistedCSRFActions()
    {
        // return all actions
        return array_values(array_filter(
            array_map(
                function ($method) { return (substr($method, -6) === 'Action') ? substr($method, 0, -6) : null; },
                get_class_methods($this)
            ),
            function ($method) { return  !in_array((string) $method, ['', 'index', 'load', 'extends'], true); }
        ));
    }

    /**
     * ...
     *
     * @throws Exception
     */
    public function preDispatch()
    {
        // ...
        $viewDir = $this->container->getParameter('ost_lottery.view_dir');
        $this->get('template')->addTemplateDir($viewDir);
        parent::preDispatch();
    }

    /**
     * @inheritdoc
     */
    protected function getDetailQuery($id)
    {
        // get the builder
        $builder = parent::getDetailQuery($id);

        // add our one-to-many fields
        $builder->leftJoin('lottery.fields', 'fields');
        $builder->addSelect(array('fields'));

        // return the modified builder
        return $builder;
    }
}

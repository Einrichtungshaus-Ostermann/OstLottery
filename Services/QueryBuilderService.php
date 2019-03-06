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

namespace OstLottery\Services;

use Doctrine\ORM\QueryBuilder;
use OstLottery\Models\Lottery;
use Shopware\Components\Model\ModelManager;

class QueryBuilderService
{
    /**
     * ...
     *
     * @var ModelManager
     */
    protected $modelManager;

    /**
     * ...
     *
     * @var array
     */
    protected $configuration;

    /**
     * ...
     *
     * @param ModelManager $modelManager
     * @param array        $configuration
     */
    public function __construct(ModelManager $modelManager, array $configuration)
    {
        // set params
        $this->modelManager = $modelManager;
        $this->configuration = $configuration;
    }

    /**
     * ...
     *
     * @return array
     */
    public function getActiveLottery()
    {
        // create a query builder
        $builder = $this->getLotteryQueryBuilder();

        // set it up with default values
        $builder->andWhere('lottery.active = 1')
            ->andWhere('lottery.startDate < :currentDate')
            ->andWhere('lottery.endDate > :currentDate');

        // paramter
        $builder->setParameter('currentDate', date('Y-m-d H:oi:s'));

        // and return it
        return array_shift($builder->getQuery()->getArrayResult());
    }

    /**
     * ...
     *
     * @return QueryBuilder
     */
    public function getLotteryQueryBuilder()
    {
        // create a query builder
        $builder = $this->modelManager->createQueryBuilder();

        // set it up with default values
        $builder->select(['lottery'])
            ->from(Lottery::class, 'lottery');

        // join 1:n
        $builder->addSelect(['field'])
            ->leftJoin('lottery.fields', 'field', 'WITH', 'field.active = 1');

        // and return it
        return $builder;
    }
}

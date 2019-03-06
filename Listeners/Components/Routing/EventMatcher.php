<?php declare(strict_types=1);

/**
 * Einrichtungshaus Ostermann GmbH & Co. KG - Lottery
 *
 * @package   OstLottery
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

namespace OstLottery\Listeners\Components\Routing;

use Enlight_Event_EventArgs as EventArgs;

class EventMatcher
{
    /**
     * ...
     *
     * @var array
     */
    protected $configuration;

    /**
     * ...
     *
     * @param array $configuration
     */
    public function __construct(array $configuration)
    {
        // set params
        $this->configuration = $configuration;
    }

    /**
     * ...
     *
     * @param EventArgs $arguments
     *
     * @return mixed
     */
    public function changeRoute(EventArgs $arguments)
    {
        // get the current path
        $path = $arguments->get('request')->getPathInfo();

        // trim the slash
        $path = ltrim($path, '/');

        // is this not return?!
        if ((empty($this->configuration['seoUrl'])) || (strtolower($path) !== strtolower($this->configuration['seoUrl']))) {
            // nothing to do
            return null;
        }

        // reroute to return
        return [
            'controller' => 'OstLottery',
            'action'     => 'index'
        ];
    }
}

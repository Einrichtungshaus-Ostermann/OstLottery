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

use Enlight_Components_Mail as Mail;
use OstLottery\Models\Lottery;
use OstLottery\Models\Lottery\Participant;
use OstLottery\Services\QueryBuilderService;
use Shopware\Components\CSRFWhitelistAware;
use Shopware\Models\Shop\Shop;

class Shopware_Controllers_Frontend_OstLottery extends Enlight_Controller_Action implements CSRFWhitelistAware
{
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
     * ...
     */
    public function indexAction()
    {
        /* @var $queryBuilderService QueryBuilderService */
        $queryBuilderService = Shopware()->Container()->get('ost_lottery.query_builder_service');

        // get them
        $lottery = $queryBuilderService->getActiveLottery();

        // not found?!
        if (!is_array($lottery)) {
            // redirec to configurable page
            $this->redirect($this->get('ost_lottery.configuration')['redirectUrl']);
            // and stop here
            return;
        }

        // do we have a post?
        if ($this->request->isPost() === true) {
            // input errors
            $errors = [];

            // get the params
            $params = $this->request->getParam('register');

            // loop every mandatory element
            foreach (['salutation', 'firstname', 'lastname', 'email'] as $field) {
                if (empty(trim((string) $params[$field]))) {
                    $errors[$field] = true;
                }
            }

            // email already set?
            $query = '
                SELECT COUNT(*)
                FROM ost_lotteries_participants
                WHERE email LIKE :email
                    AND lotteryId = :lotteryId
            ';
            $emails = (int) Shopware()->Db()->fetchOne($query, ['email' => $params['email'], 'lotteryId' => $lottery['id']]);

            // already found?
            if ($emails > 0) {
                // add error
                $errors['email'] = true;
            }

            // input to save as array
            $input = [];

            // loop every field
            foreach ($lottery['fields'] as $field) {
                // ignore inactive
                if ($field['active'] === false) {
                    // next
                    continue;
                }

                // switch by type
                switch ($field['type']) {
                    case 'text':
                    case 'textarea':
                        $input[$field['id']] = array(
                            'question' => $field['name'],
                            'type' => $field['type'],
                            'value' => (string) $this->request->getParam('ost-lottery--id-' . $field['id'])
                        );
                        break;
                    case 'radio':
                        $input[$field['id']] = array(
                            'question' => $field['name'],
                            'type' => $field['type'],
                            'value' => (string) $this->request->getParam('ost-lottery--id-' . $field['id'])
                        );
                        break;
                    case 'checkbox':
                        $input[$field['id']] = array(
                            'question' => $field['name'],
                            'type' => $field['type'],
                            'value' => (array) $this->request->getParam('ost-lottery--id-' . $field['id'])
                        );
                        break;
                }
            }

            // do we have errors?!
            if (count($errors) > 0) {
                // assign everything
                $this->View()->assign('error_flags', $errors);
                $this->View()->assign('form_data', $params);
            } else {
                // add recipient
                $participant = new Participant();

                // set it up
                $participant->setDate(new \DateTime());
                $participant->setEmail($params['email']);
                $participant->setSalutation($params['salutation']);
                $participant->setFirstname($params['firstname']);
                $participant->setLastname($params['lastname']);
                $participant->setStreet((empty($params['street'])) ? null : $params['street']);
                $participant->setZip((empty($params['zipcode'])) ? null : $params['zipcode']);
                $participant->setCity((empty($params['city'])) ? null : $params['city']);
                $participant->setCountryId(null);

                // set input values
                $participant->setInput(empty($input) ? null : json_encode($input));

                // set 1:n
                $participant->setLottery($this->getModelManager()->find(Lottery::class, $lottery['id']));
                $participant->setShop($this->getModelManager()->find(Shop::class, $this->get('shopware_storefront.context_service')->getShopContext()->getShop()->getId()));

                // save it
                $this->getModelManager()->persist($participant);
                $this->getModelManager()->flush($participant);

                // send email
                $this->sendEmail(
                    $lottery,
                    Shopware()->Models()->toArray($participant)
                );

                // redirect to finish
                $this->redirect([
                    'controller' => 'OstLottery',
                    'action'     => 'finish'
                ]);

                // done
                return;
            }
        }

        // assign it
        $this->View()->assign('ostLottery', $lottery);
        $this->View()->assign('ostLotteryConfiguration', $this->container->get('ost_lottery.configuration'));
    }

    /**
     * ...
     *
     * @param array $lottery
     * @param array $participant
     */
    public function sendEmail(array $lottery, array $participant)
    {
        /* @var $mailer Mail */
        $mailer = Shopware()->Container()->get('mail');

        // set the context
        $context = [
            'lottery'     => $lottery,
            'participant' => $participant
        ];

        // get email stuff
        $recipient = $participant['email'];
        $subject = $lottery['emailSubject'];

        // assign context to smarty to parse the email
        Shopware()->Container()->get('template')->assign($context);

        // get the email content
        $content = Shopware()->Container()->get('template')->fetch('string:' . $lottery['emailTemplate']);

        // set up the mailer
        $mailer->setSubject($subject);
        $mailer->setBodyText($content);
        $mailer->setBodyHtml(nl2br($content));
        $mailer->setFrom(Shopware()->Config()->Mail);
        $mailer->addTo($recipient);

        // and send
        $mailer->send();
    }

    /**
     * ...
     */
    public function finishAction()
    {
        /* @var $queryBuilderService QueryBuilderService */
        $queryBuilderService = Shopware()->Container()->get('ost_lottery.query_builder_service');

        // get them
        $lottery = $queryBuilderService->getActiveLottery();

        // not found?!
        if (!is_array($lottery)) {
            // redirec to configurable page
            $this->redirect($this->get('ost_lottery.configuration')['redirectUrl']);
            // and stop here
            return;
        }

        // assign it
        $this->View()->assign('ostLottery', $lottery);
    }
}

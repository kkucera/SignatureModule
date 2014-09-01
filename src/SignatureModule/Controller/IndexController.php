<?php
/**
 * @copyright Copyright (c) 2014 WebPT, INC
 */

namespace SignatureModule\Controller;

use EMRCore\Zend\Mvc\Controller\ActionControllerAbstract;
use Zend\Http\PhpEnvironment\Response;

class IndexController extends ActionControllerAbstract
{

    public function IndexAction()
    {
        /** @var Response $response */
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent("Signature Module");

        return $response;
    }

} 
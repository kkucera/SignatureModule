<?php
/**
 * @copyright Copyright (c) 2014 WebPT, INC
 */

namespace SignatureModule\Controller;

use EMRCore\Session\Instance\Application;
use EMRCore\Session\Instance\RequireApplicationSessionDiInterface;
use EMRCore\Zend\Mvc\Controller\ActionControllerAbstract;
use SignatureModule\Pad\SignatureAsset;
use SignatureModule\Pad\SignatureAsset as SignatureAssetService;
use SignatureModule\Pad\SignatureAssetAwareInterface;
use SignatureModule\Pad\Dto\CreateDto;

class PadController extends ActionControllerAbstract
    implements SignatureAssetAwareInterface, RequireApplicationSessionDiInterface
{
    /**
     * @var Application
     */
    private $applicationSession;

    /**
     * @var SignatureAssetService
     */
    private $signatureAssetService;

    public function displayAction()
    {
        $this->layout('emr-layout');
    }

    public function saveAction()
    {
        $this->layout('emr-layout');
        /** @var \Zend\Http\Request $request */
        $request = $this->getRequest();

        $create = CreateDto::build()
            ->setUserId($this->getUserId())
            ->setJson($request->getPost('output'))
            ->setWidth($request->getPost('width'))
            ->setHeight($request->getPost('height'));

        $this->getSignatureAssetService()->create($create);

        echo 'OK saved signature for User: '.$create->getUserId();
        exit();
    }

    /**
     * @param Application $applicationSession
     * @return RequireApplicationSessionDiInterface
     */
    public function setApplicationSession(Application $applicationSession)
    {
        $this->applicationSession = $applicationSession;
    }


    /**
     * Gets the current user id from the session
     * @return mixed
     */
    protected function getUserId()
    {
        return $this->applicationSession->get('UserID');
    }

    /**
     * @param SignatureAsset $service
     * @return self
     */
    public function setSignatureAssetService(SignatureAssetService $service)
    {
        $this->signatureAssetService = $service;
        return $this;
    }

    /**
     * @return SignatureAssetService
     */
    public function getSignatureAssetService()
    {
        return $this->signatureAssetService;
    }
}
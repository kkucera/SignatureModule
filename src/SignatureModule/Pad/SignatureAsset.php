<?php
/**
 * @copyright Copyright (c) 2014 WebPT, INC
 */

namespace SignatureModule\Pad;

use EMRCore\Service\Assets\User as UserAssetsService;
use SignatureModule\Pad\Exception\AssetException;
use SignatureModule\Pad\Marshal\JsonToImage as JsonToImageMarshaller;
use SignatureModule\Pad\Marshal\JsonToImageAwareInterface;
use SignatureModule\Pad\Dto\CreateDto;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SignatureAsset implements JsonToImageAwareInterface, ServiceLocatorAwareInterface
{
    const WIDTH = 400;
    const HEIGHT = 150;

    /** @var  JsonToImageMarshaller */
    private $jsonToImageMarshaller;

    /** @var  ServiceLocatorInterface */
    private $serviceLocator;

    /** @var  UserAssetsService */
    private $userAssetsService;

    /**
     * Creates a signature asset from a json string
     * @param CreateDto $createDto
     * @throws Exception\AssetException
     */
    public function create(CreateDto $createDto)
    {
        $img = $this->getJsonToImageMarshaller()
            ->setImageWidth(self::WIDTH)
            ->setImageHeight(self::HEIGHT)
            ->marshal($createDto->getJson());

        $fileName = $this->getUserAssetsService()->getSignatureFilename($createDto->getUserId());
        echo 'file: '.$fileName;
        if(!imagejpeg($img, $fileName)){
            throw new AssetException('Creation of signature failed');
        }
        imagedestroy($img);
    }

    /**
     * @param JsonToImageMarshaller $marshaller
     * @return self
     * @setter
     */
    public function setJsonToImageMarshaller(JsonToImageMarshaller $marshaller)
    {
        $this->jsonToImageMarshaller = $marshaller;
    }

    /**
     * @return JsonToImageMarshaller
     */
    public function getJsonToImageMarshaller()
    {
        return $this->jsonToImageMarshaller;
    }

    /**
     * @param UserAssetsService $service
     */
    public function setUserAssetsService(UserAssetsService $service)
    {
        $this->userAssetsService = $service;
    }

    /**
     * @return UserAssetsService
     */
    public function getUserAssetsService()
    {
        if(empty($this->userAssetsService)){
            $this->userAssetsService = $this->getServiceLocator()->get("EMRCore\Service\Assets\User");
        }
        return $this->userAssetsService;
    }

    /**
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }
}
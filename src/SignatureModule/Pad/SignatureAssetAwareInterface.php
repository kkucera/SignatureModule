<?php
/**
 * @copyright Copyright (c) 2014 WebPT, INC
 */

namespace SignatureModule\Pad;

use EMRCore\Zend\ServiceManager\AnnotationAwareInterface;
use SignatureModule\Pad\SignatureAsset as SignatureAssetService;

interface SignatureAssetAwareInterface extends AnnotationAwareInterface
{

    /**
     * @param SignatureAsset $service
     * @return self
     * @setter
     */
    public function setSignatureAssetService(SignatureAssetService $service);

    /**
     * @return SignatureAssetService
     */
    public function getSignatureAssetService();

} 
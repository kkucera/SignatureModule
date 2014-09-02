<?php
/**
 * @copyright Copyright (c) 2014 WebPT, INC
 */

namespace SignatureModule\Pad\Marshal;

use EMRCore\Zend\ServiceManager\AnnotationAwareInterface;
use SignatureModule\Pad\Marshal\JsonToImage as JsonToImageMarshaller;

interface JsonToImageAwareInterface extends AnnotationAwareInterface
{
    /**
     * @param JsonToImageMarshaller $marshaller
     * @return self
     * @setter
     */
    public function setJsonToImageMarshaller(JsonToImageMarshaller $marshaller);

    /**
     * @return JsonToImageMarshaller
     */
    public function getJsonToImageMarshaller();
} 
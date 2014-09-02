<?php
/**
 * @copyright Copyright (c) 2014 WebPT, INC
 */

namespace SignatureModule\Pad;

use SignatureModule\Pad\Exception\AssetException;
use SignatureModule\Pad\Marshal\JsonToImage as JsonToImageMarshaller;
use SignatureModule\Pad\Marshal\JsonToImageAwareInterface;
use SignatureModule\Pad\Dto\CreateDto;

class SignatureAsset implements JsonToImageAwareInterface
{
    const WIDTH = 400;
    const HEIGHT = 150;

    /**
     * @var JsonToImageMarshaller
     */
    private $jsonToImageMarshaller;

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

        if(!imagepng($img, '/tmp/signature.png')){
            throw new AssetException('Creation of signature failed');
        }
        $result = imagedestroy($img);
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

} 
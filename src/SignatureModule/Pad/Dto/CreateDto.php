<?php
/**
 * @copyright Copyright (c) 2014 WebPT, INC
 */

namespace SignatureModule\Pad\Dto;


class CreateDto
{
    /** @var  int */
    private $userId;

    /** @var  string */
    private $json;

    /** @var  int */
    private $width;

    /** @var  int */
    private $height;

    /**
     * @return CreateDto
     */
    public static function build()
    {
        return new self;
    }

    /**
     * @param int $height
     * @return CreateDto
     * @codeCoverageIgnore
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param string $json
     * @return CreateDto
     * @codeCoverageIgnore
     */
    public function setJson($json)
    {
        $this->json = $json;
        return $this;
    }

    /**
     * @return string
     */
    public function getJson()
    {
        return $this->json;
    }

    /**
     * @param int $userId
     * @return CreateDto
     * @codeCoverageIgnore
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $width
     * @return CreateDto
     * @codeCoverageIgnore
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }


} 
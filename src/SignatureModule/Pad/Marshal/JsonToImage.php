<?php
/**
 * @copyright Copyright (c) 2014 WebPT, INC
 * Marshals a json string into a signature image
 */

namespace SignatureModule\Pad\Marshal;


class JsonToImage
{

    /** @var int */
    private $imageHeight;

    /** @var  int */
    private $imageWidth;

    /**
     * @param string $json - json to marshal
     * @return object
     */
    public function marshal($json)
    {
        return $this->sigJsonToImage($json,
            array('imageSize' => array($this->getImageWidth(), $this->getImageHeight()))
        );
    }

    /**
     * @param int $imageHeight
     * @return JsonToImage
     * @codeCoverageIgnore
     */
    public function setImageHeight($imageHeight)
    {
        $this->imageHeight = $imageHeight;
        return $this;
    }

    /**
     * @return int
     */
    public function getImageHeight()
    {
        return $this->imageHeight;
    }

    /**
     * @param int $imageWidth
     * @return JsonToImage
     * @codeCoverageIgnore
     */
    public function setImageWidth($imageWidth)
    {
        $this->imageWidth = $imageWidth;
        return $this;
    }

    /**
     * @return int
     */
    public function getImageWidth()
    {
        return $this->imageWidth;
    }

    /**
     *  Accepts a signature created by signature pad in Json format
     *  Converts it to an image resource
     *  The image resource can then be changed into png, jpg whatever PHP GD supports
     *
     *  To create a nicely anti-aliased graphic the signature is drawn 12 times it's original size then shrunken
     *
     *  @param string|array $json
     *  @param array $options OPTIONAL; the options for image creation
     *    imageSize => array(width, height)
     *    bgColour => array(red, green, blue) | transparent
     *    penWidth => int
     *    penColour => array(red, green, blue)
     *    drawMultiplier => int
     *
     *  @return object
     */
    private function sigJsonToImage ($json, $options = array()) {
        $defaultOptions = array(
            'imageSize' => array(198, 55)
            ,'bgColour' => array(0xff, 0xff, 0xff)
            ,'penWidth' => 2
            ,'penColour' => array(0x14, 0x53, 0x94)
            ,'drawMultiplier'=> 12
        );

        $options = array_merge($defaultOptions, $options);

        $img = imagecreatetruecolor($options['imageSize'][0] * $options['drawMultiplier'], $options['imageSize'][1] * $options['drawMultiplier']);

        if ($options['bgColour'] == 'transparent') {
            imagesavealpha($img, true);
            $bg = imagecolorallocatealpha($img, 0, 0, 0, 127);
        } else {
            $bg = imagecolorallocate($img, $options['bgColour'][0], $options['bgColour'][1], $options['bgColour'][2]);
        }

        $pen = imagecolorallocate($img, $options['penColour'][0], $options['penColour'][1], $options['penColour'][2]);
        imagefill($img, 0, 0, $bg);

        if (is_string($json))
            $json = json_decode(stripslashes($json));

        foreach ($json as $v)
            $this->drawThickLine($img, $v->lx * $options['drawMultiplier'], $v->ly * $options['drawMultiplier'], $v->mx * $options['drawMultiplier'], $v->my * $options['drawMultiplier'], $pen, $options['penWidth'] * ($options['drawMultiplier'] / 2));

        $imgDest = imagecreatetruecolor($options['imageSize'][0], $options['imageSize'][1]);

        if ($options['bgColour'] == 'transparent') {
            imagealphablending($imgDest, false);
            imagesavealpha($imgDest, true);
        }

        imagecopyresampled($imgDest, $img, 0, 0, 0, 0, $options['imageSize'][0], $options['imageSize'][0], $options['imageSize'][0] * $options['drawMultiplier'], $options['imageSize'][0] * $options['drawMultiplier']);
        imagedestroy($img);

        return $imgDest;
    }

    /**
     *  Draws a thick line
     *  Changing the thickness of a line using imagesetthickness doesn't produce as nice of result
     *
     *  @param object $img
     *  @param int $startX
     *  @param int $startY
     *  @param int $endX
     *  @param int $endY
     *  @param object $colour
     *  @param int $thickness
     *
     *  @return void
     */
    private function drawThickLine ($img, $startX, $startY, $endX, $endY, $colour, $thickness) {
        $angle = (atan2(($startY - $endY), ($endX - $startX)));

        $dist_x = $thickness * (sin($angle));
        $dist_y = $thickness * (cos($angle));

        $p1x = ceil(($startX + $dist_x));
        $p1y = ceil(($startY + $dist_y));
        $p2x = ceil(($endX + $dist_x));
        $p2y = ceil(($endY + $dist_y));
        $p3x = ceil(($endX - $dist_x));
        $p3y = ceil(($endY - $dist_y));
        $p4x = ceil(($startX - $dist_x));
        $p4y = ceil(($startY - $dist_y));

        $array = array(0=>$p1x, $p1y, $p2x, $p2y, $p3x, $p3y, $p4x, $p4y);
        imagefilledpolygon($img, $array, (count($array)/2), $colour);
    }

} 
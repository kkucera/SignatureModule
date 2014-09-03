<?php
/**
 * @category WebPT
 * @package EMRUser
 * @copyright Copyright (c) 2013 WebPT, INC
 */
namespace EMRUser\Service\Asset;

use Exception;
use SignatureModule\Asset\Dao\Asset as AssetDao;
use SignatureModule\Asset\Dao\AssetAwareInterface;
use SignatureModule\Asset\Dto\Asset as AssetDto;

/**
 * Handles user assets persisting.
 */
class Asset implements AssetAwareInterface
{
    
    /**
     *
     * @var AssetDao 
     */
    private $assetDao;
    
    /**
     *  
     * @param AssetDto $dto
     */
    public function saveLogo(AssetDto $dto)
    {   
        try
        {
            return $this->getAssetDao()->saveLogo($dto);
        }
        catch(Exception $e)
        {
            $error = "Failed to save permanent logo.";
            $this->getLogger()->error("{$error} Exception: [{$e->getMessage()}]");
        }
        
    }
    
    /**
     * 
     * @param AssetDto $dto
     */
    public function saveSignature(AssetDto $dto)
    {
        try
        {
            return $this->getAssetDao()->saveSignature($dto);
        }
        catch(Exception $e)
        {
            $error = "Failed to save permanent signature.";
            $this->getLogger()->error("{$error} Exception: [{$e->getMessage()}]");
        }
            
    }

    /**
     * 
     * @param AssetDao $dao
     */
    public function setAssetDao(AssetDao $dao)
    {
        $this->assetDao = $dao;
    }

    /**
     * 
     * @return AssetDao
     */
    public function getAssetDao()
    {
        return $this->assetDao;
    }
}


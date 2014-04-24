<?php

namespace App\CustomUrlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * App\AccountBundle\Entity\Account
 */
class CustomUrl
{
 
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $url
     */
    private $url;

    /**
     * @var integer $object_id
     */
    private $object_id;

    /**
     * @var integer $object_type
     */
    private $object_type;

    /**
     * @var boolean $is_deleted
     */
    private $is_deleted;

    /**
     * @var integer $created_by
     */
    private $created_by;

    /**
     * @var \DateTime $created_at
     */
    private $created_at;

    /**
     * @var integer $updated_by
     */
    private $updated_by;

    /**
     * @var \DateTime $updated_at
     */
    private $updated_at;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return CustomUrl
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set object_id
     *
     * @param integer $objectId
     * @return CustomUrl
     */
    public function setObjectId($objectId)
    {
        $this->object_id = $objectId;
    
        return $this;
    }

    /**
     * Get object_id
     *
     * @return integer 
     */
    public function getObjectId()
    {
        return $this->object_id;
    }

    /**
     * Set object_type
     *
     * @param integer $objectType
     * @return CustomUrl
     */
    public function setObjectType($objectType)
    {
        $this->object_type = $objectType;
    
        return $this;
    }

    /**
     * Get object_type
     *
     * @return integer 
     */
    public function getObjectType()
    {
        return $this->object_type;
    }

    /**
     * Set is_deleted
     *
     * @param boolean $isDeleted
     * @return CustomUrl
     */
    public function setIsDeleted($isDeleted)
    {
        $this->is_deleted = $isDeleted;
    
        return $this;
    }

    /**
     * Get is_deleted
     *
     * @return boolean 
     */
    public function getIsDeleted()
    {
        return $this->is_deleted;
    }

    /**
     * Set created_by
     *
     * @param integer $createdBy
     * @return CustomUrl
     */
    public function setCreatedBy($createdBy)
    {
        $this->created_by = $createdBy;
    
        return $this;
    }

    /**
     * Get created_by
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return CustomUrl
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_by
     *
     * @param integer $updatedBy
     * @return CustomUrl
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updated_by = $updatedBy;
    
        return $this;
    }

    /**
     * Get updated_by
     *
     * @return integer 
     */
    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return CustomUrl
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    /**
     * @var integer $account_id
     */
    private $account_id;


    /**
     * Set account_id
     *
     * @param integer $accountId
     * @return CustomUrl
     */
    public function setAccountId($accountId)
    {
        $this->account_id = $accountId;
    
        return $this;
    }

    /**
     * Get account_id
     *
     * @return integer 
     */
    public function getAccountId()
    {
        return $this->account_id;
    }
}
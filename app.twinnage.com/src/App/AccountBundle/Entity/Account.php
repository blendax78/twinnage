<?php

namespace App\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * App\AccountBundle\Entity\Account
 */
class Account
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;
    
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
     * Set name
     *
     * @param string $name
     * @return Account
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @var string $website
     */
    private $website;

    /**
     * @var string $tracker_domain
     */
    private $tracker_domain;

    /**
     * @var string $country
     */
    private $country;

    /**
     * @var string $address_one
     */
    private $address_one;

    /**
     * @var string $address_two
     */
    private $address_two;

    /**
     * @var string $city
     */
    private $city;

    /**
     * @var string $state
     */
    private $state;

    /**
     * @var string $territory
     */
    private $territory;

    /**
     * @var string $zip
     */
    private $zip;

    /**
     * @var string $phone
     */
    private $phone;

    /**
     * @var string $fax
     */
    private $fax;

    /**
     * @var integer $account_type
     */
    private $account_type;

    /**
     * @var string $encryption_key
     */
    private $encryption_key;

    /**
     * @var integer $max_users
     */
    private $max_users;

    /**
     * @var \DateTime $expiration
     */
    private $expiration;

    /**
     * @var \DateTime $billing_date
     */
    private $billing_date;

    /**
     * @var boolean $is_deleted
     */
    private $is_deleted;

    /**
     * @var \DateTime $created_at
     */
    private $created_at;

    /**
     * @var \DateTime $updated_at
     */
    private $updated_at;


    /**
     * Set website
     *
     * @param string $website
     * @return Account
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    
        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set tracker_domain
     *
     * @param string $trackerDomain
     * @return Account
     */
    public function setTrackerDomain($trackerDomain)
    {
        $this->tracker_domain = $trackerDomain;
    
        return $this;
    }

    /**
     * Get tracker_domain
     *
     * @return string 
     */
    public function getTrackerDomain()
    {
        return $this->tracker_domain;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Account
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set address_one
     *
     * @param string $addressOne
     * @return Account
     */
    public function setAddressOne($addressOne)
    {
        $this->address_one = $addressOne;
    
        return $this;
    }

    /**
     * Get address_one
     *
     * @return string 
     */
    public function getAddressOne()
    {
        return $this->address_one;
    }

    /**
     * Set address_two
     *
     * @param string $addressTwo
     * @return Account
     */
    public function setAddressTwo($addressTwo)
    {
        $this->address_two = $addressTwo;
    
        return $this;
    }

    /**
     * Get address_two
     *
     * @return string 
     */
    public function getAddressTwo()
    {
        return $this->address_two;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Account
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Account
     */
    public function setState($state)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set territory
     *
     * @param string $territory
     * @return Account
     */
    public function setTerritory($territory)
    {
        $this->territory = $territory;
    
        return $this;
    }

    /**
     * Get territory
     *
     * @return string 
     */
    public function getTerritory()
    {
        return $this->territory;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return Account
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    
        return $this;
    }

    /**
     * Get zip
     *
     * @return string 
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Account
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Account
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    
        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set account_type
     *
     * @param integer $accountType
     * @return Account
     */
    public function setAccountType($accountType)
    {
        $this->account_type = $accountType;
    
        return $this;
    }

    /**
     * Get account_type
     *
     * @return integer 
     */
    public function getAccountType()
    {
        return $this->account_type;
    }

    /**
     * Set encryption_key
     *
     * @param string $encryptionKey
     * @return Account
     */
    public function setEncryptionKey($encryptionKey)
    {
        $this->encryption_key = $encryptionKey;
    
        return $this;
    }

    /**
     * Get encryption_key
     *
     * @return string 
     */
    public function getEncryptionKey()
    {
        return $this->encryption_key;
    }

    /**
     * Set max_users
     *
     * @param integer $maxUsers
     * @return Account
     */
    public function setMaxUsers($maxUsers)
    {
        $this->max_users = $maxUsers;
    
        return $this;
    }

    /**
     * Get max_users
     *
     * @return integer 
     */
    public function getMaxUsers()
    {
        return $this->max_users;
    }

    /**
     * Set expiration
     *
     * @param \DateTime $expiration
     * @return Account
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
    
        return $this;
    }

    /**
     * Get expiration
     *
     * @return \DateTime 
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * Set billing_date
     *
     * @param \DateTime $billingDate
     * @return Account
     */
    public function setBillingDate($billingDate)
    {
        $this->billing_date = $billingDate;
    
        return $this;
    }

    /**
     * Get billing_date
     *
     * @return \DateTime 
     */
    public function getBillingDate()
    {
        return $this->billing_date;
    }

    /**
     * Set is_deleted
     *
     * @param boolean $isDeleted
     * @return Account
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Account
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
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Account
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
     * @var integer $created_by
     */
    private $created_by;

    /**
     * @var integer $updated_by
     */
    private $updated_by;


    /**
     * Set created_by
     *
     * @param integer $createdBy
     * @return Account
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
     * Set updated_by
     *
     * @param integer $updatedBy
     * @return Account
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
}
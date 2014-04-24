<?php

namespace App\UserBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * App\UserBundle\Entity\User
 */
class User implements UserInterface#, \Serializable
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $account_id
     */
    private $account_id;

    /**
     * @var string $notnull
     */
    private $notnull;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $type
     */
    private $type;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var  $first_name
     */
    private $first_name;


    /**
     * @var string $last_name
     */
    private $last_name;


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
     * Set account_id
     *
     * @param integer $accountId
     * @return User
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

    /**
     * Set notnull
     *
     * @param string $notnull
     * @return User
     */
    public function setNotnull($notnull)
    {
        $this->notnull = $notnull;
    
        return $this;
    }

    /**
     * Get notnull
     *
     * @return string 
     */
    public function getNotnull()
    {
        return $this->notnull;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return User
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set first_name
     *
     * @param $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    
        return $this;
    }

    /**
     * Get first_name
     *
     * @return 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }


    /**
     * Set last_name
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
    
        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }
    /**
     * @var integer $role_id
     */
    private $role_id;

    /**
     * @var boolean $is_deleted
     */
    private $is_deleted;

    /**
     * @var \DateTime $created_at
     */
    private $created_at;

    /**
     * @var \DateTime $modified_at
     */
    private $modified_at;


    /**
     * Set role_id
     *
     * @param integer $roleId
     * @return User
     */
    public function setRoleId($roleId)
    {
        $this->role_id = $roleId;
    
        return $this;
    }

    /**
     * Get role_id
     *
     * @return integer 
     */
    public function getRoleId()
    {
        return $this->role_id;
    }

    /**
     * Set is_deleted
     *
     * @param boolean $isDeleted
     * @return User
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
     * @return User
     */
    public function setCreatedAt( $createdAt)
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
     * Set modified_at
     *
     * @param \DateTime $modifiedAt
     * @return User
     */
    public function setModifiedAt( $modifiedAt)
    {
        $this->modified_at = $modifiedAt;
    
        return $this;
    }

    /**
     * Get modified_at
     *
     * @return \DateTime 
     */
    public function getModifiedAt()
    {
        return $this->modified_at;
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
     * @var \DateTime $updated_at
     */
    private $updated_at;


    /**
     * Set created_by
     *
     * @param integer $createdBy
     * @return User
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
     * @return User
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
     * @return User
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
    
	public function getRoles(){
		switch ($this->getRoleId()){
			case UserRepository::ROLE_USER:
				return array('ROLE_USER');
			case UserRepository::ROLE_ADMIN:
				return array('ROLE_USER','ROLE_ADMIN');
			case UserRepository::ROLE_SUPER_ADMIN:
				return array('ROLE_USER','ROLE_ADMIN','ROLE_SUPER_ADMIN');		
			default:
				return array('IS_AUTHENTICATED_ANONYMOUSLY');
		}
	}
	
	public function getUsername(){
		return $this->email;
	}
	
	public function getSalt(){
		return $this->salt;
	}
	
	public function eraseCredentials(){
		
	}
    /**
     * @var string $salt
     */
    private $salt;

    public function __construct(){
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }
    /**
     * @var string $api_key
     */
    private $api_key;


    /**
     * Set api_key
     *
     * @param string $apiKey
     * @return User
     */
    public function setApiKey($apiKey)
    {
        $this->api_key = $apiKey;
    
        return $this;
    }

    /**
     * Get api_key
     *
     * @return string 
     */
    public function getApiKey()
    {
        return $this->api_key;
    }
}
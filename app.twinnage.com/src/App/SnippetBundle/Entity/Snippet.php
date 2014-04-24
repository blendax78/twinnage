<?php

namespace App\SnippetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * App\SnippetBundle\Entity\Snippet
 */
class Snippet
{
    /**
     * @var integer $id
     */
    private $id;


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
     * @var string $content
     */
    private $content;

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
     * Set content
     *
     * @param string $content
     * @return Snippet
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set is_deleted
     *
     * @param boolean $isDeleted
     * @return Snippet
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
     * @return Snippet
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
     * @return Snippet
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
     * @return Snippet
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
     * @return Snippet
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
     * @var $name
     */
    private $name;


    /**
     * Set name
     *
     * @param  $name
     * @return Snippet
     */
    public function setName( $name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return  
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @var integer $custom_url_id
     */
    private $custom_url_id;


    /**
     * Set custom_url_id
     *
     * @param integer $customUrlId
     * @return Snippet
     */
    public function setCustomUrlId($customUrlId)
    {
        $this->custom_url_id = $customUrlId;
    
        return $this;
    }

    /**
     * Get custom_url_id
     *
     * @return integer 
     */
    public function getCustomUrlId()
    {
        return $this->custom_url_id;
    }
    /**
     * @var integer $account_id
     */
    private $account_id;


    /**
     * Set account_id
     *
     * @param integer $accountId
     * @return Snippet
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
     * @var integer $views
     */
    private $views;

    /**
     * @var \DateTime $last_viewed
     */
    private $last_viewed;


    /**
     * Set views
     *
     * @param integer $views
     * @return Snippet
     */
    public function setViews($views)
    {
        $this->views = $views;
    
        return $this;
    }

    /**
     * Get views
     *
     * @return integer 
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Set last_viewed
     *
     * @param \DateTime $lastViewed
     * @return Snippet
     */
    public function setLastViewed($lastViewed)
    {
        $this->last_viewed = $lastViewed;
    
        return $this;
    }

    /**
     * Get last_viewed
     *
     * @return \DateTime 
     */
    public function getLastViewed()
    {
        return $this->last_viewed;
    }
    /**
     * @var integer $snippet_type
     */
    private $snippet_type;


    /**
     * Set snippet_type
     *
     * @param integer $snippetType
     * @return Snippet
     */
    public function setSnippetType($snippetType)
    {
        $this->snippet_type = $snippetType;
    
        return $this;
    }

    /**
     * Get snippet_type
     *
     * @return integer
     */
    public function getSnippetType()
    {
        return $this->snippet_type;
    }
    
    public function toArray()
    {
    	return array(
    			'id'=>$this->getId(),
    			'name'=>$this->getName(),
    			'account_id'=>$this->getAccountId(),
    			'content'=>$this->getContent(),
    			'custom_url_id'=>$this->getCustomUrlId(),
    			'snippet_type'=>$this->getSnippetType(),
    			'views'=>$this->getViews(),
    			'last_viewed'=>$this->getLastViewed(),
    			'is_deleted'=>$this->getIsDeleted(),
    			'created_by'=>$this->getCreatedBy(),
    			'created_at'=>$this->getCreatedAt(),
    			'updated_by'=>$this->getUpdatedBy(),
    			'updated_at'=>$this->getUpdatedAt(),
    			);
    }

}
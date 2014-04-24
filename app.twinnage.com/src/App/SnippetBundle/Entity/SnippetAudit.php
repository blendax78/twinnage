<?php

namespace App\SnippetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * App\SnippetBundle\Entity\SnippetAudit
 */
class SnippetAudit
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $is_deleted
     */
    private $is_deleted;

    /**
     * @var string $created_by
     */
    private $created_by;

    /**
     * @var string $created_at
     */
    private $created_at;

    /**
     * @var string $updated_by
     */
    private $updated_by;

    /**
     * @var string $updated_at
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
     * Set is_deleted
     *
     * @param string $isDeleted
     * @return SnippetAudit
     */
    public function setIsDeleted($isDeleted)
    {
        $this->is_deleted = $isDeleted;
    
        return $this;
    }

    /**
     * Get is_deleted
     *
     * @return string 
     */
    public function getIsDeleted()
    {
        return $this->is_deleted;
    }

    /**
     * Set created_by
     *
     * @param string $createdBy
     * @return SnippetAudit
     */
    public function setCreatedBy($createdBy)
    {
        $this->created_by = $createdBy;
    
        return $this;
    }

    /**
     * Get created_by
     *
     * @return string 
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Set created_at
     *
     * @param string $createdAt
     * @return SnippetAudit
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return string 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_by
     *
     * @param string $updatedBy
     * @return SnippetAudit
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updated_by = $updatedBy;
    
        return $this;
    }

    /**
     * Get updated_by
     *
     * @return string 
     */
    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    /**
     * Set updated_at
     *
     * @param string $updatedAt
     * @return SnippetAudit
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return string 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var integer $account_id
     */
    private $account_id;

    /**
     * @var string $content
     */
    private $content;

    /**
     * @var integer $custom_url_id
     */
    private $custom_url_id;

    /**
     * @var integer $snippet_type
     */
    private $snippet_type;


    /**
     * Set name
     *
     * @param string $name
     * @return SnippetAudit
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
     * Set account_id
     *
     * @param integer $accountId
     * @return SnippetAudit
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
     * Set content
     *
     * @param string $content
     * @return SnippetAudit
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
     * Set custom_url_id
     *
     * @param integer $customUrlId
     * @return SnippetAudit
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
     * Set snippet_type
     *
     * @param integer $snippetType
     * @return SnippetAudit
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
    /**
     * @var integer $sync_status
     */
    private $sync_status;


    /**
     * Set sync_status
     *
     * @param integer $syncStatus
     * @return SnippetAudit
     */
    public function setSyncStatus($syncStatus)
    {
        $this->sync_status = $syncStatus;
    
        return $this;
    }

    /**
     * Get sync_status
     *
     * @return integer 
     */
    public function getSyncStatus()
    {
        return $this->sync_status;
    }
    /**
     * @var integer $snippet_id
     */
    private $snippet_id;


    /**
     * Set snippet_id
     *
     * @param integer $snippetId
     * @return SnippetAudit
     */
    public function setSnippetId($snippetId)
    {
        $this->snippet_id = $snippetId;
    
        return $this;
    }

    /**
     * Get snippet_id
     *
     * @return integer 
     */
    public function getSnippetId()
    {
        return $this->snippet_id;
    }
}
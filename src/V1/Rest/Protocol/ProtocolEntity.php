<?php
namespace ApigilityAppInfo\V1\Rest\Protocol;

use ApigilityCatworkFoundation\Base\ApigilityEntity;

class ProtocolEntity extends ApigilityEntity
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * 标题
     *
     * @Column(type="string", length=200, nullable=true)
     */
    protected $title;

    /**
     * 内容
     * @Column(type="text", nullable=true)
     */
    protected $content;

    /**
     * 更新时间
     *
     * @Column(type="datetime", nullable=false)
     */
    protected $update_time;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setUpdateTime($update_time)
    {
        $this->update_time = $update_time;
        return $this;
    }

    public function getUpdateTime()
    {
        if ($this->update_time instanceof \DateTime) return $this->update_time->getTimestamp();
        else return $this->update_time;
    }
}

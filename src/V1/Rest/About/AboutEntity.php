<?php
namespace ApigilityAppInfo\V1\Rest\About;

use ApigilityCatworkFoundation\Base\ApigilityObjectStorageAwareEntity;
use Zend\Form\Element\DateTime;

class AboutEntity extends ApigilityObjectStorageAwareEntity
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * 应用名称
     *
     * @Column(type="string", length=200, nullable=true)
     */
    protected $app_name;

    /**
     * 应用logo
     * @Column(type="string", length=255, nullable=false)
     */
    protected $logo;

    /**
     * 应用简介
     * @Column(type="text", nullable=true)
     */
    protected $content;

    /**
     * 客服电话
     *
     * @Column(type="string", length=200, nullable=true)
     */
    protected $customer_service_tel;

    /**
     * 反馈邮箱
     *
     * @Column(type="string", length=200, nullable=true)
     */
    protected $feedback_email;

    /**
     * 企业名称
     *
     * @Column(type="string", length=200, nullable=true)
     */
    protected $enterprise_name;

    /**
     * 企业地址
     *
     * @Column(type="string", length=200, nullable=true)
     */
    protected $enterprise_address;

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

    public function setAppName($app_name)
    {
        $this->app_name = $app_name;
        return $this;
    }

    public function getAppName()
    {
        return $this->app_name;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    public function getLogo()
    {
        if (!empty($this->logo)) return $this->objectStorageService->renderUriToUrl($this->logo);
        else return $this->logo;
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

    public function setCustomerServiceTel($customer_service_tel)
    {
        $this->customer_service_tel = $customer_service_tel;
        return $this;
    }

    public function getCustomerServiceTel()
    {
        return $this->customer_service_tel;
    }

    public function setFeedbackEmail($feedback_email)
    {
        $this->feedback_email = $feedback_email;
        return $this;
    }

    public function getFeedbackEmail()
    {
        return $this->feedback_email;
    }

    public function setEnterpriseName($enterprise_name)
    {
        $this->enterprise_name = $enterprise_name;
        return $this;
    }

    public function getEnterpriseName()
    {
        return $this->enterprise_name;
    }

    public function setEnterpriseAddress($enterprise_address)
    {
        $this->enterprise_address = $enterprise_address;
        return $this;
    }

    public function getEnterpriseAddress()
    {
        return $this->enterprise_address;
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

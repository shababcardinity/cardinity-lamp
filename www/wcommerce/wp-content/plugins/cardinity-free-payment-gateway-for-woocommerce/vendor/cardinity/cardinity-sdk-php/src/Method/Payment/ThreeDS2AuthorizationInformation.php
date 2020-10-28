<?php

namespace Cardinity\Method\Payment;

class ThreeDS2AuthorizationInformation
{
    /** @var STRING */
    private $acsUrl;

    /** @var STRING should serialize? */
    private $cReq;


    /**
     * @return STRING
     */
    public function getAcsUrl()
    {
        return $this->acsUrl;
    }


    /**
     * @param STRING
     * @return VOID
     */
    public function setAcsUrl(string $acsUrl)
    {
        $this->acsUrl = $acsUrl;
    }


    /**
     * @return STRING
     */
    public function getCReq()
    {
        return $this->cReq;
    }


    /**
     * @param STRING
     * @return VOID
     */
    public function setCReq(string $cReq)
    {
        $this->cReq = $cReq;
    }
}
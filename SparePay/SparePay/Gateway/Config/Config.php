<?php

namespace SparePay\SparePay\Gateway\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Encryption\Encryptor;
use Magento\Framework\UrlInterface;
use EllipticCurve\Ecdsa;
use EllipticCurve\PrivateKey;

class Config extends \Magento\Payment\Gateway\Config\Config
{
    const SHOP_ID = 'shop_id';
    const DESCRIPTION = 'description';
    const PUBLIC_KEY = 'public_key';
    const PRIVATE_KEY = 'private_key';
    const X_API_KEY = 'x_api_key';
    const APP_ID = 'app_id';
    const SIGNATURE = 'signature';
    /**
     * @var Encryptor
     */
    protected $encryptor;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param Encryptor $encryptor
     * @param UrlInterface $urlHelper
     * @param string|null $methodCode
     * @param string $pathPattern
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Encryptor $encryptor,
        UrlInterface $urlHelper,
        $methodCode = 'begateway_checkout',
        $pathPattern = self::DEFAULT_PATH_PATTERN
    ) {
        parent::__construct($scopeConfig, $methodCode, $pathPattern);

        $this->encryptor = $encryptor;
        $this->urlHelper = $urlHelper;
    }

    public function getShopId()
    {
        return $this->getValue(self::SHOP_ID);
    }

    public function getDescription()
    {
        return $this->getValue(self::DESCRIPTION);
    }

    public function getPublicKey()
    {
        return $this->getValue(self::PUBLIC_KEY);
    }

    public function getPrivateKey()
    {
        return $this->getValue(self::PRIVATE_KEY);
    }

    public function getXapiKey()
    {
        return $this->getValue(self::X_API_KEY);
    }

    public function getAppId()
    {
        return $this->getValue(self::APP_ID);
    }

    public function getSignature()
    {
        $ecc = new Ecdsa();
        $key = new PrivateKey();
        $privateKey = $this->getValue(self::PRIVATE_KEY);
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 
        $grandTotal = $cart->getQuote()->getSubtotal();
        $str = strval($grandTotal + 0);
        $arr = array('amount' => $str, 'description' => $this->getValue(self::DESCRIPTION));
        $PrivateKey = $key::fromPem($privateKey);
        $signature = $ecc::sign(json_encode($arr), $PrivateKey);
          return $signature->toBase64();
    }
    
}

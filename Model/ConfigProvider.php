<?php

namespace SparePay\SparePay\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use SparePay\SparePay\Gateway\Config\Config;

class ConfigProvider implements ConfigProviderInterface
{
    const CODE       = 'begateway_checkout';

    /**
     * @var Config
     */
    private $config;

    /**
     * @param Config $config
     */
    public function __construct(
        Config $config
    ) {
        $this->config = $config;
    }

    /**
     * Retrieve checkout configuration
     *
     * @return array
     */
    public function getConfig()
    {
        return [
            'payment' => [
                self::CODE => [
                    'shop_id' => $this->config->getShopId(),
                    'description' => $this->config->getDescription(),
                    'publickey' => $this->config->getPublicKey(),
                    'privatekey' => $this->config->getPrivateKey(),
                    'xapikey' => $this->config->getXapiKey(),
                    'appid' => $this->config->getAppId(),
                    'signature' => $this->config->getSignature()
                ],
            ]
        ];
    }
}

# Spare Payment Module for Magento 2

This is a Payment Module for Magento 2 Community Edition, that gives you the ability to process payments through payment service providers.

## Requirements

  * Magento 2 Community Edition 2.x (Tested up to 2.3.7 / 2.4.2)
  * Composer 2.x

## Installation (composer)

  * Install __Composer__ - [Composer Download Instructions](https://getcomposer.org/doc/00-intro.md)

  * Install Payment Module

    ```sh
    $ composer require sparepay/magento2-payment-module
    ```

  * Enable Payment Module

    ```sh
    $ php bin/magento module:enable SparePay_SparePay
    ```

    ```sh
    $ php bin/magento setup:upgrade
    ```

  * If you are not running your Magento installation in compiled mode, skip to the next step. If you are running in compiled mode, complete this step:

    ```sh
    $ php bin/magento setup:di:compile
    ```

  * Deploy Magento Static Content (__Execute If needed__)

    ```sh
    $ php bin/magento setup:static-content:deploy en_GB en_US
    ```

## Installation (manual)

  * Download the Payment Module , unpack it and upload its contents to a new folder ```<root>/app/code/SparePay/SparePay/``` of your Magento 2 installation

  * Enable Payment Module

    ```sh
    $ php bin/magento module:enable SparePay_SparePay --clear-static-content
    ```

    ```sh
    $ php bin/magento setup:upgrade
    ```

  * If you are not running your Magento installation in compiled mode, skip to the next step. If you are running in compiled mode, complete this step:

    ```sh
    $ php bin/magento setup:di:compile
    ```

  * Deploy Magento Static Content

    ```sh
    $ php bin/magento setup:static-content:deploy -f
    ```   

## Configuration

  * Login inside the __Admin Panel__ and go to ```Stores``` -> ```Configuration``` -> ```Sales``` -> ```Payment Methods```
  * If the Payment Module Panel ```Spare Payment``` is not visible in the list of available Payment Methods,
  go to  ```System``` -> ```Cache Management``` and clear Magento Cache by clicking on ```Flush Magento Cache```
  * Go back to ```Payment Methods``` and click the button ```Configure``` under the payment method ```Spare Payment``` to expand the available settings
  * Set ```Enabled``` to ```Yes```, set the correct credentials, select your prefered transaction types and additional settings and click ```Save config```
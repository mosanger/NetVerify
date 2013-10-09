<?php

namespace NetVerify\Tests;

class NetVerifyTestCase extends \PHPUnit_Framework_TestCase
{
    protected $apiSecret;
    protected $apiMerchantToken;

    protected $correctCredentials =  array(
        'merchant_token' => 'ac9ab081-ad3d-4e12-89ea-e57bc02ce9c6',
        'secret' => 's7XI6gGjthP17kTWWSRrsXl5dLgKC1xm',
        'debug' => false
    );

    protected $minRequired =  array(
        'performNetverify' => array(
            'merchantIdScanReference' => 'TestTest',
            'frontsideImage' => 'dfs'
        )
    );

}
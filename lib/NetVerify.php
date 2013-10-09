<?php
/**
 * Created by PhpStorm.
 * User: TransferGo
 * Date: 13.10.8
 * Time: 10.52
 */

use NetVerify\Request;
use NetVerify\Response;
use Guzzle\Http\Client;

class NetVerify {

    protected $apiRoot = 'https://netverify.com/';
    protected $apiMerchantToken;
    protected $apiSecret;
    protected $debug = false;
    protected $requestAction;
    protected $request;
    protected $response;
    protected $validActions = array('performNetverify');

    public function __construct($args = array()){
        if (isset($args['root'])) $this->apiRoot = $args['root'];
        if (isset($args['merchant_token'])) $this->apiMerchantToken = $args['merchant_token'];
        if (isset($args['secret'])) $this->apiSecret = $args['secret'];
        if ($args['debug'] === true) $this->debug = true;

        $this->validate();
        $this->log('NetVerify Loaded.');
    }


    public function setRequest($name = '', $params = array()) {

        if (in_array($name, $this->validActions)) {
            $this->request = new Request($name, $params);
        } else
            throw new Exception('Invalid Action Name');

        return $this;
    }

    public function callRequest(){
        if ($this->request instanceof Request) {
            if (!is_null($this->request->getAction()) && count($this->request->getParams()) > 0) {

                $client = new Client($this->apiRoot);
                $request = $client->post($this->request->getActionUrl(), array(), json_encode($this->request->getParams()) );
                $request->setHeader('Accept','application/json');
                $request->setHeader('Content-Type','application/json');
                $request->setAuth($this->apiMerchantToken, $this->apiSecret);
                $response = $request->send();
                $this->response = new Response($response->json());
            }
        } else
            throw new Exception('Can\'t make a call.');

        return $this->response;
    }

    private function log($msg) {
        if($this->debug == true) error_log($msg);
    }

    private function validate() {
        if (!isset($this->apiMerchantToken))
            throw new Exception('Please provide Merchant Token');

        if (!isset($this->apiSecret))
            throw new Exception('Please provide API Secret');
    }
} 
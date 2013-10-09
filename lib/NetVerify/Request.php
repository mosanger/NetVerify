<?php
/**
 * Created by PhpStorm.
 * User: TransferGo
 * Date: 13.10.8
 * Time: 15.08
 */

namespace NetVerify;


class Request {

    protected $action_urls;
    protected $action;
    protected $params;

    public function __construct($name=null, $params=array()) {

        if (isset($name)) {
            $this->action = $name;
        } else
            throw new \Exception('Please Provide Correct Action');

        if (!empty($params)) {
            $validParams = $this->validateParams($params);
            $this->params = $validParams;
        } else
            throw new \Exception('Please Provide Arguments');

        $this->action_url = ValidParams::getActionUrl($this->action);

    }

    public function getAction(){
        return $this->action;
    }

    public function getParams(){
        return $this->params;
    }
    public function getActionUrl(){
        return $this->action_url;
    }

    private function validateParams($submited_params = array()){

        $params = ValidParams::getRequestParams($this->action);
        $result = array();
        if (!is_null($params)) {
            foreach($params as $param=>$req) {
                if ($req == true && !isset($submited_params[$param])) {
                    throw new \Exception('Please provide all required parameters.');
                }

                if (isset($submited_params[$param])) {
                    $result[$param] = $submited_params[$param];
                }

            }
        }

        return $result;
    }

} 
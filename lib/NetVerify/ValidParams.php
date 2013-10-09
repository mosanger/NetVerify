<?php
/**
 * Created by PhpStorm.
 * User: TransferGo
 * Date: 13.10.8
 * Time: 15.07
 */

namespace NetVerify;

class ValidParams {

    static $request_parameters = array(
        'performNetverify' => array(
            'merchantIdScanReference' => true,
            'frontsideImage' => true,
            'enabledFields' => false,
            'merchantReportingCriteria' => false,
            'customerId' => false,
            'callbackUrl' => false,
            'callbackEmail' => false,
            'firstName' => false,
            'lastName' => false,
            'country' => false,
            'usState' => false,
            'expiry' => false,
            'number' => false,
            'idType' => false,
            'dob' => false,
            'frontsideImageMimeType' => false,
            'backsideImage' => false,
            'backsideImageMimeType' => false,
            'callbackGranularity' => false,
            'personalNumber' => false,
            'mrzCheck' => false,
            'additionalInformation' => false
        )
    );

    static $response_parameters = array(
        'performNetverify' => array(
            'jumioIdScanReference',
            'timestamp',
        )
    );

    static $action_url = array(
        'performNetverify' => '/api/netverify/v1/performNetverify'
    );

    static function getRequestParams($action = null){
        if (!is_null($action)) {
            if (isset(ValidParams::$request_parameters[$action])) {
                return ValidParams::$request_parameters[$action];
            }
        }
        return null;
    }

    static function getActionUrl($action = null){
        if (!is_null($action)) {
            if (isset(ValidParams::$action_url[$action])) {
                return ValidParams::$action_url[$action];
            }
        }
        return null;
    }
} 
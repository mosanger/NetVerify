<?php

namespace NetVerify\Tests;

class NetVerifyTest extends NetVerifyTestCase
{

    protected $mock;

    public function setUp(){
        $this->mock = new \NetVerify($this->correctCredentials);
    }
    public function testCanCreateObjectWithEmptyArray()
    {
        try {
            $netVerify = new \NetVerify(array());
            $netVerify2 = new \NetVerify();
        }
        catch (\Exception $expected) {
            return;
        }
        $this->fail('An expected exception has not been raised.');
    }

    public function testSetRequestNullAction()
    {
        try {
            $this->mock->setRequest(null,array());
        }
        catch (\Exception $expected) {
            return;
        }
        $this->fail('An expected exception has not been raised.');
    }

    public function testSetRequestEmptyAction()
    {
        try {
            $this->mock->setRequest('',array());
        }
        catch (\Exception $expected) {
            return;
        }
        $this->fail('An expected exception has not been raised.');
    }

    public function testSetRequestEmptyArgs()
    {
        try {
            $this->mock->setRequest('performNetverify',array());
        }
        catch (\Exception $expected) {
            return;
        }
        $this->fail('An expected exception has not been raised.');
    }

    public function testSetRequest()
    {
        $this->mock->setRequest('performNetverify',$this->minRequired['performNetverify']);

    }

    public function testSetRequestNoRequired()
    {
        try {
            $this->mock->setRequest('performNetverify',array('merchantIdScanReference' => 'asd','test'=>'test'));
        }
        catch (\Exception $expected) {
            return;
        }
        $this->fail('An expected exception has not been raised.');
    }

    public function testRequest() {
        try {
            $test = new \NetVerify\Request(null, null);
        }
        catch (\Exception $expected) {
            return;
        }
        $this->fail('An expected exception has not been raised.');

    }
    public function testValidParamsClassWhenNull() {

        $params = \NetVerify\ValidParams::getRequestParams('test');
        $this->assertNull($params);

    }

    public function testValidParamsClass() {

        $params = \NetVerify\ValidParams::getRequestParams('performNetverify');
        $this->assertNotEmpty($params);

    }

    public function testFailCall() {
        try {
            $this->mock->callRequest();
        }
        catch (\Exception $expected) {
            return;
        }
        $this->fail('An expected exception has not been raised.');

    }

    public function testCall() {

        $this->mock->setRequest('performNetverify',$this->minRequired['performNetverify']);

    }





}
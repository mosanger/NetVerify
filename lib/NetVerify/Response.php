<?php
namespace NetVerify;

class Response {
    protected $body;

    public function __construct($body){
        $this->setBody($body);
    }

    public function getBody() {
        return $this->body;
    }

    public function setBody($body) {
        $this->body = $body;
        return $this;
    }
}

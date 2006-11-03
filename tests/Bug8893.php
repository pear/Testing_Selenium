<?php
require_once '../Selenium.php';
require_once 'PHPUnit/Framework/TestCase.php';

class Bug8893 extends PHPUnit_Framework_TestCase
{
    private $selenium;

    public function __construct($name)
    {
        $this->browserUrl = "http://www.google.de/";
        $this->testUrl = $this->browserUrl;
        parent::__construct($name);
    }
// {{{ setUp and tearDown
    public function setUp()
    {
        try {
            $this->selenium = new Testing_Selenium("*firefox", $this->browserUrl);
            $this->selenium->start();
        } catch (Selenium_Exception $e) {
            $this->selenium->stop();
            echo $e;
        }
    }

    public function tearDown()
    {
        try {
           $this->selenium->stop();
        } catch (Selenium_Exception $e) {
            echo $e;
        }
    }
    // }}}
    public function test8893()
    {
        try {
            $this->selenium->open("{$this->testUrl}");
            var_dump($this->selenium->getAllButtons());
        } catch (Selenium_Exception $e) {
            $this->selenium->stop();
            echo $e;
        }
    }
}
?>

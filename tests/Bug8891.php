<?php
require_once '../Selenium.php';
require_once 'PHPUnit/Framework/TestCase.php';

class Bug8891 extends PHPUnit_Framework_TestCase
{
    private $selenium;

    public function __construct($name)
    {
        $this->browserUrl = "http://www.ganchiku.com/";
        $this->testUrl = $this->browserUrl . "selenium/tests";
        parent::__construct($name);
    }
// {{{ setUp and tearDown
    public function setUp()
    {
        try {
            $this->selenium = new Testing_Selenium("*firefox", $this->browserUrl);
            $this->selenium->start();
        } catch (Testing_Selenium_Exception $e) {
            $this->selenium->stop();
            echo $e;
        }
    }

    public function tearDown()
    {
        try {
           $this->selenium->stop();
        } catch (Testing_Selenium_Exception $e) {
            echo $e;
        }
    }
    // }}}
    public function test8893()
    {
        try {
            $this->selenium->open("{$this->testUrl}/html/test_open.html");

            // The default is glob
            $this->assertFalse($this->selenium->isTextPresent('Foo'));
            $this->assertTrue($this->selenium->isTextPresent('This*'));
            $this->assertTrue($this->selenium->isTextPresent('This?is'));
            $this->assertTrue($this->selenium->isTextPresent('T?????'));

            // To use JavaScrpt regexp, speicify regexp: as follows:
            $this->assertTrue($this->selenium->isTextPresent('regexp:^This'));
            $this->assertTrue($this->selenium->isTextPresent('regexp:^Th.s'));

        } catch (Selenium_Exception $e) {
            $this->selenium->stop();
            echo $e;
        }
    }
}
?>

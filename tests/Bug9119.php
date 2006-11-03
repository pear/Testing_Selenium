<?php
require_once '../Selenium.php';
require_once 'PHPUnit/Framework/TestCase.php';

class Bug9119 extends PHPUnit_Framework_TestCase
{
    private $selenium;

    public function __construct($name)
    {
        parent::__construct($name);
    }
    public function test9119()
    {
        try {
            $selenium = new Testing_Selenium("*firefox", "http://www.ganchiku.com/");
            $selenium->start();
            $selenium->open("http://www.ganchiku.com/selenium/tests/html/bug9119.html");

            $selenium->click('link=foo#bar');
            $this->assertTrue($selenium->isAlertPresent());
            $selenium->stop();

        } catch (Selenium_Exception $e) {
            $this->selenium->stop();
            echo $e;
        }
    }
}
?>

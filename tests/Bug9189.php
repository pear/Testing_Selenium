<?php
//require_once 'Testing/Selenium.php';
require_once '../Selenium.php';
require_once 'PHPUnit/Framework/TestCase.php';

class Bug9189 extends PHPUnit_Framework_TestCase
{
    private $selenium;

    public function __construct($name)
    {
        parent::__construct($name);
    }
    public function test9189()
    {
        try {
            $selenium = new Testing_Selenium("*firefox", "http://localhost/");
            $selenium->start();
            $selenium->open("http://localhost/shin/html/bug9189.html");
            $selenium->select('parent_cat', 'Test Category 001');
            $selenium->stop();

        } catch (Selenium_Exception $e) {
            $this->selenium->stop();
            echo $e;
        }
    }
}
?>

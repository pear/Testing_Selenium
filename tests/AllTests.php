<?php
// Commands are tested in Selenium RC build, and all commands are generated using XSLT.
// So this tests only if basic commands work.
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Testing_Selenium_AllTests::main');
}

if ($fp = @fopen('PHPUnit/Autoload.php', 'r', true)) {
    require_once 'PHPUnit/Autoload.php';
} elseif ($fp = @fopen('PHPUnit/Framework.php', 'r', true)) {
    require_once 'PHPUnit/Framework.php';
    require_once 'PHPUnit/TextUI/TestRunner.php';
} else {
    die('skip could not find PHPUnit');
}
fclose($fp);

class Testing_Selenium_AllTests
{
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }
 
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('PHPUnit Framework');
        $dir = new GlobIterator(dirname(__FILE__) . '/*Test.php');
        $suite->addTestFiles($dir);
        return $suite;
    }
}
 
if (PHPUnit_MAIN_METHOD == 'Testing_Selenium_AllTests::main') {
    Testing_Selenium_AllTests::main();
}
?>

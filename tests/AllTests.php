<?php

error_reporting(E_ALL|E_STRICT);

require_once 'PHPUnit/Util/Filter.php';

PHPUnit_Util_Filter::addFileToFilter(__FILE__);

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'AllTests::main');
    chdir(dirname(__FILE__));
}

if (!defined('PHPUnit_INSIDE_OWN_TESTSUITE')) {
    define('PHPUnit_INSIDE_OWN_TESTSUITE', TRUE);
}

require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

require_once 'SeleniumTest.php';
require_once 'Bug8891.php';
require_once 'Bug9119.php';
require_once 'Bug9189.php';
//require_once 'Bug8893.php';

class AllTests
{
    public static function main()
    {

        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('Testing');
        /** Add testsuites, if there is. */
        $suite->addTestSuite('SeleniumTest');
        $suite->addTestSuite('Bug8891');
//        $suite->addTestSuite('Bug8893');
        $suite->addTestSuite('Bug9119');
        $suite->addTestSuite('Bug9189');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'AllTests::main') {
    AllTests::main();
}
?>

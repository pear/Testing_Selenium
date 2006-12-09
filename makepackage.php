<?php
/* $Id $*/
require_once 'PEAR/PackageFileManager2.php';
PEAR::setErrorHandling(PEAR_ERROR_DIE);
// Copy from XSLT Generated source code from SRC repository. XXX For myself.
system('cp -Rf $HOME/projects/Selenium_RC/clients/php/PEAR/Testing/* . ');

$releaseVersion = '0.3.0';
$apiVersion = '0.3.0';
$changelog = '
  - Adjusted for compatibility with Selenium Remote Control 0.9.0.
  - Changed API waitForPageToLoad, the $timeout value is necessary.
  - HTTP_Request $driver option is removed.(Now only "native"(default) and "curl" are acceptable.)
  - Testing_Selenium will be integrated into the Selenium Rremote Control Project.
  - Upgrade to beta release.
  - This release still has Bug #9189.
  ';
$notes = $changelog;
$packagexml = new PEAR_PackageFileManager2();
$packagexml->setOptions(array('filelistgenerator' => 'file',
      'packagefile' => 'package2.xml',
      'packagedirectory' => dirname(__FILE__),
      'baseinstalldir' => 'Testing',
      'ignore' => array('makepackage.php', 'Documentation/', 'ver/', 'CVS/'),
      'simpleoutput' => true,
      'changelogoldtonew' => true,
      'changelognotes' => $changelog,
      'exceptions' => array('ChangeLog' => 'doc', 'README' => 'doc', 'TODO' => 'doc',
                            'selenium-server.jar' => 'data'),
      'dir_roles' => array('examples' => 'doc', 'docs' => 'doc', 'tests' => 'test')));

$packagexml->setPackageType('php');
$packagexml->addRelease();
$packagexml->setChannel('pear.php.net');
$packagexml->setPackage('Testing_Selenium');
$packagexml->setReleaseVersion($releaseVersion);
$packagexml->setAPIVersion($apiVersion);
$packagexml->setReleaseStability('beta');
$packagexml->setAPIStability('beta');
$packagexml->setSummary('PHP Client for Selenium RC');
$packagexml->setDescription('PHP Client for the Selenium Remote Control test tool

Selenium Remote Control (SRC) is a test tool that allows you to write
automated web application UI tests in any programming language against
any HTTP website using any mainstream JavaScript-enabled browser.  SRC
provides a Selenium Server, which can automatically start/stop/control
any supported browser. It works by using Selenium Core, a pure-HTML+JS
library that performs automated tasks in JavaScript; the Selenium
Server communicates directly with the browser using AJAX
(XmlHttpRequest).
L<http://www.openqa.org/selenium-rc/>

This module sends commands directly to the Server using simple HTTP
GET/POST requests.  Using this module together with the Selenium
Server, you can automatically control any supported browser.

To use this module, you need to have already downloaded and started
the Selenium Server.  (The Selenium Server is a Java application.)');
$packagexml->setNotes($notes);
$packagexml->setPhpDep('5.1.0');
$packagexml->setPearinstallerDep('1.4.0a12');
$packagexml->addExtensionDep('optional', 'curl');
$packagexml->addMaintainer('lead', 'shin', 'Shin Ohno', 'ganchiku@gmail.com');
$packagexml->addMaintainer('developer', 'bjoern', 'Bjoern Schotte', 'bjoern@thinkphphq.de');
$packagexml->setLicense('PHP License', 'http://www.php.net/license');
$packagexml->addGlobalReplacement('package-info', '@package_version@', 'version');
$packagexml->generateContents();
$pkg = &$packagexml->exportCompatiblePackageFile1();
if (isset($_GET['make']) || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')) {
    $pkg->writePackageFile();
    $packagexml->writePackageFile();
} else {
    $pkg->debugPackageFile();
    $packagexml->debugPackageFile();
}
?>

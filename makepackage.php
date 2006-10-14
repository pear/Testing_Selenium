<?php
/* $Id* */
require_once 'PEAR/PackageFileManager2.php';
PEAR::setErrorHandling(PEAR_ERROR_DIE);

unlink('package.xml');

$releaseVersion = '0.2.0';
$apiVersion = '0.2.0';
$changelog = '
  - Changed package name. Selenium to Testing_Selenium.
  ';
$notes = 'Changed package name. Selenium to Testing_Selenium.';
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
$packagexml->setReleaseStability('alpha');
$packagexml->setAPIStability('alpha');
$packagexml->setSummary('PHP Client for Selenium RC');
$packagexml->setDescription('PHP Client for Selenium RC');
$packagexml->setNotes($notes);
$packagexml->setPhpDep('5.1.0');
$packagexml->setPearinstallerDep('1.4.0a12');
$packagexml->addExtensionDep('optional', 'curl');
$packagexml->addPackageDepWithChannel('optional', 'HTTP_Request', 'pear.php.net');
$packagexml->addMaintainer('lead', 'shin', 'Shin Ohno', 'ganchiku@gmail.com');
$packagexml->addMaintainer('developer', 'bjoern', 'Bjoern Schotte', 'bjoern@thinkphphq.de');
$packagexml->setLicense('PHP License', 'http://www.php.net/license');
$packagexml->addGlobalReplacement('package-info', '@PEAR-VER@', 'version');
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

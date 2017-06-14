<?php
namespace Concrete\Package\MmamPackage;

use Concrete\Core\Package\Package;
use Concrete\Core\Page\Theme\Theme;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package {

    protected $pkgHandle = 'mmam_package'; //Change to the file directory name, Example: mischief_package
    protected $appVersionRequired = '5.7.1';
    protected $pkgVersion = '1.0';

    public function getPackageDescription() {
        return t("Minnesota Marine Art Museum Functionality Package. Requires Community Store and Community Store Square Packages."); //Example "Mischief Studios Theme Package"
    }

    public function getPackageName() {
        return t("Mmam Package"); //Example Mischief Studios
    }

    public function install() {
        $pkg = parent::install();
        Theme::add('mmam', $pkg); //Change to the name of the theme, Example: mischief (should be the folder of the theme)
    }

    public function uninstall() {
        $pkg = parent::uninstall();
    }
}
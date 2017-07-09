<?php
namespace Concrete\Package\MmamPackage;

use Concrete\Core\Package\Package;
use Concrete\Core\Page\Theme\Theme;
use \Concrete\Core\Page\Single as SinglePage;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package {

    protected $pkgHandle = 'mmam_package'; //Change to the file directory name, Example: mischief_package
    protected $appVersionRequired = '8.1.0';
    protected $pkgVersion = '1.0';

    public function getPackageDescription() {
        return t("Minnesota Marine Art Museum Theme Package."); //Example "Mischief Studios Theme Package"
    }

    public function getPackageName() {
        return t("MMAM Theme Package"); //Example Mischief Studios
    }

    public function install() {
        $pkg = parent::install();
        Theme::add('mmam', $pkg); //Change to the name of the theme, Example: mischief (should be the folder of the theme)
        SinglePage::add('inventory', $pkg);
        SinglePage::add('import_to_square', $pkg);
    }

    public function uninstall() {
        $pkg = parent::uninstall();
    }
}

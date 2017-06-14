<?php
namespace Concrete\Package\MmamPackage;

use Concrete\Core\Package\Package;
use Concrete\Core\Page\Theme\Theme;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package {

    protected $pkgHandle = 'mmam_package'; //Change to the file directory name, Example: mischief_package
    protected $appVersionRequired = '5.7.1';
    protected $pkgVersion = '1.0';

    /**
     * This function returns the functionality description of the package.
     *
     * @param void
     * @return string $description
     * @author NCG 06/14/2017
     */
    public function getPackageDescription() {
        return t("Minnesota Marine Art Museum Theme."); //Example "Mischief Studios Theme Package"
    }

    /**
     * This function returns the name of the package.
     *
     * @param void
     * @return string $name
     * @author NCG 06/14/2017
     */
    public function getPackageName() {
        return t("MMAM Package"); //Example Mischief Studios
    }

    /**
     * This function is executed during initial installation of the package.
     *
     * @param void
     * @return void
     * @author NCG 06/14/2017
     */
    public function install() {
        $pkg = parent::install();
        Theme::add('mmam', $pkg); //Change to the name of the theme, Example: mischief (should be the folder of the theme)
    }

    /**
     * This function is executed during uninstallation of the package.
     *
     * @param void
     * @return void
     * @author NCG 06/14/2017
     */
    public function uninstall() {
        $pkg = parent::uninstall();
    }
}
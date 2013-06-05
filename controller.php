<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

class NaumeInEditPagesPackage extends Package {

    protected $pkgHandle = 'naume_in_edit_pages';
    protected $appVersionRequired = '5.6.0';
    protected $pkgVersion = '0.0.1';

    public function getPackageDescription() {
        return t("Show in edit Pages");
    }

    public function getPackageName() {
        return t("Show in edit Pages");
    }

    public function install() {
        $pkg = parent::install();
        
        Loader::model('single_page');

        SinglePage::add('/dashboard/sitemap/in_edit', $pkg);
    }
}
?>

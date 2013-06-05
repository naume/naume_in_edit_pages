<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

class DashboardSitemapInEditController extends Controller {

    public $helpers = array('form', 'html');

    public function view() {
        $pl = new PageList();
        $pl->filter('p1.cIsCheckedOut', 1);
        $pages = $pl->getPage();
        $this->set('pages', $pages);
    }

}

?>

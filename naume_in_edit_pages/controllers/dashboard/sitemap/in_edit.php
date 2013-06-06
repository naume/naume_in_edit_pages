<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

class DashboardSitemapInEditController extends Controller {

    public $helpers = array('form', 'html');

    public function view() {
        $pl = new PageList();
        $pl->filter('p1.cIsCheckedOut', 1);
        $pages = $pl->getPage();
        $this->set('pages', $pages);
        $this->set('mode', 'inEdit');
    }

    public function notPublished() {
        Loader::model('page_list');
        $pl = new PageList();
        $pl->displayUnapprovedPages();
        $pl->filterByIsApproved(0);
        $pages = $pl->get();
        $this->set('pages', $pages);
        $this->set('mode', 'notApproved');
    }

    public function approvePageBycID() {
        $cID = $_REQUEST['pagecID'];
        if ($cID) {
            $currentCollectionVersion = Collection::getByID($cID)->getVersionObject();
            $currentCollectionVersion->approve();
        }
        Loader::model('page_list');
        $pl = new PageList();
        $pl->displayUnapprovedPages();
        $pl->filterByIsApproved(0);
        $pages = $pl->get();
        $this->set('pages', $pages);
        $this->set('mode', 'notApproved');
    }

}

?>

<?php
defined('C5_EXECUTE') or die(_("Access Denied."));
$h = Loader::helper('concrete/dashboard');
$ih = Loader::helper('concrete/interface');

?>
<?php
if ($mode == 'inEdit') {
    echo $h->getDashboardPaneHeaderWrapper(t('Not Approved Pages'), false);
    echo $ih->button(t('Show not Approved Pages'), $this->action('notPublished'), ' btn');
} else {
    echo $h->getDashboardPaneHeaderWrapper(t('Pages in edit'), false);
    echo $ih->button(t('Show in Edit Pages'), $this->action(''), ' btn');
}
?>
<br />
<br />
<br />
<?php if (is_array($pages) && !empty($pages)) { ?>
    <table class="grid-list table table-bordered table-striped">

        <tr>
            <td class="header">Page</td>
            <?php
            if ($mode == 'inEdit') {
                echo ' <td class="header">User</td>';
            } else {
                echo ' <td class="header"></td>';
            }
            ?>
        </tr>
        <?php
        foreach ($pages as $page):
            ?>
            <tr>
                <td>
                    <a target="_blank" href="<?php echo $page->getCollectionPath() ?>/">
                        <?php echo $page->getCollectionName() ?>
                    </a>
                </td>
                <td>
                    <?php
                    if ($mode == 'notApproved') {
                        echo '<form method="post" action="' . $this->action('approvePageBycID') . '">';
                        echo '<input type="hidden" name="pagecID" value="' . $page->getCollectionID() . '">';
                        echo '<input type="submit" class="btn" style="float:right;" value="' . t('Approve') . '">';
                        echo '</form>';
                    } else {
                        $u = User::getByUserID($page->cCheckedOutUID);
                        echo $u->getUserName();
                    }
                    ?>
                </td>               
            </tr>
            <?php
        endforeach;
        ?></table><?php
} else {
    echo t('No Pages in Edit');
}
?>

<?php
echo $h->getDashboardPaneFooterWrapper();
?>


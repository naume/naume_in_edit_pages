<?php
defined('C5_EXECUTE') or die(_("Access Denied."));
$h = Loader::helper('concrete/dashboard');
echo $h->getDashboardPaneHeaderWrapper(t('Pages in edit'), false);
?>
<?php if (is_array($pages) && !empty($pages)) { ?>
    <table class="grid-list table table-bordered table-striped">

        <tr>
            <td class="header">Page</td>
            <td class="header">User</td>
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
                    $u = User::getByUserID($page->cCheckedOutUID);
                    echo $u->getUserName();
                    ?>
                </td>               
            </tr>
        </table>
    <?php
    endforeach;
}else {
    echo t('No Pages in Edit');
}
?>

<?php
echo $h->getDashboardPaneFooterWrapper();
?>


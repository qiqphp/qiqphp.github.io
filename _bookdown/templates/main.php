<?php
// config
$config = $this->page->getRoot()->getConfig();

// register view helper
require_once __DIR__ . "/tocListHelper.php";
$helpers = $this->getHelpers();
$helpers->set('tocListHelper', function () use ($config) {
    return new \tocListHelper($this->get('anchorRaw'), $config);
});

// register the templates
$templatePath = dirname(__DIR__) . '/vendor/bookdown/themes/templates';
$templates = $this->getViewRegistry();
$templates->set('head', $templatePath . '/head.php');
$templates->set('meta', $templatePath . '/meta.php');
$templates->set('style', __DIR__ . '/style.php');
$templates->set('body', $templatePath . '/body.php');
$templates->set('script', $templatePath . '/script.php');
$templates->set('nav', $templatePath . '/nav.php');
$templates->set('core', $templatePath . '/core.php');
$templates->set('navheader', $templatePath . '/navheader.php');
$templates->set('navfooter', $templatePath . '/navfooter.php');
$templates->set('toc', $templatePath . '/toc.php');
$templates->set('partialTopNav', $templatePath . '/partial/topNav.php');
$templates->set('partialBreadcrumb', $templatePath . '/partial/breadcrumb.php');
$templates->set('partialSideNav', __DIR__ . '/partial/sideNav.php');
?>
<!DOCTYPE html>
<html>
<?= $this->render("head"); ?>
<?= $this->render("body"); ?>
</html>

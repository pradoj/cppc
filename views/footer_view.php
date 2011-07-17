<div data-role="footer">
    <p>(c) <?php echo date('Y');?> - <a href="http://pradoj.com">pradoj.com</a> - <a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/contato/">Contato</a></p>
</div>
<!-- ADVERTISING - ANÚNCIOS-->
<?php
// carrega classe mobile
require_once "ismobile.class.php";
// instancia classe IsMobile
$ismobi = new IsMobile();
// se for mobile, mandar para versão mobile do site
if($ismobi->CheckMobile()) {
    //echo 'mobile';
    require_once 'ads/admob_view.php';
} else {
    //echo 'não mobile';
    require_once 'ads/google_view.php';
    require_once 'ads/boo-box_view.php';
}

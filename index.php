<?php
require_once 'config.php';
?>
<?php
  // Copyright 2009 Google Inc. All Rights Reserved.
  $GA_ACCOUNT = "MO-23860787-5";
  //$GA_PIXEL = "/ga.php";
  $GA_PIXEL = "ga.php";

  function googleAnalyticsGetImageUrl() {
    if ( !isset($_SERVER["HTTP_REFERER"]) ) {
        $_SERVER["HTTP_REFERER"] = '';
    }
    global $GA_ACCOUNT, $GA_PIXEL;
    $url = "";
    $url .= $GA_PIXEL . "?";
    $url .= "utmac=" . $GA_ACCOUNT;
    $url .= "&utmn=" . rand(0, 0x7fffffff);
    $referer = $_SERVER["HTTP_REFERER"];
    $query = $_SERVER["QUERY_STRING"];
    $path = $_SERVER["REQUEST_URI"];
    if (empty($referer)) {
      $referer = "-";
    }
    $url .= "&utmr=" . urlencode($referer);
    if (!empty($path)) {
      $url .= "&utmp=" . urlencode($path);
    }
    $url .= "&guid=ON";
    return str_replace("&", "&amp;", $url);
  }
?>
<!DOCTYPE html>
<html>
<!--<html manifest="cache.appcache">-->
  <head>
    <meta charset="utf-8">

    <title>CPPC - Pradoj.com</title>
    <meta name="description" content="Esta é uma calculadora simples para calcular porcentagens. This is a simple calculator to calculate percentage" />
    <meta name="author" content="Rogerio Prado de Jesus - http://rogeriopradoj.com" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="apple-touch-icon" href="icon_64x64.png" />
    <link rel="stylesheet" href="jquery.mobile/jquery.mobile.min.css" />
    <style>
    div[data-role="header"] h1 {
        /*background-image: url(logo_200x100.png);
        background-repeat: no-repeat;
        background-position: center;
        height: 100px;
        min-width: 200px;*/
        /*text-indent: -9000px;*/
       .center-button{
        margin: 0 auto;
        }
       .center-wrapper{
        text-align: center;
        }
        .center-wrapper * {
        margin: 0 auto;
        }
    }
    </style>
    <script src="js/libs/jquery-1.5.1.min.js"></script>
    <script src="jquery.mobile/jquery.mobile.min.js"></script>
    <script src="js/libs/jquery.global.js"></script>
    <script src="js/libs/jquery.glob.pt-BR.js"></script>
    <script src="js/script.js"></script>
  </head>
  <body>  
	<div data-role="page" data-theme="e" id="options">
		<?php require 'views/header_view.php'; ?>
	    <ul data-role="listview" data-theme="c">
			<li><a href="#input">% de um número</a></li>
			<li><a href="#input2">% entre dois números</a></li>
		</ul>
	    <?php require 'views/footer_view.php'; ?>
	</div>
     <div data-role="page" data-theme="e" id="input">
        <?php require 'views/header_view.php'; ?>
        <form data-role="content">
            <fieldset>
                <label for="value">Valor:</label><br />
                    <input id="value" type="number" autofocus="autofocus" /><br />
                <div data-role="fieldcontain">
                    <label for="percent">Percentual</label><br />
                        <input type="range" name="percent" id="percent" value="0" min="0" max="100" /><br />
                </div>
                <p>
                    <a href="#output" id="calcular" data-role="button">Calcular</a><br />
                </p>
            </fieldset>
        </form>
        <?php require 'views/footer_view.php'; ?>
    </div>
    
    <div data-role="page" data-theme="e" id="output">
        <?php require 'views/header_view.php'; ?>
        <div data-role="content">
            <div id="result"></div>
            <a href="#input" data-rel="back" data-role="button" data-theme="e">Voltar</a>
        </div>
        <?php require 'views/footer_view.php'; ?>
    </div>

	<div data-role="page" data-theme="e" id="input2">
        <?php require 'views/header_view.php'; ?>
        <form data-role="content">
            <fieldset>
                <label for="value1">1º Valor:</label>
                    <input id="value1" type="number" autofocus="autofocus" /><br />
                <label for="value2">2º Valor:</label>
                    <input id="value2" type="number" /><br />
                <p>
                    <a href="#output2" id="calcular2" data-role="button">Calcular</a><br />
                </p>
            </fieldset>
        </form>
        <?php require 'views/footer_view.php'; ?>
    </div>    

    <div data-role="page" data-theme="e" id="output2">
        <?php require 'views/header_view.php'; ?>
        <div data-role="content">
            <div id="result2"></div>
            <a href="#input2" data-rel="back" data-role="button" data-theme="e">Voltar</a>
        </div>
        <?php require 'views/footer_view.php'; ?>
    </div>

    <?php
    $googleAnalyticsImageUrl = googleAnalyticsGetImageUrl();
    echo '<img alt ="" src="' . $googleAnalyticsImageUrl . '" />';?>
  </body>
</html>
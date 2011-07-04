<?php
  // Copyright 2009 Google Inc. All Rights Reserved.
  $GA_ACCOUNT = "MO-23860787-5";
  //$GA_PIXEL = "/ga.php";
  $GA_PIXEL = "ga.php";

  function googleAnalyticsGetImageUrl() {
    if ( !isset($_SERVER["HTTP_REFERER"]) ) {
        $_SERVER["HTTP_REFERER"] = '';
    }
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
<!--<html>-->
<html manifest="cache.appcache">
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
        background-image: url(logo_200x100.png);
        background-repeat: no-repeat;
        background-position: center;
        height: 100px;
        min-width: 200px;
        text-indent: -9000px;
    }
    </style>
    <script src="js/libs/jquery-1.5.1.min.js"></script>
    <script src="jquery.mobile/jquery.mobile.min.js"></script>
    <script src="js/libs/jquery.global.js"></script>
    <script src="js/libs/jquery.glob.pt-BR.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("form").bind("submit", function(event) {
                event.preventDefault();
            });
          //  $('#value').click(function() {
//            });
            $.global.preferCulture("pt-BR");
            //console.log('teste');
            $("#calcular").click(function(event){
                var value     = $.global.parseFloat($("#value").val());
                var percent   = $.global.parseFloat($("#percent").val());
                var resultado = value * percent / 100;
                console.log(resultado);
                $("#result").html(
                    percent + '% de ' + value + ' é: ' + resultado
                );
            });
        });
    </script>
  </head>
  <body>
     <div data-role="page" data-theme="e" id="input">
        <div data-role="header">
          <h1>CPPC</h1>
          <h2> | Calculadora | % | Calc | </h2>
          <h3><a href="http://pradoj.com">pradoj.com</a></h3>
        </div>
        <form data-role="content">
            <fieldset>
                <label for="value">Valor:</label><br />
                    <input id="value" type="number" autofocus="autofocus" placeholder="Ex.: 1,50"><br />
                <div data-role="fieldcontain">
                    <label for="percent">Percentual</label><br />
                        <input type="range" name="percent" id="percent" value="0" min="0" max="100" placeholder="Ex.: 1%"><br />
                </div>
                <p>
                    <a href="#output" id="calcular" data-role="button">Calcular</a><br />
                </p>
            </fieldset>
        </form>
        <div data-role="footer">
            <p>(c) <?php echo date('Y');?> - <a href="http://pradoj.com">pradoj.com</a> - <a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/contato/">Contato</a></p>
        </div>
    </div>

    <div data-role="page" data-theme="e" id="output">
        <div data-role="header">
          <h1>CPPC</h1>
          <h2> | Calculadora | % | Calc | </h2>
          <h3><a href="http://pradoj.com">pradoj.com</a></h3>
        </div>
        <div data-role="content">
            <div id="result"></div>
            <a href="#input" data-rel="back" data-role="button" data-theme="e">Voltar</a>
        </div>
        <div data-role="footer">
            <p>(c) <?php echo date('Y');?> - <a href="http://pradoj.com">pradoj.com</a> - <a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/contato/">Contato</a></p>
        </div>
    </div>

    <?php
    $googleAnalyticsImageUrl = googleAnalyticsGetImageUrl();
    echo '<img alt ="" src="' . $googleAnalyticsImageUrl . '" />';?>
  </body>
</html>

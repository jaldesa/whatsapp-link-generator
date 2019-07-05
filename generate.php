<?php
$number  = isset($_REQUEST['number']) ? $_REQUEST['number'] : null;
$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : null;

if (! $number) {
    header("location:http://localhost/whatsapp_link_generator");
    die();
}

if (strpos($number, '+') > -1) {
    $number = substr($number, 1);
}

$link = "https://api.whatsapp.com/send?phone=$number";
$for_api = $link;

if (trim($message) != '') {
    $link .= "&text=$message";
    $for_api .= "&text=" . rawurlencode($message);
}
//die($for_api);
$short_api  = "https://tinyurl.com/api-create.php?url=$for_api";
//$open_link  = fopen($short_api, "r");
//$short_link = fread($open_link, 512);
$short_link = file_get_contents($short_api);
//$short_link = $link;
//die(urlencode(' '));
?>

<!doctype html>

<html class="no-js" lang="en">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-10074624-26"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-10074624-26');
</script>

  <meta charset="utf-8">
  <title>WhatsApp Link Generator</title>
  <meta name="keywords" content="WhatsApp, link generator, WhatsApp link generator, kheme, backandfront">
  <meta name="description" content="A simple tool to generate a WhatsApp Link for any mobile phone number">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="SHORTCUT ICON" href="favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="57x57" href="img/icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="img/icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="img/icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="img/icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="img/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="img/icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="img/icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" href="img/icons/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="img/icons/android-icon-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="img/icons/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="img/icons/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="img/icons/manifest.json">
  <!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <meta property="og:url" content="http://whatsapplinkgenerator.website/">
  <meta property="og:title" content="WhatsApp Link Generator">
  <meta property="og:description" content="A simple tool to generate a WhatsApp Link for any mobile phone number">
  <meta property="og:site_name" content="WhatsApp Link Generator">
  <meta name="author" content="kheme@back&Front">
  <link rel="canonical" href="http://whatsapplinkgenerator.website/">
  <link rel="stylesheet" href="css/css.css" class="js-initial-stylesheet">
  <style class="js-webfont"
    data-woff-cache="//d1se4t4tzjp7kt.cloudfront.net/073fe60aab/seven/fonts/open_sans.woff.json"
    data-ttf-cache="//d1se4t4tzjp7kt.cloudfront.net/073fe60aab/seven/fonts/open_sans.ttf.json"
    data-fallback-stylesheet="https://fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin,latin-ext"
    data-name="open_sans">
  </style>
  <head>
    <body class="no-touch">
      <div class="template-content">
        <div class="container  container--main">
          <header class="template-header">
            <div class="container">
              <div class="company">
                <div class="template-logo"></div>
                <div class="template-companyname"></div>
              </div>
              <div class="template-navigation"></div>
            </div>
          </header>
          <section class="page page--home">
              <section class="bk-zone column">
                  <h1>Your WhatsApp Link is Ready!</h1>
                  <div class="company">&nbsp;</div>
                  <p>
                    <label><b>Normal Link</b></label>
                    <input id="normal_link" autocomplete="off" class="input input--email input--single-line contactform__input js-email-input" id="number"
                        name="number" placeholder="Eg. 2349091231234" type="tel" value="<?php echo $link; ?>">
                    <a class="button button--submit contactform__button js-button" href="javascript:document.getElementById('normal_link').select();document.execCommand('copy');document.getElementById('normal_link').blur();alert('Normal Link Copied!');">Copy Normal Link</a>
                  </p>
                  &nbsp;
                  <p>
                    <label><b>Short Link</b></label>
                    <input id="short_link" autocomplete="off" class="input input--email input--single-line contactform__input js-email-input" id="number"
                        name="number" placeholder="Eg. 2349091231234" type="tel" value="<?php echo $short_link; ?>">
                    <a class="button button--submit contactform__button js-button" href="javascript:document.getElementById('short_link').select();document.execCommand('copy');document.getElementById('short_link').blur();alert('Short Link Copied!');">Copy Short Link</a>
                  </p>
                  &nbsp;
                  <p>
                    <label><b>As HTML</b></label>
                    <input id="as_html" autocomplete="off" class="input input--email input--single-line contactform__input js-email-input" id="number"
                        name="number" placeholder="Eg. 2349091231234" type="tel" value="<a href='<?php echo $short_link; ?>' target='_blank'>Message Me on WhatsApp</a>">
                    <a class="button button--submit contactform__button js-button" href="javascript:document.getElementById('as_html').select();document.execCommand('copy');document.getElementById('as_html').blur();alert('HTML Code Copied!');">Copy HTML Code</a>
                  </p>
              </section>
              <div class="company">&nbsp;</div>
            </div>
          </section>
        </div>
      </div>
      <div class="company">&nbsp;</div>
      <footer class="template-footer">
        <div class="container">
          <div class="widget widget--template-widget">
            <div class="bk-companyname companyname widget__companyname" itemscope itemtype="https://schema.org/Organization">
              <a href="https://backandfront.com.ng/" class="company-link companyname__company-link" itemprop="url">
                <span class="company-text companyname__company-text" itemprop="name">WhatsApp Link Generator</span>
              </a>
            </div>
          </div>
          <div class="widget widget--template-widget">
            <div class="bk-profile profile widget__profile">
              <div class="companycopyright profile__companycopyright">
                <a class="copyright companycopyright__copyright" href="https://backandfront.com.ng/?utm_source=WhatsApplinkgenerator&utm_campaign=footer+link&utm_medium=internet" target="_blank"><img alt="Back&Front Logo" title="Powered by Back&Front" src="img/icons/favicon-32x32.png"></a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </body>
</html>
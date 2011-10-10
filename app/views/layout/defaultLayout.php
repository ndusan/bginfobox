<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>BGInfoBox</title>
        <link rel="shortcut icon" href="<?= IMAGE_PATH . 'favicon.ico'; ?>" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <!-- Load all assets (js + css) -->
        <?=$html->assetsJs('jquery-1.6.4.min', ASSETS_JS_PATH);?>
        <?=$html->assetsJs('slides.min.jquery', ASSETS_JS_PATH);?>
        <?=$html->assetsJs('app', ASSETS_JS_PATH);?>
        <?=$html->assetsCss('default', ASSETS_CSS_PATH);?>
        
        <!-- Load all custom js -->
        <?=$html->js('app', JS_PATH);?>
        <?=$html->allCustomJs(JS_PATH.'default'.DS);?>
        
        <!-- Load all custom css -->
        <?=$html->css('default', CSS_PATH);?>
    </head>
    <body data-controller="<?= $this->_controller; ?>" data-method="<?= $this->_action; ?>">
        <body>
            <div class="topNavW">
                <div class="topNav">
                    <ul class="soc">
                        <li>
                            <? // FB like button  ?>
                            <?= $html->fb('http://google.com'); ?>
                        </li>
                        <li><a href="#" class="facebook">Facebook</a></li>
                        <li><a href="#" class="twitter">Twitter</a></li>
                        <li><a href="#" class="youtube">Youtube</a></li>
                    </ul>
                    <ul class="lang">
                        <li><a <?=($params['lang'] == DEFAULT_LANG ? 'class="active"':'');?> href="<?=DS.DEFAULT_LANG.(isset($params['page'])?DS.$params['page']:'');?>">SR</a></li>
                        <li>/</li>
                        <li>
                            <? $allLang = explode('|',LANG);?>
                            <a <?=($params['lang'] == $allLang[1] ? 'class="active"':'');?> href="<?=DS.$allLang[1].(isset($params['page'])?DS.$params['page']:'');?>">EN</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="headerW">
                <div class="header">

                    <ul class="mainNav">
                        <li><a href="<?=DS.$params['lang'].DS.'about-us';?>" <?=(isset($params['page']) && 'about-us' == $params['page'] ? 'class="active"':'');?>>O nama</a></li>
                        <li><a href="<?=DS.$params['lang'].DS.'our-clients';?>" <?=(isset($params['page']) && 'our-clients' == $params['page'] ? 'class="active"':'');?>>Naši klijenti</a></li>
                        <li><a href="<?=DS.$params['lang'].DS.'archive';?>" <?=(isset($params['page']) && 'archive' == $params['page'] ? 'class="active"':'');?>>Arhiva izdana</a></li>
                        <li><a href="<?=DS.$params['lang'].DS.'gallery';?>" <?=(isset($params['page']) && 'gallery' == $params['page'] ? 'class="active"':'');?>>Foto galerija</a></li>
                        <li><a href="<?=DS.$params['lang'].DS.'ads';?>" <?=(isset($params['page']) && 'ads' == $params['page'] ? 'class="active"':'');?>>Oglašavanje</a></li>
                        <li><a href="<?=DS.$params['lang'].DS.'contact';?>" <?=(isset($params['page']) && 'contact' == $params['page'] ? 'class="active"':'');?>>Kontakt</a></li>
                        <li><a href="#">VODIČ KROZ BEOGRAD</a></li>
                    </ul>
                    <a href="<?=$params['lang'];?>" class="logo">
                        <img src="<?= IMAGE_PATH . 'logo.png'; ?>" />
                    </a>
                    <div class="banner">
                        <div id="slides">
                            <div class="slides_container">
                                <div class="slide">
                                    <img src="<?= IMAGE_PATH . 'slide1.jpg'; ?>" />
                                    <div class="desc">
                                        <p>Neizbežno pitаnje nа početku rаzgovorа sа predsednikom Ujedinjenih regionа.</p>
                                    </div>
                                </div>
                                <div class="slide">
                                    <img src="<?= IMAGE_PATH . 'slide1.jpg'; ?>" />
                                    <div class="desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="slide">
                                    <img src="<?= IMAGE_PATH . 'slide1.jpg'; ?>" />
                                    <div class="desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="containerW">
                <div class="container">
                    <!-- SIDEBAR -->
                    <div class="sidebarL">
                        <div class="sidebarBox">
                            <div class="boxTitle">
                                <h2>Vesti</h2>
                            </div>
                            <div class="boxContent">
                                <ul class="news">
                                    <li>
                                        <span>04.08.2011. - Naslov vesti u dva reda</span>
                                        <p>
                                            <? // Code is in lib/Html.php ?>
                                            <?= $html->formatNews($news); ?>
                                        </p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="sidebarBox">
                            <div class="boxTitle">
                                <h2>Kalendar dešavanja</h2>
                            </div>
                            <div class="boxContent loader" id="calendar">
                                <!-- Load -->
                                <?=$calendar;?>
                            </div>
                        </div>
                        <div class="sidebarBox">
                            <div class="boxTitle">
                                <h2>Vreme u Beogradu</h2>
                            </div>
                            <div class="boxContent">
                                Vreme TBD
                            </div>
                        </div>
                        <div class="sidebarBox">
                            <div class="boxTitle">
                                <h2>Kursna lista</h2>
                            </div>
                            <div class="boxContent">
                                Kursna TBD
                            </div>
                        </div>
                    </div>
                    <!-- MAIN -->

                    <!-- This is a content that will be included on page inside of this layout -->
                    <? if (file_exists(VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'))
                        include (VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'); ?>
                </div>
            </div>
            <div class="bottomW">
                <ul class="bottomLinks">
                    <li><b>Izdanja</b>
                        <ul>
                            <li><a href="#">Izdanja</a></li>
                            <li><a href="#">Vodič kroz Beograd</a></li>
                            <li><a href="#">BG Info Box</a></li>
                            <li><a href="#">Oni su nam ukazali poverenje</a></li>
                            <li><a href="#">TBD</a></li>
                        </ul>
                    </li>
                    <li><b>Vodič kroz Beograd</b>
                        <ul>
                            <li><a href="#">Izdanja</a></li>
                            <li><a href="#">Vodič kroz Beograd</a></li>
                            <li><a href="#">BG Info Box</a></li>
                            <li><a href="#">Oni su nam ukazali poverenje</a></li>
                            <li><a href="#">TBD</a></li>
                        </ul>
                    </li>
                    <li><b>BG Info Box</b>
                        <ul>
                            <li><a href="#">Izdanja</a></li>
                            <li><a href="#">Vodič kroz Beograd</a></li>
                            <li><a href="#">BG Info Box</a></li>
                            <li><a href="#">Oni su nam ukazali poverenje</a></li>
                            <li><a href="#">TBD</a></li>
                        </ul>
                    </li>
                    <li><b>Oni su nam ukazali poverenje</b>
                        <ul>
                            <li><a href="#">Izdanja</a></li>
                            <li><a href="#">Vodič kroz Beograd</a></li>
                            <li><a href="#">BG Info Box</a></li>
                            <li><a href="#">Oni su nam ukazali poverenje</a></li>
                            <li><a href="#">TBD</a></li>
                        </ul>
                    </li>
                    <li><b>TBD</b>
                        <ul>
                            <li><a href="#">Izdanja</a></li>
                            <li><a href="#">Vodič kroz Beograd</a></li>
                            <li><a href="#">BG Info Box</a></li>
                            <li><a href="#">Oni su nam ukazali poverenje</a></li>
                            <li><a href="#">TBD</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="footerW">
                ©2011 BG Info box. All rights reserved
            </div>
            <script type="text/javascript">
                var lang = '<?=$params['lang'];?>';
            </script>
        </body>

    </body>
</html>
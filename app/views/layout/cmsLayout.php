<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title></title>
        <link rel="shortcut icon" href="<?php echo IMAGE_PATH . 'favicon.ico'; ?>" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <!-- Load all assets (js + css) -->
        <?= $html->assetsJs('jquery-1.6.4.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('app', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('jquery.dataTables.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('jquery-ui-1.8.16.custom.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('jquery.thead-1.1.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsCss('default', ASSETS_CSS_PATH); ?>
        <?= $html->assetsCss('demo_table', ASSETS_CSS_PATH); ?>
        <?//= $html->assetsCss('jquery-ui-1.8.16.custom', ASSETS_CSS_PATH); ?>


        <!-- Load all custom js -->
        <?= $html->js('app', JS_PATH); ?>
        <?= $html->js('tiny_mce', MCE_PATH); ?>
        <?= $html->allCustomJs(JS_PATH . 'cms' . DS); ?>

        <!-- Load all custom css -->
        <?= $html->css('cms', CSS_PATH); ?>
    </head>
    <body data-controller="<?= $this->_controller; ?>" data-method="<?= $this->_action; ?>">
        <div class="header">
            <ul class="headerNav">
                <li class="first">Hello, <?=$_SESSION['cms']['email'];?></li>
                <li <?= $this->_action=='settings'?'class="active"':''; ?>><a  href="<?= DS . 'cms'.DS.'settings'; ?>">Settings</a></li>
                <li><a href="<?= DS . 'logout'; ?>" class="jl">Logout</a></li>
            </ul>
            <h1><span>Admin panel</span>BG Info Box</h1>
        </div>
        <div class="wrapper">
            <div class="sidebar">
                <ul class="mainNav">
                    <li><a <?= $this->_controller=='cmsHome'?'class="active"':''; ?> href="<?= DS . 'cms'; ?>">Dashboard</a></li>
                    <li><a <?= $this->_controller=='cmsUser'?'class="active"':''; ?> href="<?= DS . 'cms' . DS . 'users'; ?>">Users</a></li>
                    <li><a <?= $this->_controller=='cmsAboutUs'?'class="active"':''; ?> href="<?= DS . 'cms' . DS . 'about-us'; ?>">About Us</a></li>
                    <li><a <?= $this->_controller=='cmsNews'?'class="active"':''; ?> href="<?= DS . 'cms' . DS . 'news'; ?>">News</a></li>
                    <li><a <?= $this->_controller=='cmsEvents'?'class="active"':''; ?> href="<?= DS . 'cms' . DS . 'events'; ?>">Events</a></li>
                    <li><a <?= $this->_controller=='cmsBanners'?'class="active"':''; ?> href="<?= DS . 'cms' . DS . 'banners'; ?>">Banners</a></li>
                    <li><a <?= $this->_controller=='cmsGallery'?'class="active"':''; ?> href="<?= DS . 'cms' . DS . 'gallery'; ?>">Gallery</a></li>
                    <li><a <?= $this->_controller=='cmsCarousel'?'class="active"':''; ?> href="<?= DS . 'cms' . DS . 'carousel'; ?>">Carousel</a></li>
                    <li><a <?= $this->_controller=='cmsBginfo'?'class="active"':''; ?> href="<?= DS . 'cms' . DS . 'bginfo'; ?>">BgInfo pages</a></li>
                    <li><a <?= $this->_controller=='cmsPockets'?'class="active"':''; ?> href="<?= DS . 'cms' . DS . 'pockets'; ?>">Pockets pages</a></li>
                    <li><a <?= $this->_controller=='cmsInfo'?'class="active"':''; ?> href="<?= DS . 'cms' . DS . 'info'; ?>">Bg Info</a></li>
                    <li><a <?= $this->_controller=='cmsClients'?'class="active"':''; ?> href="<?= DS . 'cms' . DS . 'clients'; ?>">Clients</a></li>
                </ul>
            </div>
            <div class="content">
                <!-- This is a content that will be included on page inside of this layout -->
                <?php if (file_exists(VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'))
                    include (VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'); ?>
            </div>


            <? if (isset($_GET['q'])): ?>
                <?
                switch ($_GET['q']) {
                    case 'error': $status = 'error';
                        $jmsg = 'There has been error in your request. Please, try again.';
                        break;
                    case 'success': $status = 'success';
                        $jmsg = 'Your request has been processed successfully.';
                        break;
                    case 'welcome': $status = 'success';
                        $jmsg = 'Welcome to admin CMS.';
                        break;
                    default: $status = '';
                        $jmsg = ''; //error
                }
                ?>
                <div id="j<?= $status; ?>" class="jnotif">
                    <?= $jmsg; ?>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('.jnotif').delay(3000).fadeOut(1000);
                });
                                    
            </script>
        <? endif; ?>
    </body>
</html>
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
        <?= $html->assetsJs('jquery-1.6.4.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('slides.min.jquery', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('jquery.lightbox-0.5.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('app', ASSETS_JS_PATH); ?>
        <?= $html->assetsCss('default', ASSETS_CSS_PATH); ?>
        <?= $html->assetsCss('jquery.lightbox-0.5', ASSETS_CSS_PATH); ?>

        <!-- Load all custom js -->
        <?= $html->js('app', JS_PATH); ?>
        <?= $html->allCustomJs(JS_PATH . 'default' . DS); ?>

        <!-- Load all custom css -->
        <?= $html->css('default', CSS_PATH); ?>
    </head>
    <body data-controller="<?= $this->_controller; ?>" data-method="<?= $this->_action; ?>">
        <body>
            <div class="topNavW">
                <div class="topNav">
                    <ul class="soc">
                        <li><a href="#" class="facebook">Facebook</a></li>
                        <li><a href="#" class="twitter">Twitter</a></li>
                        <li><a href="#" class="youtube">Youtube</a></li>
                    </ul>
                    <ul class="lang">
                        <? foreach ($activeLangs as $key => $val): ?>
                            <li><a <?= ($val['value'] == $params['lang'] ? 'class="active"' : ''); ?> href="<?= DS . $val['value'] . (isset($params['page']) ? DS . $params['page'] : '') . (isset($params['subpage']) ? DS . $params['subpage'] : ''); ?>"><?= strtoupper($val['value']); ?></a></li>
                        <? endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="headerW">
                <div class="header">

                    <ul class="mainNav">
                        <li>
                            <a href="<?= DS . $params['lang'] . DS . 'about-us'; ?>" <?= (isset($params['page']) && 'about-us' == $params['page'] ? 'class="active"' : ''); ?>>
                                <?= $_t['menu.about-us'][$params['lang']]; ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?= DS . $params['lang'] . DS . 'our-clients'; ?>" <?= (isset($params['page']) && 'our-clients' == $params['page'] ? 'class="active"' : ''); ?>>
                                <?= $_t['menu.our-clients'][$params['lang']]; ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?= DS . $params['lang'] . DS . 'archive'; ?>" <?= (isset($params['page']) && 'archive' == $params['page'] ? 'class="active"' : ''); ?>>
                                <?= $_t['menu.archive'][$params['lang']]; ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?= DS . $params['lang'] . DS . 'gallery'; ?>" <?= (isset($params['page']) && 'gallery' == $params['page'] ? 'class="active"' : ''); ?>>
                                <?= $_t['menu.gallery'][$params['lang']]; ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?= DS . $params['lang'] . DS . 'ads'; ?>" <?= (isset($params['page']) && 'ads' == $params['page'] ? 'class="active"' : ''); ?>>
                                <?= $_t['menu.ads'][$params['lang']]; ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?= DS . $params['lang'] . DS . 'contact'; ?>" <?= (isset($params['page']) && 'contact' == $params['page'] ? 'class="active"' : ''); ?>>
                                <?= $_t['menu.contact'][$params['lang']]; ?>
                            </a>
                        </li>
                        <li class="last <? if(!empty($slug)):?>active<? endif;?>" >
                            <a href="#" id="bgdguide">
                                <?= $_t['menu.guide'][$params['lang']]; ?>
                            </a>
                        </li>
                    </ul>
                    <a href="<?= DS . $params['lang']; ?>" class="logo">
                        <img src="<?= IMAGE_PATH . 'logo.png'; ?>" />
                    </a>
                    <div class="banner">
                        <? if (!empty($carouselCollection)): ?>
                            <div id="slides">
                                <div class="slides_container">
                                    <? foreach ($carouselCollection as $cc): ?>
                                        <div class="slide">
                                            <img src="<?= DS . 'public' . DS . 'uploads' . DS . 'carousel' . DS . $cc['image_name']; ?>" />
                                            <div class="desc">
                                                <p><?= $cc['content_' . $params['lang']]; ?></p>
                                            </div>
                                        </div>
                                    <? endforeach; ?>
                                </div>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
            </div>
            <div class="containerW">
                <div class="container">
                    <!-- SIDEBAR -->
                    <div class="sidebarL">
                        <!-- guide nav -->

                        <ul class="guideNav" <?=('info' == $this->_action || 'guide' == $this->_action ? 'style="display: block;"' : '');?>>
                            
                            <? if(!empty($slug['previous'])):?>
                            <li><a href="<?=(DS.$params['lang'].DS.$slug['path'].DS.$slug['previous']);?>">&laquo; <?= $_t['menu.back'][$params['lang']]; ?></a></li>
                            <? elseif(!empty($slug['current'])): ?>
                            <li><a href="<?=(DS.$params['lang']);?>">&laquo; <?= $_t['menu.back'][$params['lang']]; ?></a></li>
                            <? endif; ?>
                            
                            <!--Guide-->
                            <? if(!empty($bgInfoTree) && empty($otherInfoTree)):?>
                            <? foreach($bgInfoTree as $tg):?>
                            <li <?=(!empty($intro) && $intro['slug'] == $tg['slug'] ? 'class="active"':'')?> ><a href="<?=(DS.$params['lang'].DS.'guide'.DS.$slug['current'].DS.$tg['slug']);?>"><?=($tg['title_'.$params['lang']]);?></a></li>
                            <? endforeach;?>
                            <? elseif(!empty($bgInfoRootTree) && empty($otherInfoTree)):?>
                            <? foreach($bgInfoRootTree as $tg):?>
                            <li <?=(!empty($intro) && $intro['slug'] == $tg['slug'] ? 'class="active"':'')?>><a href="<?=(DS.$params['lang'].DS.'guide'.DS.$tg['slug']);?>"><?=($tg['title_'.$params['lang']]);?></a></li>
                            <? endforeach;?>
                            <? endif;?>
                            
                            <!--Info -->
                            <? if(!empty($otherInfoTree) && empty($bgInfoTree)):?>
                            <? foreach($otherInfoTree as $tg):?>
                            <li <?=(!empty($intro) && $intro['slug'] == $tg['slug'] ? 'class="active"':'')?>><a href="<?=(DS.$params['lang'].DS.'info'.DS.$slug['current'].DS.$tg['slug']);?>"><?=($tg['title_'.$params['lang']]);?></a></li>
                            <? endforeach;?>
                            <? elseif(!empty($otherInfoRootTree) && empty($bgInfoTree)):?>
                            <? foreach($otherInfoRootTree as $tg):?>
                            <li <?=(!empty($intro) && $intro['slug'] == $tg['slug'] ? 'class="active"':'')?>><a href="<?=(DS.$params['lang'].DS.'info'.DS.$tg['slug']);?>"><?=($tg['title_'.$params['lang']]);?></a></li>
                            <? endforeach;?>
                            <? endif;?>
                        </ul>

                        <div class="sidebarBox">
                            <div class="boxTitle">
                                <h2><?= $_t['news.title'][$params['lang']]; ?></h2>
                            </div>
                            <div class="boxContent">
                                <ul class="news">
                                    <? if (empty($freshNews)): ?>
                                        <li><?= $_t['news.no_news'][$params['lang']]; ?></li>
                                    <? else: ?>
                                        <? foreach ($freshNews as $n): ?>
                                            <li>
                                                <span><?= @$html->convertDate($n['created']) . ' - ' . $n['title_' . $params['lang']]; ?></span>
                                                <div><?= $n['heading_' . $params['lang']]; ?></div>
                                                <a href="<?= DS . $params['lang'] . DS . 'news' . DS . $n['id'] . DS . urlencode(str_replace(array('š','đ','č','ć','ž','Š','Đ','Č','Ć','Ž','?','!',',','.','&',':','(',')','[',']','%','#','\'','"','=','*'),array('s','d','c','c','z','s','d','c','c','z','','','','','','','','','','','','','','','',''), $n['title_' . $params['lang']])); ?>">
                                                    <?= $_t['news.read_more'][$params['lang']]; ?>...
                                                </a>
                                            </li>
                                        <? endforeach; ?>
                                    <? endif; ?>
                                </ul>
                            </div>
                            <div class="boxFooter">
                                <a href="<?= DS . $params['lang'] . DS . 'news'; ?>"><?= $_t['news.all_news'][$params['lang']]; ?> &raquo;</a>
                            </div>
                        </div>
                        <div class="sidebarBox">
                            <div class="boxTitle">
                                <h2><?= $_t['cal.title'][$params['lang']]; ?></h2>
                            </div>
                            <div class="boxContent" id="calendar">
                                <!-- Load -->
                            </div>
                        </div>
                        <div class="sidebarBox">
                            <div class="boxTitle">
                                <h2><?= $_t['weather.title'][$params['lang']]; ?></h2>
                            </div>
                            <div class="boxContent">
                                <?=$html->getWeather('SRXX0005', 1, array('day'=>$_t['weather.day'][$params['lang']], 'evening' => $_t['weather.evening'][$params['lang']]));?>
                            </div>
                        </div>
                        <div class="sidebarBox">
                            <div class="boxTitle">
                                <h2><?= $_t['exchange.title'][$params['lang']]; ?></h2>
                            </div>
                            <div class="boxContent">
                                <div class="currency">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <? 
                                          $allCurr = $html->getNBS();
                                          foreach($allCurr as $key=>$val):?>
                                          <tr>
                                          <td align="center">
                                          <img src="<?= IMAGE_PATH;?><?=$key.'.png'; ?>" />
                                          </td>
                                          <td  align="center">
                                          <?=$key;?>
                                          </td>
                                          <td  align="center">
                                          <?=$val['value'];?>
                                          </td>
                                          </tr>
                                          <? endforeach;  ?>
                                    </table>
                                </div>
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
                        <? if(!empty($footer['editions'])):?>
                        <? $url = array(1=>'bginfo-box',2=>'bginfo-map',3=>'bginfo-nigth-map',4=>'pockets');?>
                        <ul>
                            <? foreach($footer['editions'] as $f):?>
                            <li><a href="<?=(DS.$params['lang'].DS.$url[$f['id'] > 3 ? 4 : $f['id']]);?>"><?=$f['title'];?></a></li>
                            <? endforeach;?>
                        </ul>
                        <? endif;?>
                    </li>
                    <li><b>Vodič kroz Beograd</b>
                        <? if(!empty($footer['clients'])):?>
                        <ul>
                            <? foreach($footer['clients'] as $f):?>
                            <li><a href="<?=(DS.$params['lang'].DS.'guide'.DS.$f['slug']);?>"><?=$f['title_'.$params['lang']];?></a></li>
                            <? endforeach;?>
                        </ul>
                        <? endif;?>
                    </li>
                    <li><b>Belgrade Info</b>
                        <? if(!empty($footer['info'])):?>
                        <ul>
                            <? foreach($footer['info'] as $f):?>
                            <li><a href="<?=(DS.$params['lang'].DS.'info'.DS.$f['slug']);?>"><?=$f['title_'.$params['lang']];?></a></li>
                            <? endforeach;?>
                        </ul>
                        <? endif;?>
                    </li>
                    <li><b>TBD</b>
                        <ul>
                            <li><a href="<?= DS . $params['lang'] . DS . 'about-us'; ?>"><?= $_t['menu.about-us'][$params['lang']]; ?></a></li>
                            <li><a href="<?= DS . $params['lang'] . DS . 'our-clients'; ?>"><?= $_t['menu.our-clients'][$params['lang']]; ?></a></li>
                            <li><a href="<?= DS . $params['lang'] . DS . 'archive'; ?>"><?= $_t['menu.archive'][$params['lang']]; ?></a></li>
                            <li><a href="<?= DS . $params['lang'] . DS . 'gallery'; ?>"><?= $_t['menu.gallery'][$params['lang']]; ?></a></li>
                            <li><a href="<?= DS . $params['lang'] . DS . 'ads'; ?>"><?= $_t['menu.ads'][$params['lang']]; ?></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="footerW">
                ©2011 BG Info box. All rights reserved
            </div>
            <script type="text/javascript">
                var lang = '<?= $params['lang']; ?>';
            </script>
        </body>

    </body>
</html>
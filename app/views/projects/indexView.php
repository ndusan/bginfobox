<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?=$project['title_'.$params['lang']];?></h1>
        </div>
        <div class="boxContent">
            <ul class="boxExtra">
                <? if (!empty($pricelist['image_name'])): ?>
                    <li class="icoPdf">
                        <a href="<?= (DS . 'public' . DS . 'uploads' . DS . 'aboutus' . DS . $pricelist['image_name']); ?>" target="_blank">
                            <?= $_t['ads.label'][$params['lang']]; ?>
                        </a>
                    </li>
                <? endif; ?>
                <li class="icoMail">
                    <a href="<?= (DS . $params['lang'] . DS . 'ads'); ?>">
                        <?= $_t['ads-question.label'][$params['lang']]; ?> 
                        <span><?= $_t['ads-question.sublabel'][$params['lang']]; ?></span>
                    </a>
                </li>
                <!--
                <li class="icoDis">
                    <a href="<?= (DS . $params['lang'] . DS . 'bginfo-box' . DS . 'location'); ?>">
                        <?= $_t['location.label'][$params['lang']]; ?> 
                        <span><?= $_t['location.sublabel'][$params['lang']]; ?></span>
                    </a>
                </li>
                -->
            </ul>
            <p><?= $edition['desc_' . $params['lang']]; ?></p>
        </div>
        <div style="clear:both"></div>
        
        <ul class="galleryAll">
            <li class="first">
                <? if(!empty($edition['main_image'])):?>
                <span class="info">Naslovna strana izdanja <?= $project['title_' . $params['lang']]; ?></span>
                <span>
                    <img width="170" height="240" title="" alt="" src="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . 'thumb-'.$edition['main_image']; ?>" />
                    <a class="zoom lightbox" title="<?= $gc['title_' . $params['lang']]; ?>" href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['main_image']; ?>"></a>
                </span>
                <? if(!empty($edition['main_file'])):?>
                <span class="icoDld">
                    <a target="_blank" href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['main_file']; ?>"><?= $_t['download.label'][$params['lang']]; ?></a>
                </span>
                <? endif;?>
                <? endif;?>
            </li>
            <li>
                <ul>
                    <li>
                        <? if(!empty($edition['top_image'])):?>
                        <span class="info">Dogadjaji iz izdanja <?= $project['title_' . $params['lang']]; ?></span>
                        <span>
                            <img width="350" height="120" src="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . 'thumb-'.$edition['top_image']; ?>" />
                            <a class="zoom lightbox" title="<?= $gc['title_' . $params['lang']]; ?>" href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['top_image']; ?>"></a>
                        </span>
                        <? if(!empty($edition['top_file'])):?>
                        <span class="icoDld">
                            <a target="_blank" href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['top_file']; ?>"><?= $_t['download.label'][$params['lang']]; ?></a>
                        </span>
                        <? endif; ?>
                        <? endif; ?>
                    </li>
                    <li>
                        <? if(!empty($edition['bottom_image'])):?>
                        <span class="info">Mapa izdanja <?= $project['title_' . $params['lang']]; ?></span>
                        <span>
                            <img width="350" height="120" src="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . 'thumb-'.$edition['bottom_image']; ?>" />
                            <a class="zoom lightbox" title="<?= $gc['title_' . $params['lang']]; ?>" href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['bottom_image']; ?>"></a>
                        </span>
                        <? if(!empty($edition['bottom_file'])):?>
                        <span class="icoDld">
                            <a target="_blank" href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['bottom_file']; ?>"><?= $_t['download.label'][$params['lang']]; ?></a>
                        </span>
                        <? endif;?>
                        <? endif;?>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- Load belgrade guide-->
    <? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_guide.php'; ?>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_banners.php'; ?>
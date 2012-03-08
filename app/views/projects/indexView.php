<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?= $_t['bginfo-box.gallery.label'][$params['lang']]; ?></h1>
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
                <li class="icoDis">
                    <a href="<?= (DS . $params['lang'] . DS . 'bginfo-box' . DS . 'location'); ?>">
                        <?= $_t['location.label'][$params['lang']]; ?> 
                        <span><?= $_t['location.sublabel'][$params['lang']]; ?></span>
                    </a>
                </li>
            </ul>
            <p><?= $content['content_' . $params['lang']]; ?></p>
        </div>
        <div style="clear:both"></div>
        <ul class="galleryAll">
            <li class="first">
                <span class="info">Naslovna strana aktuelnog izdanja</span>
                <span>
                    <img width="170" height="240" title="" alt="" src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                    <a class="zoom lightbox" title="<?= $gc['title_' . $params['lang']]; ?>" href="<?= (DS . 'public' . DS . 'uploads' . DS . 'bginfo' . DS . $gc['image_name']); ?>"></a>
                </span>
                <span class="icoDld">
                    <a target="_blank" href="<?= DS . 'public' . DS . 'uploads' . DS . 'bginfo' . DS . $gc['image_name']; ?>">preuzmi</a>
                </span>
            </li>
            <li>
                <ul>
                    <li>
                        <span class="info">Naslovna strana aktuelnog izdanja</span>
                        <span>
                            <img width="350" height="110" src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                            <a class="zoom lightbox" title="<?= $gc['title_' . $params['lang']]; ?>" href="<?= (DS . 'public' . DS . 'uploads' . DS . 'bginfo' . DS . $gc['image_name']); ?>"></a>
                        </span>
                        <span class="icoDld">
                            <a target="_blank" href="<?= DS . 'public' . DS . 'uploads' . DS . 'bginfo' . DS . $gc['image_name']; ?>">preuzmi</a>
                        </span>
                    </li>
                    <li>
                        <span class="info">Naslovna strana aktuelnog izdanja</span>
                        <span>
                            <img width="350" height="110" src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                            <a class="zoom lightbox" title="<?= $gc['title_' . $params['lang']]; ?>" href="<?= (DS . 'public' . DS . 'uploads' . DS . 'bginfo' . DS . $gc['image_name']); ?>"></a>
                        </span>
                        <span class="icoDld">
                            <a target="_blank" href="<?= DS . 'public' . DS . 'uploads' . DS . 'bginfo' . DS . $gc['image_name']; ?>">preuzmi</a>
                        </span>
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
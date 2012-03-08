<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?= $_t['bginfo-box.gallery.label'][$params['lang']]; ?></h1>
        </div>
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

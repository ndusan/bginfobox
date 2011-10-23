<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?= $_t['pocket.gallery.label'][$params['lang']]; ?></h1>
        </div>
        <div class="boxContent">
            <ul class="boxExtra">
                <li class="icoPdf"><a href="#"><?= $_t['ads.label'][$params['lang']]; ?></a></li>
                <li class="icoMail">
                    <a href="<?= (DS . $params['lang'] . DS . 'ads'); ?>">
                        <?= $_t['ads-question.label'][$params['lang']]; ?>? 
                        <span><?= $_t['ads-question.sublabel'][$params['lang']]; ?></span>
                    </a>
                </li>
                <li class="icoDis">
                    <a href="<?= (DS . $params['lang'] . DS . 'bginfo-map' . DS . 'location'); ?>">
                        <?= $_t['location.label'][$params['lang']]; ?>? 
                        <span><?= $_t['location.sublabel'][$params['lang']]; ?></span>
                    </a>
                </li>
                <li class="icoDld">
                    <a href="<?= (DS . 'public' . DS . 'uploads' . DS . 'bginfo' . DS . ''); ?>">
                        <?= $_t['download.label'][$params['lang']]; ?>? 
                        <span><?= $_t['download.sublabel'][$params['lang']]; ?></span>
                    </a>
                </li>
            </ul>
            <?= $content['content_' . $params['lang']]; ?>
        </div>
        <div style="clear:both"></div>

        <!--Pocket info -->
        <? if (!empty($info)): ?>
            <? foreach ($info as $i): ?>

                <!-- Title-->
                <?= $i['title_' . $params['lang']]; ?>

                <!--Content-->
                <?= $i['content_' . $params['lang']]; ?>

            <? endforeach; ?>
        <? endif; ?>

        <div style="clear:both"></div>
        <? if (!empty($galleryCollection)): ?>
            <ul class="galleryAll">
                <? foreach ($galleryCollection as $gc): ?>
                    <li>
                        <span>
                            <img width="170" height="240" title="<?= $gc['title_' . $params['lang']]; ?>" alt="<?= $gc['title_' . $params['lang']]; ?>" width="170" height="240" src="<?= (DS . 'public' . DS . 'uploads' . DS . 'pockets' . DS . $gc['image_name']); ?>" />
                            <a class="zoom lightbox" title="<?= $gc['title_' . $params['lang']]; ?>" href="<?= (DS . 'public' . DS . 'uploads' . DS . 'pockets' . DS . $gc['image_name']); ?>"></a>
                        </span>
                        <span class="info"><?= $_t['page.' . $gc['position'] . '.label'][$params['lang']]; ?></span>
                    </li>
                <? endforeach; ?>
                <li>
                    <span>
                        <img title="" width="170" height="240" src=" <?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                        <a class="zoom lightbox" href="<//?=DS.'public'.DS.'uploads'.DS.'gallery'.DS.$g['image_name'];?>"></a>
                    </span>
                    <span class="icoDld"><a href="#">Preuzmi aktuelno izdanje Nis In Your Pocket vodica </a></span>
                    <span class="icoDis"><a href="#">Spisak distributivnih mesta</a></span>
                </li>
            </ul>
        <? endif; ?>
    </div>
    <!-- Load belgrade guide-->
    <? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_guide.php'; ?>
</div>
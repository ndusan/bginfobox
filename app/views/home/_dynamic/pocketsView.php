<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?= $_t['pocket.gallery.label'][$params['lang']]; ?></h1>
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
                        <?= $_t['ads-question.label'][$params['lang']]; ?>? 
                        <span><?= $_t['ads-question.sublabel'][$params['lang']]; ?></span>
                    </a>
                </li>
            </ul>
            <?= $content['content_' . $params['lang']]; ?>
        </div>
        <? if (!empty($galleryCollection)): ?>
            <ul class="galleryAll">
                <? foreach ($galleryCollection as $gc): ?>
                    <li>
                        <span>
                            <img width="170" height="240" title="<?= $gc['title_' . $params['lang']]; ?>" alt="<?= $gc['title_' . $params['lang']]; ?>" width="170" height="240" src="<?= (DS . 'public' . DS . 'uploads' . DS . 'pockets' . DS . 'thumb-' . $gc['image_name']); ?>" />
                            <a class="zoom lightbox" title="<?= $gc['title_' . $params['lang']]; ?>" href="<?= (DS . 'public' . DS . 'uploads' . DS . 'pockets' . DS . $gc['image_name']); ?>"></a>
                        </span>
                        <? if (!empty($gc['file_name'])): ?>
                            <span class="icoDld">
                                <a href="<?= (DS . 'public' . DS . 'uploads' . DS . 'pockets' . DS . $gc['file_name']); ?>" target="_blank">
                                    <?= $_t['download.label'][$params['lang']]; ?>
                                </a>
                            </span>
                        <? endif; ?>
                        <span class="icoDis">
                            <a href="<?= (DS . $params['lang'] . DS . 'pockets' . DS . 'location?id=' . $gc['page_id']) ?>">
                                <?= $_t['location.label'][$params['lang']]; ?>?
                            </a>
                        </span>
                        <span class="icoArc">
                            <a href="<?= (DS . $params['lang'] . DS . 'archive' . DS . 'pockets'); ?>">
                                <?= $_t['archive.label'][$params['lang']]; ?>? 
                            </a>
                        </span>
                    </li>
                <? endforeach; ?>
            </ul>
        <? endif; ?>
        <!--Pocket info -->
        <ul class="infoExtra">
            <? if (!empty($info)): ?>
                <? foreach ($info as $i): ?>
                    <li class="wys">
                        <!-- Title-->
                        <?= $i['title_' . $params['lang']]; ?>

                        <!--Content-->
                        <?= $i['content_' . $params['lang']]; ?>
                    </li>
                <? endforeach; ?>
            <? endif; ?>
        </ul>
    </div>
    <!-- Load belgrade guide-->
    <? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_guide.php'; ?>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_banners.php'; ?>
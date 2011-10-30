<div class="main">
    <div class="mainBox">
        <? if (!empty($lattestStaticEditions)): ?>
            <? $tmp = array('1' => 'bginfo-box', '2' => 'bginfo-map', '3' => 'bginfo-night-map'); ?>
            <ul class="galleryAll">
                <? foreach ($lattestStaticEditions as $lse): ?>
                    <li>
                        <a href="<?= (DS . $params['lang'] . DS . $tmp[$lse['page_id']] . DS . 'gallery'); ?>" >
                            <img title="<?= $_t['index.image.text'][$params['lang']] ?> <?= $lse['title']; ?>" alt="<?= $_t['index.image.text'][$params['lang']] ?> <?= $lse['title']; ?>" width="170" height="240" src="<?= (DS . 'public' . DS . 'uploads' . DS . 'bginfo' . DS . 'thumb-' . $lse['image_name']); ?>" />
                        </a>
                        <span class="info moreInfo">
                            <a href="<?= (DS . $params['lang'] . DS . $tmp[$lse['page_id']]); ?>"><?= $_t['index.question'][$params['lang']] ?> <?= $lse['title']; ?>?</a>
                        </span>
                    </li>
                <? endforeach; ?>
            </ul>
        <? endif; ?>
    </div>
    <div class="mainBox">
        <? if (!empty($lattestDynamicEditions)): ?>
            <ul class="galleryAll">
                <? foreach ($lattestDynamicEditions as $lde): ?>
                    <li>
                        <a href="<?= ($lde['has_link'] ? $lde['link'] : '#'); ?>" target="_blank">
                            <img title="<?= $lde['title']; ?> <?= $_t['index.image-iyp.text'][$params['lang']] ?>" alt="<?= $lde['title']; ?> <?= $_t['index.image-iyp.text'][$params['lang']] ?>" width="170" height="240" src="<?= (DS . 'public' . DS . 'uploads' . DS . 'pockets' . DS . 'thumb-' . $lde['image_name']); ?>" />
                        </a>
                    </li>
                <? endforeach; ?>
            </ul>
        <? endif; ?>
        <div class="boxContent wys">
            <p><?= $pocketContent['front_content_' . $params['lang']]; ?></p> 
            <span class="info moreInfo">
                <a href="<?= DS . $params['lang'] . DS . 'pockets'; ?>">
                <?= $_t['pockets.label'][$params['lang']]; ?>?
                </a>
            </span>

        </div>
    </div>

    <!-- Load belgrade guide-->
    <? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_guide.php'; ?>

    <div class="mainBox">
        <ul class="galleryAll">
            <li>
                <a href="<?= DS . $params['lang'] . DS . 'archive'; ?>">
                    <img title="" width="170" height="100" src=" <?= IMAGE_PATH . 'arhiva.jpg'; ?>" />
                </a>
                <span class="info moreInfo">
                    <a href="<?= DS . $params['lang'] . DS . 'archive'; ?>">
                        <b><?= $_t['menu.archive'][$params['lang']]; ?></b>
                    </a>
                </span>
            </li>
            <li>
                <a href="<?= DS . $params['lang'] . DS . 'our-clients'; ?>">
                    <img title="" width="170" height="100" src=" <?= IMAGE_PATH . 'klijenti.jpg'; ?>" /> 
                </a>
                <span class="info moreInfo">
                    <a href="<?= DS . $params['lang'] . DS . 'our-clients'; ?>">
                        <b><?= $_t['menu.our-clients'][$params['lang']]; ?></b>
                    </a>
                </span>
            </li>
            <li>
                <a href="<?= DS . $params['lang'] . DS . 'gallery'; ?>">
                    <img title="" width="170" height="100" src=" <?= IMAGE_PATH . 'galerija.jpg'; ?>" /> 
                </a>
                <span class="info moreInfo"> <a href="<?= DS . $params['lang'] . DS . 'gallery'; ?>">

                        <b><?= $_t['menu.gallery'][$params['lang']]; ?></b>
                    </a>
                </span>
            </li>
        </ul>
    </div>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_banners.php'; ?>
<div class="main">
    <div class="mainBox">
        <? if (!empty($lattestStaticEditions)): ?>
            <? $tmp = array('1' => 'bginfo-box', '2' => 'bginfo-map', '3' => 'bginfo-night-map'); ?>
            <ul class="galleryAll">
                <? foreach ($lattestStaticEditions as $lse): ?>
                    <li>
                        <a href="<?= (DS . $params['lang'] . DS . $tmp[$lse['page_id']] . DS . 'gallery'); ?>" >
                            <img title="<?= $lse['title']; ?>" alt="<?= $lse['title']; ?>" width="170" height="240" src="<?= (DS . 'public' . DS . 'uploads' . DS . 'bginfo' . DS . 'thumb-' . $lse['image_name']); ?>" />
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
                            <img title="<?= $lde['title']; ?>" alt="<?= $lde['title']; ?>" width="170" height="240" src="<?= (DS . 'public' . DS . 'uploads' . DS . 'pockets' . DS . 'thumb-' . $lde['image_name']); ?>" />
                        </a>
                    </li>
                <? endforeach; ?>
            </ul>
        <? endif; ?>
        <div class="boxContent wys">
            <h2><?= $_t['pockets.label'][$params['lang']]; ?>?</h2>
            <p><?= $pocketContent['front_content_' . $params['lang']]; ?> <a href="<?= DS . $params['lang'] . DS . 'pockets'; ?>">link</a></p>
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
                <span class="info moreInfo"><b><?= $_t['menu.archive'][$params['lang']]; ?></b></span>
            </li>
            <li>
                <a href="<?= DS . $params['lang'] . DS . 'our-clients'; ?>">
                    <img title="" width="170" height="100" src=" <?= IMAGE_PATH . 'klijenti.jpg'; ?>" /> 
                </a>
                <span class="info moreInfo"><b><?= $_t['menu.our-clients'][$params['lang']]; ?></b></span>
            </li>
            <li>
                <a href="<?= DS . $params['lang'] . DS . 'gallery'; ?>">
                    <img title="" width="170" height="100" src=" <?= IMAGE_PATH . 'galerija.jpg'; ?>" /> 
                </a>
                <span class="info moreInfo"><b><?= $_t['menu.gallery'][$params['lang']]; ?></b></span>
            </li>
        </ul>
    </div>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_banners.php'; ?>
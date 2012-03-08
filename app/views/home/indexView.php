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
                            <!-- ovde ide tekst -->
                        </span>
                        <p style="padding:5px 0 0"><?= $_t['home.' . $tmp[$lse['page_id']] . '.subtitle'][$params['lang']]; ?></p> 
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
            <span class="info moreInfo">
                <a href="<?= DS . $params['lang'] . DS . 'in-your-pocket-city-guides'; ?>">
                    <?= $_t['pockets.label'][$params['lang']]; ?>?
                </a>
            </span>
            <p><?= $pocketContent['front_content_' . $params['lang']]; ?></p> 

            <div class="newProject">
                <span class="info moreInfo">
                    <a href="#">
                        Sta je This Month in Belgrade
                    </a>
                </span>
                <img title="" width="170" height="240" src=" <?= IMAGE_PATH . 'arhiva.jpg'; ?>" />
                <div class="newProShort">
                    <p>Preduzeće BGinfo Box je u januaru 2008. godine dobilo licencu za izdavanje jednog od najvećih evropskih vodiča - In Your Pocket City Guide. Ovi vodiči postoje od 1992. godine i publikuju se u više od 150 evropskih gradova iz 25 zemalja.</p>
                    <p>Sadrže objektivne autorske tekstove koji obiluju tačnim i proverenim informacijama. Sve informacije iz štampanog izdanja vodiča su dostupne i na web portalu <a href="http://www.inyourpocket.com">www.inyourpocket.com</a>, koji beleži 3.000.000 poseta na mesečnom nivou. Ljudi iz celog sveta mogu da, pre posete nekom od ovih gradova, u pdf formatu preuzmu čitave vodiče (zajedno sa reklamnim i informativnim sadržajem).</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Load belgrade guide-->
    <? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_guide.php'; ?>

    <div class="mainBox">
        <ul class="galleryAll">
            <li>
                <a href="<?= DS . $params['lang'] . DS . 'arhiva'; ?>">
                    <img title="" width="170" height="100" src=" <?= IMAGE_PATH . 'arhiva.jpg'; ?>" />
                </a>
                <span class="info moreInfo">
                    <a href="<?= DS . $params['lang'] . DS . 'arhiva'; ?>">
                        <b><?= $_t['menu.archive'][$params['lang']]; ?></b>
                    </a>
                </span>
            </li>
            <li>
                <a href="<?= DS . $params['lang'] . DS . 'nasi-klijenti'; ?>">
                    <img title="" width="170" height="100" src=" <?= IMAGE_PATH . 'klijenti.jpg'; ?>" /> 
                </a>
                <span class="info moreInfo">
                    <a href="<?= DS . $params['lang'] . DS . 'nasi-klijenti'; ?>">
                        <b><?= $_t['menu.our-clients'][$params['lang']]; ?></b>
                    </a>
                </span>
            </li>
            <li>
                <a href="<?= DS . $params['lang'] . DS . 'galerija'; ?>">
                    <img title="" width="170" height="100" src=" <?= IMAGE_PATH . 'galerija.jpg'; ?>" /> 
                </a>
                <span class="info moreInfo"> <a href="<?= DS . $params['lang'] . DS . 'galerija'; ?>">

                        <b><?= $_t['menu.gallery'][$params['lang']]; ?></b>
                    </a>
                </span>
            </li>
        </ul>
    </div>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_banners.php'; ?>
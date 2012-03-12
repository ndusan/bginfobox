<div class="main">
    <div class="mainBox">
        <? if (!empty($lattestStaticEditions)): ?>
            <? $tmp = array('1' => 'bginfo-box', '2' => 'bginfo-map', '3' => 'bginfo-night-map'); ?>
            <ul class="galleryAll">
                <? foreach ($lattestStaticEditions as $lse): ?>
                    <li class="first">
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
                    <li class="first">
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

            
            <!-- List projects START -->
            <? if (!empty($projects)): ?>
                <? foreach ($projects as $project): ?>
                    <div class="newProject">
                        <span class="info moreInfo">
                            <a href="<?= (DS . $params['lang'] . DS . 'projekat' . DS . $project['id']); ?>">
                            <!-- Title -->
                            <?= $project['title_' . $params['lang']]; ?>
                            </a>
                        </span>
                        <!-- Main image --> 
                        <a href="<?= (DS . $params['lang'] . DS . 'projekat' . DS . $project['id'].DS.'gallery'); ?>" >
                        <img width="170" height="240" src="<?= (DS . 'public' . DS . 'uploads' . DS . 'project' . DS . 'thumb-'.$project['edition']['main_image']); ?>" />
                        </a>
                        <div class="newProShort">
                            <!-- Description -->
                            <?= $project['desc_' . $params['lang']]; ?>
                            <br/>
                        </div>
                    </div>
                <? endforeach; ?>
            <? endif; ?>
            <!-- List projects END -->
            
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
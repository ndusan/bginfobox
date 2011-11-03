<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?= $_t['bginfo-night-map.gallery.label'][$params['lang']]; ?></h1>
        </div>
        <? if (!empty($galleryCollection)): ?>
            <ul class="galleryAll">
                <? foreach ($galleryCollection as $gc): ?>
                    <li>
                        <span>
                            <img title="<?= $gc['title_' . $params['lang']]; ?>" alt="<?= $gc['title_' . $params['lang']]; ?>" width="170" height="240" src="<?= (DS . 'public' . DS . 'uploads' . DS . 'bginfo' . DS . 'thumb-' . $gc['image_name']); ?>" />
                            <a class="zoom lightbox" title="<?= $gc['title_' . $params['lang']]; ?>" href="<?= (DS . 'public' . DS . 'uploads' . DS . 'bginfo' . DS . $gc['image_name']); ?>"></a>
                        </span>
                    </li>
                <? endforeach; ?>
            </ul>
            <p><span class="info"><?= $_t['bginfo-night-map.current.label'][$params['lang']]; ?></span></p>
        <? endif; ?>

        <? if (!empty($galleryArchiveCollection)): ?>
            <ul class="archiveAll">
                <li>
                    <ul>
                        <? foreach ($galleryArchiveCollection as $gac): ?>
                            <li><a href="<?= (DS . $params['lang'] . DS . 'archive' . DS . 'bginfo-night-map'); ?>"><img title="<?= $gac['title_' . $params['lang']]; ?>" alt="<?= $gac['title_' . $params['lang']]; ?>" src="<?= (DS . 'public' . DS . 'uploads' . DS . 'bginfo' . DS . 'thumb-' . $gac['image_name']); ?>" /></a></li>
                        <? endforeach; ?>
                    </ul>
                </li>
            </ul>
            <p>
                <span class="info">
                    <?= $_t['bginfo-night-map.last_five_archive.label'][$params['lang']]; ?>, 
                    <a href="<?=(DS.$params['lang'].DS.'archive'.DS.'bginfo-nigth-map');?>">
                        <?=$_t['complete-archive.label'][$params['lang']];?>
                   </a>
                </span>
            </p>
        <? endif; ?>
    </div>

    <!-- Load belgrade guide-->
    <? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_guide.php'; ?>

</div>
<!-- Load banners -->
<? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_banners.php'; ?>
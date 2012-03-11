<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?= $_t['complete-archive.label'][$params['lang']]; ?> - <?=$pageTitle['title'];?></h1>
        </div>
        <? if(!empty($archiveCollection)):?>
        <ul class="archiveAll">
            <li>
                <ul>
                    <? foreach($archiveCollection as $ac):?>
                    <li>
                        <? $showFile = true; ?>
                        <? foreach($ac as $image):?>
                        <a class="lightbox" href="<?=(DS.'public'.DS.'uploads'.DS.($image['page_id']>4?'pockets':'bginfo').DS.$image['image_name']);?>">
                            <img <?=($image['position']?'style="display:none;"':'')?> src="<?=(DS.'public'.DS.'uploads'.DS.($image['page_id']>4?'pockets':'bginfo').DS.'thumb-'.$image['image_name']);?>" />
                        </a>
                        <span <?=($image['position']?'style="display:none;"':'')?> class="info">
                            <?=$image['title_'.$params['lang']];?>
                            <br/><?=$html->convertDate($image['created']);?>
                        </span>
                        <? if (!empty($image['file_name']) && $showFile): ?>
                            <span class="icoDld" style="display: block; height: 20px;">
                                <a href="<?= (DS . 'public' . DS . 'uploads' . DS . ($image['page_id']>4?'pockets':'bginfo') . DS . $image['file_name']); ?>" target="_blank">
                                    <?= $_t['download.label'][$params['lang']]; ?>
                                </a>
                            </span>
                        <? $showFile = false;?>
                        <? endif; ?>
                        <? endforeach;?>
                    </li>
                    <? endforeach;?>
                </ul>
            </li>
        </ul>
        <? endif;?>
        
    </div>
    <? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_guide.php'; ?>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_banners.php'; ?>


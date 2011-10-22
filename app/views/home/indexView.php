<div class="main">
    <div class="mainBox">
        <? if(!empty($lattestStaticEditions)):?>
        <? $tmp = array('1'=>'bginfo-box','2'=>'bginfo-map','3'=>'bginfo-night-map','4'=>'putovanje-za-dvoje');?>
        <ul class="galleryAll">
            <? foreach($lattestStaticEditions as $lse):?>
            <li>
                <a href="<?=(DS . $params['lang'] . DS . $tmp[$lse['page_id']] . DS . 'gallery'); ?>" >
                    <img title="<?=$lse['title'];?>" alt="<?=$lse['title'];?>" width="170" height="240" src="<?=(DS.'public'.DS.'uploads'.DS.'bginfo'.DS.$lse['image_name']);?>" />
                </a>
                <span class="info moreInfo">
                    <a href="<?=(DS . $params['lang'] . DS . $tmp[$lse['page_id']]);?>"><?=$_t['index.question'][$params['lang']]?> <?=$lse['title'];?>?</a>
                </span>
            </li>
            <? endforeach; ?>
        </ul>
        <? endif;?>
    </div>
    <div class="mainBox">
        <? if(!empty($lattestDynamicEditions)):?>
        <ul class="galleryAll">
            <? foreach($lattestDynamicEditions as $lde):?>
            <li>
                <img title="<?=$lde['title'];?>" alt="<?=$lde['title'];?>" width="170" height="240" src="<?=(DS.'public'.DS.'uploads'.DS.'pockets'.DS.$lde['image_name']);?>" />
            </li>
            <? endforeach;?>
        </ul>
        <? endif;?>
        <div class="boxContent wys">
            <h2><?=$_t['pockets.label'][$params['lang']];?>?</h2>
            <p><?=$pocketContent['front_content_'.$params['lang']];?> <a href="<?= DS . $params['lang'] . DS . 'pockets'; ?>">link</a></p>
        </div>
    </div>
    <div class="mainBox">
        <div class="boxTitle">
            <span><img src="<?= IMAGE_PATH . 'icoMap.png'; ?>" /></span>
            <h1>Vodic kroz Beograd</h1>
        </div>
        <div class="boxContent">
            <p>
                Proin congue varius commodo. Aliquam vel luctus tellus. Nunc tempor, lectus eu scelerisque vestibulum, urna leo vehicula justo, vel mollis orci purus sit amet augue. Vestibulum porta malesuada quam. Proin blandit velit sit amet elit euismod pretium. Suspendisse elit elit, consectetur et condimentum a, blandit quis sem. Morbi ut justo tortor. 
            </p>
        </div>
    </div>
    <div class="mainBox">
        <ul class="galleryAll">
            <li>
                <img title="" width="170" height="100" src=" <?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
            </li>
            <li>
                <img title="" width="170" height="100" src=" <?= IMAGE_PATH . 'dummy1.jpg'; ?>" /> 
            </li>
            <li>
                <img title="" width="170" height="100" src=" <?= IMAGE_PATH . 'dummy1.jpg'; ?>" /> 
            </li>
            <li>
                <span class="info moreInfo"><b>Arhiva izdanja</b></span>
            </li>
            <li>
                <span class="info moreInfo"><b>Saradnici</b></span>
            </li>
            <li>
                <span class="info moreInfo"><b>Galerija</b></span>
            </li>
        </ul>
    </div>
</div>
<? include_once '_static/_banners.php'; ?>
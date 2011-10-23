<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?=$_t['menu.gallery'][$params['lang']];?></h1>
        </div>
        <? if(!empty($galleryCollection)):?>
        <ul class="galleryAll">
            <? foreach($galleryCollection as $g):?>
            <li>
                <span class="image_crop">
                <img src="<?=DS.'public'.DS.'uploads'.DS.'gallery'.DS.'thumb-'.$g['image_name'];?>" title="<?=$g['title'];?>" alt="<?=$g['title'];?>"/>
                <a class="zoom lightbox" href="<?=DS.'public'.DS.'uploads'.DS.'gallery'.DS.$g['image_name'];?>"></a>
                </span>
                <span class="info"><?=$g['ratio'];?> / <?=  number_format($g['size']/1024, 2);?>kB <a href="<?=DS.'public'.DS.'uploads'.DS.'gallery'.DS.$g['image_name'];?>" target="_blank">preuzmi</a></span>
            </li>
            <? endforeach;?>
        </ul>
        <? endif; ?>
    </div>
    <!-- Load belgrade guide-->
    <? include_once VIEW_PATH.'home'.DS.'_static'.DS.'_guide.php'; ?>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH.'home'.DS.'_static'.DS.'_banners.php'; ?>
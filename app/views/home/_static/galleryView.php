<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1>Galerija</h1>
        </div>
        <? if(!empty($galleryCollection)):?>
        <ul class="galleryAll">
            <? foreach($galleryCollection as $g):?>
            <li>
                <span class="image_crop">
                <img src="<?=DS.'public'.DS.'uploads'.DS.'gallery'.DS.'thumb-'.$g['image_name'];?>" />
                </span>
                <span><?=$g['ratio'];?> / <?=  number_format($g['size']/1024, 2);?>kB <a href="<?=DS.'public'.DS.'uploads'.DS.'gallery'.DS.$g['image_name'];?>" target="_blank">preuzmi</a></span>
                <a class="zoom lightbox" href="<?=DS.'public'.DS.'uploads'.DS.'gallery'.DS.$g['image_name'];?>"></a>
            </li>
            <? endforeach;?>
        </ul>
        <? endif; ?>
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
</div>
<? include_once '_banners.php';?>
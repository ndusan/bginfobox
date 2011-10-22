<div class="main">
    <div class="mainBox">
        <? if(!empty($bginfoboxCollection)):?>
        <ul class="galleryAll">
            <li>
                <span>
                    <img title="" width="170" height="240" src=" <?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                    <a class="zoom lightbox" href="<//?=DS.'public'.DS.'uploads'.DS.'gallery'.DS.$g['image_name'];?>"></a>
                </span>
                <span class="info">Lokacija</span>
            </li>
        </ul>
        <? endif;?>
    </div>
    
    <!-- Load belgrade guide-->
    <? include_once VIEW_PATH.'home'.DS.'_static'.DS.'_guide.php'; ?>
    
</div>
    
<!-- Load banners -->
<? include_once VIEW_PATH.'home'.DS.'_static'.DS.'_banners.php'; ?>

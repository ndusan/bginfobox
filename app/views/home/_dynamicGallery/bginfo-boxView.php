<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?=$_t['bginfo-box.gallery.label'][$params['lang']];?></h1>
        </div>
        <? if(!empty($galleryCollection)):?>
        <ul class="galleryAll">
            <? foreach($galleryCollection as $gc):?>
            <li>
                <span>
                    <img title="<?=$gc['title_'.$params['lang']];?>" alt="<?=$gc['title_'.$params['lang']];?>" width="170" height="240" src="<?=(DS.'public'.DS.'uploads'.DS.'bginfo'.DS.$gc['image_name']);?>" />
                    <a class="zoom lightbox" title="<?=$gc['title_'.$params['lang']];?>" href="<?=(DS.'public'.DS.'uploads'.DS.'bginfo'.DS.$gc['image_name']);?>"></a>
                </span>
                <span class="info"><?=$gc['title_'.$params['lang']];?></span>
            </li>
            <? endforeach;?>
        </ul>
        <? endif;?>
    </div>
    
    <!-- Load belgrade guide-->
    <? include_once VIEW_PATH.'home'.DS.'_static'.DS.'_guide.php'; ?>
    
</div>
    
<!-- Load banners -->
<? include_once VIEW_PATH.'home'.DS.'_static'.DS.'_banners.php'; ?>

<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?=$_t['bginfo-box.gallery.label'][$params['lang']];?></h1>
        </div>
        <div class="boxContent">
            <ul class="boxExtra">
                <li class="icoPdf">
                    <a href="#">
                        <?=$_t['ads.label'][$params['lang']];?>
                    </a>
                </li>
                <li class="icoMail">
                    <a href="<?=(DS.$params['lang'].DS.'ads');?>">
                        <?=$_t['ads-question.label'][$params['lang']];?>? 
                        <span><?=$_t['ads-question.sublabel'][$params['lang']];?></span>
                    </a>
                </li>
            </ul>
            <p><?=$content['content_'.$params['lang']];?></p>
        </div>
        <div style="clear:both"></div>
        <? if(!empty($galleryCollection)):?>
        <ul class="galleryAll">
            <? foreach($galleryCollection as $gc):?>
            <li>
                <span>
                    <img width="170" height="240" title="<?=$gc['title_'.$params['lang']];?>" alt="<?=$gc['title_'.$params['lang']];?>" width="170" height="240" src="<?=(DS.'public'.DS.'uploads'.DS.'bginfo'.DS.'thumb-'.$gc['image_name']);?>" />
                    <a class="zoom lightbox" title="<?=$gc['title_'.$params['lang']];?>" href="<?=(DS.'public'.DS.'uploads'.DS.'bginfo'.DS.$gc['image_name']);?>"></a>
                </span>
            </li>
            <? endforeach;?>
        </ul>
        <? endif;?>
    </div>
    <!-- Load belgrade guide-->
    <? include_once VIEW_PATH.'home'.DS.'_static'.DS.'_guide.php'; ?>
</div>
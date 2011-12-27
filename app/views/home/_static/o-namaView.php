<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?=$_t['menu.about-us'][$params['lang']];?></h1>
        </div>
        <div class="boxContent">
            <ul class="boxExtra">
                <? if(!empty($pricelist['image_name'])):?>
                <li class="icoPdf">
                    <a href="<?=(DS.'public'.DS.'uploads'.DS.'aboutus'.DS.$pricelist['image_name']);?>" target="_blank">
                        <?=$_t['ads.label'][$params['lang']];?>
                    </a>
                </li>
                <? endif;?>
                <li class="icoMail"><a href="<?=(DS.$params['lang'].DS.'oglasavanje');?>"><?=$_t['ads-question.label'][$params['lang']];?>? <span><?=$_t['ads-question.sublabel'][$params['lang']];?></span></a></li>
            </ul>
            <p><?=@$pricelist['content_'.$params['lang']];?></p>
        </div>
    </div>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH.'home'.DS.'_static'.DS.'_banners.php'; ?>
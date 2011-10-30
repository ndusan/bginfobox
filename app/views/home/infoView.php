<div class="main">
    <div class="breadcrumb">
        <? if(!empty($slug['previous'])):?>
        <? $split = explode('/', $slug['previous']);?>
        <? $tmp = array();?>
        <? foreach($split as $s):?>
        <? $tmp[]= $s;?>
        <a href="<?=(DS.$params['lang'].DS.'info'.DS.implode('/',$tmp));?>"><?=$slugCollection[$s]['title_'.$params['lang']];?></a> /
        <? endforeach;?>
        <? endif;?>
        <?=$intro['title_'.$params['lang']];?>
    </div>
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?=$intro['title_'.$params['lang']];?></h1>
        </div>
        <div class="boxIntro wys">
            <span class="img">
                <? if($intro['image_name']):?>
                <img src="<?=(DS.'public'.DS.'uploads'.DS.$this->_action.DS.$intro['image_name']);?>">
                <? endif; ?>
            </span>
            <!-- tekst kroz editor -->
            <p><?=$intro['content_'.$params['lang']];?></p>
        </div>
        
        <? if(!empty($sights)):?>
        <div class="boxTitle1">
            <h2><?= $_t['guide-highlights.label'][$params['lang']]; ?></h2>
        </div>
        <? foreach($sights as $s):?>
        <div class="boxIntro wys">
            <span class="img">
                <? if(!empty($s['image_name'])):?>
                <img src="<?=(DS.'public'.DS.'uploads'.DS.'info'.DS.$s['image_name']);?>">
                <? endif;?>
            </span>
            <h4><?=$s['title_'.$params['lang']];?></h4>
            <p><?=$s['content_'.$params['lang']];?></p>
        </div>
        <? endforeach ;?>
        <? endif;?>
    </div>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_banners.php'; ?>
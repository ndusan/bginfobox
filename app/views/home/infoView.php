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
                <img src="<?=(DS.'public'.DS.'uploads'.DS.$this->_action.DS.'thumb-'.$intro['image_name']);?>">
                <? endif; ?>
            </span>
            <!-- tekst kroz editor -->
            <p><?=$intro['content_'.$params['lang']];?></p>
        </div>
        <div class="boxTitle1">
            <h2><?= $_t['guide-highlights.label'][$params['lang']]; ?></h2>
        </div>
        <div class="boxIntro wys">
            <span class="img"><img src="/public/images/dummy1.jpg"></span>
            <!-- naslov znamenitosti -->
            <h4>Kalemegdanska tvrdjava</h4>
            <!-- tekst kroz editor -->
            <p>
                Proin congue varius commodo. Aliquam vel luctus tellus. Nunc tempor, lectus eu scelerisque vestibulum, urna leo vehicula justo, vel mollis orci purus sit amet augue. Vestibulum porta malesuada quam. Proin blandit velit sit amet elit euismod pretium. Suspendisse elit elit, consectetur et condimentum a, blandit quis sem. Morbi ut justo tortor. 
            </p>
        </div>
    </div>
</div>
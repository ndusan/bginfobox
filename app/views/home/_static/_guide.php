<div class="mainBox">
    <div class="boxTitle">
        <span><img src="<?= IMAGE_PATH . 'icoMap.png'; ?>" /></span>
        <h1><?= $_t['guide.label'][$params['lang']]; ?></h1>
    </div>
    <div class="boxContent">
        <? if(!empty($lattestAdsPaid)):?>
        <ul class="adsPaid">
        <? foreach($lattestAdsPaid as $ap):?>
        <li>
            <span class="img">
                <? if(!empty($ap['paid_image_name'])):?>
                <img src="<?=(DS.'public'.DS.'uploads'.DS.'clients'.DS.$ap['paid_image_name']);?>" />
                <? else: ?>
                <img src="<?=(DS.'public'.DS.'images'.DS.'noLogo.jpg');?>" />
                <? endif;?>
            </span>
            <div class="adsPaidInfo">
                <h4><?=$ap['title'];?></h4>
                <ul>
                    <li> 
                        <?=$ap['address'];?>
                    </li>
                    <li>
                        <? if(!empty($ap['phone'])):?>
                        <b>Tel: </b><?=$ap['phone'];?><br>
                        <? endif;?>
                        <? if(!empty($ap['email'])):?>
                        <b>Email: </b><?=$ap['email'];?><br>
                        <? endif;?>
                        <? if(!empty($ap['website'])):?>
                        <b>Website: </b><?=$ap['website'];?><br>
                        <? endif;?>
                    </li>
                </ul>
                <p><?=$ap['paid_info'];?></p>
            </div>
        </li>
        <? endforeach; ?>
        </ul>
        <? endif;?>
    </div>
    <div class="boxTitle1">
        <h2><?= $_t['guide-highlights.label'][$params['lang']]; ?></h2>
    </div>
    <? if(!empty($lattestSights)):?>
    <? foreach($lattestSights as $s):?>
    <div class="boxContent">
        <div class="boxIntro wys">
            <span class="img">
                <? if (!empty($s['image_name'])): ?>
                    <img src="<?= (DS . 'public' . DS . 'uploads' . DS . 'info' . DS . $s['image_name']); ?>">
                <? endif; ?>
            </span>
            <h4><?= $s['title_' . $params['lang']]; ?></h4>
            <p><?= $s['content_' . $params['lang']]; ?></p>
            <!-- link -->
            <a href="<?=DS.$params['lang'].DS.'info'.DS.$s['slug'];?>">more...</a>
        </div>
    </div>
    <? endforeach; ?>
    <? endif; ?>
</div>
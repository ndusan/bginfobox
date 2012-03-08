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
    
    
    <!-- List projects START -->
    <? if(!empty($projects)):?>
    <? foreach($projects as $project):?>
    <div >
        <div>
            <!-- Title -->
            <?= $project['title_'.$params['lang']];?>
        </div>
        <div>
            
            <div>
                <!-- Main image -->    
                <img src="<?=(DS.'public'.DS.'uploads'.DS.'project'.DS.$project['main_image']);?>" />
                <a href="<?=(DS.$params['lang'].DS.'projekat'.DS.$project['id']);?>" >dalje</a>
            </div>
            <div>
                <!-- Description -->
                <?= $project['desc_'.$params['lang']];?>
            </div>
        </div>
    </div>
    <? endforeach; ?>
    <? endif;?>
    <!-- List projects END -->
    
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
            <a href="<?=DS.$params['lang'].DS.'info'.DS.$s['slug'];?>"><?= $_t['news.read_more'][$params['lang']]; ?>...</a>
        </div>
    </div>
    <? endforeach; ?>
    <? endif; ?>
</div>
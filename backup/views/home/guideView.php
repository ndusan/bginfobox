<div class="main">
    <div class="breadcrumb">
        <? if(!empty($slug['previous'])):?>
        <? $split = explode('/', $slug['previous']);?>
        <? $tmp = array();?>
        <? foreach($split as $s):?>
        <? $tmp[]= $s ;?>
        <a href="<?=(DS.$params['lang'].DS.'vodic'.DS.implode('/',$tmp));?>"><?=@$slugCollection[$s]['title_'.$params['lang']];?></a> /
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
                <? if(!empty($intro['image_name'])):?>
                <img src="<?=(DS.'public'.DS.'uploads'.DS.'clients'.DS.$intro['image_name']);?>" />
                <? else: ?>
                <img src="<?=(DS.'public'.DS.'images'.DS.'noLogo.jpg');?>" />
                <? endif; ?>
            </span>
            <!-- tekst kroz editor -->
            <p><?=$intro['content_'.$params['lang']];?></p>
        </div>
        <? if(!empty($adsPaid)):?>
        <div class="boxTitle1">
            <h2><?= $_t['guide-highlights.label'][$params['lang']]; ?></h2>
        </div>
        
        <ul class="adsPaid">
            <? foreach($adsPaid as $ap):?>
            <li>
                <span class="img">
                    <? if(!empty($ap['paid_image_name'])):?>
                    <img src="<?=DS.'public'.DS.'uploads'.DS.'clients'.DS.$ap['paid_image_name'];?>" />
                    <? else: ?>
                    <img src="<?=DS.'public'.DS.'images'.DS.'noLogo.jpg';?>" />
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
        
        <? if(!empty($ads)):?>
        <div class="boxTitle1">
            <h2><?= $_t['list.label'][$params['lang']]; ?> - <?=$intro['title_'.$params['lang']];?></h2>
        </div>
        <div class="adsRegular">
            <table width="100%" cellpadding="0">
                <tbody>
                    <? foreach($ads as $ad):?>
                    <tr>
                        <td>
                            <div class="client">
                                <span class="img">
                                    <? if(!empty($ad['image_name'])):?>
                                    <img src="<?=(DS.'public'.DS.'uploads'.DS.'clients'.DS.$ad['image_name']);?>" />
                                    <? else: ?>
                                    <img src="<?=DS.'public'.DS.'images'.DS.'noLogo.jpg';?>" />
                                    <? endif;?>
                                </span>
                                <ul class="clientInfo">
                                    <li>
                                        <h4><?=$ad['title'];?></h4>
                                        <?=$ad['address'];?>
                                    </li>
                                    <li>
                                        <? if($ad['phone']):?>
                                        <b>Tel: </b><?=$ad['phone'];?><br>
                                        <? endif;?>
                                        <? if($ad['email']):?>
                                        <b>Email: </b><?=$ad['email'];?><br>
                                        <? endif;?>
                                        <? if($ad['website']):?>
                                        <b>Website: </b><?=$ad['website'];?><br>
                                        <? endif;?>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <? endforeach;?>
                </tbody>
            </table>
        </div>
        <? endif;?>
    </div>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_banners.php'; ?>
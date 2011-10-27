<div class="main">
    <div class="breadcrumb">
        <? if(!empty($slug['previous'])):?>
        <? $split = explode('/', $slug['previous']);?>
        <? $tmp = array();?>
        <? foreach($split as $s):?>
        <? $tmp[]= $s ;?>
        <a href="<?=(DS.$params['lang'].DS.'guide'.DS.implode('/',$tmp));?>"><?=$slugCollection[$s]['title_'.$params['lang']];?></a> /
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
                <img src="<?=(DS.'public'.DS.'uploads'.DS.'clients'.DS.$intro['image_name']);?>">
                <? endif; ?>
            </span>
            <!-- tekst kroz editor -->
            <p><?=$intro['content_'.$params['lang']];?></p>
        </div>
        
        <? if(!empty($adsPaid)):?>
        <div class="boxTitle1">
            <h2>Posebna ponuda Beograda</h2>
        </div>
        
        <ul class="adsPaid">
            <? foreach($adsPaid as $ap):?>
            <li>
                <span class="img">
                    <? if(!empty($ap['image_name'])):?>
                    <img src="<?=(DS.'public'.DS.'uploads'.DS.'guide'.DS.$ap['image_name']);?>">
                    <? endif;?>
                </span>
                <div class="adsPaidInfo">
                    <h4><?=$ap['title'];?></h4>
                    <ul>
                        <li> 
                            <?=$ap['address'];?>
                        </li>
                        <li>
                            <? if($ad['phone']):?>
                            <b>Tel: </b><?=$ad['phone'];?><br>
                            <? endif;?>
                            <? if($ad['phone']):?>
                            <b>Email: </b><?=$ad['email'];?><br>
                            <? endif;?>
                            <? if($ad['phone']):?>
                            <b>Website: </b><?=$ad['website'];?><br>
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
            <h2>Spisak hotela</h2>
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
                                    <img src="<?=(DS.'public'.DS.'uploads'.DS.'clients'.DS.$ad['image_name']);?>">
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
                                        <? if($ad['phone']):?>
                                        <b>Email: </b><?=$ad['email'];?><br>
                                        <? endif;?>
                                        <? if($ad['phone']):?>
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
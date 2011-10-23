<div class="mainBig">
    <div class="mainBox">
        <div class="boxTitle">
            <h1>Distributeri za Bg Info Map</h1>
        </div>
        <? if(!empty($locationCollection)):?>
        <table cellpadding="0" cellpadding="0" width="100%">
            <tbody>
                <? foreach($locationCollection as $lc):?>
                <tr>
                    <td>
                        <div class="client">
                            <span class="img">
                                <img src="<?=(DS.'public'.DS.'uploads'.DS.'clients'.DS.'thumb-'.$lc['image_name']);?>" />
                            </span>
                            <ul class="clientInfo">
                                <li>
                                    <h4><?=$lc['title'];?></h4>
                                    <?=$lc['address'];?>
                                </li>
                                <li>
                                    <? if(!empty($lc['phone'])):?>
                                    <b>Tel:</b> <?=$lc['phone']?><br/>
                                    <? endif; ?>
                                    <? if(!empty($lc['email'])):?>
                                    <b>Email:</b> <?=$lc['email']?><br/>
                                    <? endif;?>
                                    <? if(!empty($lc['website'])):?>
                                    Webiste: <?=$lc['website']?>
                                    <? endif;?>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <? endforeach;?>
            </tbody>
        </table>
        <? else:?>
        <!-- else -->
        <div class="noResults">
            No Locations
        </div>
        <? endif;?>
    </div>
</div>
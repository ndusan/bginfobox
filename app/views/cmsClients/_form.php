<div class="tabs">
    <form action="/cms/clients/<?= $client['formAction']; ?>" method="post" enctype="multipart/form-data">
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="client[title]" value="<?=@$client['title'];?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Connection:</td>
                        <td>
                            <input type="checkbox" name="client[purpose][client]" value="client" />
                            <label>Client</labe>
                            <br/>
                            <input type="checkbox" name="client[purpose][distributor]" value="distributor" />
                            <label>Distributor</labe>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <? if(!empty($staticCollection)):?>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <? foreach ($staticCollection as $static):?>
                    <tr>
                        <td>
                            <input type="checkbox" name="client[static][<?=$static['id'];?>]" <?=(!empty($static['checked'])?'checked="checked"':'')?> value="<?=$static['id'];?>" />
                            <label><?=$static['title'];?></label>
                        </td>
                    </tr>
                    <? endforeach;?>
                </tbody>
            </table>
        </div>
        <? endif;?>
        
        <? if(!empty($dynamicCollection)):?>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <? foreach ($dynamicCollection as $dynamic):?>
                    <tr>
                        <td>
                            <input type="checkbox" name="client[dynamic][<?=$dynamic['id'];?>" <?=(!empty($dymamic['client_id'])?'checked="checked"':'')?> value="<?=$dynamic['id'];?>" />
                            <label><?=$dynamic['title'];?></label>
                        </td>
                    </tr>
                    <? endforeach;?>
                </tbody>
            </table>
        </div>
        <? endif;?>
        
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="client[id]" value="<?= @$client['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>


<form action="/cms/clients/<?= $news['formAction']; ?>" method="post" enctype="multipart/form-data">

    <input type="text" name="client[title]" value="<?=@$client['title'];?>" />
    
    
    <? if(!empty($staticCollection)):?>
    <? foreach ($staticCollection as $static):?>
    <input type="checkbox" name="client[static][<?=$static['id'];?>" <?=(!empty($static['checked'])?'checked="checked"':'')?> value="<?=$static['id'];?>" />
    <label><?=$static['title'];?></label>
    <? endforeach;?>
    <? endif;?>
    
    
    
    <? if(!empty($dynamicCollection)):?>
    <? foreach ($dynamicCollection as $dynamic):?>
    <input type="checkbox" name="client[dynamic][<?=$dynamic['id'];?>" <?=(!empty($dynamic['checked'])?'checked="checked"':'')?> value="<?=$dynamic['id'];?>" />
    <label><?=$dynamic['title'];?></label>
    <? endforeach;?>
    <? endif;?>
    
</form>


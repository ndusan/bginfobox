<ul class="addTop">
            <li><a class="cmsEdit1" href="/cms/pockets/edit/static" >Edit about content</a></li>
        </ul>
<div class="tabs">
    <ul>
        <? if(!empty($tabs)):?>
        <? $i=1;?>
        <? foreach($tabs as $tab):?>
        <li><a href="#fragment-<?=$i++;?>"><?=$tab['title'];?></a></li>
        <? endforeach;?>
        <? endif;?>
        <li><a href="/cms/pockets/edition"><span class="cmsEdit"></span></a></li>
    </ul>
    <? if(!empty($tabs)):?>
    <? $i=1;?>
    <? foreach($tabs as $tab):?>
    <div id="fragment-<?=$i++;?>" class="addContent1">
        <ul class="addTop">
            <li><a class="cmsAdd" href="/cms/pockets/edition" >Manage editions</a></li>
        </ul>
        tabela
    </div>
    <? endforeach;?>
    <? endif;?>
</div>
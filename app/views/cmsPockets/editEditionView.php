<? $edition['formAction'] = 'edit/'.$params['id'];?>
<ul class="addTop">
    <li><a href="/cms/pockets#fragment-<?=!empty($params['fragment'])?$params['fragment']:1;?>"><?=$settings['title'];?></a></li>
    <li><h3>/ Edit edition</h3></li>
</ul>
<? include_once '_formEdition.php';?>
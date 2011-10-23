<? $edition['formAction'] = 'edit/'.$params['id'];?>
<ul class="addTop">
    <li><a href="/cms/bginfo#fragment-<?=$settings['id'];?>"><?=$settings['title'];?></a></li>
    <li><h3>/ Edit <?=($settings['id']==1?'pano':'edition');?></h3></li>
</ul>
<? include_once '_form.php';?>
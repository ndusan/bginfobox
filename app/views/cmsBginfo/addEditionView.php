<? $edition = array('formAction' => 'add');?>
<ul class="addTop">
    <li><a href="/cms/bginfo#fragment-<?=$settings['id'];?>"><?=$settings['title'];?></a></li>
    <li><h3>/ Add <?=($settings['id']==1?'pano':'edition');?></h3></li>
</ul>
<? include_once '_form.php';?>
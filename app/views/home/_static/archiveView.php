<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?=$_t['menu.archive'][$params['lang']];?></h1>
        </div>
        <? if(!empty($archiveCollection)):?>
        <ul class="archiveAll">
            <? $array = array('2'=>'bginfo-map','3'=>'bginfo-night-map','4'=>'putovanje-za-dvoje');?>
            <? foreach($archiveCollection as $ac):?>
            <li>
                <ul>
                    <? if(!empty($ac['edition_images'])):?>
                    <? $tmpFolder = ($ac['id'] > 4 ? 'pockets' : 'bginfo'); ?>
                    <? foreach($ac['edition_images'] as $e):?>
                    <li>
                        <a href="<?=(DS . $params['lang'] . DS . 'archive' . DS.  ($ac['id'] > 4 ? 'pockets?id='.$ac['id'] : $array[$ac['id']])); ?>">
                            <img src="<?=(DS.'public'.DS.'uploads'.DS.$tmpFolder.DS.'thumb-'.$e['image_name']); ?>" />
                        </a>
                    </li>
                    <? endforeach;?>
                    <? endif;?>
                    <li class="last">
                        <p><b><?=$ac['title'];?></b></p>
                        <a href="<?=(DS . $params['lang'] . DS . 'archive' . DS.  $tmp); ?>"><?=$_t['complete-archive.label'][$params['lang']];?></a>
                    </li>
                </ul>
            </li>
            <? endforeach;?>
        </ul>
        <? endif;?>
    </div>
    <!-- Load belgrade guide-->
    <? include_once VIEW_PATH.'home'.DS.'_static'.DS.'_guide.php'; ?>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH.'home'.DS.'_static'.DS.'_banners.php'; ?>
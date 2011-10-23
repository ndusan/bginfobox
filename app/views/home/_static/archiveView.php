<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1>Arhiva izdanja</h1>
        </div>
        <? if(!empty($archiveCollection)):?>
        <ul class="archiveAll">
            <? $array = array('2'=>'bginfo-map','3'=>'bginfo-night-map');?>
            <? foreach($archiveCollection as $ac):?>
            <li>
                <ul>
                    <? if(!empty($ac['edition_images'])):?>
                    <? $tmp = ($ac['id'] > 4 ? 'pockets' : $array[$ac['id']]); ?>
                    <? $tmpFolder = ($ac['id'] > 4 ? 'pockets' : 'bginfo'); ?>
                    <? foreach($ac['edition_images'] as $e):?>
                    <li>
                        <a href="<?=(DS . $params['lang'] . DS . 'archive' . DS.  $tmp); ?>">
                            <img src="<?=(DS.'public'.DS.'uploads'.DS.$tmpFolder.DS.'thumb-'.$e['image_name']); ?>" />
                        </a>
                    </li>
                    <? endforeach;?>
                    <? endif;?>
                    <li class="last">
                        <p><b><?=$ac['title'];?></b></p>
                        <a href="<?=(DS . $params['lang'] . DS . 'archive' . DS.  $tmp); ?>">Kompletna arhiva izdanja</a>
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
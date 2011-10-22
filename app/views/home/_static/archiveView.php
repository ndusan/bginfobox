<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1>Arhiva izdanja</h1>
        </div>
        <? if(!empty($archiveCollection)):?>
        <ul class="archiveAll">
            <? foreach($archiveCollection as $ac):?>
            <li>
                <ul>
                    <? if(!empty($ac['edition_images'])):?>
                    <li><a href="#"><img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" /></a></li>
                    <? endif;?>
                    <li class="last">
                        <p><b><?=$ac['title'];?></b></p>
                        <a href="#">Kompletna arhiva izdanja</a>
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
<? if(!empty($bannerCollection)):?>
<div class="sidebarR">
    <ul class="banners">
        <? foreach($bannerCollection as $b):?>
        <li>
            <a href="<?=$b['link'];?>" target="_blank">
                <img title="<?=$b['title'];?>" alt="<?=$b['title'];?>" src="<?=DS.'public'.DS.'uploads'.DS.'banners'.DS.$b['image_name'];?>" width="200"/>
            </a>
        </li>
        <? endforeach;?>
    </ul>
</div>
<? endif;?>
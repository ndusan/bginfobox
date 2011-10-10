<? if(!empty($newsCollection)):?>
<!-- All news -->
<ul>
<? foreach($newsCollection as $n):?>
    <li>
        Title:<?=$n['title_'.$params['lang']];?> 
        
        Heading: <?=$n['heading_'.$params['lang']];?>
        
        Content: <?=$n['content_'.$params['lang']];?>
        
        Date: <?=$n['created'];?>
        
        <? if(!empty($n['image_name'])):?>
        Images: <?=UPLOAD_PATH.'news'.DS.$n['image_name'];?>
        <? endif;?>
        
    </li>
<? endforeach;?>
</ul>
<? elseif(!empty($news)):?>
<!-- selected news -->
    Title:<?=$news['title_'.$params['lang']];?> 
        
    Heading: <?=$news['heading_'.$params['lang']];?>

    Content: <?=$news['content_'.$params['lang']];?>

    Date: <?=$news['created'];?>
    
    <? if(!empty($news['image_name'])):?>
    Images: <?=UPLOAD_PATH.'news'.DS.$news['image_name'];?>
    <? endif;?>
    
<? endif; ?>

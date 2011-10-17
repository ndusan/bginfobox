<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/bginfo/<?= $news['formAction']; ?>/<?=$params['page_id'];?>/edition" method="post" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <? if(!empty($settings['num_of_images'])):?>
                    <? for($i=0; $i<$settings['num_of_images']; $i++):?>
                    <tr>
                        <td>Title (image #<?=($i+1);?>):</td>
                        <td>
                            <input type="text" name="edition[title_sr]" value="<?= @$edition['title_sr']; ?>" class="jr"/>
                        </td>
                    </tr>
                    <? endfor; ?>
                    <? endif;?>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <? if(!empty($settings['num_of_images'])):?>
                    <? for($i=0; $i<$settings['num_of_images']; $i++):?>
                    <tr>
                        <td>Title (image #<?=($i+1);?>):</td>
                        <td>
                            <input type="text" name="edition[title_en]" value="<?= @$edition['title_en']; ?>"/>
                        </td>
                    </tr>
                    <? endfor; ?>
                    <? endif;?>
                </tbody>
            </table>

        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <? if(!empty($settings['num_of_images'])):?>
                    <? for($i=0; $i<$settings['num_of_images']; $i++):?>
                    <tr>
                        <td>Image #<?=($i+1);?>:</td>
                        <td>
                            <input type="file" name="image-<?=$i;?>" value=""  class="jr"/>
                        </td>
                    </tr>
                    <? endfor; ?>
                    <? endif;?>
                    
                    <? if(!empty($settings['has_file_name'])):?>
                    <tr>
                        <td>Download file:</td>
                        <td>
                            <input type="file" name="download" value=""/>
                        </td>
                    </tr>
                    <? endif;?>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="edition[id]" value="<?= @$edition['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>


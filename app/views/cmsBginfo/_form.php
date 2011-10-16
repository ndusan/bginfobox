<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/bginfo/<?= $news['formAction']; ?>/<?=$params['page_id'];?>/edition" method="post" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="edition[title_sr]" value="<?= @$edition['title_sr']; ?>" class="jr"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="edition[title_en]" value="<?= @$edition['title_en']; ?>"/>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <? if(!empty($total)):?>
                    <? for($i=0; $i<$total['num_of_images']; $i++):?>
                    <tr>
                        <td>Image:</td>
                        <td>
                            <input type="file" name="image-<?=$i;?>" value=""  class="jr"/>
                        </td>
                    </tr>
                    <? endfor; ?>
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


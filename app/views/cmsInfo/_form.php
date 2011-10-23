<div class="tabs">
    <? if(!empty($tree)):?>
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/info/<?= $info['formAction']; ?>" method="post" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="info[title_sr]" value="<?= @$info['title_sr']; ?>" class="jr"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="info[content_sr]"><?= @$info['content_sr']; ?></textarea>
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
                            <input type="text" name="info[title_en]" value="<?= @$info['title_en']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="info[content_en]"><?= @$info['content_en']; ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <table>
                <tbody>
                    <tr>
                        <td>Navigation:</td>
                        <td>
                            <select name="info[navigation]">
                                <? if(!empty($tree)):?>
                                <? foreach($tree as $t):?>
                                <? if($t['id'] == $info['navigation_id']) $sel = 'selected="selected"';
                                   else $sel = '';?>
                                <option value="<?=$t['id'];?>" <?=$sel;?>><?=$t['breadcrumb'];?></option>
                                <? endforeach;?>
                                <? endif;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Image:</td>
                        <td>
                            <input type="file" name="image" value=""/>
                            <? if (isset($info['id']) && !empty($info['image_name'])): ?>
                                <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'info' . DS . $info['image_name']; ?>" target="_blank"><?= $info['image_name']; ?></a>
                                [<a href="/cms/info/delete/image/<?= $info['id']; ?>" class='jw'>Delete</a>]
                            <? endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="info[id]" value="<?= @$info['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
    <? else: ?>
    <div class="noResults">
        Please, set info navigation first!
    </div>
    <? endif;?>
</div>


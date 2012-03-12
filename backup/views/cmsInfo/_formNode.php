<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/info/node/<?= $node['formAction']; ?>" method="post" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="node[title_sr]" value="<?= @$node['title_sr']; ?>" class="jr"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="node[content_sr]" class="jr"><?=@$node['content_sr'];?></textarea>
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
                            <input type="text" name="node[title_en]" value="<?= @$node['title_en']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="node[content_en]"><?=@$node['content_en'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <table>
                <tbody>
                    <tr>
                        <td>Parent:</td>
                        <td>
                            <select name="node[parent]">
                                <option value="0">No parent</option>
                                <? if(!empty($tree)):?>
                                <? foreach($tree as $t):?>
                                <? if($t['id'] <> $node['id']):?>
                                <? if($t['id'] == $node['parent']) $sel = 'selected="selected"';
                                   else $sel = '';?>
                                <option value="<?=$t['id'];?>" <?=$sel;?>><?=$t['breadcrumb'];?></option>
                                <? endif;?>
                                <? endforeach;?>
                                <? endif;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Maximum image width 300px">Image:</span></td>
                        <td>
                            <input type="file" name="image" value=""/>
                            <? if (isset($node['id']) && !empty($node['image_name'])): ?>
                                <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'info' . DS . $node['image_name']; ?>" target="_blank"><?= $node['image_name']; ?></a>
                                [<a href="/cms/info/node/delete/image/<?= $node['id']; ?>" class='jw'>Delete</a>]
                            <? endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="node[id]" value="<?= @$node['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>


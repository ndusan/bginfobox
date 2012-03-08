<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/project/<?=$params['project_id'];?>/edition/<?=$form;?>" method="post" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Edition desc.:</td>
                        <td>
                            <textarea name="edition[desc_sr]" class="jr"><?= @$edition['desc_sr']; ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Edition desc.:</td>
                        <td>
                            <textarea name="edition[desc_en]" ><?= @$edition['desc_en']; ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Main image:</td>
                        <td>
                            <input type="file" name="main_image" value="" <?=(empty($edition['main_image']) ? 'class="jr"' : '');?>/>
                            <? if(!empty($edition['main_image'])):?>
                            <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['main_image']; ?>" target="_blank"><?= $edition['main_image']; ?></a>
                            <? endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Alt.top image:</td>
                        <td>
                            <input type="file" name="top_image" value="" />
                            <? if(!empty($edition['top_image'])):?>
                            <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['top_image']; ?>" target="_blank"><?= $edition['top_image']; ?></a>
                            <? endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Alt.bottom image:</td>
                        <td>
                            <input type="file" name="bottom_image" value=""/>
                            <? if(!empty($edition['bottom_image'])):?>
                            <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['bottom_image']; ?>" target="_blank"><?= $edition['bottom_image']; ?></a>
                            <? endif;?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Download main file:</td>
                        <td>
                            <input type="file" name="main_file" value=""/>
                            <? if(!empty($edition['main_file'])):?>
                            <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['main_file']; ?>" target="_blank"><?= $edition['main_file']; ?></a>
                            <? endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Download alt.top file:</td>
                        <td>
                            <input type="file" name="top_file" value=""/>
                            <? if(!empty($edition['top_file'])):?>
                            <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['top_file']; ?>" target="_blank"><?= $edition['top_file']; ?></a>
                            <? endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Download alt.bottom file:</td>
                        <td>
                            <input type="file" name="bottom_file" value=""/>
                            <? if(!empty($edition['bottom_file'])):?>
                            <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'poject' . DS . $edition['bottom_file']; ?>" target="_blank"><?= $edition['bottom_file']; ?></a>
                            <? endif;?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="edition[id]" value="<?= @$params['id']; ?>" />
                            <input type="hidden" name="edition[project_id]" value="<?= @$params['project_id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>


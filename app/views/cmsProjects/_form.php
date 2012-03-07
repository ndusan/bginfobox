<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/project/<?=$params['project_id'];?>/edition/<?=$edition;?>" method="post" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Edition desc.:</td>
                        <td>
                            <textarea name="edition[desc_sr]" ><?= @$project['desc_en']; ?></textarea>
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
                            <textarea name="edition[desc_en]" ><?= @$project['desc_en']; ?></textarea>
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
                            <input type="file" name="main_image" value="" <?=(empty($project['main_image']) ? 'class="jr"' : '');?>/>
                            <? if(!empty($project['main_image'])):?>
                            <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $project['main_image']; ?>" target="_blank"><?= $project['main_image']; ?></a>
                            <? endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Alt.top image:</td>
                        <td>
                            <input type="file" name="top_image" value="" <?=(empty($project['top_image']) ? 'class="jr"' : '');?>/>
                            <? if(!empty($project['top_image'])):?>
                            <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $project['top_image']; ?>" target="_blank"><?= $project['top_image']; ?></a>
                            <? endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Alt.bottom image:</td>
                        <td>
                            <input type="file" name="bottom_image" value="" <?=(empty($project['bottom_image']) ? 'class="jr"' : '');?>/>
                            <? if(!empty($project['bottom_image'])):?>
                            <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $project['bottom_image']; ?>" target="_blank"><?= $project['bottom_image']; ?></a>
                            <? endif;?>
                        </td>
                    </tr>
                    
                    <? if(!empty($settings['has_file_name'])):?>
                    <tr>
                        <td>Download main file:</td>
                        <td>
                            <input type="file" name="download_main" value=""/>
                            <? if(!empty($download['file_name'])):?>
                            <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'monthly' . DS . $download['file_name']; ?>" target="_blank"><?= $download['file_name']; ?></a>
                            <? endif;?>
                        </td>
                    </tr>
                    <? endif;?>
                    <? if(!empty($settings['has_file_name'])):?>
                    <tr>
                        <td>Download alt.top file:</td>
                        <td>
                            <input type="file" name="download_top" value=""/>
                            <? if(!empty($download['file_name'])):?>
                            <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'monthly' . DS . $download['file_name']; ?>" target="_blank"><?= $download['file_name']; ?></a>
                            <? endif;?>
                        </td>
                    </tr>
                    <? endif;?>
                    <? if(!empty($settings['has_file_name'])):?>
                    <tr>
                        <td>Download alt.bottom file:</td>
                        <td>
                            <input type="file" name="download_bottom" value=""/>
                            <? if(!empty($download['file_name'])):?>
                            <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'monthly' . DS . $download['file_name']; ?>" target="_blank"><?= $download['file_name']; ?></a>
                            <? endif;?>
                        </td>
                    </tr>
                    <? endif;?>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="edition[id]" value="<?= @$params['id']; ?>" />
                            <input type="hidden" name="edition[page_id]" value="<?= @$params['page_id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>


<div class="addContent">

    <form action="/cms/carousel/<?= $carousel['formAction']; ?>" method="post" enctype="multipart/form-data">
        <table cellpadding="0" cellspacing="0" width="100%">

            <tr><td><h3>Add carousel :</h3>
                    <table >
                        <tbody>
                            <tr>
                                <td>Content:</td>
                                <td>
                                    <textarea name="carousel[content_sr]" class="jr"><?=@$carousel['content_sr'];?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Content en:</td>
                                <td>
                                    <textarea name="carousel[content_en]"><?=@$carousel['content_en'];?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Image:</td>
                                <td>
                                    <input type="file" name="image" value="" class="jr"/>
                                    <? if(isset($carousel['id']) && !empty($carousel['image_name'])):?>
                                        <a href="<?=DS.'public'.DS.'uploads'.DS.'carousel'.DS.$carousel['image_name'];?>" target="_blank"><?=$carousel['image_name'];?></a>
                                    <? endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="hidden" name="carousel[id]" value="<?= @$carousel['id']; ?>" />
                                    <input type="submit" value="Submit" name="submit" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </form>
</div>

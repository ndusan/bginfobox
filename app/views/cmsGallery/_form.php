<div class="addContent">

    <form action="/cms/gallery/<?= $gallery['formAction']; ?>" method="post" enctype="multipart/form-data">
        <table cellpadding="0" cellspacing="0" width="100%">

            <tr><td><h3>Add gallery :</h3>
                    <table >
                        <tbody>
                            <tr>
                                <td>Name:</td>
                                <td>
                                    <input type="text" name="gallery[title]" value="<?=@$gallery['title'];?>" class="jr"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Ratio:</td>
                                <td>
                                    <input type="text" name="gallery[ratio]" value="<?=@$gallery['ratio'];?>" class="jr"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Size(in kB):</td>
                                <td>
                                    <input type="text" name="gallery[size]" value="<?=@$gallery['size'];?>" class="jr"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Image:</td>
                                <td>
                                    <input type="file" name="image" value="" class="jr"/>
                                    <? if(isset($gallery['id']) && !empty($gallery['image_name'])):?>
                                        <a href="<?=DS.'public'.DS.'uploads'.DS.'gallery'.DS.$gallery['image_name'];?>" target="_blank"><?=$gallery['image_name'];?></a>
                                    <? endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="hidden" name="gallery[id]" value="<?= @$gallery['id']; ?>" />
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

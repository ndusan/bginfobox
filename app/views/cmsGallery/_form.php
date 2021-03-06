<div class="addContent">
    <form action="/cms/gallery/<?= $gallery['formAction']; ?>" method="post" enctype="multipart/form-data">
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>Name:</td>
                    <td>
                        <input type="text" name="gallery[title]" value="<?= @$gallery['title']; ?>" class="jr"/>
                    </td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td>
                        
                        <? if (isset($gallery['id']) && !empty($gallery['image_name'])): ?>
                            <input type="file" name="image" value=""/>
                            <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'gallery' . DS . $gallery['image_name']; ?>" target="_blank"><?= $gallery['image_name']; ?></a>
                        <? else: ?>
                            <input type="file" name="image" value="" class="jr"/>
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
    </form>
</div>

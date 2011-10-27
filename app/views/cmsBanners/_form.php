<div class="addContent">
    <form action="/cms/banner/<?= $banner['formAction']; ?>" method="post" enctype="multipart/form-data">

        <table cellpaddin="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>Name:</td>
                    <td>
                        <input type="text" name="banner[title]" value="<?= @$banner['title']; ?>" class="jr"/>
                    </td>
                </tr>
                <tr>
                    <td>Link:</td>
                    <td>
                        <input type="text" name="banner[link]" value="<?= @$banner['link']; ?>" class="jr"/>
                    </td>
                </tr>
                <tr>
                    <td><span class="jtooltip" title="Maximum image width 200px">Image:</span></td>
                    <td>
                        <? if (isset($banner['id']) && !empty($banner['image_name'])): ?>
                            <input type="file" name="image" value=""/>
                            <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'banner' . DS . $banner['image_name']; ?>" target="_blank"><?= $banner['image_name']; ?></a>
                        <? else: ?>
                            <input type="file" name="image" value="" class="jr"/>
                        <? endif; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="hidden" name="banner[id]" value="<?= @$banner['id']; ?>" />
                        <input type="submit" value="Submit" name="submit" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

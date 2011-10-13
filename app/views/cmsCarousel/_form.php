<ul class="addTop">
    <li><a href="/cms/carousel">Carousel</a></li>
    <li><h3>/ Add carousel</h3></li>
</ul>
<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/carousel/<?= $carousel['formAction']; ?>" method="post" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="carousel[content_sr]" class="jr"><?= @$carousel['content_sr']; ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="carousel[content_en]"><?= @$carousel['content_en']; ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Image:</td>
                        <td>
                            <input type="file" name="image" value="" class="jr"/>
                            <? if (isset($carousel['id']) && !empty($carousel['image_name'])): ?>
                                <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'carousel' . DS . $carousel['image_name']; ?>" target="_blank"><?= $carousel['image_name']; ?></a>
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
    </form>
</div>

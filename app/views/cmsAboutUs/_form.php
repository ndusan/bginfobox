<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/about-us/<?= $aboutus['formAction']; ?>" method="post" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="aboutus[content_sr]" class="jr"><?= @$aboutus['content_sr']; ?></textarea>
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
                            <textarea name="aboutus[content_en]"><?= @$aboutus['content_en']; ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Price PDF:</td>
                        <td>
                            <input type="file" name="image" value="" />
                            <? if (isset($aboutus['id']) && !empty($aboutus['image_name'])): ?>
                                <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'aboutus' . DS . $aboutus['image_name']; ?>" target="_blank"><?= $aboutus['image_name']; ?></a>
                                [<a href="/cms/about-us/delete/image/<?= $aboutus['id']; ?>">Delete</a>]
                            <? endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Agreement:</td>
                        <td>
                            <input type="file" name="doc" value=""/>
                            <? if (isset($aboutus['id']) && !empty($aboutus['doc_name'])): ?>
                                <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'aboutus' . DS . $aboutus['doc_name']; ?>" target="_blank"><?= $aboutus['doc_name']; ?></a>
                                [<a href="/cms/about-us/delete/doc/<?= $aboutus['id']; ?>">Delete</a>]
                            <? endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="aboutus[id]" value="<?= @$aboutus['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>


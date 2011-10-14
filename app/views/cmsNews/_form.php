<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/news/<?= $news['formAction']; ?>" method="post" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="news[title_sr]" value="<?= @$news['title_sr']; ?>" class="jr"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Heading:</td>
                        <td>
                            <input type="text" name="news[heading_sr]" value="<?= @$news['heading_sr']; ?>" class="jr"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="news[content_sr]" class="jr"><?= @$news['content_sr']; ?></textarea>
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
                            <input type="text" name="news[title_en]" value="<?= @$news['title_en']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Heading:</td>
                        <td>
                            <input type="text" name="news[heading_en]" value="<?= @$news['heading_en']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="news[content_en]"><?= @$news['content_en']; ?></textarea>
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
                            <input type="file" name="image" value=""/>
                            <? if (isset($news['id']) && !empty($news['image_name'])): ?>
                                <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'news' . DS . $news['image_name']; ?>" target="_blank"><?= $news['image_name']; ?></a>
                                [<a href="/cms/news/delete/image/<?= $news['id']; ?>">Delete</a>]
                            <? endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="news[id]" value="<?= @$news['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>


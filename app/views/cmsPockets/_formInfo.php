<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/pockets/<?= $city['formAction']; ?>/info" method="post" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="info[title_sr]" value="<?= @$info['title_sr']; ?>" class="jr"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="info[content_sr]" class="jr"><?= @$info['content_sr']; ?></textarea>
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
                            <input type="text" name="info[title_en]" value="<?= @$info['title_en']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <input type="text" name="info[content_en]" value="<?= @$info['content_en']; ?>"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="info[id]" value="<?= @$info['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>


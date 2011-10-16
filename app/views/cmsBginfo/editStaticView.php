<ul class="addTop">
    <li><a href="/cms/bginfo">Pocket pages</a></li>
    <li><h3>/ Edit about content</h3></li>
</ul>
<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/bginfo/edit/<?= $params['page_id']; ?>/static" method="post" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="static[content_sr]" class="jr"><?= @$static['content_sr']; ?></textarea>
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
                            <textarea name="static[content_en]"><?= @$static['content_en']; ?></textarea>
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
                            <input type="hidden" name="static[page_id]" value="<?= $params['page_id']; ?>" />
                            <input type="hidden" name="static[id]" value="<?= $static['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>


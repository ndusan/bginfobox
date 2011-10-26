<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/event/<?= $event['formAction']; ?>" method="post" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="event[title_sr]" value="<?= @$event['title_sr']; ?>" class="jr"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="event[content_sr]" class="jr"><?= @$event['content_sr']; ?></textarea>
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
                            <input type="text" name="event[title_en]" value="<?= @$event['title_en']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="event[content_en]"><?= @$event['content_en']; ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Date start:</td>
                        <td>
                            <input type="text" name="event[date_start]" value="<?= @$html->convertDate($event['date_start']); ?>" class="jr datepicker"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Date end:</td>
                        <td>
                            <input type="text" name="event[date_end]" value="<?= @$html->convertDate($event['date_end']); ?>" class="jr datepicker"/>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Maximum image width 530px">Image:</span></td>
                        <td>
                            <input type="file" name="image" value=""/>
                            <? if (isset($event['id']) && !empty($event['image_name'])): ?>
                                <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'event' . DS . $event['image_name']; ?>" target="_blank"><?= $event['image_name']; ?></a>
                                [<a href="/cms/event/delete/image/<?= $event['id']; ?>">Delete</a>]
                            <? endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="event[id]" value="<?= @$event['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>

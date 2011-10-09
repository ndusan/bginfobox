<div class="addContent">

    <form action="/cms/event/<?= $event['formAction']; ?>" method="post" enctype="multipart/form-data">
        <table cellpadding="0" cellspacing="0" width="100%">

            <tr><td><h3>Add event :</h3>
                    <table >
                        <tbody>
                            <tr>
                                <td>Title:</td>
                                <td>
                                    <input type="text" name="event[title_sr]" value="<?=@$event['title_sr'];?>" class="jr"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Content:</td>
                                <td>
                                    <textarea name="event[content_sr]" class="jr"><?=@$event['content_sr'];?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Title en:</td>
                                <td>
                                    <input type="text" name="event[title_en]" value="<?=@$event['title_en'];?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Content en:</td>
                                <td>
                                    <textarea name="event[content_en]"><?=@$event['content_en'];?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Date start:</td>
                                <td>
                                    <input type="text" name="event[date_start]" value="<?=@$event['date_start'];?>" class="jr datepicker"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Date end:</td>
                                <td>
                                    <input type="text" name="event[date_end]" value="<?=@$event['date_end'];?>" class="jr datepicker"/>
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
                </td>
            </tr>
        </table>
    </form>
</div>

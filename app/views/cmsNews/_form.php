<div class="addContent">

    <form action="/cms/news/<?= $news['formAction']; ?>" method="post" enctype="multipart/form-data">
        <table cellpadding="0" cellspacing="0" width="100%">

            <tr><td><h3>Add news :</h3>
                    <table >
                        <tbody>
                            <tr>
                                <td>Title:</td>
                                <td>
                                    <input type="text" name="news[title_sr]" value="<?=@$news['title_sr'];?>" class="jr"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Heading:</td>
                                <td>
                                    <input type="text" name="news[heading_sr]" value="<?=@$news['heading_sr'];?>" class="jr"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Content:</td>
                                <td>
                                    <textarea name="news[content_sr]" class="jr"><?=@$news['content_sr'];?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Title en:</td>
                                <td>
                                    <input type="text" name="news[title_en]" value="<?=@$news['title_en'];?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Heading:</td>
                                <td>
                                    <input type="text" name="news[heading_en]" value="<?=@$news['heading_en'];?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>Content en:</td>
                                <td>
                                    <textarea name="news[content_en]"><?=@$news['content_en'];?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Image:</td>
                                <td>
                                    <input type="file" name="image" value=""/>
                                    <? if(isset($news['id']) && !empty($news['image_name'])):?>
                                        <a href="<?=DS.'public'.DS.'uploads'.DS.'news'.DS.$news['image_name'];?>" target="_blank"><?=$news['image_name'];?></a>
                                        [<a href="/cms/news/delete/image/<?=$news['id'];?>">Delete</a>]
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
                </td>
            </tr>
        </table>
    </form>
</div>

<div class="tabs">
    <form action="/cms/pockets/<?= $city['formAction']; ?>/city" method="post" enctype="multipart/form-data">
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="city[title]" value="<?= @$city['title']; ?>" class="jr"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Link:</td>
                        <td>
                            <input type="text" name="city[link]" value="<?= @$city['link']; ?>" class="jr"/>
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
                            <input type="hidden" name="city[id]" value="<?= @$city['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>


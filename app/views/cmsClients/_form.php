<div class="tabs">
    <form action="/cms/clients/<?= $client['formAction']; ?>" method="post" enctype="multipart/form-data">
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="client[title]" value="<?= @$client['title']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Additional info:</td>
                        <td>
                            <textarea name="" rows="4" cols="20"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Connection:</td>
                        <td>
                            <ul class="listing">
                                <li>
                                    <table cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" name="client[purpose][client]" value="client" />
                                                </th>
                                                <th><h3>Client</h3></th>
                                        </tr>


                                        <? if (!empty($staticCollection)): ?>
                                            <? foreach ($staticCollection as $static): ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="client[static][<?= $static['id']; ?>]" <?= (!empty($static['checked']) ? 'checked="checked"' : '') ?> value="<?= $static['id']; ?>" />
                                                    </td>
                                                    <td>
                                                        <label><?= $static['title']; ?></label>
                                                    </td>
                                                </tr>
                                            <? endforeach; ?>
                                        <? endif; ?>


                                        <? if (!empty($dynamicCollection)): ?>

                                            <? foreach ($dynamicCollection as $dynamic): ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="client[dynamic][<?= $dynamic['id']; ?>" <?= (!empty($dymamic['client_id']) ? 'checked="checked"' : '') ?> value="<?= $dynamic['id']; ?>" />
                                                    </td>
                                                    <td>
                                                        <label><?= $dynamic['title']; ?></label>
                                                    </td>
                                                </tr>
                                            <? endforeach; ?>
                                        <? endif; ?> 

                                        </tbody>
                                    </table>
                                </li>

                                <li>
                                    <table cellpadding="0" cellspacing="0">
                                        <tbody> 
                                            <tr>
                                                <th> 
                                                    <input type="checkbox" name="client[purpose][distributor]" value="distributor" />
                                                </th>
                                                <th><h3>Distributor</h3></th>
                                        </tr>
                                        <? if (!empty($staticCollection)): ?>
                                            <? foreach ($staticCollection as $static): ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="client[static][<?= $static['id']; ?>]" <?= (!empty($static['checked']) ? 'checked="checked"' : '') ?> value="<?= $static['id']; ?>" />
                                                    </td>
                                                    <td>
                                                        <label><?= $static['title']; ?></label>
                                                    </td>
                                                </tr>
                                            <? endforeach; ?>
                                        <? endif; ?>
                                        <? if (!empty($dynamicCollection)): ?>
                                            <? foreach ($dynamicCollection as $dynamic): ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="client[dynamic][<?= $dynamic['id']; ?>" <?= (!empty($dymamic['client_id']) ? 'checked="checked"' : '') ?> value="<?= $dynamic['id']; ?>" />
                                                    </td>
                                                    <td>
                                                        <label><?= $dynamic['title']; ?></label>
                                                    </td>
                                                </tr>
                                            <? endforeach; ?>
                                        <? endif; ?> 
                                        </tbody>
                                    </table>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="client[id]" value="<?= @$client['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>


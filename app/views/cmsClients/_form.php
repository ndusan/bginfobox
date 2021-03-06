<div class="tabs">
    <? if (!empty($tree)): ?>
        <form action="/cms/clients/<?= $client['formAction']; ?>" method="post" enctype="multipart/form-data">
            <div class="addContent">
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>Title:</td>
                            <td>
                                <input type="text" name="client[title]" value="<?= @$client['title']; ?>" class="jr"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>
                                <input type="text" name="client[address]" value="<?= @$client['address']; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Telephone:</td>
                            <td>
                                <input type="text" name="client[phone]" value="<?= @$client['phone']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Website:</td>
                            <td>
                                <input type="text" name="client[website]" value="<?= @$client['website']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>E-mail:</td>
                            <td>
                                <input type="text" name="client[email]" value="<?= @$client['email']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Paid Info:</td>
                            <td>
                                <textarea name="client[paid_info]" rows="4" cols="20"><?= @$client['paid_info']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Navigation:</td>
                            <td>
                                <select name="client[navigation]">
                                    <? if (!empty($tree)): ?>
                                        <? foreach ($tree as $t): ?>
                                            <?
                                            if ($t['id'] == $client['navigation_id'])
                                                $sel = 'selected="selected"';
                                            else
                                                $sel = '';
                                            ?>
                                            <option value="<?= $t['id']; ?>" <?= $sel; ?>><?= $t['breadcrumb']; ?></option>
                                        <? endforeach; ?>
                                    <? endif; ?>
                                </select>
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
                                                        <input type="checkbox" id="jstatic" name="client[purpose][client]" value="1" />
                                                    </th>
                                                    <th><h3>Client</h3></th>
                                            </tr>
                                            <? if (!empty($staticCollection)): ?>
                                                <? foreach ($staticCollection as $static): ?>
                                                    <? if ($static['id'] > 1 && $static['id'] < 4): ?>
                                                        <tr>
                                                            <td>
                                                                <input class="jstatic" id="client_static_<?= $static['id']; ?>" type="checkbox" name="client[static][<?= $static['id']; ?>]" <?= (!empty($static['client_id']) && $static['client_id'] == $client['id'] && $client['type_client'] ? 'checked="checked"' : '') ?> value="<?= $static['id']; ?>" />
                                                            </td>
                                                            <td>
                                                                <label for="client_static_<?= $static['id']; ?>"><?= $static['title']; ?></label>
                                                            </td>
                                                        </tr>
                                                    <? endif; ?>
                                                <? endforeach; ?>
                                                <tr>
                                                    <td>
                                                        <input class="jstatic" id="client_static_all_pockets" type="checkbox" name="client[static][all_pockets]" <?= (!empty($client['all_pockets']) ? 'checked="checked"' : ''); ?> value="1" />
                                                    </td>
                                                    <td>
                                                        <label for="client_static_all_pockets">All in your pocket</label>
                                                    </td>
                                                </tr>
                                            <? endif; ?>
                                            </tbody>
                                        </table>
                                    </li>

                                    <li>
                                        <table cellpadding="0" cellspacing="0">
                                            <tbody> 
                                                <tr>
                                                    <th> 
                                                        <input type="checkbox" id="jdynamic" name="client[purpose][distributor]" value="1" />
                                                    </th>
                                                    <th><h3>Distributor</h3></th>
                                            </tr>
                                            <? if (!empty($staticCollection)): ?>
                                                <? foreach ($staticCollection as $static): ?>
                                                    <? if ($static['id'] < 4): ?>
                                                        <tr>
                                                            <td>
                                                                <input class="jdynamic" id="client_dynamic_<?= $static['id']; ?>" type="checkbox" name="client[dynamic][<?= $static['id']; ?>]" <?= (!empty($static['client_id']) && $static['client_id'] == $client['id'] && $client['type_distributor'] ? 'checked="checked"' : '') ?> value="<?= $static['id']; ?>" />
                                                            </td>
                                                            <td>
                                                                <label for="client_dynamic_<?= $static['id']; ?>"><?= $static['title']; ?></label>
                                                            </td>
                                                        </tr>
                                                    <? endif; ?>
                                                <? endforeach; ?>
                                            <? endif; ?>
                                            <? if (!empty($dynamicCollection)): ?>
                                                <? foreach ($dynamicCollection as $dynamic): ?>
                                                    <tr>
                                                        <td>
                                                            <input class="jdynamic" type="checkbox" id="client_dynamic_<?= $dynamic['id']; ?>" name="client[dynamic][<?= $dynamic['id']; ?>]" <?= (!empty($dynamic['client_id']) && $dynamic['client_id'] == $client['id'] && $client['type_distributor'] ? 'checked="checked"' : '') ?> value="<?= $dynamic['id']; ?>" />
                                                        </td>
                                                        <td>
                                                            <label for="client_dynamic_<?= $dynamic['id']; ?>"><?= $dynamic['title']; ?></label>
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
                                                    <th width="10"> 
                                                        <input type="checkbox" name="client[paid]" id="client_paid" value="1" <?= (@$client['paid'] ? 'checked="checked"' : ''); ?> />
                                                    </th>
                                                    <th>
                                            <h3>Paid</h3>
                                            </th>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <label>From :</label><br/>
                                                    <input type="text" class="datepicker" <?= (@$client['paid'] ? '' : 'disabled="disabled"') ?> name="client[date_start]" id="client_date_start" value="<?= @$html->convertDate($client['date_start']); ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <label>To :</label><br/>
                                                    <input type="text" class="datepicker" <?= (@$client['paid'] ? '' : 'disabled="disabled"') ?> name="client[date_end]" id="client_date_end" value="<?= @$html->convertDate($client['date_end']); ?>" />
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="jtooltip" title="Image resized to 70x70px">Logo:</span></td>
                            <td>
                                <input type="file" name="image" value=""/>
                                <? if (isset($client['id']) && !empty($client['image_name'])): ?>
                                    <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'clients' . DS . $client['image_name']; ?>" target="_blank"><?= $client['image_name']; ?></a>
                                    [<a href="/cms/clients/delete/image/<?= $client['id']; ?>" class='jw'>Delete</a>]
                                <? endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="jtooltip" title="Image resized to 150x150px">IPaid Logo:</span></td>
                            <td>
                                <input type="file" name="image2" value=""/>
                                <? if (isset($client['id']) && !empty($client['paid_image_name'])): ?>
                                    <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'clients' . DS . $client['paid_image_name']; ?>" target="_blank"><?= $client['paid_image_name']; ?></a>
                                    [<a href="/cms/clients/delete/paid-image/<?= $client['id']; ?>" class='jw'>Delete</a>]
                                <? endif; ?>
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
    <? else: ?>
        <div class="noResults">
            Please, set client navigation first!
        </div>
    <? endif; ?>
</div>


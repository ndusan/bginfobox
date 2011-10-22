<div class="mainBig">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?= $_t['our-clients.title'][$params['lang']]; ?></h1>
        </div>
        <? if (!empty($clientCollection)): ?>
            <table cellpadding="0" cellpadding="0" width="100%">
                <thead>
                    <tr>
                        <th><?= $_t['client.label'][$params['lang']]; ?></th>
                        <? foreach ($pageCollection as $p): ?>
                            <th width="49"><?= $p['title']; ?></th>
                        <? endforeach; ?>
                        <th width="49">In your pockets</th>
                    </tr>
                </thead>
                <tbody>
                    <? foreach ($clientCollection as $c): ?>
                        <tr>
                            <td>
                                <div class="client">
                                    <span class="img"><img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" /></span>
                                    <ul class="clientInfo">
                                        <li>
                                            <h4><?= $c['title']; ?></h4>
                                            <!-- Address -->
                                            <?= (!empty($c['address']) ? $_t['client.address.label'][$params['lang']] . ': ' . $c['address'] . '<br/>' : ''); ?>
                                        </li>
                                        <li>
                                            <!-- Phone -->
                                            <b>Tel :</b> <?= (!empty($c['phone']) ? $_t['client.phone.label'][$params['lang']] . ': ' . $c['phone'] . '<br/>' : ''); ?>
                                            <!-- Email -->
                                            <b>Email :</b> <?= (!empty($c['email']) ? $_t['client.email.label'][$params['lang']] . ': ' . $c['email'] . '<br/>' : ''); ?>
                                            <!-- Website -->
                                            <?= (!empty($c['website']) ? $_t['client.website.label'][$params['lang']] . ': ' . $c['website'] : ''); ?>
                                        </li>
                                    </ul>
                                </div>
                                <? $array = explode(',', $c['page_id']); ?>
                            </td>
                            <? foreach ($pageCollection as $p): ?>

                                <td align="center"><? if (!empty($array) && in_array($p['id'], $array)): ?><img width="33" height="34" src="<?= IMAGE_PATH . 'yes.png'; ?>" /><? endif; ?></td>
                            <? endforeach; ?>
                            <td align="center"><? if ($c['all_pockets']): ?><img width="33" height="34" src="<?= IMAGE_PATH . 'yes.png'; ?>" /><? endif; ?></th>
                        </tr>
                    <? endforeach; ?>
                </tbody>
            </table>
        <? else: ?>
            <div class="noResults">
                No clients
            </div>
        <? endif; ?>
    </div>
</div>
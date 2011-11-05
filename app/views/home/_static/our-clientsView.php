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
                        <? if($p['id'] == 1 || $p['id'] == 4) continue;?>
                            <th width="49"><?= $p['title']; ?></th>
                        <? endforeach; ?>
                        <th width="49">In Your Pocket</th>
                    </tr>
                </thead>
                <tbody>
                    <? foreach ($clientCollection as $c): ?>
                        <tr>
                            <td>
                                <div class="client">
                                    <span class="img">
                                        <? if(!empty($c['image_name'])):?>
                                        <img src="<?=(DS.'public'.DS.'uploads'.DS.'clients'.DS.'thumb-'.$c['image_name']); ?>" />
                                        <? else: ?>
                                        <img src="<?=(DS.'public'.DS.'images'.DS.'noLogo.jpg'); ?>" />
                                        <? endif;?>
                                    </span>
                                    <ul class="clientInfo">
                                        <li>
                                            <h4><?= $c['title']; ?></h4>
                                            <!-- Address -->
                                            <?= (!empty($c['address']) ? '<b>'.$_t['client.address.label'][$params['lang']] . '</b>: ' . $c['address'] . '<br/>' : ''); ?>
                                        </li>
                                        <li>
                                            <!-- Phone -->
                                            <?= (!empty($c['phone']) ? '<b>'.$_t['client.phone.label'][$params['lang']] . '</b>: ' . $c['phone'] . '<br/>' : ''); ?>
                                            <!-- Email -->
                                            <?= (!empty($c['email']) ? '<b>'.$_t['client.email.label'][$params['lang']] . '</b>: ' . $c['email'] . '<br/>' : ''); ?>
                                            <!-- Website -->
                                            <?= (!empty($c['website']) ? '<b>'.$_t['client.website.label'][$params['lang']] . '</b>: ' . $c['website'] : ''); ?>
                                        </li>
                                    </ul>
                                </div>
                                <? $array = explode(',', $c['page_id']); ?>
                            </td>
                            <? foreach ($pageCollection as $p): ?>
                            <? if($p['id'] == 1 || $p['id'] == 4) continue;?>
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
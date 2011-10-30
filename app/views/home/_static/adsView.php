<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?=$_t['menu.ads'][$params['lang']];?></h1>
        </div>
        <div class="ads">
            <? if (!empty($sent)): ?>
                <? if ('success' == $sent): ?>
                    <?=$_t['ads-sent.ok'][$params['lang']];?>
                <? else: ?>
                    <?=$_t['ads-sent.error'][$params['lang']];?>
                <? endif; ?>
            <? endif; ?>
            <ul class="boxExtra">
                <? if(!empty($pricelist['doc_name'])):?>
                <li class="icoDoc">
                    <a href="<?=(DS.'public'.DS.'uploads'.DS.'aboutus'.DS.$pricelist['doc_name']);?>" target="_blank">
                        <?=$_t['advertising.declaration'][$params['lang']];?>
                    </a>
                </li>
                <? endif;?>
            </ul>
            <div class="adsForm">
                <form action="<?= DS . $params['lang'] . DS . 'ads'; ?>" method="post">
                    <table cellpadding="0" cellspacing="0" width="0">
                        <tr>
                            <td align="right">
                                <label for="form_title"><?=$_t['advertising.company'][$params['lang']];?></label>
                            </td>
                            <td>
                                <input type="text" name="form[company]" id="form_company" class="jr" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="form_company"><?=$_t['advertising.activity'][$params['lang']];?></label>
                            </td>
                            <td>
                                <input type="text" name="form[occupation]" id="form_occupation" class="jr" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b><?=$_t['advertising.label'][$params['lang']];?>:</b>
                            </td>
                        </tr>
                        <? if(!empty($pages)):?>
                        <? foreach($pages as $p):?>
                        <tr>
                            <td align="right">
                                <input id="form_<?=$p['id'];?>" type="checkbox" name="form[pages][]" value="<?=$p['title'];?>" />
                            </td>
                            <td>
                                <label for="form_<?=$p['id'];?>"><?=$p['title'];?></label>
                            </td>
                        </tr>
                        <? endforeach;?>
                        <? endif; ?>
                        <tr>
                            <td align="right">
                                <label for="form_contact"><?=$_t['advertising.contact'][$params['lang']];?></label>
                            </td>
                            <td>
                                <input type="text" name="form[contact]" id="form_contact" class="jr" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="form_email">Email</label>
                            </td>
                            <td>
                                <input type="text" name="form[email]" id="form_email" class="jr" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="form_phone"><?=$_t['advertising.phone'][$params['lang']];?></label>
                            </td>
                            <td>
                                <input type="text" name="form[phone]" id="form_phone" class="jr" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="top">
                                <label for="form_message"><?=$_t['advertising.message'][$params['lang']];?></label>
                            </td>
                            <td>
                                <textarea name="form[message]" id="form_message" rows="4" cols="20"></textarea>
                            </td>
                        </tr>
                        <tr align="right">
                            <td colspan="2"><input type="submit" name="submit" value="posalji" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH.'home'.DS.'_static'.DS.'_banners.php'; ?>
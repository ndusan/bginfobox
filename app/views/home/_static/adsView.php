<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1>Oglasite se</h1>
        </div>
        <div class="ads">
            <? if (!empty($params['sent'])): ?>
                <? if ('success' == $params['sent']): ?>
                    Sent ok!
                <? else: ?>
                    Error in sending
                <? endif; ?>
            <? endif; ?>
            <ul class="boxExtra">
                <li class="icoDoc"><a href="#">Preuzmi deklaraciju o oglashavanju</a></li>
                <li class="infoExtra">
                    <p>dodatne informacije o ovome shto je levod esno</p>
                </li>
            </ul>
            <div class="adsForm">
                <form action="<?= DS . $params['lang'] . DS . 'contact'; ?>">
                    <table cellpadding="0" cellspacing="0" width="0">
                        <tr>
                            <td align="right">
                                <label for="form_title">Naziv firme</label>
                            </td>
                            <td>
                                <input type="text" name="form[company]" id="form_company" class="jr" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="form_company">Delatnost</label>
                            </td>
                            <td>
                                <input type="text" name="form[occupation]" id="form_occupation" class="jr" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>Zelim da se reklamiram u:</b>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input id="form_bginfobox" type="checkbox" name="form[field][bginfobox]" value="Bg Info Box" />
                            </td>
                            <td>
                                <label for="form_bginfobox">Bg Info Box</label>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input id="form_bginfomap" type="checkbox" name="form[field][bginfomap]" value="Bg Info Map" />
                            </td>
                            <td>
                                <label for="form_bginfomap">Bg Info Map</label>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input id="form_bginfonightmap" type="checkbox" name="form[field][bginfonightmap]" value="Bg Info Night Map" />
                            </td>
                            <td>
                                <label for="form_bginfonightmap">Bg Info Night Map</label>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input id="form_belgradeinyourpocket" type="checkbox" name="form[field][belgradeinyourpocket]" value="Belgrade in your pocket" />
                            </td>
                            <td>
                                <label for="form_belgradeinyourpocket">Belgrade in your pocket</label>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input id="form_novisadinyourpocket" type="checkbox" name="form[filed][novisadinyourpocket]" value="Novi Sad in your pocket" />
                            </td>
                            <td>
                                <label for="form_novisadinyourpocket">Novi Sad in your pocket</label>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input id="form_nisinyourpocket" type="checkbox" name="form[filed][nisinyourpocket]" value="Nis in your pocket" />
                            </td>
                            <td>
                                <label for="form_nisinyourpocket">Nis in your pocket</label>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="form_contact">Kontakt osoba</label>
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
                                <label for="form_phone">Telefon</label>
                            </td>
                            <td>
                                <input type="text" name="form[phone]" id="form_phone" class="jr" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="top">
                                <label for="form_message">Poruka</label>
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
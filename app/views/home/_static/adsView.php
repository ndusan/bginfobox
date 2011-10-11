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
                                <input type="text" name="form[title]" id="form_name" class="jr" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="form_name">Delatnost</label>
                            </td>
                            <td>
                                <input type="text" name="form[name]" id="form_name" class="jr" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp;
                            </td>
                            <td>
                                <b>Zelim da se reklamiram u</b>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input type="checkbox" name="" value="ON" />
                            </td>
                            <td>
                                <label for="form_name">Bg Info Box</label>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input type="checkbox" name="" value="ON" />
                            </td>
                            <td>
                                <label for="form_name">Bg Info Map</label>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input type="checkbox" name="" value="ON" />
                            </td>
                            <td>
                                <label for="form_name">Bg Info Night Map</label>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input type="checkbox" name="" value="ON" />
                            </td>
                            <td>
                                <label for="form_name">Belgrade in your pocket</label>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input type="checkbox" name="" value="ON" />
                            </td>
                            <td>
                                <label for="form_name">Novi Sad in your pocket</label>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input type="checkbox" name="" value="ON" />
                            </td>
                            <td>
                                <label for="form_name">Nis in your pocket</label>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="form_company">Kontakt osoba</label>
                            </td>
                            <td>
                                <input type="text" name="form[company]" id="form_company" class="jr" value="" />
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
                                <textarea name="form[message]" id="form_message" class="jr" rows="4" cols="20"></textarea>
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
<? include_once '_banners.php';?>
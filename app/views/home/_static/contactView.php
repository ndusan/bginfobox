<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1>Kontakt</h1>
        </div>
        <div class="contact">
            <div class="contactInfo">
                <p>
                    Nam adipiscing, lacus id congue auctor, sem augue sodales nisl, nec egestas quam lorem et odio. Nulla facilisi.
                </p>
            </div>
            <? if(!empty($params['sent'])):?>
                <? if('success' == $params['sent']):?>
                Sent ok!
                <? else: ?>
                Error in sending
                <? endif;?>
            <? endif;?>
            <div class="contactForm">
                <form action="<?=DS.$params['lang'].DS.'contact';?>">
                <table cellpadding="0" cellspacing="0" width="0">
                    <tr>
                        <td align="right">
                            <label for="form_title">Naslov poruke</label>
                        </td>
                        <td>
                            <input type="text" name="form[title]" id="form_name" class="jr" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="form_name">Ime i prezime</label>
                        </td>
                        <td>
                            <input type="text" name="form[name]" id="form_name" class="jr" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="form_company">Firma</label>
                        </td>
                        <td>
                            <input type="text" name="form[company]" id="form_company" class="jr" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="form_email">Kontakt email</label>
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
        <div class="contactMap">
            mapa ide ovde
        </div>
    </div>
    <div class="mainBox">
        <div class="boxTitle">
            <span><img src="<?= IMAGE_PATH . 'icoMap.png'; ?>" /></span>
            <h1>Vodic kroz Beograd</h1>
        </div>
        <div class="boxContent">
            <p>
                Proin congue varius commodo. Aliquam vel luctus tellus. Nunc tempor, lectus eu scelerisque vestibulum, urna leo vehicula justo, vel mollis orci purus sit amet augue. Vestibulum porta malesuada quam. Proin blandit velit sit amet elit euismod pretium. Suspendisse elit elit, consectetur et condimentum a, blandit quis sem. Morbi ut justo tortor. 
            </p>
        </div>
    </div>
</div>
<? include_once '_banners.php';?>
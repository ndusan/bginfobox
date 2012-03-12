<ul class="addTop">
    <li><a href="/cms" >Dashboard</a></li>
    <li><h3>/ Settings :</h3></li>
</ul>
<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Language settings</a></li>
        <li><a href="#fragment-2">About CMS</a></li>
    </ul>
    <form method="post" action="/cms/settings" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Enabled language :</td>
                    </tr>
                    <tr>
                        <td>
                            <ul class="listing">
                                <li>
                                    <table cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th colspan="2"><h3>Serbian</h3></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="" value="" checked="checked" disabled="disabled" />
                                                <input type="hidden" value="sr" name="settings[lang_sr]" />
                                            </td>
                                            <td>Always active</td>
                                        </tr>  
                                    </table>
                                </li>
                                <li>
                                    <table cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th colspan="2"><h3>English</h3></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="lang_sr" type="checkbox" name="settings[lang_en]" <?= @(!empty($en) ? 'checked="checked"' : ''); ?> value="en" />
                                            </td>
                                            <td><label for="lang_sr">Activate</label></td>
                                        </tr>
                                    </table>
                                </li>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            <p>Welcome to Smartfish CMS<br /><br /></p>
            
            <ul>
                
                <li>CMS and website created by:<br /><br /></li>
                <li>Dušan Novaković</li>
                <li>Emil Ajduk</li>
                <li>Katarina Đurić Jovanović<br /><br /></li>
            </ul>
            <ul>
                <li>Net Svet, Belgrade</li>
                <li>info@net-svet.com<br /><br /></li>
                            
            </ul>
            <p><a href="<?=DS.'public'.DS.'cms-smartfish-manual.pdf';?>" target="_blank">CMS user manual download</a></p>
            
            
        </div>
    </form>
</div>
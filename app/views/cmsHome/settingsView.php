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
                        <td colspan="4">Enabled language :</td>
                    </tr>
                    <tr class="trSpec">
                        <td>
                            <input type="checkbox" name="" value="" checked="checked" disabled="disabled" />
                            <input type="hidden" value="sr" name="settings[lang_sr]" />
                        </td>
                        <td>Serbian (always active)</td>
                    </tr>
                    <tr class="trSpec">
                        <td>
                            <input id="lang_sr" type="checkbox" name="settings[lang_en]" <?=@(!empty($en)?'checked="checked"':'');?> value="en" />
                        </td>
                        <td><label for="lang_sr">English</label></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            Welcome to CMS
        </div>
    </form>
    </div>
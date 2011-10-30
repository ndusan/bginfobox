<div class="headerLogin">
    <h1><span><img src="<?= IMAGE_PATH . 'Smartfish.png'; ?>" /></span>BG Info Box</h1>
</div>

<div class="login">
    <form action="<?= DS . 'login'; ?>" method="post">
        <table width="100%" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td align="right" valign="middle">
                        <label for="login_email">Email:</label>
                    </td>
                    <td>
                        <input name="login[email]" type="text" class="jr" id="login_email" value="" />
                    </td>
                </tr>
                <tr>
                    <td align="right" valign="middle">
                        <label for="login_password">Password:</label>
                    </td>
                    <td>
                        <input name="login[password]" type="password" class="jr" id="login_password" value="" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" value="Login" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
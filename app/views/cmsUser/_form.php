<div class="addContent">
    <form action="/cms/user/<?= $user['formAction']; ?>" method="post">
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>First name</td>
                    <td>
                        <input type="text" class="jr" name="user[firstname]" value="<?= $user['firstname']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Last name</td>
                    <td>
                        <input type="text" class="jr" name="user[lastname]" value="<?= $user['lastname']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <? if ($this->_action == 'add'): ?>
                            <input type="text" class="jr" name="user[email]" value="" />
                        <? else: ?>
                            <strong><?= $user['email']; ?></strong>
                            <input type="hidden" name="user[email]" value="<?= $user['email']; ?>" />
                        <? endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="text" name="user[password]" value="" <?= ($this->_action == 'add' ? 'class="jr"' : ''); ?> />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <input type="hidden" name="user[id]" value="<?= $user['id']; ?>" />
                        <input type="submit" value="Submit" name="submit" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

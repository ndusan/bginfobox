<h3>Add user :</h3>
<div class="addContent">
    <form action="/cms/user/<?= $user['formAction']; ?>" method="post">
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <th>First name</th>
                    <td>
                        <input type="text" class="jr" name="user[firstname]" value="<?= $user['firstname']; ?>" />
                    </td>
                </tr>
                <tr>
                    <th>Last name</th>
                    <td>
                        <input type="text" class="jr" name="user[lastname]" value="<?= $user['lastname']; ?>" />
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
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
                    <th>Password</th>
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

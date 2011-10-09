<ul class="addTop">
    <li><a href="/cms/user/add" >Add new user</a></li>
</ul>


<? if (!empty($userCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>First name</th> 
                <th>Last name</th> 
                <th>Email</th> 
                <th>Created</th> 
                <th width="100px">Action</th> 
            </tr> 
        </thead> 
        <tbody> 
            <? foreach ($userCollection as $user): ?>
                <tr> 
                    <td><?= $user['firstname']; ?></td> 
                    <td><?= $user['lastname']; ?></td> 
                    <td><?= $user['email']; ?></td> 
                    <td><?= $user['created'] ?></td> 
                    <td>
                        <!--Edit-->
                        <a href="/cms/user/edit/<?= $user['id']; ?>"><img src="#" /></a>
                        <!--Delete-->
                        <? if ($user['id'] !== $_SESSION['cms']['id']): ?>
                            <a href="/cms/user/delete/<?= $user['id']; ?>" class="jw"><img src="#" /></a>
                        <? endif; ?>
                    </td> 
                </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>First name</th>
                <th>Last name</th> 
                <th>Email</th> 
                <th>Created</th> 
                <th>Action</th> 
            </tr> 
        </tfoot> 
    </tbody> 
    </table> 
<? else: ?>
    <div class="noResults">
        There are no results on this page.
    </div>
<? endif; ?>


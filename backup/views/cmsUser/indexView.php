<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/user/add" >Add new user</a></li>
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
                    <td><?= $html->convertDate($user['created'], true); ?></td> 
                    <td align="center">
                        <!--Edit-->
                        <a class="cmsEdit" title="Edit" href="/cms/user/edit/<?= $user['id']; ?>"></a>
                        <!--Delete-->
                        <? if ($user['id'] !== $_SESSION['cms']['id']): ?>
                        <a class="jw cmsDelete" title="Delete" href="/cms/user/delete/<?= $user['id']; ?>" ></a>
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


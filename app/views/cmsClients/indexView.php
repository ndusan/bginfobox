<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/clients/add" >Add new client</a></li>
</ul>


<? if (!empty($clientCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>Title</th>
                <th>Type</th>
                <th>Created</th> 
                <th width="100px">Action</th>
          </tr> 
        </thead> 
        <tbody> 
            <? foreach ($clientCollection as $c): ?>
                <tr> 
                    <td><?=$c['title'];?></td>
                    <td></td>
                    <td><?=$html->convertDate($c['created'], true);?></td>
                    <td align="center">
                        <!--Edit-->
                        <a title="Edit" class="cmsEdit" href="/cms/clients/<?= $c['id']; ?>/edit"></a>
                        <!--Delete-->
                        <a title="Delete" class="jw cmsDelete" href="/cms/clients/<?= $c['id']; ?>/delete"></a>
                    </td> 
          </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>Title</th>
                <th>Type</th>
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


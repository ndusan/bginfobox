<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/event/add" >Add new event</a></li>
</ul>


<? if (!empty($eventsCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>Title</th>
                <th>Created</th> 
                <th width="100px">Action</th>
          </tr> 
        </thead> 
        <tbody> 
            <? foreach ($eventsCollection as $event): ?>
                <tr> 
                    <td><?=$event['title_sr'];?></td>
                    <td><?=$event['created'];?></td>
                    <td align="center">
                        <!--Edit-->
                        <a class="cmsEdit" title="Edit" href="/cms/event/edit/<?= $event['id']; ?>"></a>
                        <!--Delete-->
                        <a class="jw cmsDelete" title="Delete" href="/cms/event/delete/<?= $event['id']; ?>" ></a>
                    </td> 
          </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>Title</th>
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


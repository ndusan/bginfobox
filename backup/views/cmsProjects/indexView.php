<div class="tabs">
    <ul>
        <li><a href="#fragment-0">All projects</a></li>
        <? foreach($projects as $tab):?> 
        <li><a href="#fragment-<?=$tab['id'];?>"><?=$tab['title_sr'];?></a></li>
        <? endforeach; ?>
    </ul>
    <div id="fragment-0" class="addContent1">
        <ul class="addTop">
            <li><a class="cmsAdd" href="/cms/project/add" >Add new project</a></li>
        </ul>
        <? if (!empty($projects)): ?>
        <table cellpadding="0" cellspacing="0" border="0" class="display dataTable"> 
            <thead> 
                <tr> 
                    <th>Title</th>
                    <th>Created</th>
                    <th width="100px">Action</th>
              </tr> 
            </thead> 
            <tbody> 
                <? foreach ($projects as $project): ?>
                    <tr> 
                        <td><?=$project['title_sr'];?></td>
                        <td><?=$html->convertDate($project['created'],true);?></td>
                        <td align="center" valign="top">
                            <!--Edit-->
                            <a class="cmsEdit" title="Edit" href="/cms/project/edit/<?=$project['id'];?>"></a>
                            <!--Delete-->
                            <a class="jw cmsDelete" title="Delete" href="/cms/project/delete/<?=$project['id']; ?>" ></a>
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
    </div>
    <? foreach($projects as $tab):?>
    <div id="fragment-<?=$tab['id'];?>" class="addContent1">
        <ul class="addTop">
            <li><a class="cmsAdd" href="/cms/project/<?=$tab['id'];?>/edition/add" >New edition</a></li>
        </ul>
        <!-- editions -->
        <? if (!empty($editionCollection[$tab['id']])): ?>
        <table cellpadding="0" cellspacing="0" border="0" class="display dataTable"> 
            <thead> 
                <tr> 
                    <th>Title</th>
                    <th>Created</th>
                    <th width="100px">Action</th>
              </tr> 
            </thead> 
            <tbody> 
                <? foreach ($editionCollection[$tab['id']] as $e): ?>
                    <tr> 
                        <td><?=$e['desc_sr'];?></td>
                        <td><?=$html->convertDate($e['created'],true);?></td>
                        <td align="center" valign="top">
                            <!--Edit-->
                            <a class="cmsEdit" title="Edit" href="/cms/project/<?=$e['project_id'];?>/edition/edit/<?= $e['id']; ?>"></a>
                            <!--Delete-->
                            <a class="jw cmsDelete" title="Delete" href="/cms/project/<?=$e['project_id'];?>/edition/delete/<?= $e['id']; ?>" ></a>
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
    </div>
    <? endforeach;?>
</div>

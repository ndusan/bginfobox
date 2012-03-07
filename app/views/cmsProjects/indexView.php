<div class="tabs">
    <ul>
        <li><a href="#fragment-1">All projects</a></li>
        <? $i=2;?>
        <? foreach($projects as $tab):?> 
        <li><a href="#fragment-<?=$i++;?>"><?=$tab['title_sr'];?></a></li>
        <? endforeach; ?>
    </ul>
    <div id="fragment-1" class="addContent1">
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
    <? $i=2;?>
    <? foreach($projects as $tab):?>
    <div id="fragment-<?=$i;?>" class="addContent1">
        <ul class="addTop">
            <li><a class="cmsAdd" href="/cms/project/<?=$tab['id'];?>/edition/add" >New edition</a></li>
        </ul>
        <!-- editions -->
        <? if (!empty($editionCollection[$tab['id']])): ?>
        <table cellpadding="0" cellspacing="0" border="0" class="display dataTable"> 
            <thead> 
                <tr> 
                    <th>Title</th>
                    <th width="100px">Action</th>
              </tr> 
            </thead> 
            <tbody> 
                <? foreach ($editionCollection[$tab['id']] as $e): ?>
                    <tr> 
                        <td><?=$e['title'];?></td>
                        <td align="center" valign="top">
                            <!--Edit-->
                            <a class="cmsEdit" title="Edit" href="/cms/monthly/edit/<?=$e['id'];?>/<?= $e['page_id']; ?>/edition"></a>
                            <!--Delete-->
                            <a class="jw cmsDelete" title="Delete" href="/cms/monthly/delete/<?=$e['id'];?>/<?= $e['page_id']; ?>/edition" ></a>
                        </td> 
              </tr> 
                <? endforeach; ?>
            <tfoot> 
                <tr> 
                    <th>Title</th>
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

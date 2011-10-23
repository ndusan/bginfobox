<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Info Navigation</a></li>
        <li><a href="#fragment-2">Bg Info List</a></li>
    </ul>
    <div id="fragment-1" class="addContent1">
        <ul class="addTop">
            <li><a class="cmsAdd" href="/cms/info/node/add" >Add new node</a></li>
        </ul>
        
        <? if (!empty($nodeCollection)): ?>
            <table cellpadding="0" cellspacing="0" border="0" class="display dataTable"> 
                <thead> 
                    <tr> 
                        <th>Title</th>
                        <th>Breadcrumb</th>
                        <th>Type</th>
                        <th>Created</th> 
                        <th width="100px">Action</th>
                  </tr> 
                </thead> 
                <tbody> 
                    <? foreach ($nodeCollection as $n): ?>
                        <tr> 
                            <td><?=$n['title_sr'];?></td>
                            <td><?=$n['breadcrumb'];?></td>
                            <td><?=$n['type'];?></td>
                            <td><?=$html->convertDate($n['created'], true);?></td>
                            <td align="center">
                                <!--Edit-->
                                <a title="Edit" class="cmsEdit" href="/cms/info/node/<?= $n['id']; ?>/edit"></a>
                                <!--Delete-->
                                <a title="Delete" class="jw cmsDelete" href="/cms/info/node/<?= $n['id']; ?>/delete"></a>
                            </td> 
                  </tr> 
                    <? endforeach; ?>
                <tfoot> 
                    <tr> 
                        <th>Title</th>
                        <th>Breadcrumb</th>
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
    </div>
    
    <div id="fragment-2" class="addContent1">
        <ul class="addTop">
            <li><a class="cmsAdd" href="/cms/info/add" >Add new Bg Info</a></li>
        </ul>

        <? if (!empty($infoCollection)): ?>
            <table cellpadding="0" cellspacing="0" border="0" class="display dataTable"> 
                <thead> 
                    <tr> 
                        <th>Title</th>
                        <th>Created</th> 
                        <th width="100px">Action</th>
                  </tr> 
                </thead> 
                <tbody> 
                    <? foreach ($infoCollection as $c): ?>
                        <tr> 
                            <td><?=$c['title_sr'];?></td>
                            <td><?=$html->convertDate($c['created'], true);?></td>
                            <td align="center">
                                <!--Edit-->
                                <a title="Edit" class="cmsEdit" href="/cms/info/<?= $c['id']; ?>/edit"></a>
                                <!--Delete-->
                                <a title="Delete" class="jw cmsDelete" href="/cms/info/<?= $c['id']; ?>/delete"></a>
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
</div>

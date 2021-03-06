<ul class="addTop">
    <li><a class="cmsEdit1" href="/cms/pockets/edit/static" >Edit about content</a></li>
</ul>
<div class="tabs">
    <ul>
        <? $i=1;?>
        <? if(!empty($tabs)):?>
        <? foreach($tabs as $tab):?>
        <li><a href="#fragment-<?=$i++;?>"><?=$tab['title'];?></a></li>
        <? endforeach;?>
        <? endif;?>
        <li><a title="View Cities" href="#fragment-<?=$i++;?>"><span class="cmsEdit"></span></a></li>
        <li><a title="View Info Notes"href="#fragment-<?=$i++;?>"><span class="cmsInfo"></span></a></li>
    </ul>
    
    <? $i=1;?>
    <? if(!empty($tabs)):?>
    <? foreach($tabs as $tab):?>
    <div id="fragment-<?=$i;?>" class="addContent1">
        <ul class="addTop">
            <li><a class="cmsAdd" href="/cms/pockets/add/<?=$tab['id'];?>/edition?fragment=<?=$i++;?>" >New edition</a></li>
        </ul>
        <!-- editions -->
        <? if (!empty($editionCollection[$tab['id']])): ?>
        <table cellpadding="0" cellspacing="0" border="0" class="display dataTable"> 
            <thead> 
                <tr>
                    <th>Title</th>
                    <th width="100">Action</th>
              </tr> 
            </thead> 
            <tbody> 
                <? foreach ($editionCollection[$tab['id']] as $e): ?>
                    <tr> 
                        <td><?=$e['title'];?></td>
                        <td align="center" valign="top">
                            <!--Edit-->
                            <a class="cmsEdit" title="Edit" href="/cms/pockets/edit/<?=$e['id'];?>/<?= $e['page_id']; ?>/edition"></a>
                            <!--Delete-->
                            <a class="jw cmsDelete" title="Delete" href="/cms/pockets/delete/<?=$e['id'];?>/<?= $e['page_id']; ?>/edition" ></a>
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
    <? endif;?>
    
    
    <div id="fragment-<?=$i++;?>" class="addContent1">
        <ul class="addTop">
            <li><a class="cmsAdd" href="/cms/pockets/add/city" >Add new city</a></li>
        </ul>
        
        <!-- List of all pocktes -->
        <? if (!empty($tabs)): ?>
            <table cellpadding="0" cellspacing="0" border="0" class="display dataTableSortable"> 
                <thead> 
                    <tr> 
                        <th>
                            <input type="hidden" id="cityTab" value="<?=($i-1);?>"/>
                            Title
                        </th>
                        <th>Link</th>
                        <th>Created</th> 
                        <th width="100px">Action</th>
                  </tr> 
                </thead> 
                <tbody> 
                    <? $pos = 1;?>
                    <? foreach ($tabs as $t): ?>
                        <tr> 
                            <td>
                                <input type="hidden" class="jpos-<?=$pos++;?>" value="<?=$t['position'];?>" id="t-<?=$t['id'];?>" />
                                <?=$t['title'];?>
                            </td>
                            <td><?=$t['link'];?></td>
                            <td><?=$html->convertDate($t['created'], true);?></td>
                            <td align="center">
                                <!--Edit-->
                                <a title="Edit" class="cmsEdit" href="/cms/pockets/edit/<?= $t['id']; ?>/city"></a>
                                <!--Delete-->
                                <a title="Delete" class="jw cmsDelete" href="/cms/pockets/delete/<?= $t['id']; ?>/city"></a>
                            </td> 
                  </tr> 
                    <? endforeach; ?>
                <tfoot> 
                    <tr> 
                        <th>Title</th>
                        <th>Link</th>
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
    <div id="fragment-<?=$i++;?>" class="addContent1">
        <ul class="addTop">
            <li><a class="cmsAdd" href="/cms/pockets/add/info" >Add new info</a></li>
        </ul>
        <!-- List of all info -->
        <? if (!empty($infoCollection)): ?>
            <table cellpadding="0" cellspacing="0" border="0" class="display dataTable"> 
                <thead> 
                    <tr> 
                        <th>Title (serbian)</th>
                        <th>Content (serbian)</th>
                        <th>Created</th> 
                        <th width="100px">Action</th>
                  </tr> 
                </thead> 
                <tbody> 
                    <? foreach ($infoCollection as $i): ?>
                        <tr> 
                            <td><?=$i['title_sr'];?></td>
                            <td><?=$i['content_sr'];?></td>
                            <td><?=$html->convertDate($i['created'], true);?></td>
                            <td align="center">
                                <!--Edit-->
                                <a title="Edit" class="cmsEdit" href="/cms/pockets/edit/<?= $i['id']; ?>/info"></a>
                                <!--Delete-->
                                <a title="Delete" class="jw cmsDelete" href="/cms/pockets/delete/<?= $i['id']; ?>/info"></a>
                            </td> 
                  </tr> 
                    <? endforeach; ?>
                <tfoot> 
                    <tr> 
                        <th>Title (serbian)</th>
                        <th>Content (serbian)</th>
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
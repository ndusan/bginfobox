<? if(!empty($tabs)):?>
<ul class="addTop">
    <li><a class="cmsEdit1" href="/cms/pockets/edit/static" >Edit about content</a></li>
</ul>
<? endif;?>
<div class="tabs">
    <ul>
        <? if(!empty($tabs)):?>
        <? foreach($tabs as $tab):?>
        <li><a href="#fragment-<?=$i=$tab['id'];?>"><?=$tab['title'];?></a></li>
        <? endforeach;?>
        <? endif;?>
        <li><a href="#fragment-<?=++$i;?>"><span class="cmsEdit"></span></a></li>
    </ul>
    <? if(!empty($tabs)):?>
    <? foreach($tabs as $tab):?>
    <div id="fragment-<?=$i=$tab['id'];?>" class="addContent1">
        <ul class="addTop">
            <li><a class="cmsAdd" href="/cms/pockets/add/<?=$tab['id'];?>/edition" >New editions</a></li>
        </ul>
        tabela
    </div>
    <? endforeach;?>
    <? endif;?>
    
    <div id="fragment-<?=++$i;?>" class="addContent1">
        <ul class="addTop">
            <li><a class="cmsAdd" href="/cms/pockets/add/city" >Add new city</a></li>
        </ul>
        
        <!-- List of all pocktes -->
        <? if (!empty($tabs)): ?>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
                <thead> 
                    <tr> 
                        <th>Title</th>
                        <th>Link</th>
                        <th>Created</th> 
                        <th width="100px">Action</th>
                  </tr> 
                </thead> 
                <tbody> 
                    <? foreach ($tabs as $t): ?>
                        <tr> 
                            <td><?=$t['title'];?></td>
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
</div>
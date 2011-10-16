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
        <li><a href="#fragment-<?=($j=$i+1);?>"><span class="cmsEdit"></span></a></li>
    </ul>
    <? if(!empty($tabs)):?>
    <? $i=1;?>
    <? foreach($tabs as $tab):?>
    <div id="fragment-<?=$i++;?>" class="addContent1">
        <ul class="addTop">
            <li><a class="cmsAdd" href="/cms/pockets/edition" >Manage editions</a></li>
        </ul>
        tabela
    </div>
    <? endforeach;?>
    <? endif;?>
    
    <div id="fragment-<?=$j;?>" class="addContent1">
        <ul class="addTop">
            <li><a class="cmsAdd" href="/cms/pockets/add/edition" >Add new city</a></li>
        </ul>
        
        <!-- List of all pocktes -->
        <? if (!empty($pocketCollection)): ?>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
                <thead> 
                    <tr> 
                        <th>Title</th>
                        <th>Heading</th>
                        <th>Created</th> 
                        <th width="100px">Action</th>
                  </tr> 
                </thead> 
                <tbody> 
                    <? foreach ($pocketCollection as $p): ?>
                        <tr> 
                            <td><?=$news['title_sr'];?></td>
                            <td><?=$news['heading_sr'];?></td>
                            <td><?=$html->convertDate($news['created'], true);?></td>
                            <td align="center">
                                <!--Edit-->
                                <a title="Edit" class="cmsEdit" href="/cms/news/edit/<?= $news['id']; ?>"></a>
                                <!--Delete-->
                                <a title="Delete" class="jw cmsDelete" href="/cms/news/delete/<?= $news['id']; ?>"></a>
                            </td> 
                  </tr> 
                    <? endforeach; ?>
                <tfoot> 
                    <tr> 
                        <th>Title</th>
                        <th>Heading</th>
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
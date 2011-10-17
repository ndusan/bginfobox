<? if(!empty($tabs)):?>
<div class="tabs">
    <ul>
        <? $i=1;?>
        <? foreach($tabs as $tab):?> 
        <li><a href="#fragment-<?=$i++;?>"><?=$tab['title'];?></a></li>
        <? endforeach; ?>
    </ul>
    <? $i=1;?>
    <? foreach($tabs as $tab):?>
    <div id="fragment-<?=$i++;?>" class="addContent1">
        <ul class="addTop">
            <li><a class="cmsEdit1" href="/cms/bginfo/edit/<?=$tab['id'];?>/static" >Edit about content</a></li>
            <li><a class="cmsAdd" href="/cms/bginfo/add/<?=$tab['id'];?>/edition" >New edition</a></li>
        </ul>
        <!-- editions -->
        <? if (!empty($editionCollection[$tab['id']])): ?>
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
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
                            <a class="cmsEdit" title="Edit" href="/cms/bginfo/edit/<?=$e['id'];?>/<?= $e['page_id']; ?>/edition"></a>
                            <!--Delete-->
                            <a class="jw cmsDelete" title="Delete" href="/cms/bginfo/delete/<?=$e['id'];?>/<?= $e['page_id']; ?>/edition" ></a>
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
<? endif;?>

<ul class="addTop">
    <li><a href="/cms/carousel/add" >Add new carousel</a></li>
</ul>


<? if (!empty($carouselCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>Content</th>
                <th>Created</th> 
                <th width="100px">Action</th>
          </tr> 
        </thead> 
        <tbody> 
            <? foreach ($carouselCollection as $carousel): ?>
                <tr> 
                    <td><?=$carousel['content_sr'];?></td>
                    <td><?=$carousel['created'];?></td>
                    <td align="center" valign="top">
                        <!--Edit-->
                        <a href="/cms/carousel/edit/<?= $carousel['id']; ?>"><img src="#" /></a>
                        <!--Delete-->
                        <a href="/cms/carousel/delete/<?= $carousel['id']; ?>" class="jw"><img src="#" /></a>
                    </td> 
          </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>Content</th>
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

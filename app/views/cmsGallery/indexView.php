<ul class="addTop">
    <li><a href="/cms/gallery/add" >Add new gallery</a></li>
</ul>


<? if (!empty($galleryCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>Title</th>
                <th>Created</th> 
                <th width="100px">Action</th>
          </tr> 
        </thead> 
        <tbody> 
            <? foreach ($galleryCollection as $gallery): ?>
                <tr> 
                    <td><?=$gallery['title'];?></td>
                    <td><?=$gallery['created'];?></td>
                    <td align="center" valign="top">
                        <!--Edit-->
                        <a href="/cms/gallery/edit/<?= $gallery['id']; ?>"><img src="#" /></a>
                        <!--Delete-->
                        <a href="/cms/gallery/delete/<?= $gallery['id']; ?>" class="jw"><img src="#" /></a>
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


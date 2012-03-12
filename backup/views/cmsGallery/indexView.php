<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/gallery/add" >Add new image</a></li>
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
                    <td><?=$html->convertDate($gallery['created'], true);?></td>
                    <td align="center" valign="top">
                        <!--Edit-->
                        <a class="cmsEdit" title="Edit" href="/cms/gallery/edit/<?= $gallery['id']; ?>"></a>
                        <!--Delete-->
                        <a class="jw cmsDelete" title="Delete" href="/cms/gallery/delete/<?= $gallery['id']; ?>" ></a>
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


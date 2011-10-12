<ul class="addTop">
    <li><a href="/cms/banner/add" >Add new banner</a></li>
</ul>


<? if (!empty($bannerCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>Title</th>
                <th>Created</th> 
                <th width="100px">Action</th>
          </tr> 
        </thead> 
        <tbody> 
            <? foreach ($bannerCollection as $banner): ?>
                <tr> 
                    <td><?=$banner['title'];?></td>
                    <td><?=$banner['created'];?></td>
                    <td align="center" valign="top">
                        <!--Edit-->
                        <a class="cmsEdit" title="Edit" href="/cms/banner/edit/<?= $banner['id']; ?>"></a>
                        <!--Delete-->
                        <a class="jw cmsDelete" title="Delete" href="/cms/banner/delete/<?= $banner['id']; ?>" ></a>
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


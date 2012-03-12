<? if (empty($aboutusCollection)): ?>
<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/about-us/add" >Edit about us</a></li>
</ul>
<? endif; ?>

<? if (!empty($aboutusCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>Content</th> 
                <th width="100px">Action</th>
          </tr> 
        </thead> 
        <tbody> 
            <? foreach ($aboutusCollection as $aboutus): ?>
                <tr> 
                    <td><?=$aboutus['content_sr'];?></td>
                    <td align="center">
                        <!--Edit-->
                        <a title="Edit" class="cmsEdit" href="/cms/about-us/edit/<?= $aboutus['id']; ?>"></a>
                        <!--Delete-->
                        <a title="Delete" class="jw cmsDelete" href="/cms/about-us/delete/<?= $aboutus['id']; ?>"></a>
                    </td> 
          </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>Content</th> 
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


<ul class="addTop">
    <li><a href="/cms/news/add" >Add new news</a></li>
</ul>


<? if (!empty($newsCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>Title</th>
                <th>Heading</th>
                <th>Content</th> 
                <th>Created</th> 
                <th width="100px">Action</th>
          </tr> 
        </thead> 
        <tbody> 
            <? foreach ($newsCollection as $news): ?>
                <tr> 
                    <td><?=$news['title_sr'];?></td>
                    <td><?=$news['heading_sr'];?></td>
                    <td><?=$news['content_sr'];?></td> 
                    <td><?=$news['created'];?></td>
                    <td align="center" valign="top">
                        <!--Edit-->
                        <a href="/cms/news/edit/<?= $news['id']; ?>"><img src="#" /></a>
                        <!--Delete-->
                        <a href="/cms/news/delete/<?= $news['id']; ?>" class="jw"><img src="#" /></a>
                    </td> 
          </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>Title</th>
                <th>Heading</th>
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


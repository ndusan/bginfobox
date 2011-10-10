<div class="main">
    <div class="mainBox">
        <? if (!empty($newsCollection)): ?>
            <!-- All news -->
            <div class="boxTitle">
                <h2>Sve vesti</h2>
            </div>
            <ul class="boxExtra">
                <li><a href="#">Oktobar</a></li>
                <li><a href="#">Septembar</a></li>
            </ul>
            <ul class="newsAll">
                <? foreach ($newsCollection as $n): ?>
                    <li>
                        <h2><?= $n['title_' . $params['lang']]; ?></h2>
                        <span class="date"><?= $n['created']; ?></span> 
                        <p>Heading: <?= $n['heading_' . $params['lang']]; ?></p>
                        <a href="<?= DS . $params['lang'] . DS . 'news' . DS . $n['id'] . DS . urlencode(str_replace(array('š','đ','č','ć','ž','Š','Đ','Č','Ć','Ž'),array('s','d','c','c','z','s','d','c','c','z'),$n['title_' . $params['lang']])); ?>">
                            <?= $_t['news.read_more'][$params['lang']]; ?>...
                        </a>
                    </li>
                <? endforeach; ?>
            </ul>

        <? elseif (!empty($news)): ?>
            <!-- selected news -->
            <div class="newsOne wys">
                <h2><?= $news['title_' . $params['lang']]; ?> </h2>
                <span class="date"><?= $news['created']; ?></span>
                <p><?= $news['heading_' . $params['lang']]; ?></p>
                <? if (!empty($news['image_name'])): ?>
                <img src="<?= DS. 'public' . DS . 'uploads' . DS . 'news' . DS . $news['image_name']; ?>" alt="" title="" width="100" height="100"/>
                <? endif; ?>
                <?= $news['content_' . $params['lang']]; ?>
            </div>
        <? endif; ?>
    </div>
</div>
<div class="sidebarR">
    <ul class="banners">
        <li>
            <img src="<?= IMAGE_PATH . 'baner.jpg'; ?>" />
        </li>
        <li>
            <img src="<?= IMAGE_PATH . 'baner.jpg'; ?>" />
        </li>
        <li>
            <img src="<?= IMAGE_PATH . 'baner.jpg'; ?>" />
        </li>
        <li>
            <img src="<?= IMAGE_PATH . 'baner.jpg'; ?>" />
        </li>
    </ul>
</div>
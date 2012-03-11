<div class="main">
    <div class="mainBox">
        <? if (!empty($newsCollection)): ?>
            <!-- All news -->
            <div class="boxTitle">
                <h2><?=$_t['news.all_news'][$params['lang']];?></h2>
            </div>
            <? if($newsCollectionPerMonth):?>
            <ul class="boxExtra">
                <? foreach ($newsCollectionPerMonth as $key=>$date):?>
                <li><a href="<?=DS.$params['lang'].DS.'vesti?date='.$key;?>"><?=$_t['months'][$params['lang']][$date['month']].' '.$date['year'];?></a></li>
                <? endforeach; ?>
            </ul>
            <? endif;?>
            <ul class="newsAll">
                <? foreach ($newsCollection as $n): ?>
                    <li>
                        <h2><?= $n['title_' . $params['lang']]; ?></h2>
                        <span class="date"><?= @$html->convertDate($n['created']); ?></span> 
                        <p><?= $n['heading_' . $params['lang']]; ?></p>
                        <a href="<?= DS . $params['lang'] . DS . 'vesti' . DS . $n['id'] . DS . urlencode(str_replace(array('š','đ','č','ć','ž','Š','Đ','Č','Ć','Ž','?','!',',','.','&',':','(',')','[',']','%','#','\'','"','=','*'),array('s','d','c','c','z','s','d','c','c','z','','','','','','','','','','','','','','','',''),$n['title_' . $params['lang']])); ?>">
                            <?= $_t['news.read_more'][$params['lang']]; ?>...
                        </a>
                    </li>
                <? endforeach; ?>
            </ul>

        <? elseif (!empty($news)): ?>
            <!-- selected news -->
            <div class="newsOne">
                <ul class="social">
                <!--FB button -->
                <li><?= $html->fb($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]); ?></li>
                <!-- Twitter button -->
                <li><?= $html->twitter(array('url'=> $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"], 'text'=> $news['title_' . $params['lang']]));?></li>
                </ul>
                <span class="date"><?= @$html->convertDate($news['created']); ?></span>
                <h2><?= $news['title_' . $params['lang']]; ?> </h2>
                <p class="highlight"><?= $news['heading_' . $params['lang']]; ?></p>
                <div class="wys">
                <? if (!empty($news['image_name'])): ?>
                <img src="<?= DS. 'public' . DS . 'uploads' . DS . 'news' . DS . $news['image_name']; ?>" alt="<?= $news['title_' . $params['lang']]; ?>" title="<?= $news['title_' . $params['lang']]; ?>" />
                <? endif; ?>
                <?= $news['content_' . $params['lang']]; ?>
                </div>
            </div>
        <? endif; ?>
    </div>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH.'home'.DS.'_static'.DS.'_banners.php'; ?>
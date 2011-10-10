<div class="main">
    <div class="mainBox">
        <? if (!empty($calendarCollection)): ?>
            <!-- All calendar -->
            <div class="boxTitle">
                <h2>Sva desavanja</h2>
            </div>

            <ul class="calendarAll">
                <? foreach ($calendarCollection as $n): ?>
                    <li>
                        <h2><?= $n['title_' . $params['lang']]; ?></h2>
                        <span class="date"><?= $n['created']; ?></span> 
                        <a href="<?= DS . $params['lang'] . DS . 'calendar' . DS . $n['date_start'] . DS . $n['id'] . DS . urlencode(str_replace(array('š','đ','č','ć','ž','Š','Đ','Č','Ć','Ž'),array('s','d','c','c','z','s','d','c','c','z'),$n['title_' . $params['lang']])); ?>">
                            <?= $_t['cal.read_more'][$params['lang']]; ?>...
                        </a>
                    </li>
                <? endforeach; ?>
            </ul>

        <? elseif (!empty($calendar)): ?>
            <!-- selected calendar -->
            <div class="calendarOne wys">
                <h2><?= $calendar['title_' . $params['lang']]; ?> </h2>
                <span class="date"><?= $calendar['created']; ?></span>
                <? if (!empty($calendar['image_name'])): ?>
                <img src="<?= DS. 'public' . DS . 'uploads' . DS . 'calendar' . DS . $calendar['image_name']; ?>" alt="" title="" width="100" height="100" />
                <? endif; ?>
                <?= $calendar['content_' . $params['lang']]; ?>
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
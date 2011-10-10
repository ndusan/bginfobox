<div class="main">
    <div class="mainBox">
        <? if (!empty($calendarCollection)): ?>
            <!-- All calendar -->
            <div class="boxTitle">
                <h2>Sve vesti</h2>
            </div>

            <ul class="calendarAll">
                <? foreach ($calendarCollection as $n): ?>
                    <li>
                        <h2><?= $n['title_' . $params['lang']]; ?></h2>
                        <span class="date"><?= $n['created']; ?></span> 
                        <a href="<?= DS . $params['lang'] . DS . 'calendar' . DS . $n['date_start'] . DS . $n['id'] . DS . $n['title_' . $params['lang']]; ?>">
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
                    <?= UPLOAD_PATH . 'calendar' . DS . $calendar['image_name']; ?>
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
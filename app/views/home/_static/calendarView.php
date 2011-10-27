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
                        <span class="date"><?= @$html->convertDate($n['date_start']); ?></span> 
                        <a href="<?= DS . $params['lang'] . DS . 'calendar' . DS . $n['date_start'] . DS . $n['id'] . DS . urlencode(str_replace(array('š', 'đ', 'č', 'ć', 'ž', 'Š', 'Đ', 'Č', 'Ć', 'Ž', '?', '!', ',', '.', '&', ':', '(', ')', '[', ']', '%', '#', '\'', '"', '=', '*'), array('s', 'd', 'c', 'c', 'z', 's', 'd', 'c', 'c', 'z', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''), $n['title_' . $params['lang']])); ?>">
                            <?= $_t['cal.read_more'][$params['lang']]; ?>...
                        </a>
                    </li>
                <? endforeach; ?>
            </ul>

        <? elseif (!empty($calendar)): ?>
            <!-- selected calendar -->
            <div class="calendarOne wys">
                <span class="date"><?= @$html->convertDate($calendar['date_start']); ?></span>
                <h2><?= $calendar['title_' . $params['lang']]; ?></h2>
                <? if (!empty($calendar['image_name'])): ?>
                    <img src="<?= DS . 'public' . DS . 'uploads' . DS . 'events' . DS . $calendar['image_name']; ?>" alt="<?= $calendar['title_' . $params['lang']]; ?>" title="<?= $calendar['title_' . $params['lang']]; ?>"/>
                <? endif; ?>
                <?= $calendar['content_' . $params['lang']]; ?>
                <ul class="social">
                    <!--FB button -->
                    <li><?= $html->fb($_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]); ?></li>
                    <!-- Twitter button -->
                    <li><?= $html->twitter(array('url' => $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"], 'text' => $calendar['title_' . $params['lang']])); ?></li>
                </ul>
            </div>
        <? endif; ?>
    </div>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_banners.php'; ?>
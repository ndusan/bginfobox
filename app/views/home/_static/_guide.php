<div class="mainBox">
    <div class="boxTitle">
        <span><img src="<?= IMAGE_PATH . 'icoMap.png'; ?>" /></span>
        <h1><?= $_t['guide.label'][$params['lang']]; ?></h1>
    </div>
    <div class="boxContent">
        <p>
            Proin congue varius commodo. Aliquam vel luctus tellus. Nunc tempor, lectus eu scelerisque vestibulum, urna leo vehicula justo, vel mollis orci purus sit amet augue. Vestibulum porta malesuada quam. Proin blandit velit sit amet elit euismod pretium. Suspendisse elit elit, consectetur et condimentum a, blandit quis sem. Morbi ut justo tortor. 
        </p>
    </div>
    <div class="boxTitle1">
        <h2><?= $_t['guide-highlights.label'][$params['lang']]; ?></h2>
    </div>
    <div class="boxContent">
        <div class="boxIntro wys">
            <span class="img">
                <? if (!empty($s['image_name'])): ?>
                    <img src="<?= (DS . 'public' . DS . 'uploads' . DS . 'info' . DS . $s['image_name']); ?>">
                <? endif; ?>
            </span>
            <h4><?= $s['title_' . $params['lang']]; ?></h4>
            <p><?= $s['content_' . $params['lang']]; ?></p>
        </div>
    </div>
</div>
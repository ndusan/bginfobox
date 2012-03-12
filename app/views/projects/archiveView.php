<div class="main">
    
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?= $project['title_' . $params['lang']]; ?></h1>
        </div>
        <!-- Older editions -->
        <? if (!empty($olderEditions)): ?>
            <ul class="archiveAll">
                <li>
                    <ul>
                        <? foreach ($olderEditions as $oe): ?>
                            <li>
                                <a href="<?= (DS . $params['lang'] . DS . 'projekat' . DS.'arhiva' .DS . $oe['project_id'] .'?cid=' . $oe['id']); ?>">
                                    <img width="90" height="134" src="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . 'thumb-' . $oe['main_image']; ?>" />
                                </a>
                            </li>
                        <? endforeach; ?>
                    </ul>
                </li>
            </ul>
        <? endif; ?>
    </div>
    
    
    <!-- Load belgrade guide-->
    <? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_guide.php'; ?>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_banners.php'; ?>
<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?=$project['title_'.$params['lang']];?></h1>
        </div>
        <ul class="galleryAll">
            <li class="first">
                <? if(!empty($edition['main_image'])):?>
                <span>
                    <img width="170" height="240" title="" alt="" src="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . 'thumb-'.$edition['main_image']; ?>" />
                    <a class="zoom lightbox" title="<?= $gc['title_' . $params['lang']]; ?>" href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['main_image']; ?>"></a>
                </span>
                <? if(!empty($edition['main_file'])):?>
                <span class="icoDld">
                    <a target="_blank" href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['main_file']; ?>">preuzmi</a>
                </span>
                <? endif;?>
                <? endif;?>
            </li>
            <li>
                <ul>
                    <li>
                        <? if(!empty($edition['top_image'])):?>
                        <span>
                            <img width="350" height="110" src="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . 'thunb-'.$edition['top_image']; ?>" />
                            <a class="zoom lightbox" title="<?= $gc['title_' . $params['lang']]; ?>" href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['top_image']; ?>"></a>
                        </span>
                        <? if(!empty($edition['top_file'])):?>
                        <span class="icoDld">
                            <a target="_blank" href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['top_file']; ?>">preuzmi</a>
                        </span>
                        <? endif; ?>
                        <? endif; ?>
                    </li>
                    <li>
                        <? if(!empty($edition['bottom_image'])):?>
                        <span>
                            <img width="350" height="110" src="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . 'thumb-'.$edition['bottom_image']; ?>" />
                            <a class="zoom lightbox" title="<?= $gc['title_' . $params['lang']]; ?>" href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['bottom_image']; ?>"></a>
                        </span>
                        <? if(!empty($edition['bottom_file'])):?>
                        <span class="icoDld">
                            <a target="_blank" href="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . $edition['bottom_file']; ?>">preuzmi</a>
                        </span>
                        <? endif;?>
                        <? endif;?>
                    </li>
                </ul>
            </li>
        </ul>
        
        <!-- Older editions -->
        <? if (!empty($olderEditions)):?>
        <ul>
            <? foreach($olderEditions as $oe):?>
            <li>
                <a href="<?= (DS . $params['lang'] . DS . 'projekat' . DS . $oe['project_id'].DS.'gallery?cid='.$oe['id']); ?>">
                    <img width="100" height="100" src="<?= DS . 'public' . DS . 'uploads' . DS . 'project' . DS . 'thumb-'.$oe['main_image']; ?>" />
                </a>
            </li>
            <? endforeach; ?>
        </ul>
        <? endif;?>
    </div>

    <!-- Load belgrade guide-->
    <? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_guide.php'; ?>

</div>

<!-- Load banners -->
<? include_once VIEW_PATH . 'home' . DS . '_static' . DS . '_banners.php'; ?>

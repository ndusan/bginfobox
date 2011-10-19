<div class="main">
    <div class="mainBox">
        <ul class="galleryAll">
            <li>
                <a href="<?= DS . $params['lang'] . DS . 'bginfo-box'.DS.'gallery';?>" >
                    <img title="" width="170" height="240" src=" <?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                </a>
            </li>
            <li>
                <a href="<?= DS . $params['lang'] . DS . 'bginfo-map'.DS.'gallery';?>">
                    <img title="" width="170" height="240" src=" <?= IMAGE_PATH . 'dummy1.jpg'; ?>" /> 
                </a>
            </li>
            <li>
                <a href="<?= DS . $params['lang'] . DS . 'bginfo-night-map'.DS.'gallery';?>">
                    <img title="" width="170" height="240" src=" <?= IMAGE_PATH . 'dummy1.jpg'; ?>" /> 
                </a>
            </li>
            <li>
                <span class="moreInfo"><a href="<?= DS . $params['lang'] . DS . 'bginfo-box';?>">Sta je Bg Info Box?</a></span>
            </li>
            <li>
                <span class="moreInfo"><a href="<?= DS . $params['lang'] . DS . 'bginfo-map';?>">Sta je Bg Info Map?</a></span>
            </li>
            <li>
                <span class="moreInfo"><a href="<?= DS . $params['lang'] . DS . 'bginfo-night-map'?>">Sta je Bg Info Night Map?</a></span>
            </li>
        </ul>
    </div>
    <div class="mainBox">
        <ul class="galleryAll">
            <li>
                <img title="" width="170" height="240" src=" <?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
            </li>
            <li>
                <img title="" width="170" height="240" src=" <?= IMAGE_PATH . 'dummy1.jpg'; ?>" /> 
            </li>
            <li>
                <img title="" width="170" height="240" src=" <?= IMAGE_PATH . 'dummy1.jpg'; ?>" /> 
            </li>
        </ul>
        <div class="boxContent wys">
            <!-- ovo sve  upucava kroz efitor jer ima 1ys klasu -->
            <h2>Saznajte vishe o asdljas</h2>
            <p>asd asd asd asd asd asd <a href="<?= DS . $params['lang'] . DS . 'pockets';?>">link</a>a</p>
        </div>
    </div>
    <div class="mainBox">
        <div class="boxTitle">
            <span><img src="<?= IMAGE_PATH . 'icoMap.png'; ?>" /></span>
            <h1>Vodic kroz Beograd</h1>
        </div>
        <div class="boxContent">
            <p>
                Proin congue varius commodo. Aliquam vel luctus tellus. Nunc tempor, lectus eu scelerisque vestibulum, urna leo vehicula justo, vel mollis orci purus sit amet augue. Vestibulum porta malesuada quam. Proin blandit velit sit amet elit euismod pretium. Suspendisse elit elit, consectetur et condimentum a, blandit quis sem. Morbi ut justo tortor. 
            </p>
        </div>
    </div>
    <div class="mainBox">
        <ul class="galleryAll">
            <li>
                <img title="" width="170" height="100" src=" <?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
            </li>
            <li>
                <img title="" width="170" height="100" src=" <?= IMAGE_PATH . 'dummy1.jpg'; ?>" /> 
            </li>
            <li>
                <img title="" width="170" height="100" src=" <?= IMAGE_PATH . 'dummy1.jpg'; ?>" /> 
            </li>
            <li>
                <span class="moreInfo"><b>Arhiva izdanja</b></span>
            </li>
            <li>
                <span class="moreInfo"><b>Saradnici</b></span>
            </li>
            <li>
                <span class="moreInfo"><b>Galerija</b></span>
            </li>
        </ul>
    </div>
</div>
<? include_once '_static/_banners.php'; ?>
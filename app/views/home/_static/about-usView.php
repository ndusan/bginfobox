<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?=$_t['menu.about-us'][$params['lang']];?></h1>
        </div>
        <div class="boxContent">
            <ul class="boxExtra">
                <li class="icoPdf"><a href="#"><?=$_t['ads.label'][$params['lang']];?></a></li>
                <li class="icoMail"><a href="#"><?=$_t['ads-question.label'][$params['lang']];?>? <span><?=$_t['ads-question.sublabel'][$params['lang']];?></span></a></li>
            </ul>
            <p>
                Proin congue varius commodo. Aliquam vel luctus tellus. Nunc tempor, lectus eu scelerisque vestibulum, urna leo vehicula justo, vel mollis orci purus sit amet augue. Vestibulum porta malesuada quam. Proin blandit velit sit amet elit euismod pretium. Suspendisse elit elit, consectetur et condimentum a, blandit quis sem. Morbi ut justo tortor. 
            </p>
            <p>
                Proin congue varius commodo. Aliquam vel luctus tellus. Nunc tempor, lectus eu scelerisque vestibulum, urna leo vehicula justo, vel mollis orci purus sit amet augue. Vestibulum porta malesuada quam. Proin blandit velit sit amet elit euismod pretium. Suspendisse elit elit, consectetur et condimentum a, blandit quis sem. Morbi ut justo tortor. 
            </p>
        </div>
    </div>
    <!-- Load belgrade guide-->
    <? include_once VIEW_PATH.'home'.DS.'_static'.DS.'_guide.php'; ?>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH.'home'.DS.'_static'.DS.'_banners.php'; ?>
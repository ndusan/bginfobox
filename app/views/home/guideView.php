<div class="main">
    <div class="breadcrumb">
        <? if(!empty($slug['previous'])):?>
        <? $split = explode('/', $slug['previous']);?>
        <? $tmp = array();?>
        <? foreach($split as $s):?>
        <? $tmp[]= $s ;?>
        <a href="<?=(DS.$params['lang'].DS.'guide'.DS.implode('/',$tmp));?>"><?=$slugCollection[$s]['title_'.$params['lang']];?></a> /
        <? endforeach;?>
        <? endif;?>
        <?=$intro['title_'.$params['lang']];?>
    </div>
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?=$intro['title_'.$params['lang']];?></h1>
        </div>
        <div class="boxIntro wys">
            <span class="img">
                <? if($intro['image_name']):?>
                <img src="<?=(DS.'public'.DS.'uploads'.DS.$this->_action.DS.'thumb-'.$intro['image_name']);?>">
                <? endif; ?>
            </span>
            <!-- tekst kroz editor -->
            <p><?=$intro['content_'.$params['lang']];?></p>
        </div>
        <div class="boxTitle1">
            <h2>Posebna ponuda Beograda</h2>
        </div>
        <ul class="adsPaid">
            <li>
                <span class="img"><img src="/public/images/dummy1.jpg"></span>
                <div class="adsPaidInfo">
                    <h4>Hotel Interkontejnertal</h4>
                    <ul>
                        <li> 
                            City Store tehnike - Sarajevska 66, 11000 Beograd
                        </li>
                        <li>
                            <b>Tel :</b> 011 2138391<br>
                            <b>Email :</b> prodaja@tehnomanija.rs<br>
                            www.tehnomanija.rs 
                        </li>
                    </ul>
                    <!-- ovde ide regularan texarea -->
                    <p>Proin congue varius commodo. Aliquam vel luctus tellus. Nunc tempor, lectus eu scelerisque vestibulum, urna leo vehicula justo, vel mollis orci purus sit amet augue. Vestibulum porta malesuada quam. Proin blandit velit sit amet elit euismod pretium. Suspendisse elit elit, consectetur et condimentum a, blandit quis sem. Morbi ut justo tortor.</p>
                </div>
            </li>
            <li>
                <span class="img"><img src="/public/images/dummy1.jpg"></span>
                <div class="adsPaidInfo">
                    <h4>Hotel Hyatt</h4>
                    <ul>
                        <li> 
                            City Store tehnike - Sarajevska 66, 11000 Beograd
                        </li>
                        <li>
                            <b>Tel :</b> 011 2138391<br>
                            <b>Email :</b> prodaja@tehnomanija.rs<br>
                            www.tehnomanija.rs 
                        </li>
                    </ul>
                    <p>Proin congue varius commodo. Aliquam vel luctus tellus. Nunc tempor, lectus eu scelerisque vestibulum, urna leo vehicula justo, vel mollis orci purus sit amet augue. Vestibulum porta malesuada quam. Proin blandit velit sit amet elit euismod pretium. Suspendisse elit elit, consectetur et condimentum a, blandit quis sem. Morbi ut justo tortor.</p>
                </div>
            </li>
            <li>
                <span class="img"><img src="/public/images/dummy1.jpg"></span>
                <div class="adsPaidInfo">
                    <h4>Pekara Pera Zdera</h4>
                    <ul>
                        <li> 
                            City Store tehnike - Sarajevska 66, 11000 Beograd
                        </li>
                        <li>
                            <b>Tel :</b> 011 2138391<br>
                            <b>Email :</b> prodaja@tehnomanija.rs<br>
                            www.tehnomanija.rs 
                        </li>
                    </ul>
                    <p>Proin congue varius commodo. Aliquam vel luctus tellus. Nunc tempor, lectus eu scelerisque vestibulum, urna leo vehicula justo, vel mollis orci purus sit amet augue. Vestibulum porta malesuada quam. Proin blandit velit sit amet elit euismod pretium. Suspendisse elit elit, consectetur et condimentum a, blandit quis sem. Morbi ut justo tortor.</p>
                </div>
            </li>
        </ul>
        <div class="boxTitle1">
            <h2>Spisak hotela</h2>
        </div>
        <div class="adsRegular">
            <table width="100%" cellpadding="0">
                <tbody>
                    <tr>
                        <td>
                            <div class="client">
                                <span class="img"><img src="/public/images/dummy1.jpg"></span>
                                <ul class="clientInfo">
                                    <li>
                                        <h4>Pekara Pera Zdera</h4>
                                        City Store tehnike - Sarajevska 66, 11000 Beograd
                                    </li>
                                    <li>
                                        <b>Tel :</b> 011 2138391<br>
                                        <b>Email :</b> prodaja@tehnomanija.rs<br>
                                        www.tehnomanija.rs 
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="client">
                                <span class="img"><img src="/public/images/dummy1.jpg"></span>
                                <ul class="clientInfo">
                                    <li>
                                        <h4>Pekara Pera Zdera</h4>
                                        City Store tehnike - Sarajevska 66, 11000 Beograd
                                    </li>
                                    <li>
                                        <b>Tel :</b> 011 2138391<br>
                                        <b>Email :</b> prodaja@tehnomanija.rs<br>
                                        www.tehnomanija.rs 
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="client">
                                <span class="img"><img src="/public/images/dummy1.jpg"></span>
                                <ul class="clientInfo">
                                    <li>
                                        <h4>Pekara Pera Zdera</h4>
                                        City Store tehnike - Sarajevska 66, 11000 Beograd
                                    </li>
                                    <li>
                                        <b>Tel :</b> 011 2138391<br>
                                        <b>Email :</b> prodaja@tehnomanija.rs<br>
                                        www.tehnomanija.rs 
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
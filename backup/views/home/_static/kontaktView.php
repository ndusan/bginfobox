<div class="main">
    <div class="mainBox">
        <div class="boxTitle">
            <h1><?=$_t['menu.contact'][$params['lang']];?></h1>
        </div>
        <div class="contact">
            <div class="contactInfo">
                <p>
                    BG Info Box d.o.o.<br/><br/>
                    <?=$_t['contact.address'][$params['lang']];?><br />
                    <?=$_t['contact.city'][$params['lang']];?><br /><br/>
                 </p>
                 <p>
                    <?=$_t['contact.phone'][$params['lang']];?><br />
                    +381 11 4140 965<br />
                    +381 11 4140 970<br/><br/>
                  </p>
                  <p>
                     Fax<br />
                     +381 11 3423 498<br/><br/>
                  </p>
                  <p>
                      E-mail<br />
                      office@bginfobox.rs<br/><br/>
                  </p>
                  <p>
                      Web<br />
                      www.bginfobox.rs<br/><br/>
                  </p>
            </div>
            <? if(!empty($sent)):?>
                <? if('success' == $sent):?>
                <?=$_t['ads-sent.ok'][$params['lang']];?>
                <? else: ?>
                <?=$_t['ads-sent.error'][$params['lang']];?>
                <? endif;?>
            <? endif;?>
            <div class="contactForm">
                <form action="<?=DS.$params['lang'].DS.'kontakt';?>" method="post">
                <table cellpadding="0" cellspacing="0" width="0">
                    <tr>
                        <td align="right">
                            <label for="form_title"><?=$_t['contact.subject'][$params['lang']];?></label>
                        </td>
                        <td>
                            <input type="text" name="form[title]" id="form_name" class="jr" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="form_name"><?=$_t['contact.name'][$params['lang']];?></label>
                        </td>
                        <td>
                            <input type="text" name="form[name]" id="form_name" class="jr" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="form_company"><?=$_t['contact.company'][$params['lang']];?></label>
                        </td>
                        <td>
                            <input type="text" name="form[company]" id="form_company" class="jr" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="form_email"><?=$_t['contact.email'][$params['lang']];?></label>
                        </td>
                        <td>
                            <input type="text" name="form[email]" id="form_email" class="jr" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="form_phone"><?=$_t['contact.phone'][$params['lang']];?></label>
                        </td>
                        <td>
                            <input type="text" name="form[phone]" id="form_phone" class="jr" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right" valign="top">
                            <label for="form_message"><?=$_t['contact.message'][$params['lang']];?></label>
                        </td>
                        <td>
                            <textarea name="form[message]" id="form_message" class="jr" rows="4" cols="20"></textarea>
                        </td>
                    </tr>
                    <tr align="right">
                        <td id="antiSpam"></td>
                        <td>
                           <input type="text" name="form[spam]" id="form_spam" class="jr" value="" /> 
                        </td>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $.ajax({url: '/anti-spam',
                                    type: 'GET',
                                    dataType: 'html',
                                    success: function(data){
                                        if(data){
                                            $('#antiSpam').html('<img src="/anti-spam" />');
                                        }
                                    }
                            });
                        });
                    </script>
                    </tr>
                    <tr align="right">
                        <td colspan="2"><input type="submit" name="submit" value="posalji" /></td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
        <div class="contactMap">
            <iframe width="530" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?vpsrc=0&amp;ctz=-120&amp;ie=UTF8&amp;msa=0&amp;msid=211964069630820333911.0004aff7d06b0026b0210&amp;t=h&amp;ll=44.794353,20.534091&amp;spn=0.002665,0.005686&amp;z=17&amp;output=embed"></iframe><br /><small>View <a href="http://maps.google.com/maps/ms?vpsrc=0&amp;ctz=-120&amp;ie=UTF8&amp;msa=0&amp;msid=211964069630820333911.0004aff7d06b0026b0210&amp;t=h&amp;ll=44.794353,20.534091&amp;spn=0.002665,0.005686&amp;z=17&amp;source=embed" style="color:#0000FF;text-align:left">BG Info Box </a> in a larger map</small>
        </div>
    </div>
</div>
<!-- Load banners -->
<? include_once VIEW_PATH.'home'.DS.'_static'.DS.'_banners.php'; ?>
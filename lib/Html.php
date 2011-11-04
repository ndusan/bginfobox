<?php

/**
 * HTML 
 * @author Dusan Novakovic (ndusan@gmail.com)
 *
 */
class HTML {

    /**
     * Custom made css
     * @param array $array
     * @return string
     */
    function allCustomCss($path) {
        $string = '';
        foreach (glob($path . '*.css') as $fileName) {
            $string .= "<link href='" . DS . $fileName . "' rel='stylesheet' type='text/css' />\n";
        }

        return $string;
    }

    /**
     * Include JS
     * @param $fileName
     * @return string
     */
    function allCustomJs($path) {
        $string = '';
        foreach (glob($path . '*.js') as $fileName) {
            $string .= "<script src='" . DS . $fileName . "' type='text/javascript'></script>\n";
        }

        return $string;
    }

    /**
     * Include CSS
     * @param $fileName
     * @return string
     */
    function css($fileName, $path) {
        $data = "<link href='" . DS . $path . $fileName . ".css' rel='stylesheet' type='text/css'/>\n";

        return $data;
    }

    /**
     * Include JS
     * @param $fileName
     * @return string
     */
    function js($fileName, $path) {
        $data = "<script src='" . DS . $path . $fileName . ".js' type='text/javascript'></script>\n";

        return $data;
    }

    /**
     * Include JS
     * @param $fileName
     * @return string
     */
    function assetsJs($fileName, $path) {
        $data = "<script src='" . DS . $path . $fileName . ".js' type='text/javascript'></script>\n";

        return $data;
    }

    /**
     * Include CSS
     * @param $fileName
     * @return string
     */
    function assetsCss($fileName, $path) {
        $data = "<link href='" . DS . $path . $fileName . ".css' rel='stylesheet' type='text/css'/>\n";

        return $data;
    }

    /**
     * Display message
     * @param String $text
     * @return String
     */
    function msg($text) {

        if (!isset($text) || empty($text)) {

            return false;
        }

        $txt = "";
        switch ($text) {
            //Error
            case 'error':
                $txt = "<div class='error'>" . ERROR_MSG . "</div>";
                break;
            //Success
            case 'success':
                $txt = "<div class='success'>" . SUCCESS_MSG . "</div>";
                break;
            default:
                $txt = "<div class='error'>" . $text . "</div>";
                break;
        }

        return $txt;
    }

    function fb($link=null) {
        if (null == $link)
            return false;

        return '<div class="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) {return;}
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, "script", "facebook-jssdk"));</script>
                    <div class="fb-like" data-href="' . $link . '" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="arial"></div>';
    }
    
    
    function twitter($array){
        
        if(empty($array)) return false;

        $twitterArray = array('url'=> $array['url'],
                              'text'=>$array['text'],
                              'counturl'=>$array['url']);
        
        return '<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
               <a href="https://twitter.com/share?'.http_build_query($twitterArray).'" class="twitter-share-button" target="_blank">Tweet</a>';
    }

    function convertDate($date, $includeTime=false) {
        if (empty($date)) {

            return false;
        }

        //Remove time if exist
        if ($tmp = explode(' ', $date)) {

            $date = $tmp[0];
            $time = $tmp[1];
        }

        $oldDate = explode('-', $date);

        $result = $oldDate[2] . '-' . $oldDate[1] . '-' . $oldDate[0];

        if ($includeTime)
            $result.= ' ' . $tmp[1];

        return $result;
    }

    function getWeather($city_id = 0, $showDays=1, $langs) {
      
        $response = '';
        if (isset($city_id) && !empty($city_id)) {
            try{
                $requestAddress = $city_id;

                //$xml_str = file_get_contents("http://xoap.weather.com/weather/local/" . $requestAddress . "?cc=*&dayf=5&link=xoap&prod=xoap&par=1225844858&key=e874d961c427e609", 0);

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
                curl_setopt($ch, CURLOPT_URL, "http://xoap.weather.com/weather/local/" . $requestAddress . "?cc=*&dayf=5&link=xoap&prod=xoap&par=1225844858&key=e874d961c427e609");

                $xml_str = curl_exec($ch);
                curl_close($ch);

                // Parses XML
                $xml = new SimplexmlElement($xml_str);
                //print_r($xml);
                // Name
                $response.= '<table class="widgWeather" cellspacing="0" cellpading="0" width="100%"><tbody>';
                //Set date
                $date = substr($xml->dayf->lsup, 0, 8);
                $date = explode("/", $date);
                $day = 0;
                $countDays = $showDays;
                foreach ($xml->dayf->day as $item) {
                    if ($item->hi != 'N/A') {
                        $day++;
                        $response.= '<tr><td width="50%" align="center">';
                        $max = round((5 / 9) * ($item->low - 32));
                        $response .= 'min temp: ' . $max . '&deg';
                        $min = round((5 / 9) * ($item->hi - 32));
                        $response.= '</td><td align="center">';
                        $response .= 'max temp: ' . $min . '&deg';
                        $response.= '</tr>';
                        $first = true;
                        $response.= '<tr>';
                        foreach ($item->part as $new) {
                            //Image
                            $response .= '<td align="center">';
                            $response .= '<img src="http://s.imwx.com/v.20100415.153311/img/wxicon/45/' . $new->icon . '.png"/>';
                            $response .= '<label>' . ($first ? $langs['day'] : $langs['evening']) . '</label>';
                            $response.= '</td>';
                            $first = false;
                        }
                        $response .= '</tr>';
                        --$countDays;

                        if ($countDays <= 0)
                            break;
                    }
                }
                $response.= '</tbody>
                                    </table>';

                Cache::set(array('key' => 'weather'.date('Y-m-d'), 'data' => $response));

                return $response;
            }catch(Exception $e){
                
                return 'Error while loading data';
            }
        }
    }

    function getNBS() {

        //Cache data to make things much faster
        if ($output = Cache::get(array('key' => 'currency'.date('Y-m-d')))) {

            return $output;
        } else {
            //Set agent
            ini_set('user_agent', 'Mozilla Firefox');

            //Url
            $part1 = 'http://www.nbs.rs/kursnaListaModul/zaDevize.faces?lang=lat';
            $ch = curl_init();
 
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
            curl_setopt($ch, CURLOPT_URL, $part1);

            $part2 = curl_exec($ch);
            curl_close($ch);
            //$part2 = file_get_contents($part1);
            $address = $part2;
            
            $output = array();

            if (!$part2) {

                return false;
            } else {

                // Evropska unija - EUR
                $valuta = '<td class="tableCell" style="text-align:center;">EUR</td>';
                $value = strpos($address, $valuta);

                $EUR = '';
                for ($i = $value + 221; $i <= $value + 226; $i++)
                    $EUR .= $address{$i};
                $tmp = str_replace('<td class="tableCell" style="text-align:center;">', "", str_replace("</td>", "", $valuta));
                $output[$tmp] = array(
                    'value' => $EUR,
                );

                // Evropska unija - CHF
                $valuta = '<td class="tableCell" style="text-align:center;">CHF</td>';
                $value = strpos($address, $valuta);

                $CHF = '';
                for ($i = $value + 220; $i <= $value + 225; $i++)
                    $CHF .= $address{$i};
                $tmp = str_replace('<td class="tableCell" style="text-align:center;">', "", str_replace("</td>", "", $valuta));
                $output[$tmp] = array(
                    'value' => $CHF,
                );

                // Evropska unija - USD
                $valuta = '<td class="tableCell" style="text-align:center;">USD</td>';
                $value = strpos($address, $valuta);

                $USD = '';
                for ($i = $value + 220; $i <= $value + 225; $i++)
                    $USD .= $address{$i};
                $tmp = str_replace('<td class="tableCell" style="text-align:center;">', "", str_replace("</td>", "", $valuta));
                $output[$tmp] = array(
                    'value' => $USD,
                );
            }
            
            Cache::set(array('key' => 'currency'.date('Y-m-d'), 'data' => $output));
        
            return $output;
        }
    }

}

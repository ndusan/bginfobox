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

        return '<div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) {return;}
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, "script", "facebook-jssdk"));</script>
                    <div class="fb-like" data-href="' . $link . '" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="arial"></div>';
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

    function getWeather($city_id = 0, $showDays=1) {

        //Cache data to make things much faster
        if ($response = Cache::get(array('key' => 'weather'.date('Y-m-d')))) {

            return $response;
        } else {

            $response = '';
            if (isset($city_id) && !empty($city_id)) {
                $requestAddress = $city_id;

                $xml_str = file_get_contents("http://xoap.weather.com/weather/local/" . $requestAddress . "?cc=*&dayf=5&link=xoap&prod=xoap&par=1225844858&key=e874d961c427e609", 0);
                // Parses XML
                $xml = new SimplexmlElement($xml_str);
                //print_r($xml);
                // Name
                $response.= "<h1>" . $xml->loc->dnam . "</h1>";
                $response.= "<table style='margin:10px 0 10px; text-align:center' cellspacing='0' cellpading='0' width='100%'>
                                <tbody>
                                    <tr>";
                //Set date
                $date = substr($xml->dayf->lsup, 0, 8);
                $date = explode("/", $date);
                $day = 0;
                $countDays = $showDays + 1;
                foreach ($xml->dayf->day as $item) {
                    if ($item->hi != 'N/A') {
                        $date_out = @date("d-m-Y", mktime(0, 0, 0, $date[0], $date[1] + $day, "20" . $date[2]));
                        $day++;
                        $response.= "<td>";
                        $response .= "<label>" . $date_out . "</label>";
                        $max = round((5 / 9) * ($item->low - 32));
                        $response .= "<div>min temp: " . $max . "&deg</div>";
                        $min = round((5 / 9) * ($item->hi - 32));
                        $response .= "<div>max temp: " . $min . "&deg</div>";
                        $response .= "<br/>";
                        $first = true;
                        foreach ($item->part as $new) {
                            $response.= '<div>';
                            //Image
                            $response .= "<label>" . ($first ? "Day" : "Evening") . "</label>";
                            $response.= '<img src="http://s.imwx.com/v.20100415.153311/img/wxicon/45/' . $new->icon . '.png"/><br/>';
                            $response.= '</div>';
                            $response .= "<br/>";
                            $first = false;
                        }
                        $response .= "</td>";
                    }
                    --$countDays;

                    if ($countDays <= 0)
                        break;
                }
                $response.= "</tr>
                                </tbody>
                                    </table>";
            }

            Cache::set(array('key' => 'weather'.date('Y-m-d'), 'data' => $response));
            
            return $response;
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
            $part2 = file_get_contents($part1);
            $address = $part2;

            $output = array();

            if (!$part2) {

                return false;
            } else {

                // Evropska unija - EUR
                $valuta = '<td class="tableCell" style="text-align:center;">EUR</td>';
                $value = strpos($address, $valuta);

                $EUR = '';
                for ($i = $value + 220; $i <= $value + 227; $i++)
                    $EUR .= $address{$i};
                $tmp = str_replace('<td class="tableCell" style="text-align:center;">', "", str_replace("</td>", "", $valuta));
                $output[$tmp] = array(
                    'value' => $EUR,
                );

                // Evropska unija - CHF
                $valuta = '<td class="tableCell" style="text-align:center;">CHF</td>';
                $value = strpos($address, $valuta);

                $CHF = '';
                for ($i = $value + 220; $i <= $value + 226; $i++)
                    $CHF .= $address{$i};
                $tmp = str_replace('<td class="tableCell" style="text-align:center;">', "", str_replace("</td>", "", $valuta));
                $output[$tmp] = array(
                    'value' => $CHF,
                );

                // Evropska unija - USD
                $valuta = '<td class="tableCell" style="text-align:center;">USD</td>';
                $value = strpos($address, $valuta);

                $USD = '';
                for ($i = $value + 220; $i <= $value + 226; $i++)
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

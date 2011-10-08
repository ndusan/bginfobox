<?php
/**
 * HTML 
 * @author Dusan Novakovic (ndusan@gmail.com)
 *
 */
class HTML
{
    
        /**
         * Custom made css
         * @param array $array
         * @return string
         */
        function allCustomCss($path)
        {
                $string = '';
                foreach (glob($path.'*.css') as $fileName)
                {
                    $string .= "<link href='/".$fileName."' rel='stylesheet' type='text/css' />\n";
                }

                return $string;
        }
        
        /**
         * Include JS
         * @param $fileName
         * @return string
         */
        function allCustomJs($path)
        {
                $string = '';
                foreach (glob($path.'*.js') as $fileName)
                {
                    $string .= "<script src='/".$fileName."' type='text/javascript'></script>\n";
                }

                return $string;
        }


        /**
         * Include CSS
         * @param $fileName
         * @return string
         */
        function css($fileName, $path) 
        {
                $data = "<link href='".$path.$fileName.".css' rel='stylesheet' type='text/css'/>\n";
                
                return $data;
        }
        
        /**
         * Include JS
         * @param $fileName
         * @return string
         */
        function js($fileName, $path) 
        {
                $data = "<script src='".$path.$fileName.".js' type='text/javascript'></script>\n";
                
                return $data;
        }
        
        /**
         * Include JS
         * @param $fileName
         * @return string
         */
        function assetsJs($fileName, $path) 
        {
                $data = "<script src='".$path.$fileName.".js' type='text/javascript'></script>\n";
                
                return $data;
        }
        
        /**
         * Include CSS
         * @param $fileName
         * @return string
         */
        function assetsCss($fileName, $path) 
        {
                $data = "<link href='".$path.$fileName.".css' rel='stylesheet' type='text/css'/>\n";
                
                return $data;
        }
        
        /**
         * Display message
         * @param String $text
         * @return String
         */
        function msg($text)
        {
                
                if(!isset($text) || empty($text))
                {
                    
                    return false;
                }
                
                $txt = "";
                switch($text){
                        //Error
                        case 'error':
                                                $txt = "<div class='error'>".ERROR_MSG."</div>";
                                                break;
                        //Success
                        case 'success':
                                                $txt = "<div class='success'>".SUCCESS_MSG."</div>";
                                                break;
                        default:        
                                                $txt = "<div class='error'>".$text."</div>";
                                                break;
                }
                
                return $txt;
        }
        
        
        function fb($link=null)
        {
            if(null == $link) return false;
            
            return '<div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) {return;}
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, "script", "facebook-jssdk"));</script>
                    <div class="fb-like" data-href="'.$link.'" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="arial"></div>';
        }
        
        
        function formatNews($news=array(), $dynamic=false)
        {
            $html = '<div class="news">';
            
            if(empty($news)){
                $html.= 'No news added';
            }else{
                foreach($news as $n){
                    $html.= '<h3>'.$n['title'].'</h3>';
                    $html.= '<span>'.$n['date'].'</span>';
                    $html.= '<div class="news_content">'.$n['headings'].'</div>';
                    $html.= '<span><a href="/news/'.$n['id'].'/'.$n['title'].'" >read more...</a></span>';
                }
            }

            $html.= '</div>';
            
            return $html;
        }
        
        
        function formatCalendar($calendar)
        {
            $html = '<div class="calendar">';
            
            if(empty($calendar)){
                $html.= 'To be done';
            }else{
                
            }
            
            $html.= '</div>';
            
            return $html;
        }
}

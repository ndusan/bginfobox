<?php

class HomeController extends Controller
{
    
    
    public function indexAction($params)
    {
     
        parent::set('freshNews', $this->db->getFreshNews($params));
        parent::set('calendar', $this->loadCalendarAction($params));
    }
    
    
    private function newsPage($params)
    {
        if(isset($params['news_id'])){
            //Get only one news
            
            parent::set('news', $this->db->getNews($params['news_id']));
        }else{
            
            parent::set('newsCollectionPerMonth', $this->db->getAllNewsPerMonth());
            parent::set('newsCollection', $this->db->getAllNews(isset($params['date'])?$params['date']:null));
        }
    }
    
    
    private function calendarPage($params)
    {
        if(isset($params['calendar_id'])){
            //Get only one news
            
            parent::set('calendar', $this->db->getCalendar($params['calendar_id']));
        }else{
            
            parent::set('calendarCollection', $this->db->getCalendarByStartDate(isset($params['start_date'])?$params['start_date']:date('Y-m-d')));
        }
    }
    
    private function galleryPage($params)
    {
        
        parent::set('galleryCollection', $this->db->getAllGallery());
    }
    
    
    
    public function loadCalendarAction($params)
    {   
        
        parent::set('eventCollection', $this->db->getEventsByTime(isset($params['year'])?$params['year']:date('Y'), isset($params['month'])?$params['month']:date('m')));
        parent::set('currTime', isset($params['currTime'])?$params['currTime']: time());
    }
   
    
    
    public function staticPagesAction($params)
    {

        parent::set('freshNews', $this->db->getFreshNews($params));
        parent::set('bannerCollection', $this->db->getAllBanners());
        parent::set('carouselCollection', $this->db->getAllCarousel());
        
        switch($params['page']){
            case 'about-us':break;
            case 'our-clients': break;
            case 'archive': break;
            case 'gallery': $this->galleryPage($params); break;
            case 'ads': break;
            case 'contact': $this->contactPage($params); break;
            case 'news':  $this->newsPage($params); break;
            case 'calendar': $this->calendarPage($params); break;
            default: //error
        }
        
    }
    
    
    private function contactPage($params)
    {
        
        if(isset($params['submit'])){
            
            //Send
            if(parent::sendMail(MAIL_TO, 'Contact form', $params['form'], MAIL_FROM)){
                parent::set('sent', 'success');
            }else{
                parent::set('sent', 'error');
            }
        }
    }
   
    
    
    public function dynamicPagesAction($params)
    {
        
        parent::set('freshNews', $this->db->getFreshNews($params));
        
        $settings = $this->db->getDynamicPageSettings($params);

        if(null == $settings){
            //Dynamic page not found
            parent::redirect('404', '');
        }
    }
    
    
    
    public function noPageFoundAction($params)
    {
        
    }
    
    
}
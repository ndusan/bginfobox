<?php

class ProjectsController extends Controller 
{
    
    public function init($params)
    {
        
        //Lattest news
        $this->getNews();
        
        //Get calendar
        parent::set('calendar', $this->loadCalendarAction($params));
        
        //Get banners
        $this->getBanners();
        
        //Get carousel
        $this->getCarousel();

        //Get active language
        $this->getActiveLanguage();
        
        //Footer
        parent::set('footer', $this->db->getFooter());
    }
    
    public function indexAction($params)
    {
        
        $this->init($params);
    }
    
    
    
    public function galleryAction($params)
    {
        
        $this->init($params);
    }
    
    
    
    /**
     * Get calendar
     * @param type $params 
     */
    public function loadCalendarAction($params)
    {   
        
        parent::set('eventCollection', $this->db->getEventsByTime(isset($params['year'])?$params['year']:date('Y'), isset($params['month'])?$params['month']:date('m')));
        parent::set('currTime', isset($params['currTime'])?$params['currTime']: time());
    }
    
    /*********** PRIVATE FUNCTON ************/
    
    /**
     * Get news
     */
    private function getNews()
    {
        
        $numOfNews = 2;
        parent::set('freshNews', $this->db->getLattestNews($numOfNews));
    }
    
    /**
     * Get banners
     */
    private function getBanners()
    {
        
        parent::set('bannerCollection', $this->db->getAllBanners());
    }
    
    /**
     * Get carousel
     */
    private function getCarousel()
    {
        
        parent::set('carouselCollection', $this->db->getAllCarousel());
    }
    
    /**
     * Get active language
     */
    private function getActiveLanguage()
    {
        
        parent::set('activeLangs', $this->db->getActiveLanguages());
    }
}
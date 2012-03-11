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
        
        //Get BG INFO tree
        $this->getBgInfoRootTree();
        
        //Get OTHER INFO tree
        $this->getOtherInfoRootTree();
        
        //Footer
        parent::set('footer', $this->db->getFooter());
        
        $this->getLattestSights();
    }
    
    public function indexAction($params)
    {
        
        $this->init($params);
        
        $this->set('project', $this->db->getProject($params['id']));
        $edition = $this->db->getEditions($params['id']);
        $edition = $edition[0];
        
        $this->set('edition', $edition);
    }
    
    
    
    public function galleryAction($params)
    {
        
        $this->init($params);
        $cid = isset($params['cid']) ? $params['cid'] : null;
        $this->set('project', $this->db->getProject($params['id']));
        $edition = $this->db->getEditions($params['id'], 1, $cid);
        $edition = $edition[0];
        
        $this->set('edition', $edition);
        
        
        $olderEditions = $this->db->getEditions($params['id'], 5);
        $this->set('olderEditions', $olderEditions);
    }
    
    
    public function archiveAction($params)
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
    
    private function getBgInfoRootTree()
    {
        
        parent::set('bgInfoRootTree', $this->db->getBgInfoRootTree());
    }
    
    private function getOtherInfoRootTree()
    {
        
        parent::set('otherInfoRootTree', $this->db->getOtherInfoRootTree());
    }
    
    private function getLattestSights()
    {
        
        parent::set('lattestSights', $this->db->getLattestSights());
    }
}
<?php

class HomeController extends Controller
{
    
    
    protected $pages = array('bginfo-box'=>'1','bginfo-map'=>'2','bginfo-night-map'=>'3','putovanje-za-dvoje'=>'4');
    
    
    public function indexAction($params)
    {
     
        parent::set('freshNews', $this->db->getFreshNews($params));
        parent::set('calendar', $this->loadCalendarAction($params));
        parent::set('bannerCollection', $this->db->getAllBanners());
        parent::set('carouselCollection', $this->db->getAllCarousel());

        parent::set('activeLangs', $this->db->getActiveLanguages());
        
        parent::set('lattestStaticEditions', $this->db->getLattestStaticEditions());
        parent::set('lattestDynamicEditions', $this->db->getLattestDynamicEditions());
        parent::set('pocketContent', $this->db->getPocketContent());
        
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
   
    
    /**
     * STATIC PAGES
     * @param type $params 
     */
    public function staticPagesAction($params)
    {

        parent::set('freshNews', $this->db->getFreshNews($params));
        parent::set('bannerCollection', $this->db->getAllBanners());
        parent::set('carouselCollection', $this->db->getAllCarousel());
        
        parent::set('activeLangs', $this->db->getActiveLanguages());
        
        switch($params['page']){
            case 'about-us':break;
            case 'our-clients': $this->clientsPage($params); break;
            case 'archive': $this->archivePage($params); break;
            case 'gallery': $this->galleryPage($params); break;
            case 'ads': $this->adsPage($params); break;
            case 'contact': $this->contactPage($params); break;
            case 'news':  $this->newsPage($params); break;
            case 'calendar': $this->calendarPage($params); break;
            default: //error
        }
        
    }
    
    
    private function archivePage($params)
    {
        
        parent::set('archiveCollection', $this->db->getAllArchive());
    }
    
    
    private function clientsPage($params)
    {
        
        parent::set('pageCollection', $this->db->getAllStaticPages());
        parent::set('clientCollection', $this->db->getAllClients());
    }
    
    
    private function contactPage($params)
    {
        
        if(isset($params['submit'])){
            
            //Send
            if(parent::sendEmail(MAIL_TO, 'Contact form', $params['form'], MAIL_FROM)){
                parent::set('sent', 'success');
            }else{
                parent::set('sent', 'error');
            }
        }
    }
    
    
    
    private function adsPage($params)
    {
        
        if(isset($params['submit'])){
            
            //Send
            if(parent::sendEmail(MAIL_TO, 'Contact form', $params['form'], MAIL_FROM)){
                parent::set('sent', 'success');
            }else{
                parent::set('sent', 'error');
            }
        }
    }
   
    
    
    public function dynamicPagesAction($params)
    {
        
        parent::set('freshNews', $this->db->getFreshNews($params));
        parent::set('bannerCollection', $this->db->getAllBanners());
        parent::set('carouselCollection', $this->db->getAllCarousel());
        
        parent::set('activeLangs', $this->db->getActiveLanguages());
        
        
        switch($params['page']){
            case 'bginfo-box': break;
            case 'bginfo-map': break;
            case 'bginfo-night-map': break;
            case 'putovanje-za-dvoje': break;
        }
    }
    
    
    public function dynamicGalleryPagesAction($params)
    {

        parent::set('freshNews', $this->db->getFreshNews($params));
        parent::set('bannerCollection', $this->db->getAllBanners());
        parent::set('carouselCollection', $this->db->getAllCarousel());
        
        parent::set('activeLangs', $this->db->getActiveLanguages());
        
        $archive = (!empty($params['archive']) ? (int)$params['archive'] : null);
        
        switch($params['page']){
            case 'bginfo-box': $this->bginfoBoxGalleryPage($params['page']); break;
            case 'bginfo-map': $this->bginfoGalleryPage($params['page'], $archive); break;
            case 'bginfo-night-map': $this->bginfoGalleryPage($params['page'], $archive); break;
            case 'putovanje-za-dvoje': $this->bginfoGalleryPage($params['page'], $archive); break;
        }
    }
    
    
    
    public function locationAction($params)
    {

        parent::set('freshNews', $this->db->getFreshNews($params));
        parent::set('bannerCollection', $this->db->getAllBanners());
        parent::set('carouselCollection', $this->db->getAllCarousel());
        
        parent::set('activeLangs', $this->db->getActiveLanguages());
        
        switch($params['page']){
            case 'bginfo-box': break;
            case 'bginfo-map': break;
            case 'bginfo-night-map': break;
            case 'putovanje-za-dvoje': break;
        }
    }
    
    public function archiveAction($params)
    {

        parent::set('freshNews', $this->db->getFreshNews($params));
        parent::set('bannerCollection', $this->db->getAllBanners());
        parent::set('carouselCollection', $this->db->getAllCarousel());
        
        parent::set('activeLangs', $this->db->getActiveLanguages());
        
        switch($params['page']){
            case 'bginfo-map': break;
            case 'bginfo-night-map': break;
            case 'putovanje-za-dvoje': break;
        }
    }
    
    
    
    
    private function bginfoBoxGalleryPage($pageName)
    {
        
        parent::set('galleryCollection', $this->db->bginfoBoxGallery($this->pages[$pageName]));
    }
    
    
    
    private function bginfoGalleryPage($pageName, $archive)
    {
        
        parent::set('galleryArchiveCollection', $this->db->bginfoArchiveGallery($this->pages[$pageName], 5));
        parent::set('galleryCollection', $this->db->bginfoGallery($this->pages[$pageName], $archive));
    }
    
    
    
    
    public function noPageFoundAction($params)
    {
        
    }
    
    
}
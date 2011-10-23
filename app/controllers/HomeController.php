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
        
        //Bg Info pages
        parent::set('lattestStaticEditions', $this->db->getLattestStaticEditions());
        
        parent::set('lattestDynamicEditions', $this->db->getLattestDynamicEditions());
        parent::set('pocketContent', $this->db->getPocketContent());
        
        parent::set('treeGuide', $this->getTreeGuide());
        
    }
    
    
    private function getTreeGuide()
    {
        
        return $this->db->getTreeGuide();
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
            case 'about-us':
                $this->getPricelist();
                break;
            case 'our-clients': $this->clientsPage($params); break;
            case 'archive': $this->archivePage($params); break;
            case 'gallery': $this->galleryPage($params); break;
            case 'ads': 
                $this->adsPage($params);
                $this->getPricelist();
                break;
            case 'contact': $this->contactPage($params); break;
            case 'news':  $this->newsPage($params); break;
            case 'calendar': $this->calendarPage($params); break;
            default: //error
        }
        
    }
    
    
    
    private function getPricelist()
    {
        
        parent::set('pricelist', $this->db->getAboutUs());
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
        
        parent::set('pages', $this->db->getPagesForAds());
    }
   
    
    
    
    /**
     * DYNAMIC PAGES
     * @param type $params 
     */
    public function dynamicPagesAction($params)
    {
        
        parent::set('freshNews', $this->db->getFreshNews($params));
        parent::set('bannerCollection', $this->db->getAllBanners());
        parent::set('carouselCollection', $this->db->getAllCarousel());
        
        parent::set('activeLangs', $this->db->getActiveLanguages());
        
        
        switch($params['page']){
            case 'bginfo-box': 
                $this->bginfoPage($params['page']); 
                $this->bginfoBoxGalleryPage($params['page']);
                $this->getDownload($this->pages[$params['page']]);
                break;
            case 'bginfo-map': 
                $this->bginfoPage($params['page']); 
                $this->bginfoGalleryPage($params['page'], null);
                $this->getDownload($this->pages[$params['page']]);
                break;
            case 'bginfo-night-map': 
                $this->bginfoPage($params['page']); 
                $this->bginfoGalleryPage($params['page'], null);
                $this->getDownload($this->pages[$params['page']]);
                break;
            case 'pockets': 
                $this->pocketsPage();
                $this->pocketsInfo();
                $this->pocketsGalleryPage();
                break;
        }
        
        $this->getPricelist();
    }
    
    
    
    
    
    private function getDownload($pageId=null)
    {
        
        parent::set('download', $this->db->getDownload($pageId));
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
        }
    }
    
    
    
    private function bginfoPage($pageName)
    {
        
        parent::set('content', $this->db->getBginfo($this->pages[$pageName]));
    }
    
    
    
    private function pocketsPage()
    {
        
        parent::set('content', $this->db->getPocketContent());
    }
    
    
    
    private function pocketsInfo()
    {
        
        parent::set('info', $this->db->getPocketsInfo());
    }
    
    
    
    public function locationAction($params)
    {

        parent::set('freshNews', $this->db->getFreshNews($params));
        parent::set('bannerCollection', $this->db->getAllBanners());
        parent::set('carouselCollection', $this->db->getAllCarousel());
        
        parent::set('activeLangs', $this->db->getActiveLanguages());
        
        $id = (!empty($params['id']))?$params['id']:$this->pages[$params['page']];
        
        parent::set('locationCollection', $this->db->getLocations($id));
        
    }
    
    public function archiveAction($params)
    {

        parent::set('freshNews', $this->db->getFreshNews($params));
        parent::set('bannerCollection', $this->db->getAllBanners());
        parent::set('carouselCollection', $this->db->getAllCarousel());
        
        parent::set('activeLangs', $this->db->getActiveLanguages());
        
        switch($params['page']){
            case 'bginfo-map': $this->getAchiveByName($params['page']); break;
            case 'bginfo-night-map': $this->getAchiveByName($params['page']); break;
            case 'putovanje-za-dvoje': $this->getAchiveByName($params['page']); break;
            case 'pockets': $this->getAchiveByName(); break;
        }
    }
    
    
    private function getAchiveByName($name=null)
    {
        $id = null == $name ? null : $this->pages[$name];
        parent::set('archiveCollection', $this->db->getArchiveById($id));
        
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
    
    
    
    
    private function pocketsGalleryPage()
    {
        parent::set('galleryCollection', $this->db->getLattestDynamicEditions());
    }
    
    
    
    public function noPageFoundAction($params)
    {
        
    }
    
    
    
    public function guideAction($params)
    {
        
        $slugArray = array();
        if(!empty($params['slug'])){
            $slugArray = explode('/', $params['slug']);
        }
        
        
        
        parent::set('freshNews', $this->db->getFreshNews($params));
        parent::set('bannerCollection', $this->db->getAllBanners());
        parent::set('carouselCollection', $this->db->getAllCarousel());
        
        parent::set('activeLangs', $this->db->getActiveLanguages());
    }
    
    
    
    public function infoAction($params)
    {
        
        $slugArray = array();
        if(!empty($params['slug'])){
            $slugArray = explode('/', $params['slug']);
        }
        
        
        
        parent::set('freshNews', $this->db->getFreshNews($params));
        parent::set('bannerCollection', $this->db->getAllBanners());
        parent::set('carouselCollection', $this->db->getAllCarousel());
        
        parent::set('activeLangs', $this->db->getActiveLanguages());
    }
    
    
    
    
    
}
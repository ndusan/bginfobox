<?php

class HomeController extends Controller
{
    
    const BGINFOBOX = 'bginfo-box';
    const BGINFOMAP = 'bginfo-map';
    const BGINFONIGHTMAP = 'bginfo-night-map';
    const PUTOVANJEZADVOJE = 'putovanje-za-dvoje';
    
    protected $pages = array(self::BGINFOBOX => '1',
                             self::BGINFOMAP => '2',
                             self::BGINFONIGHTMAP => '3',
                             self::PUTOVANJEZADVOJE => '4');
    
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
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
        
        //Bg Info pages
        $this->getBginfoPages();
        
        //Pocket pages
        $this->getPocketPages();
        
        //Pocket page content
        $this->getPocketPageContent();
        
        //Get BG INFO tree
        $this->getBgInfoRootTree();
        
        //Get OTHER INFO tree
        $this->getOtherInfoRootTree();
        
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
    
    
    
    /**
     * STATIC PAGES
     * @param type $params 
     */
    public function staticPagesAction($params)
    {

        //Lattest news
        $this->getNews();
        
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
        
        switch($params['page']){
            case 'about-us':
                
                $this->getPricelist();
                break;
            case 'our-clients': 
                
                $this->clientsPage($params); 
                break;
            case 'archive': 
                
                $this->archivePage($params); 
                break;
            case 'gallery': 
                
                $this->galleryPage($params); 
                break;
            case 'ads':
                
                $this->adsPage($params);
                $this->getPricelist();
                break;
            case 'contact': 
                
                $this->contactPage($params); 
                break;
            case 'news':  
                
                $this->newsPage($params); 
                break;
            case 'calendar': 
                
                $this->calendarPage($params); 
                break;
            default: //error
        }
    }
    
    
    /**
     * DYNAMIC PAGES
     * @param type $params 
     */
    public function dynamicPagesAction($params)
    {
        
        //Lattest news
        $this->getNews();
        
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
    
    
    
    public function dynamicGalleryPagesAction($params)
    {

        //Lattest news
        $this->getNews();
        
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
        
        $archive = (!empty($params['archive']) ? (int)$params['archive'] : null);
        
        switch($params['page']){
            case 'bginfo-box': $this->bginfoBoxGalleryPage($params['page']); break;
            case 'bginfo-map': $this->bginfoGalleryPage($params['page'], $archive); break;
            case 'bginfo-night-map': $this->bginfoGalleryPage($params['page'], $archive); break;
        }
    }
    
    
    public function locationAction($params)
    {

        //Lattest news
        $this->getNews();
        
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
        
        $id = (!empty($params['id']))?$params['id']:$this->pages[$params['page']];
        
        parent::set('locationCollection', $this->db->getLocations($id));
        
    }
    
    public function archiveAction($params)
    {

        //Lattest news
        $this->getNews();
        
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
        
        switch($params['page']){
            case 'bginfo-map': 
                
                $this->getAchiveByName($params['page']); 
                break;
            case 'bginfo-night-map': 
                
                $this->getAchiveByName($params['page']); 
                break;
            case 'putovanje-za-dvoje': 
                
                $this->getAchiveByName($params['page']); 
                break;
            case 'pockets': 
                
                $this->getAchiveByName(); 
                break;
        }
    }
    
    public function guideAction($params)
    {
        
        //Lattest news
        $this->getNews();
        
        //Get banners
        $this->getBanners();
        
        //Get carousel
        $this->getCarousel();

        //Get active language
        $this->getActiveLanguage();
        
        //Get OTHER INFO tree
        $this->getOtherInfoRootTree();
        
        $slugArray = array();
        if(!empty($params['slug'])){
            $slugArray = explode('/', $params['slug']);
            
            $this->getBgInfoTree($slugArray);
        }
        //Get BG INFO tree
        $this->getBgInfoRootTree();
        
        parent::set('intro', $this->db->getNavigationIntro(end($slugArray)));
        
        parent::set('slugCollection', $this->db->getSlugs());
    }
    
    public function infoAction($params)
    {
        
        //Lattest news
        $this->getNews();
        
        //Get banners
        $this->getBanners();
        
        //Get carousel
        $this->getCarousel();

        //Get active language
        $this->getActiveLanguage();
        
        //Get BG INFO tree
        $this->getBgInfoRootTree();
        
        $slugArray = array();
        if(!empty($params['slug'])){
            $slugArray = explode('/', $params['slug']);
            
            $this->getOtherInfoTree($slugArray);
        }
        //Get BG INFO tree
        $this->getOtherInfoRootTree();
        
        parent::set('intro', $this->db->getNavigationIntro(end($slugArray)));
        
        parent::set('slugCollection', $this->db->getSlugs());
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
    
    /**
     * Get BG INFO PAGES
     */
    private function getBgInfoPages()
    {
        
        parent::set('lattestStaticEditions', $this->db->getLattestStaticEditions());
    }
    
    /**
     * GET POCKETS PAGES
     */
    private function getPocketPages()
    {
        
        parent::set('lattestDynamicEditions', $this->db->getLattestDynamicEditions());
    }
    
    /**
     * Get pocket page content
     */
    private function getPocketPageContent()
    {
        
        parent::set('pocketContent', $this->db->getPocketContent());
    }

    /** NEWS PAGE **/
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
    
    /** CALENDAR PAGE **/
    private function calendarPage($params)
    {
        if(isset($params['calendar_id'])){
            //Get only one news
            
            parent::set('calendar', $this->db->getCalendar($params['calendar_id']));
        }else{
            
            parent::set('calendarCollection', $this->db->getCalendarByStartDate(isset($params['start_date'])?$params['start_date']:date('Y-m-d')));
        }
    }
    
    /** GALLERY PAGE **/
    private function galleryPage($params)
    {
        
        parent::set('galleryCollection', $this->db->getAllGallery());
    }
    
    
    private function getPricelist()
    {
        
        parent::set('pricelist', $this->db->getAboutUs());
    }
    
    /** ARCHIVE PAGE **/
    private function archivePage($params)
    {
        parent::set('archiveCollection', $this->db->getAllArchive());
    }
    
    /** CLIENT PAGE **/
    private function clientsPage($params)
    {
        
        parent::set('pageCollection', $this->db->getAllStaticPages());
        parent::set('clientCollection', $this->db->getAllClients());
    }
    
    /** CONTACT PAGE **/
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
    
    /** ADS PAGE **/
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
    
    private function getDownload($pageId=null)
    {
        
        parent::set('download', $this->db->getDownload($pageId));
    }
    
    /** BGINFO PAGE **/
    private function bginfoPage($pageName)
    {
        
        parent::set('content', $this->db->getBginfo($this->pages[$pageName]));
    }
    
    /** POCKET PAGE **/
    private function pocketsPage()
    {
        
        parent::set('content', $this->db->getPocketContent());
    }
    
    /** POCEKET INFO **/
    private function pocketsInfo()
    {
        
        parent::set('info', $this->db->getPocketsInfo());
    }
    
    private function getAchiveByName($name=null)
    {
        $id = null == $name ? null : $this->pages[$name];
        parent::set('archiveCollection', $this->db->getArchiveById($id));
        
    }

    /** BGINFO BOX GALLERY PAGE **/
    private function bginfoBoxGalleryPage($pageName)
    {
        
        parent::set('galleryCollection', $this->db->bginfoBoxGallery($this->pages[$pageName]));
    }
    
    /** BGINFO GALLERY PAGE **/
    private function bginfoGalleryPage($pageName, $archive)
    {
        
        parent::set('galleryArchiveCollection', $this->db->bginfoArchiveGallery($this->pages[$pageName], 5));
        parent::set('galleryCollection', $this->db->bginfoGallery($this->pages[$pageName], $archive));
    }
    
    /** POCKET GALLERY PAGE **/
    private function pocketsGalleryPage()
    {
        parent::set('galleryCollection', $this->db->getLattestDynamicEditions());
    }
    
    private function getBgInfoRootTree()
    {
        
        parent::set('bgInfoRootTree', $this->db->getBgInfoRootTree());
    }
    
    
    private function getBgInfoTree($slug=array())
    {
        $cnt = count($slug);
        $cSlug = $pSlug = null;
        $slugArray = array();
        
        if($cnt > 1){
            $pSlug = $slug[$cnt-2];
            $cSlug = $slug[$cnt-1];
        }elseif($cnt == 1){
            $pSlug = $cSlug = $slug[$cnt-1];
        }
        
        $tree = $this->db->getBgInfoTree($cSlug);
        $tmp = array();
        
        if(empty($tree)){
            //This node doesn't have any more childern
            $tree = $this->db->getBgInfoTree($pSlug);
            for($i=0; $i<$cnt; $i++){
                if($slug[$i] == $cSlug) break;
                $tmp[]= $slug[$i];
            }
            $slugArray['current'] = implode('/',$tmp);
            $prev = $tmp;
        }else{
            for($i=0; $i<$cnt; $i++){
                $tmp[]= $slug[$i];
            }
            $slugArray['current'] = implode('/', $tmp);
            $prev = $tmp;
            array_pop($prev);
        }
        
        $slugArray['previous'] = implode('/', $prev);
        #path
        $slugArray['path'] = 'guide';
        parent::set('slug', $slugArray);
        parent::set('bgInfoTree', $tree);
    }
    
    
    private function getOtherInfoRootTree()
    {
        
        parent::set('otherInfoRootTree', $this->db->getOtherInfoRootTree());
    }
    
    
    private function getOtherInfoTree($slug=array())
    {
        $cnt = count($slug);
        $cSlug = $pSlug = null;
        $slugArray = array();
        
        if($cnt > 1){
            $pSlug = $slug[$cnt-2];
            $cSlug = $slug[$cnt-1];
        }elseif($cnt == 1){
            $pSlug = $cSlug = $slug[$cnt-1];
        }
        
        $tree = $this->db->getOtherInfoTree($cSlug);
        $tmp = array();
        
        if(empty($tree)){
            //This node doesn't have any more childern
            $tree = $this->db->getOtherInfoTree($pSlug);
            for($i=0; $i<$cnt; $i++){
                if($slug[$i] == $cSlug) break;
                $tmp[]= $slug[$i];
            }
            $slugArray['current'] = implode('/',$tmp);
        }else{
            for($i=0; $i<$cnt; $i++){
                $tmp[]= $slug[$i];
            }
            $slugArray['current'] = implode('/', $tmp);
        }
        $prev = $tmp;
        array_pop($prev);
        
        $slugArray['previous'] = implode('/', $prev);
        #path
        $slugArray['path'] = 'info';
        parent::set('slug', $slugArray);
        parent::set('otherInfoTree', $tree);
    }
    
    /** NO PAGE FOUND **/
    public function noPageFoundAction($params)
    {
        
    }
}
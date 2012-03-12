<?php
$routes = array(
    //Home page
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/?$/', 
            'controller' => 'home', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    //404
    array(  'url'        => '/^404\/?$/', 
            'controller' => 'home', 
            'action'     => 'noPageFound', 
            'layout'     => '404'
    ),
    //Static pages
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(o-nama|nasi-klijenti|arhiva|galerija|oglasavanje|kontakt))\/?$/', 
            'controller' => 'home', 
            'action'     => 'staticPages', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^anti-spam\/?$/', 
            'controller' => 'home', 
            'action'     => 'antiSpam', 
            'layout'     => 'empty'
    ),
    
    //Static page - calendar
    array(  'url'        => '/^load-calendar\/?$/', 
            'controller' => 'home', 
            'action'     => 'loadCalendar', 
            'layout'     => 'ajax'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(calendar))\/?(?P<start_date>([0-9-]+)*\/?)((?P<calendar_id>\d+)(\/[a-zA-Z0-9\/#&@\-+_?%]+))*?$/', 
            'controller' => 'home', 
            'action'     => 'staticPages', 
            'layout'     => 'default'
    ),
    //Static page - news
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(vesti))\/?((?P<news_id>\d+)*(\/[a-zA-Z0-9\/#&@\-+_?%]+))*$/', 
            'controller' => 'home', 
            'action'     => 'staticPages', 
            'layout'     => 'default'
    ),
    
    //Dynamic pages
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(bginfo-box|bginfo-night-map|bginfo-map))\/(?P<subpage>(gallery))\/?$/', 
            'controller' => 'home', 
            'action'     => 'dynamicGalleryPages', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(bginfo-box|bginfo-night-map|bginfo-map|in-your-pocket-city-guides))\/?$/', 
            'controller' => 'home', 
            'action'     => 'dynamicPages', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/projekat\/(?P<id>\d+)*\/?$/', 
            'controller' => 'projects', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/projekat\/(?P<id>\d+)*\/gallery\/?$/', 
            'controller' => 'projects', 
            'action'     => 'gallery', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/projekat\/arhiva\/(?P<id>\d+)*\/?$/', 
            'controller' => 'projects', 
            'action'     => 'archive', 
            'layout'     => 'default'
    ),
    
    //Location
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(bginfo-box|bginfo-night-map|bginfo-map|in-your-pocket-city-guides))\/location\/?$/', 
            'controller' => 'home', 
            'action'     => 'location', 
            'layout'     => 'default'
    ),
    //Archive
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/arhiva\/(?P<page>(bginfo-night-map|bginfo-map|in-your-pocket-city-guides|putovanje-za-dvoje))\/?$/', 
            'controller' => 'home', 
            'action'     => 'archive', 
            'layout'     => 'default'
    ),
    //BGINFO guide
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/vodic\/(?P<slug>([a-zA-Z0-9\/\-+_]+))\/?$/', 
            'controller' => 'home', 
            'action'     => 'guide', 
            'layout'     => 'default'
    ),
    //BGINFO guide
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/info\/(?P<slug>([a-zA-Z0-9\/\-+_]+))\/?$/', 
            'controller' => 'home', 
            'action'     => 'info', 
            'layout'     => 'default'
    ),
    //Login page
    array(  'url'        => '/^login\/?$/', 
            'controller' => 'login', 
            'action'     => 'index', 
            'layout'     => 'login'
    ),
    //Logout page
    array(  'url'        => '/^logout\/?$/', 
            'controller' => 'login', 
            'action'     => 'logout', 
            'layout'     => 'empty'
    ),
    
    //CMS page
    array(  'url'        => '/^cms\/?$/', 
            'controller' => 'cmsHome', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/settings\/?$/', 
            'controller' => 'cmsHome', 
            'action'     => 'settings', 
            'layout'     => 'cms'
    ),
    
    //CMS user page
    array(  'url'        => '/^cms\/users\/?$/', 
            'controller' => 'cmsUser', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/user\/add\/?$/', 
            'controller' => 'cmsUser', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/user\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsUser', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/user\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsUser', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    
    //CMS about-us page
    array(  'url'        => '/^cms\/about-us\/?$/', 
            'controller' => 'cmsAboutUs', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/about-us\/add\/?$/', 
            'controller' => 'cmsAboutUs', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/about-us\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsAboutUs', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/about-us\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsAboutUs', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    array(  'url'        => '/^cms\/about-us\/delete\/image\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsAboutUs', 
            'action'     => 'deleteImage', 
            'layout'     => 'empty'
    ),
    array(  'url'        => '/^cms\/about-us\/delete\/doc\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsAboutUs', 
            'action'     => 'deleteDoc', 
            'layout'     => 'empty'
    ),
    
    //CMS news page
    array(  'url'        => '/^cms\/news\/?$/', 
            'controller' => 'cmsNews', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/news\/add\/?$/', 
            'controller' => 'cmsNews', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/news\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsNews', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/news\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsNews', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    array(  'url'        => '/^cms\/news\/delete\/image\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsNews', 
            'action'     => 'deleteImage', 
            'layout'     => 'empty'
    ),
    
    //CMS events page
    array(  'url'        => '/^cms\/events\/?$/', 
            'controller' => 'cmsEvents', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/event\/add\/?$/', 
            'controller' => 'cmsEvents', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/event\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsEvents', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/event\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsEvents', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    
    //CMS banners page
    array(  'url'        => '/^cms\/banners\/?$/', 
            'controller' => 'cmsBanners', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/banner\/add\/?$/', 
            'controller' => 'cmsBanners', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/banner\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsBanners', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/banner\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsBanners', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    
    //CMS gallery page
    array(  'url'        => '/^cms\/gallery\/?$/', 
            'controller' => 'cmsGallery', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/gallery\/add\/?$/', 
            'controller' => 'cmsGallery', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/gallery\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsGallery', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/gallery\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsGallery', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    
    //CMS carousel page
    array(  'url'        => '/^cms\/carousel\/?$/', 
            'controller' => 'cmsCarousel', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/carousel\/add\/?$/', 
            'controller' => 'cmsCarousel', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/carousel\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsCarousel', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/carousel\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsCarousel', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    
    //CMS bginfo page
    array(  'url'        => '/^cms\/bginfo\/?$/', 
            'controller' => 'cmsBginfo', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/bginfo\/add\/(?P<page_id>\d*)\/edition\/?$/', 
            'controller' => 'cmsBginfo', 
            'action'     => 'addEdition', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/bginfo\/edit\/(?P<id>\d*)\/(?P<page_id>\d*)\/edition\/?$/', 
            'controller' => 'cmsBginfo', 
            'action'     => 'editEdition', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/bginfo\/delete\/(?P<id>\d*)\/(?P<page_id>\d*)\/edition\/?$/', 
            'controller' => 'cmsBginfo', 
            'action'     => 'deleteEdition', 
            'layout'     => 'empty'
    ),
    array(  'url'        => '/^cms\/bginfo\/edit\/(?P<page_id>\d*)\/static\/?$/', 
            'controller' => 'cmsBginfo', 
            'action'     => 'editStatic', 
            'layout'     => 'cms'
    ),
    
    //CMS pockets page
    array(  'url'        => '/^cms\/pockets\/?$/', 
            'controller' => 'cmsPockets', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/pockets\/position\/?$/', 
            'controller' => 'cmsPockets', 
            'action'     => 'position', 
            'layout'     => 'ajax'
    ),
    array(  'url'        => '/^cms\/pockets\/edit\/static\/?$/', 
            'controller' => 'cmsPockets', 
            'action'     => 'editStatic', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/pockets\/add\/city\/?$/', 
            'controller' => 'cmsPockets', 
            'action'     => 'addCity', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/pockets\/edit\/(?P<id>\d*)\/city\/?$/', 
            'controller' => 'cmsPockets', 
            'action'     => 'editCity', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/pockets\/delete\/(?P<id>\d*)\/city\/?$/', 
            'controller' => 'cmsPockets', 
            'action'     => 'deleteCity', 
            'layout'     => 'empty'
    ),
    array(  'url'        => '/^cms\/pockets\/add\/(?P<page_id>\d*)\/edition\/?$/', 
            'controller' => 'cmsPockets', 
            'action'     => 'addEdition', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/pockets\/edit\/(?P<id>\d*)\/(?P<page_id>\d*)\/edition\/?$/', 
            'controller' => 'cmsPockets', 
            'action'     => 'editEdition', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/pockets\/delete\/(?P<id>\d*)\/(?P<page_id>\d*)\/edition\/?$/', 
            'controller' => 'cmsPockets', 
            'action'     => 'deleteEdition', 
            'layout'     => 'empty'
    ),
    array(  'url'        => '/^cms\/pockets\/add\/info\/?$/', 
            'controller' => 'cmsPockets', 
            'action'     => 'addInfo', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/pockets\/edit\/(?P<id>\d*)\/info\/?$/', 
            'controller' => 'cmsPockets', 
            'action'     => 'editInfo', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/pockets\/delete\/(?P<id>\d*)\/info\/?$/', 
            'controller' => 'cmsPockets', 
            'action'     => 'deleteInfo', 
            'layout'     => 'empty'
    ),
    
    //CMS info
    array(  'url'        => '/^cms\/info\/?$/', 
            'controller' => 'cmsInfo', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/info\/add\/?$/', 
            'controller' => 'cmsInfo', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/info\/(?P<id>\d*)\/edit\/?$/', 
            'controller' => 'cmsInfo', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/info\/(?P<id>\d*)\/delete\/?$/', 
            'controller' => 'cmsInfo', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    array(  'url'        => '/^cms\/info\/delete\/image\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsInfo', 
            'action'     => 'deleteImage', 
            'layout'     => 'empty'
    ),
    array(  'url'        => '/^cms\/info\/node\/add\/?$/', 
            'controller' => 'cmsInfo', 
            'action'     => 'addNode', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/info\/node\/(?P<id>\d*)\/edit\/?$/', 
            'controller' => 'cmsInfo', 
            'action'     => 'editNode', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/info\/node\/(?P<id>\d*)\/delete\/?$/', 
            'controller' => 'cmsInfo', 
            'action'     => 'deleteNode', 
            'layout'     => 'empty'
    ),
    array(  'url'        => '/^cms\/info\/node\/delete\/image\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsInfo', 
            'action'     => 'deleteNodeImage', 
            'layout'     => 'empty'
    ),
    
    //CMS clients
    array(  'url'        => '/^cms\/clients\/?$/', 
            'controller' => 'cmsClients', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/clients\/add\/?$/', 
            'controller' => 'cmsClients', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/clients\/(?P<id>\d*)\/edit\/?$/', 
            'controller' => 'cmsClients', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/clients\/(?P<id>\d*)\/delete\/?$/', 
            'controller' => 'cmsClients', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    array(  'url'        => '/^cms\/clients\/delete\/image\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsClients', 
            'action'     => 'deleteImage', 
            'layout'     => 'empty'
    ),
    array(  'url'        => '/^cms\/clients\/delete\/paid-image\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsClients', 
            'action'     => 'deletePaidImage', 
            'layout'     => 'empty'
    ),
    array(  'url'        => '/^cms\/clients\/node\/add\/?$/', 
            'controller' => 'cmsClients', 
            'action'     => 'addNode', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/clients\/node\/(?P<id>\d*)\/edit\/?$/', 
            'controller' => 'cmsClients', 
            'action'     => 'editNode', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/clients\/node\/(?P<id>\d*)\/delete\/?$/', 
            'controller' => 'cmsClients', 
            'action'     => 'deleteNode', 
            'layout'     => 'empty'
    ),
    array(  'url'        => '/^cms\/clients\/node\/delete\/image\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsClients', 
            'action'     => 'deleteNodeImage', 
            'layout'     => 'empty'
    ),
    
    //CMS monthly edition page
    array(  'url'        => '/^cms\/projects\/?$/', 
            'controller' => 'cmsProjects', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/project\/add\/?$/', 
            'controller' => 'cmsProjects', 
            'action'     => 'addProject', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/project\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsProjects', 
            'action'     => 'editProject', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/project\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsProjects', 
            'action'     => 'deleteProject', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/project\/(?P<project_id>\d*)\/edition\/add\/?$/', 
            'controller' => 'cmsProjects', 
            'action'     => 'addEdition', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/project\/(?P<project_id>\d*)\/edition\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsProjects', 
            'action'     => 'editEdition', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/project\/(?P<project_id>\d*)\/edition\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsProjects', 
            'action'     => 'deleteEdition', 
            'layout'     => 'empty'
    ),
);
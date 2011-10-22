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
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(about-us|our-clients|archive|gallery|ads|contact))\/?$/', 
            'controller' => 'home', 
            'action'     => 'staticPages', 
            'layout'     => 'default'
    ),
    //Static page - calendar
    array(  'url'        => '/^load-calendar\/?$/', 
            'controller' => 'home', 
            'action'     => 'loadCalendar', 
            'layout'     => 'ajax'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(calendar))\/?(?P<start_date>([0-9-]+)\/?)*((?P<calendar_id>\d+)(\/[a-zA-Z0-9\/#&@\-+_?%]+))*?$/', 
            'controller' => 'home', 
            'action'     => 'staticPages', 
            'layout'     => 'default'
    ),
    //Static page - news
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(news))\/?((?P<news_id>\d+)*(\/[a-zA-Z0-9\/#&@\-+_?%]+))*$/', 
            'controller' => 'home', 
            'action'     => 'staticPages', 
            'layout'     => 'default'
    ),
    
    //Dynamic pages
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(bginfo-box|bginfo-night-map|bginfo-map|putovanje-za-dvoje))\/(?P<subpage>(gallery))\/?$/', 
            'controller' => 'home', 
            'action'     => 'dynamicGalleryPages', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(bginfo-box|bginfo-night-map|bginfo-map|putovanje-za-dvoje))\/?$/', 
            'controller' => 'home', 
            'action'     => 'dynamicPages', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(pockets))\/?$/', 
            'controller' => 'home', 
            'action'     => 'dynamicPages', 
            'layout'     => 'default'
    ),
    //Location
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(bginfo-box|bginfo-night-map|bginfo-map|putovanje-za-dvoje|pockets))\/location\/?$/', 
            'controller' => 'home', 
            'action'     => 'location', 
            'layout'     => 'default'
    ),
    //Archive
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(bginfo-night-map|bginfo-map|putovanje-za-dvoje|pockets))\/archive\/?$/', 
            'controller' => 'home', 
            'action'     => 'archive', 
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
    
    //CMS navigation
    array(  'url'        => '/^cms\/navigation\/?$/', 
            'controller' => 'cmsNavigation', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/navigation\/add\/?$/', 
            'controller' => 'cmsNavigation', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/navigation\/(?P<id>\d*)\/edit\/?$/', 
            'controller' => 'cmsNavigation', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/navigation\/(?P<id>\d*)\/delete\/?$/', 
            'controller' => 'cmsNavigation', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    
);
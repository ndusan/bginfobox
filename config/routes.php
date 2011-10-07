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
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(calendar))\/?(?P<event_id>\d+)*$/', 
            'controller' => 'home', 
            'action'     => 'staticPages', 
            'layout'     => 'default'
    ),
    //Static page - news
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>(news))\/?((?P<news_id>\d+)\/[a-zA-Z0-9\/#&@\-+_]+)*$/', 
            'controller' => 'home', 
            'action'     => 'staticPages', 
            'layout'     => 'default'
    ),
    //Dynamic pages
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/(?P<page>([a-zA-Z0-9\/#&@\-+_]+))\/?$/', 
            'controller' => 'home', 
            'action'     => 'dynamicPages', 
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
);
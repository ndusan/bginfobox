<?php

class CmsHomeController extends Controller
{
    
    public function indexAction($params)
    {
        
        
        // enter your login, password and id into the variables below to try it out

        $login = GAQ_USERNAME;
        $password = GAQ_PASSWORD;

        // NOTE: the id is in the form ga:12345 and not just 12345
        // if you do e.g. 12345 then no data will be returned
        // read http://www.electrictoolbox.com/get-id-for-google-analytics-api/ for info about how to get this id from the GA web interface
        // or load the accounts (see below) and get it from there
        // if you don't specify an id here, then you'll get the "Badly formatted request to the Google Analytics API..." error message
        $id = GAQ_PROFILE_ID;

        $api = new analytics_api();
        if($api->login($login, $password)) {

                parent::set('visitors', $api->data($id, '', 'ga:bounces,ga:newVisits,ga:visits,ga:pageviews,ga:uniquePageviews'));
                parent::set('visitorsToday', $api->get_summary($id, 'today'));
        }
    }
    
    
    public function settingsAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            
            if($this->db->updateLanguages($params['settings'])){
                //If image uploaded add it
                parent::redirect ('cms'.DS.'settings', 'success');
            }else{
                parent::redirect ('cms'.DS.'settings', 'error');
            }
        }
        
        parent::set('en', $this->db->getConfigByKey('lang_en'));
    }
    
}
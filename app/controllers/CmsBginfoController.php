<?php

class CmsBginfoController extends Controller
{
    
    public function indexAction($params)
    {
        $output = array();
       
        $results = $this->db->getAllEdition();
        if(!empty($results)){
            
            foreach($results as $val){
                $output[$val['page_id']][] = $val;
            }
        }

        parent::set('editionCollection', $output);
        parent::set('tabs', $this->db->getStaticPages());
    }
    
    
    public function editStaticAction($params)
    {
        
        if(!empty($params['submit'])){
            
            if($this->db->updateBginfo($params['static'])){
                
                
                parent::redirect ('cms'.DS.'bginfo', 'success');
            }else{
                parent::redirect ('cms'.DS.'bginfo'.DS.'edit'.DS.$params['page_id'].DS.'static', 'error');
            }
        }
        
        parent::set('settings', $this->db->getCurrentStaticPage($params['page_id']));
        parent::set('static', $this->db->getBginfo($params['page_id']));
        parent::set('tabs', $this->db->getStaticPages());
    }
    
    
    
    public function addEditionAction($params)
    {
        
        if(!empty($params['submit']) && !empty($params['edition'])){
            
            //Add new page_edition
            $id = $this->db->createBginfoEdition($params['page_id']);
            if($id){
                
                //Add new page_edition_images
                foreach($params['edition']['title_sr'] as $key=>$val){
                    $eid = $this->db->createBginfoEditionImage(array('title_sr'=>$val,
                                                                       'title_en'=>$params['edition']['title_en'][$key],
                                                                       'page_id'=>$params['page_id'],
                                                                       'page_edition_id'=>$id));
                    if($eid){

                        //If image uploaded add it
                        if(0 == $params['image']['error'][$key] && !empty($eid)){

                            $newImageName = $eid.'-'.$id.'-'.$params['image']['name'][$key];
                            $this->db->setImageName($eid, $newImageName);

                            $image = array('name'    =>$params['image']['name'][$key],
                                           'type'    =>$params['image']['type'][$key],
                                           'tmp_name'=>$params['image']['tmp_name'][$key],
                                           'error'   =>$params['image']['error'][$key]);

                            $this->uploadImage($newImageName, $image, 'bginfo');
                        }
                    }else{
                        parent::redirect ('cms'.DS.'bginfo'.DS.'add'.DS.$params['page_id'].DS.'edition', 'error');
                    }
                }
                
                //Add downloaded if set
                if(0 == $params['download']['error'] && !empty($params['page_id'])){

                    $newImageName = $params['page_id'].'-'.$id.'-download-'.$params['download']['name'];
                    $this->db->setDownload($id, $newImageName);
                    $this->uploadImage($newImageName, $params['download'], 'bginfo');
                }
            }
            
            parent::redirect ('cms'.DS.'bginfo', 'success');
        }
        
        parent::set('settings', $this->db->getCurrentStaticPage($params['page_id']));
    }
    
    
    public function editEditionAction($params)
    {
        
        if(!empty($params['submit']) && !empty($params['edition'])){

            
            
        }
        
        parent::set('download', $this->db->getDownload($params['id']));
        parent::set('edition', $this->db->getEditionImages($params['id']));
        parent::set('settings', $this->db->getCurrentStaticPage($params['page_id']));
    }
    
    
    
    
    
}
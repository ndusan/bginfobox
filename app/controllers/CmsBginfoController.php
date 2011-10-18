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
                                                                       'page_edition_id'=>$id,
                                                                       'position'=>$key));
                    if($eid){

                        //If image uploaded add it
                        if(0 == $params['image']['error'][$key] && !empty($eid)){

                            $newImageName = $eid.'-'.$id.'-'.$params['image']['name'][$key];
                            $this->db->setImageName($eid, $newImageName);

                            $image = array('name'    =>$params['image']['name'][$key],
                                           'type'    =>$params['image']['type'][$key],
                                           'tmp_name'=>$params['image']['tmp_name'][$key],
                                           'error'   =>$params['image']['error'][$key],
                                           'size'   =>$params['image']['size'][$key]);

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

            //Add new page_edition_images
            foreach($params['edition']['title_sr'] as $key=>$val){
                $this->db->updateBginfoEditionImage(array('title_sr'=>$val,
                                                          'title_en'=>$params['edition']['title_en'][$key],
                                                          'id'=>$params['edition']['page_edition_id'][$key],
                                                          'position'=>$key));

                //If image uploaded add it
                if(0 == $params['image']['error'][$key] && !empty($params['edition']['page_edition_id'][$key])){

                    $data = $this->db->getImageName($params['edition']['page_edition_id'][$key]);
                    $oldImageName = $data['image_name'];
                    
                    $newImageName = $params['edition']['page_edition_id'][$key].'-'.$params['id'].'-'.$params['image']['name'][$key];
                    $this->db->setImageName($params['edition']['page_edition_id'][$key], $newImageName);

                    $image = array('name'    =>$params['image']['name'][$key],
                                   'type'    =>$params['image']['type'][$key],
                                   'tmp_name'=>$params['image']['tmp_name'][$key],
                                   'error'   =>$params['image']['error'][$key],
                                   'size'   =>$params['image']['size'][$key]);

                    $this->reUploadImage($oldImageName, $newImageName, $image, 'bginfo');
                }
            }
            
            //Add downloaded if set
            if(0 == $params['download']['error'] && !empty($params['edition']['id'])){
                $data = $this->db->getDownload($params['edition']['id']);
                $oldImageName = $data['file_name'];
                
                $newImageName = $params['edition']['page_id'].'-'.$params['edition']['id'].'-download-'.$params['download']['name'];
                
                $this->db->setDownload($params['edition']['id'], $newImageName);
                $this->reUploadImage($oldImageName, $newImageName, $params['download'], 'bginfo');
            }
            
            parent::redirect ('cms'.DS.'bginfo', 'success');
        }
        
        parent::set('download', $this->db->getDownload($params['id']));
        parent::set('edition', $this->db->getEditionImages($params['id']));
        parent::set('settings', $this->db->getCurrentStaticPage($params['page_id']));
    
        
    }
    
    
    public function deleteEditionAction($params)
    {
        
        parent::setRenderHTML(0);
        
        $dataImageArray = $this->db->getImageNameArray($params['id']);
        $dataDownload = $this->db->getDownload($params['id']);

        if($this->db->deleteBginfoEdition($params)){
            
            //If exist delete
            if(!empty($dataImageArray)){
                foreach($dataImageArray as $dia){
                    $oldImageName = $dia['image_name'];

                    $this->deleteImage($oldImageName, 'bginfo');
                }
            }
            
            if($dataDownload){
                $oldFileName = $dataDownload['file_name'];

                $this->deleteImage($oldFileName, 'bginfo');
            }
            
            parent::redirect ('cms'.DS.'bginfo', 'success');
        }else{
            parent::redirect ('cms'.DS.'bginfo', 'error');
        }        
    }
    
    
}
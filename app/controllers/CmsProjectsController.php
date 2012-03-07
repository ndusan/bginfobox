<?php

class CmsProjectsController extends Controller
{
    
    public function indexAction($params)
    {
        
        parent::set('projects', $this->db->getAllProjects());
    }
    
    
    public function addProjectAction($params)
    {
        if (!empty($params['submit'])) {
            
            if ($id = $this->db->addProject($params['project'])) {
                
                if (isset($params['main_image']) && 0 == $params['main_image']['error']) {
                    
                    //Update image
                    $imageName = $id.'-m'.$params['main_image']['name'];
                    $this->uploadImage($imageName, $params['main_image'], 'project');
                    $this->db->setProjectImage($id, $imageName, 'main_image');
                }
                if (isset($params['top_image']) && 0 == $params['top_image']['error']) {
                    
                    //Update image
                    $imageName = $id.'-t'.$params['top_image']['name'];
                    $this->uploadImage($imageName, $params['top_image'], 'project');
                    $this->db->setProjectImage($id, $imageName, 'top_image');
                }
                if (isset($params['bottom_image']) && 0 == $params['bottom_image']['error']) {
                    
                    //Update image
                    $imageName = $id.'-b'.$params['bottom_image']['name'];
                    $this->uploadImage($imageName, $params['bottom_image'], 'project');
                    $this->db->setProjectImage($id, $imageName, 'bottom_image');
                }
                
                parent::redirect ('cms'.DS.'projects', 'success');
            } else {
                parent::redirect ('cms'.DS.'project'.DS.'add', 'error');
            }
        }
        
    }
    
    public function editProjectAction($params)
    {
        if (!empty($params['submit'])) {
            
            if ($this->db->editProject($params['project'])) {
                
                $data = $this->db->getImages($params['id']);
                if (isset($params['main_image']) && 0 == $params['main_image']['error']) {
                    
                    //Update image
                    $imageName = $params['id'].'-m'.$params['main_image']['name'];
                    $oldImageName = $data['main_image'];
                    
                    $this->reUploadImage($oldImageName, $imageName, $params['main_image'], 'project');
                    $this->db->setProjectImage($params['id'], $imageName, 'main_image');
                }
                if (isset($params['top_image']) && 0 == $params['top_image']['error']) {
                    
                    //Update image
                    $imageName = $params['id'].'-t'.$params['top_image']['name'];
                    $oldImageName = $data['top_image'];
                    
                    $this->reUploadImage($oldImageName, $imageName, $params['top_image'], 'project');
                    $this->db->setProjectImage($params['id'], $imageName, 'top_image');
                }
                if (isset($params['bottom_image']) && 0 == $params['bottom_image']['error']) {
                    
                    //Update image
                    $imageName = $params['id'].'-b'.$params['bottom_image']['name'];
                    $oldImageName = $data['bottom_image'];
                    
                    $this->reUploadImage($oldImageName, $imageName, $params['bottom_image'], 'project');
                    $this->db->setProjectImage($params['id'], $imageName, 'bottom_image');
                }
                parent::redirect ('cms'.DS.'projects', 'success');
            } else {
                parent::redirect ('cms'.DS.'project'.DS.'edit'.DS.$params['id'], 'error');
            }
        }

        parent::set('project', $this->db->getProject($params['id']));
    }
    
    
    public function deleteProjectAction($params)
    {
        
        $allEdition = $this->db->getAllEdition($params['id']);
        foreach($allEdition as $ae){
            $this->deleteEditionAction($ae, false);
        }
        if($this->db->deleteProject($params['id'])){

            parent::redirect ('cms'.DS.'projects', 'success');
        }else{
            parent::redirect ('cms'.DS.'projects', 'error');
        }
    }
    
    
   
    
    
}
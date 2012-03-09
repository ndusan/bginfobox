<?php

class CmsProjectsController extends Controller
{
    
    public function indexAction($params)
    {
        
        parent::set('projects', $this->db->getAllProjects());
        
        parent::set('editionCollection', $this->db->getAllProjectEditions());
    }
    
    
    public function addProjectAction($params)
    {
        if (!empty($params['submit'])) {
            
            if ($id = $this->db->addProject($params['project'])) {

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
                
                parent::redirect ('cms'.DS.'projects', 'success');
            } else {
                parent::redirect ('cms'.DS.'project'.DS.'edit'.DS.$params['id'], 'error');
            }
        }

        parent::set('project', $this->db->getProject($params['id']));
    }
    
    
    public function deleteProjectAction($params)
    {
        
        $allEdition = $this->db->getProjectEditions($params['id']);
        
        foreach($allEdition as $ae){
            
            $this->deleteEditionAction(array('id'=>$ae['id']));
        }
        if($this->db->deleteProject($params['id'])){

            parent::redirect ('cms'.DS.'projects', 'success');
        }else{
            parent::redirect ('cms'.DS.'projects', 'error');
        }
    }
    
    
    public function addEditionAction($params)
    {
        if (!empty($params['submit'])) {
            
            if ($id = $this->db->addEdition($params['edition'])) {
                $params['id'] = $id;
                $this->manageImagesAndFiles($params);
                parent::redirect ('cms'.DS.'projects', 'success', '#fragment-'.$params['project_id']);
            } else {
                parent::redirect ('cms'.DS.'project'.DS.$params['project_id'].DS.'edition'.DS.'add', 'error');
            }
        }
    }

    
    public function editEditionAction($params)
    {
        if (!empty($params['submit'])) {
            
            if ($this->db->editEdition($params['edition'])) {
                
                $this->manageImagesAndFiles($params);
                parent::redirect ('cms'.DS.'projects', 'success', '#fragment-'.$params['project_id']);
            } else {
                parent::redirect ('cms'.DS.'project'.DS.$params['project_id'].DS.'edition'.DS.'edit'.$params['id'], 'error');
            }
        }
        
        parent::set('edition', $this->db->getEdition($params['id']));
    }
    
    public function deleteEditionAction($params)
    {
        $this->deleteImageAndFiles($params['id']);

        if($this->db->deleteEdition($params['id'])){

            parent::redirect ('cms'.DS.'projects', 'success', '#fragment-'.$params['project_id']);
        }else{
            parent::redirect ('cms'.DS.'projects', 'error', '#fragment-'.$params['project_id']);
        }
    }
    
    protected function manageImagesAndFiles($params)
    {
        
        $data = $this->db->getImagesAndFiles($params['id']);
        if (isset($params['main_image']) && 0 == $params['main_image']['error']) {

            //Update image
            $imageName = $params['id'].'-m'.$params['main_image']['name'];
            $oldImageName = $data['main_image'];

            $this->reUploadImage($oldImageName, $imageName, $params['main_image'], 'project');
            $this->db->setProjectImage($params['id'], $imageName, 'main_image');
            //Delete thumb
            $oldThumbImageName = 'thumb-'.$oldImageName;

            $this->deleteImage($oldThumbImageName, 'project');
            //Create thumb
            $this->createThumbImage($imageName, 'project', 170, 240);
        }
        if (isset($params['top_image']) && 0 == $params['top_image']['error']) {

            //Update image
            $imageName = $params['id'].'-t'.$params['top_image']['name'];
            $oldImageName = $data['top_image'];

            $this->reUploadImage($oldImageName, $imageName, $params['top_image'], 'project');
            $this->db->setProjectImage($params['id'], $imageName, 'top_image');
            //Delete thumb
            $oldThumbImageName = 'thumb-'.$oldImageName;

            $this->deleteImage($oldThumbImageName, 'project');
            //Create thumb
            $this->createThumbImage($imageName, 'project', 350, 110);
        }
        if (isset($params['bottom_image']) && 0 == $params['bottom_image']['error']) {

            //Update image
            $imageName = $params['id'].'-b'.$params['bottom_image']['name'];
            $oldImageName = $data['bottom_image'];

            $this->reUploadImage($oldImageName, $imageName, $params['bottom_image'], 'project');
            $this->db->setProjectImage($params['id'], $imageName, 'bottom_image');
            //Delete thumb
            $oldThumbImageName = 'thumb-'.$oldImageName;

            $this->deleteImage($oldThumbImageName, 'project');
            //Create thumb
            $this->createThumbImage($imageName, 'project', 350, 110);
        }
        
        
        /*** FILES ***/
        if (isset($params['main_file']) && 0 == $params['main_file']['error']) {

            //Update image
            $imageName = $params['id'].'-dm'.$params['main_file']['name'];
            $oldImageName = $data['main_file'];

            $this->reUploadImage($oldImageName, $imageName, $params['main_file'], 'project');
            $this->db->setProjectImage($params['id'], $imageName, 'main_file');
        }
        if (isset($params['top_file']) && 0 == $params['top_file']['error']) {

            //Update image
            $imageName = $params['id'].'-dt'.$params['top_file']['name'];
            $oldImageName = $data['top_file'];

            $this->reUploadImage($oldImageName, $imageName, $params['top_file'], 'project');
            $this->db->setProjectImage($params['id'], $imageName, 'top_file');
        }
        if (isset($params['bottom_file']) && 0 == $params['bottom_file']['error']) {

            //Update image
            $imageName = $params['id'].'-db'.$params['bottom_file']['name'];
            $oldImageName = $data['bottom_file'];

            $this->reUploadImage($oldImageName, $imageName, $params['bottom_file'], 'project');
            $this->db->setProjectImage($params['id'], $imageName, 'bottom_file');
        }
    }
    
    protected function deleteImageAndFiles($id)
    {
        
        $data = $this->db->getImagesAndFiles($id);
        
        $this->deleteImage($data['main_image'], 'project');
        $this->deleteImage($data['top_image'], 'project');
        $this->deleteImage($data['bottom_image'], 'project');
        
        $this->deleteImage($data['main_file'], 'project');
        $this->deleteImage($data['top_file'], 'project');
        $this->deleteImage($data['bottom_file'], 'project');
    }
    
}
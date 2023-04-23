<?php

namespace App\interfaces;



interface ProjectInterface{

    public function getAllProjects();
    public function getPaginateProjects($paginateNum);
    public function detail($id);
    public function downloadProject($id);
    public function deleteProject($ProjectId);
    public function editProject($id);
    public function storeProject(array $data);
    public function updateProject( $id, array $data);  


}



?>

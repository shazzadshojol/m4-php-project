<?php
require_once __DIR__ . '/MyVehicleBase.php';
require_once __DIR__ . '/MyVehicleActions.php';
require_once __DIR__ . '/MyFileHandler.php';

class MyVehicleManager extends MyVehicleBase implements MyVehicleActions{
    use MyFileHandler;

    public function addVehicle($data){
        $vh =$this->readFile();
        $vh[] = $data;
        $this->writeFile($vh);
    }
    public function editVehicle($id, $data){
        $vh =$this->readFile();
        if(isset($vh[$id])){
            $vh[$id]=$data;
            $this->writeFile($vh);
        }
    }
    public function deleteVehicle($id){
        $vh =$this->readFile();
        if(isset($vh[$id])){
            unset($vh[$id]);
            $this->writeFile(array_values($vh));
        }
    }
    public function getVehicles(){
        return $this->readFile();
    }
    public function getDetails(){
        return [
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
            'image' => $this->image
        ];
    }
}
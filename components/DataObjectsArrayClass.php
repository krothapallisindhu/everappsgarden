<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class DataObjectsArray extends ArrayObject{ 
   private $data; 
   function __construct(){ 
       $this->data = new ArrayObject(); 
   } 
   
   function addObject($_id, $_object){ 
       $_thisItem = new CollectionObject($_id, $_object); 
       $this->data->offSetSet($_id, $_thisItem); 
   } 
   function deleteObject($_id){ 
       $this->data->offsetUnset($_id); 
   } 
   function getObject($_id){ 
       $_thisObject = $this->data->offSetGet($_id); 
       return $_thisObject->getObject(); 
   } 
   function printCollection() { 
       print_r($this->data); 
   } 
   
   function getLenth()
   {
       return count($this->data);
   }
} 
class CollectionObject {
    private $id;
    private $object;
   
    function __construct($_id, $_object){
        $this->id = $_id;
        $this->object = $_object;
    }
    function getObject(){
        return $this->object;
    }
    function printObject() {
        print_r($this);
    }
} 

?>

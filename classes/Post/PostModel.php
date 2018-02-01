<?php
  /**
   *  PostModel Class
   */

   namespace App\Post;

   use ArrayAccess;

   class PostModel implements ArrayAccess {
     public $id;
     public $title;
     public $content;

     // ArrayAccess-Function for isset()
     public function offsetExists($offset){
       return isset($this->$offset);
     }

     // ArrayAccess-Function for instanceofaclass['value']
     public function offsetGet($offset){
       return $this->$offset;
     }

     // ArrayAccess-Function for instanceofaclass['value'] = "value"
     public function offsetSet($offset, $value){
       $this->$offset = $value;
     }

     // ArrayAccess-Function for unset()
     public function offsetUnset($offset){
       unset($this->$offset);
     }

   }

?>

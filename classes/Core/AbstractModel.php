<?php

  /**
   *  Class Abstract Model
   */

  namespace App\Core;

  use ArrayAccess;

  class AbstractModel implements ArrayAccess
  {
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

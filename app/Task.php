<?php

namespace App;

use Eloquent;

class Task extends Eloquent
{
    public function findTask($id){
      return Task::find($id);
    }
    public function selectAll(){
      return Task::all();
    }
}

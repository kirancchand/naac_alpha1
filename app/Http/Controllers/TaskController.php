<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use \App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $task;
    public function index()
    {
      if(session()->get('user')||1==1){
      // get all the tasks
      $task_model= new Task();
      $tasks = $task_model->selectAll();

      // load the view and pass the tasks
      return View::make('tasks.index')
          ->with('tasks', $tasks);
      }
      else {
        Session::flash('message', 'Noob Breacher caught red!');
        return Redirect::to('/');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return View::make('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // validate
      // read more on validation at http://laravel.com/docs/validation
      $rules = array(
          'name'       => 'required',
          'content'    => 'required'
      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('tasks/create')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $task = new Task;
          $task->name    = Input::get('name');
          $task->content = Input::get('content');
          $task->save();

          // redirect
          Session::flash('message', 'Successfully created task!');
          return Redirect::to('tasks');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // get the task
     $task_model= new Task();
     $task = $task_model->findTask($id);

     // show the view and pass the task to it
     return View::make('tasks.show')
         ->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // get the task
      $task_model= new Task();
      $task = $task_model->findTask($id);
      //$task = Task::find($id);

      // show the edit form and pass the task
      return View::make('tasks.edit')
          ->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // validate
      // read more on validation at http://laravel.com/docs/validation
      $rules = array(
          'name'       => 'required',
          'content'    => 'required'
      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('tasks/' . $id . '/edit')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $task_model=new Task();
          $task = $task_model->findTask($id);
          $task->name     = Input::get('name');
          $task->content  = Input::get('content');
          $task->save();

          // redirect
          Session::flash('message', 'Successfully updated task!');
          return Redirect::to('tasks');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // delete
      $task_model= new Task();
      $task = $task_model->findTask($id);
      $task->delete();

      // redirect
      Session::flash('message', 'Successfully deleted the task!');
      return Redirect::to('tasks');
    }
}

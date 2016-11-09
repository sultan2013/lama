<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\EditPermissionRequest;

class PermissionController extends Controller
{


  public function index()
  {
      //
      $text_alignment = "text-right";
      $permissions = (new Permission)->get();
       return view('permissions.index',compact('permissions','text_alignment'));

  }


   public function create()
   {
       //
       $permissions = (new Permission)->get();
        return view('permissions.create',compact('permissions'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(CreatePermissionRequest $request)
   {
       //
       $permission = Permission::create($request->all());
       flash('The permission has been created successfully', 'success');
       return back();
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       //
       return "show page";
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       //
       $_permission = Permission::findOrFail($id);
       $permissions = Permission::all();
       return view('permissions.edit',compact('_permission','permissions'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(EditPermissionRequest $request, $id)
   {
       //
       $permission = Permission::findOrFail($id);
       //if the entered values are the same as the database value don't edit
       if($permission->name == $request->name && $permission->label == $request->label)
       {
         flash('There is nothing to edit', 'warning');
         return back();

       }
       $permission->update($request->all());
       flash('The permission has been updated successfully', 'success');
       return redirect('permissions/create');

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       //
       $permission = Permission::findOrFail($id);
       $permission->delete($id);
       flash('The permission has been deleted successfully', 'success');
       return redirect('permissions/create');
   }


}

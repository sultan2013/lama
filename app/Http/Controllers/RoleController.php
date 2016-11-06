<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    //



    public function index(){

      return view('roles.index');
    }

public function create(){

  return "craete form";
}
    public function store(Request $request){

      return "store method";
    }

    public function edit($id){
      return "edit form";
    }
    public function update(Request $request){
      return "udate method";
    }
    public function show($id){
      return 'show method';
    }
    public function destroy($id){
      return 'delete method';
    }
}

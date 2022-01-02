<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main;
class MainPagesController extends Controller
{
   
    public function index()
    {
        $main = Main::first();

        return view('pages.main', compact('main'));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'sub_title' => 'required|string',
           
        ]);

        $main = Main::first();
        $main->title = $request->title;
        $main->sub_title = $request->sub_title;
        

        if($request->file('bc_img')){
            $img_file =$request->file('bc_img');
            $img_file->storeAs('public/img/','bc_img.' .$img_file->getClientOriginalExtension());
            $main->bc_img ='storage/img/bc_img.' .$img_file->getClientOriginalExtension();
        }

        if($request->file('resume')){
            $img_file =$request->file('resume');
            $img_file->storeAs('public/pdf/','resume.' .$img_file->getClientOriginalExtension());
            $main->resume ='storage/pdf/resume.' .$img_file->getClientOriginalExtension();
        }

        if($request->file('nav_logo')){
            $img_file =$request->file('nav_logo');
            $img_file->storeAs('public/img/','nav_logo.' .$img_file->getClientOriginalExtension());
            $main->bc_img ='storage/img/nav_logo.' .$img_file->getClientOriginalExtension();
        }

        $main->save();

        
        return redirect()->route('admin.main')->with('success', "Main page data has been update successfully");
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
class PagesController extends Controller
{
    public function index(){

        $title = 'Login';  
        //return view('pages.dashboard')->with('title',$title);
        return view('pages.index');
    }

    public function dashboard(){
       
        $data = DB::select('Select c.name as cat, sum(e.amount) as amount from expenses e left join categories c on e.expenseid = c.id group by c.name');
       
        return view('pages.dashboard')->with('data',$data);
    }

    public function validateuser(Request $request)
    {
      

        $user = User::find($request); 
       

        return redirect('/dashboard');
    }

   

}

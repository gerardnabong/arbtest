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

    public function decrypt()
    {
        //return "test";
        //return encrypt("test");
        return decrypt("9274742c70986303bdee7227924b651cebda90449e608144cc2ef7b443862c7986a85baf8b344d9ea2a3ce9aef351c037fe2aabf45b10ad69508c2939763bab1olwgEjZSipRacZUumWhzooA0gEoATGZH+WKANtwsiDM=");
    }


   

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Category;
use DB;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$exps = Expense::all();
        $exps = DB::select('Select e.id, c.name, e.amount, e.entrydate, e.created_at from expenses e left join categories c on e.expenseid = c.id');
        return view('expense.index')->with('exps',$exps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('expense.create')->with('cats',$cats);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $this->validate($request,[
            'expenseid' => 'required',
            'amount' => 'required',
            'entrydate' => 'required'
        ]);

        $exp = new Expense; 
        $exp->expenseid = $request->input('expenseid');
        $exp->amount = $request->input('amount');
        $exp->entrydate = $request->input('entrydate');
        $exp->save();

        return redirect('/expenses')->with('success', 'Expense Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      

        $data = array(

            'exp' => Expense::find($id),
            'cats' => Category::all()

        );
        
        return view ('expense.show')->with($data);
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
        $this->validate($request,[
            'expenseid' => 'required',
            'amount' => 'required',
            'entrydate' => 'required'
        ]);

        $exp = Expense::find($id); 
        $exp->expenseid = $request->input('expenseid');
        $exp->amount = $request->input('amount');
        $exp->entrydate = $request->input('entrydate');
        $exp->save();

        return redirect('/expenses')->with('success', 'Expense Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exp = Expense::find($id); 
        $exp->delete();
        return redirect('/expenses')->with('success', 'Expense Deleted');
    }
}

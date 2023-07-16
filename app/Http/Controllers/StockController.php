<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth; 
 
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        
        $stocks = Stock::where('user_id', Auth::id())->get();
        return view ('stocks.index')->with('stocks', $stocks);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    return view('stocks.create');
}

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        Stock::create($input);
        return redirect('stock')->with('flash_message', 'Product Added!'); 
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = Stock::find($id);
        return view('stocks.show')->with('stocks', $stock);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::find($id);
        return view('stocks.edit')->with('stocks', $stock);
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
        $stock = Stock::find($id);
        $input = $request->all();
        $stock->update($input);
        return redirect('stock')->with('flash_message', 'stock Updated!');  
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stock::destroy($id);
        return redirect('stock')->with('flash_message', 'stock deleted!');  
    }
}
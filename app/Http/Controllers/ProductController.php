<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\User;

class ProductController extends Controller
{
    // function getProduct(){
    //     // $Products=  DB::select('select * from product');
    //     //-------model calling and data fetching ----------//
    
    //     $product = \App\Models\product::all();
    //     // return $product;
    //     return view('product',['product'=> $product]);

    // }

    //---database query builder -----------//
    function quesries(){
    $result = DB::table('product')->where('category','Nites')->get();
    return view('product',['product'=> $result]);
    }   

    //---ORM query builder -----------//

    //------------get all data-------------
            // $$result = product::get();
//--------------------- inssert data -----------------------//
    // function eomQueries(){
    //     // $$result = product::get();
    //     $result = product::insert([
    //         'name'=>'Waterbottle',
    //         'code' => 'WATER',
    //         'category'=>'ADD',
    //         'addedDate' =>Now(),
    //         'status'=>'Active'

    //     ]);
    //     if($result){
    //         return "Data inserted sucessfully.";
    //     }else{
    //         return"Data not inserted";
    //     }
    //     // return view('product',['product'=>$result]);
    //     }

        //-----------------Update data-------------------//
        function eomQueries(){
            // $$result = product::get();
            $result = product::where('name','Book')->update(['code'=>'BOOK']);
        
            if($result){
                return "Data updated sucessfully.";
            }else{
                return"Data not updated";
            }
            // return view('product',['product'=>$result]);
            }

    //------------Product form -----------//
    function addProudct(){
        return view('addProduct');
    }

    //---------------product section form------------------------
    
public function create()
{
    return view('product.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'code' => 'required',
        'category'=>'required',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    ]);
    // $imagePath = $request->file('img')->store('images', 'public');
    // echo $imagePath;
    $image = $request->file('img');
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('uploads'), $imageName); 

    Product::create([
        'name' => $validated['name'],
        'code' => $validated['code'],
        'category' => $validated['category'],
        'image' => $imageName,
    ]);

    return redirect()->route('product.index')->with('success', 'Product added successfully.');
}

public function index()
{
    // $products = Product::all();
    $products = Product::paginate(5);
    return view('product.index', compact('products'));
}



}

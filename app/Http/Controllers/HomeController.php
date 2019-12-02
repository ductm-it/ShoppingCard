<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;
use App\Models\Shoes;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homepage.index');
    }

    //search
    public function getSearch(Request $request)
    {
        $shoes = Shoes::where('name','like','%'.$request->search.'%')
                        ->orWhere('outPrice',$request->search)
                        ->get();
                      
                        
        return view('partials.search',compact('shoes'));
    
        //     $shoes = Shoes::where('name','like','%'.$request->$search.'%')
        //                     ->orWhere('inPrice',$request->search)
        //                     ->get();	
    
    	
        // return view('partials.search',compact('shoes'));
    }

    public function renderProduct()
    {
        $data = DB::table('shoes')->simplePaginate(12);
        foreach ($data as $item) {
            $item->outPrice = str_replace('.00000', '', $item->outPrice);
            $item->outPrice = $item->outPrice . ' VND';
        }
        return view('homepage.index', ['data' => $data]);
    }

    public function renderProductByCategory($categoryID)
    {
        $data = DB::table('shoes')
            ->where('categoryID', $categoryID)
            ->simplePaginate(15);
        foreach ($data as $item) {
            $item->outPrice = str_replace('.00000', '', $item->outPrice);
            $item->outPrice = $item->outPrice . ' VND';
        }

        // return view('homepage.index', compact('data'));
        return view('homepage.index', ['data'=>$data]);

    }
}

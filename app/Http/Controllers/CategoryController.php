<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Utils\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    // public function getCategoryID()
    // {
    //     $categoryid = DB::table('shoes')
    //         ->select(DB::raw('distinct categoryID'))
    //         ->get();
    //     return $categoryid;
    // }
    // confirm delete user
    public function deleteCate($id){
        
        
        DB::table('shoes')
        -> where('categoryID','=',$id)
        ->delete();
        DB::table('category')
        -> where('id','=',$id)
        ->delete();
        return 1;

    }
    public function getProductInfo($ProductID)
    {
        $shoes = DB::table('shoes')
                                ->join('category', 'shoes.categoryID', '=', 'category.id')
                                ->select('shoes.id','shoes.name','shoes.description','shoes.image','shoes.inPrice','shoes.outPrice','shoes.inStock','shoes.created_at','shoes.updated_at','category.categoryName','shoes.categoryID')
                                ->where('shoes.id',$ProductID)
                                ->get();
        // info($ProductID);
        // $categoryName=DB::table('category')
        //     ->where('id','=',$id)
        //     ->select('category.categoryName')
        //     ->get();
        return $shoes;
    }
    public function getCateInfor($cateid){
        $category=DB::table('category')
                            ->select('category.id','category.categoryName','category.created_at','category.updated_at')
                            ->where('id',$cateid)
                            ->get();
                            return $category;
    }

        public function updateProduct(Request $req, $id)
        {
            // extract data from input
            $name = $req->input(('name'));
            $description = $req->input(('description'));
            $categoryid = $req->input(('categoryID'));
            $inprice = $req->input(('inPrice'));
            $outprice = $req->input(('outPrice'));
            $instock = $req->input(('inStock'));
            $createat=$req->input(('created_at'));
            $updateat=$req->input(('updated_at'));
            $createat = str_replace('-', '/', $createat);
            $createat = Carbon::parse($createat)->format('Y/m/d');
            $updateat = str_replace('-', '/', $updateat);
            $updateat = Carbon::parse($updateat)->format('Y/m/d');

            $updateArr = [
                'name' => $name,
                'description' => $description,
                'categoryID' => $categoryid,
                'inPrice' => $inprice,
                'outPrice' => $outprice,
                'inStock'=>$instock,
                'created_at'=>$createat,
                'updated_at'=>$updateat,
            ];

            // process file
            $hasFile = $req->hasFile('file');
            if ($hasFile) {
                $file = $req->file('file');
            
                $newImageURL= UploadFile::uploadFile('upload',$file);

                $updateArr['image'] = $newImageURL;
            }

            DB::table('shoes')
                ->where('id', $id)
                ->update(
                    $updateArr
                );
            return 1;
        }
}
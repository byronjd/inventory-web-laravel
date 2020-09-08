<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kardex;
use App\Products;
use App\Images;
use Yajra\Datatables\Datatables;

class KardexController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProductList()
    {
        $query = Products::select('id','code','name')
        ->with(['first_image'])
        ->where('products.is_deleted', '0');

        return datatables()->eloquent($query)
        ->addColumn('actions', '<div class="btn-group float-right">
                    <a type="button" class="btn btn-info" href="{{ route("records", "$id") }}"><i class="bx bx-task" style="color: white"></i>Ver registros</a>
                    </div>')
        ->addColumn('photo', function($products){
                    $path = asset($products->first_image->src);
                    return '<img class="img-round" src="'.$path.'"  style="max-height:50px; max-width:70px;"/>';
        })
        ->rawColumns(['actions', 'photo'])
        ->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Components"],["name" => "Alerts"]
        ];
        return view('pages.kardex', ['breadcrumbs'=>$breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function records($id)
    {
        $breadcrumbs = [
            ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Components"],["name" => "Alerts"]
        ];
        $product = Products::select(['name', 'code', 'description', 'image'])->where('id', $id)->first();
        return view('pages.kardex.records', compact(['id', 'product']));
    }

    public function get_records($id)
    {
        $records = Kardex::where('id_product', $id)->get();
        return Datatables::of($records)
        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
    }
}

<?php

namespace App\Http\Controllers\API;

use App\House;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexHousesRequest;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexHousesRequest $request)
    {
        $validated = $request->validated();
        $houses = House::query();

        if ( $request->input('name') != null ){
            $houses->where('name', 'LIKE', '%'.$request->input('name').'%');
        }
        if (  $request->input('priceStart') != null){
            $priceStart = $request->input('priceStart');
            $priceFinish = $request->input('priceFinish');
            if ( $priceFinish == null ) {
                $houses->where('price', '>=', $priceStart );
            } else {
                $houses->whereBetween('price', [ $priceStart, $priceFinish ]);
            }
        }
        if ( $request->input('bedrooms') != null ){
            $houses->where('bedrooms', $request->input('bedrooms'));
        }
        if ( $request->input('bathrooms') != null ){
            $houses->where('bathrooms', $request->input('bathrooms'));
        }
        if ( $request->input('storeys') != null ){
            $houses->where('storeys', $request->input('storeys'));
        }
        if (  $request->input('garages') != null ){
            $houses->where('garages', $request->input('garages'));
        }

        $houses = $houses->get();
        return $houses;
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

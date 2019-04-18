<?php

namespace Techlify\AssetManagement\Controllers;

use App\Http\Controllers\Controller;
use Techlify\AssetManagement\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filters = request([
            'date_purchased_from', 
            'date_purchased_to', 
            'created_at_from',
            'created_at_to', 
            'num_items', 
            'sort_by'
        ]);
        
        $items = Asset::filter($filters)
            ->with('creator')
            ->get();
        
        return ["data" => $items];
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            "description"       => "required",
            "cost"              => "required|numeric",
            "date_purchased"    => "required|date",
            "warehouse_id"      => "exists:warehouses,id",
        ]);

        $item = new Asset();
        $item->description = request('description');
        $item->cost = request('cost');
        $item->date_purchased = explode('T', request('date_purchased'))[0];
        $item->warehouse_id = request('warehouse_id');
        $item->user_id = request('user_id');        
        $item->details = request('details', "");
        $item->user_id = auth()->id();

        if (!$item->save()) {
            return response()->json(['error' => "Failed to add Asset."], 422);
        }

        return ["item" => $item];
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $item = Asset::find($id);
        
        if($item == null){
            return response()->json(['error' => "Invalid Asset data sent."], 422);
        }
                
        $this->validate(request(), [
            "description"       => "required",
            "cost"              => "required|numeric",
            "date_purchased"    => "required|date",
            "warehouse_id"      => "exists:warehouses,id",
        ]);

        $item->description = request('description');
        $item->cost = request('cost');
        $item->date_purchased = explode('T', request('date_purchased'))[0];
        $item->warehouse_id = request('warehouse_id');
        $item->user_id = request('user_id');        
        $item->details = request('details', "");
        $item->user_id = auth()->id();

        if (!$item->save()) {
            return response()->json(['error' => "Failed to update Asset."], 422);
        }

        return ["item" => $item];
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Asset::find($id);
        
        if(null == $item){
            return response()->json(['error' => "Invalid Asset data sent"], 422);
        }
        
        if (!$$item->delete()){
            return response()->json(['error' => "Failed to delete Asset."]);
        }

        return ["item " => $item];
    }    
}

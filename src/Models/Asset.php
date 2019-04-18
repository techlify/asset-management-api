<?php

namespace TechlifyInc\TechlifyAssetManagement\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Asset extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    
    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }
    
    public function scopeFilter($query, $filters)
    {
        if(isset($filters['date_purchased_from']) && "" != trim($filters['date_purchased_from'])){
            $query->where('date_purchased', '>=', $filters['date_purchased_from']);
        }
        if (isset($filters['date_purchased_to']) && "" != trim($filters['date_purchased_to'])){
            $query->where('date_purchased', '<=', $filters['date_purchased_to']);
	}
        if(isset($filters['created_at_from']) && "" != trim($filters['created_at_from'])){
            $query->where('created_at', '>=', $filters['created_at_from']);
        }
        if (isset($filters['created_at_to']) && "" != trim($filters['created_at_to'])){
            $query->where('created_at', '<=', $filters['created_at_to']);
	}        
        if (isset($filters['sort_by']) && "" != trim($filters['sort_by'])){
            $sort = explode("|", $filters['sort_by']);
            $query->orderBy($sort[0], $sort[1]);
        }        
        if (isset($filters['num_items']) && is_numeric($filters['num_items'])){
            $query->limit($filters['num_items']);
        }        
    }
}

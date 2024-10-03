<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
               'category_id',
               'first_name',
               'last_name',
               'gender',
               'email',
               'tel',
               'address',
                'building',
                'detail'
            ];

            public function category()
               {
                   return $this->belongsTo(Category::class,'category_id');
               }       
               
            public function scopeFilter($query, array $filters)
    {
        if (!empty($filters['name'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('first_name', 'LIKE', '%' . $filters['name'] . '%')
                  ->orWhere('last_name', 'LIKE', '%' . $filters['name'] . '%');
            });
        }

        if (!empty($filters['email'])) {
            $query->where('email', 'LIKE', '%' . $filters['email'] . '%');
        }

        if (!empty($filters['gender']) && $filters['gender'] != '全て') {
            $query->where('gender', $filters['gender']);
        }

        if (!empty($filters['inquiryType'])) {
            $query->whereHas('category', function ($query) use ($filters) {
                $query->where('content', 'like', '%' . $filters['inquiryType'] . '%');
            });
        }

        if (!empty($filters['date'])) {
            $query->whereDate('created_at', $filters['date']);
        }
        return $query;
    }
}

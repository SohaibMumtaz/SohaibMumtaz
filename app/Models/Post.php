<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with    = ['author', 'category', 'comments'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search']??false,fn($query, $search)=>
        
            $query->where(fn($query)=>
                $query->where('title', 'like', '%'. request('search'). '%')
                ->orWhere('body','like', '%'. request('search'). '%')));
        
        $query->when($filters['category']??false,fn($query, $category)=>
        
            $query
                ->whereHas('category', fn($query)=>
                 $query->where('slug',$category)));

        $query->when($filters['author']??false,fn($query, $author)=>
        
        $query
            ->whereHas('author', fn($query)=>
             $query->where('username',$author)));
        
    }
    
    public function category(){
        //hasMany, hasOne, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    // public function user(){
    public function author(){
        //hasMany, hasOne, belongsTo, belongsToMany
        // return $this->belongsTo(User::class);
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}

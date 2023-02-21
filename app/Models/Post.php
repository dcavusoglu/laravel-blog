<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = ['slug','title', 'excerpt', 'body', 'category_id'];

    //instead of writing slug on routes you can overwrite key method to find the specific slug post as follows:
        // public function getRouteKeyName()
        // {
        //     return 'slug';
        // }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

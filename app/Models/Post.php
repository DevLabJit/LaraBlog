<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';



     /*
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    /*protected $primaryKey = 'category_id';*/


    public function getRouteKeyName()
    {
       return 'slug';
    }


    /**
     * Get the category that owns the posts.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the user that owns the posts.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

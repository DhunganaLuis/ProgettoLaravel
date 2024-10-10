<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Book extends Model
{
    use HasFactory;
    protected $fillable=['title','description','pages','author_id','category_id','cover_image'];

    protected $defaultImage = 'cover/default.png';
    protected static  function boot()
    {
        parent::boot();

        static::deleting(function($book){
            if ($book->cover_image && $book->cover_image !== $book->defaultImage) {
                $filePath = public_path($book->cover_image);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }
        });

    }

    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}

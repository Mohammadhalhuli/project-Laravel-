<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cat extends Model{
    use HasFactory;
    protected $table="cats";
    protected $fillable = ['name','description','image'];

    public function books(){
        return $this->hasMany(Book::class);
    }
}

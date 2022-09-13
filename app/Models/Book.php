<?php

namespace App\Models;

use App\Models\Cat;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $table="books";
    protected $fillable = ['name',
            'description',
            'image',
            'price',
            'cat_id',
            'user_id'];
    public function cat(){
        return $this->belongsTo(Cat::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

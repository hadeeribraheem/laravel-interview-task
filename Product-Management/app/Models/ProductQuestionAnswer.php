<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQuestionAnswer extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'question_id', 'answer'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}
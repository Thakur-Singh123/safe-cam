<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashSlider extends Model
{
    use HasFactory;
    protected $table = 'trash_sliders';
    protected $fillable = ['slider_id'];
}

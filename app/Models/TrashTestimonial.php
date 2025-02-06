<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashTestimonial extends Model
{
    use HasFactory;
    protected $table = 'trash_testimonials';
    protected $fillable = ['testimonial_id'];
}

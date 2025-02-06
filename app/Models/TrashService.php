<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashService extends Model
{
    use HasFactory;

    protected $table = 'trash_services';
    protected $fillable = ['service_id'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashContact extends Model
{
    use HasFactory;

    protected $table = 'trash_contacts';
    protected $fillable = ['contact_id'];
}

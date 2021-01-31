<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerubahanModal extends Model
{
    use HasFactory;

    protected $table = 'perubahan_modal';

    protected $fillable = ['perubahan_modal'];
}
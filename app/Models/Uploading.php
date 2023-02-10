<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploading extends Model
{
    use HasFactory;
    protected $table = 'uploading';

    protected $fillable = [
        'author',
        'email',
        'phone',
        'message',
    ];
}

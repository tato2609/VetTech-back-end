<?php

namespace Modules\Pets\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pets extends Model
{
    use HasFactory;
    protected $table = 'pets';
}

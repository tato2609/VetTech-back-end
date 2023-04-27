<?php
namespace Modules\Pets\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Races extends Model
{
    use HasFactory;
    protected $table = 'races';
}

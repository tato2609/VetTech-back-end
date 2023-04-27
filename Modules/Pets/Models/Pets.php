<?php
namespace Modules\Pets\Models;

use Modules\Clients\Models\Clients;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pets extends Model
{
    use HasFactory;
    protected $table = 'pets';

    public function cliente()
    {
        return $this->belongsTo(Clients::class, 'client_id', 'id');
    }
}

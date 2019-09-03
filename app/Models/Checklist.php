<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Checklist extends Model
{
    use Uuids;
    public $incrementing = false;
    
    protected $primaryKey = 'id_checklist';
    protected $fillable = ['titulo','usuario_alteracao'];
    protected $table = 'checklists';
}

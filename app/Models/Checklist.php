<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $primaryKey = 'id_checklist';
    protected $fillable = ['titulo','usuario_alteracao'];
    protected $table = 'checklists';
}

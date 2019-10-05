<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Permissao extends Model
{
	use Uuids;
	public $incrementing = false;

	protected $primaryKey = 'id_permissao';
	protected $fillable = ['nome','descricao','usuario_alteracao'];
	protected $table = 'permissoes';
	
	public function perfilpermissao(){
		return $this->belongsTo(Perfilpermissao::class,'id_permissao','permissao_id');
	}
}
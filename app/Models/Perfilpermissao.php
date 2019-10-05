<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Perfilpermissao extends Model
{

    use Uuids;
    public $incrementing = false;

	protected $primaryKey = 'id_perfilpermissao';
    protected $fillable = ['permissao_id','perfil_id','usuario_alteracao'];
    protected $table = 'perfilpermissaos';
    protected $with = ['permissao','perfil'];

   public function permissao(){
    	return $this->belongsTo(Permissao::class,'permissao_id','id_permissao');
    }
    
     public function perfil(){
    	return $this->belongsTo(Perfil::class,'perfil_id','id_perfil');
    }
}

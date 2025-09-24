<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoUsuario
 * 
 * @property int $id_tipo_usuario
 * @property string $rol
 * 
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class TipoUsuario extends Model
{
	protected $table = 'tipo_usuario';
	protected $primaryKey = 'id_tipo_usuario';
	public $timestamps = false;

	protected $fillable = [
		'rol'
	];

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'id_tipo_usuario');
	}
}

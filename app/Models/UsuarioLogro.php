<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsuarioLogro
 * 
 * @property int $id_usuario
 * @property int $id_logro
 * @property Carbon|null $fecha_obtenida
 * 
 * @property Usuario $usuario
 * @property Logro $logro
 *
 * @package App\Models
 */
class UsuarioLogro extends Model
{
	protected $table = 'usuario_logro';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_logro' => 'int',
		'fecha_obtenida' => 'datetime'
	];

	protected $fillable = [
		'fecha_obtenida'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function logro()
	{
		return $this->belongsTo(Logro::class, 'id_logro');
	}
}

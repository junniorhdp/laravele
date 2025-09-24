<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RutinaUsuario
 * 
 * @property int $id_asignacion
 * @property int|null $id_usuario
 * @property int|null $id_rutina
 * @property Carbon|null $fecha_inicio
 * @property Carbon|null $fecha_final
 * @property string|null $estado
 * @property string|null $adaptaciones_personalizadas
 * 
 * @property Usuario|null $usuario
 * @property Rutina|null $rutina
 *
 * @package App\Models
 */
class RutinaUsuario extends Model
{
	protected $table = 'rutina_usuario';
	protected $primaryKey = 'id_asignacion';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_rutina' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_final' => 'datetime'
	];

	protected $fillable = [
		'id_usuario',
		'id_rutina',
		'fecha_inicio',
		'fecha_final',
		'estado',
		'adaptaciones_personalizadas'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function rutina()
	{
		return $this->belongsTo(Rutina::class, 'id_rutina');
	}
}

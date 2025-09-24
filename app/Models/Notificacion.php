<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notificacion
 * 
 * @property int $id_notificacion
 * @property int|null $id_usuario
 * @property string|null $mensaje
 * @property Carbon|null $fecha_hora
 * @property string|null $estado
 * 
 * @property Usuario|null $usuario
 *
 * @package App\Models
 */
class Notificacion extends Model
{
	protected $table = 'notificacion';
	protected $primaryKey = 'id_notificacion';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'fecha_hora' => 'datetime'
	];

	protected $fillable = [
		'id_usuario',
		'mensaje',
		'fecha_hora',
		'estado'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}
}

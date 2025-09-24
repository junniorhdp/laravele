<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ValoracionProfesional
 * 
 * @property int $id_valoracion
 * @property int|null $id_usuario
 * @property Carbon|null $fecha_valoracion
 * @property string|null $comentarios
 * @property int|null $id_medida
 * 
 * @property Usuario|null $usuario
 * @property Medida|null $medida
 *
 * @package App\Models
 */
class ValoracionProfesional extends Model
{
	protected $table = 'valoracion_profesional';
	protected $primaryKey = 'id_valoracion';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'fecha_valoracion' => 'datetime',
		'id_medida' => 'int'
	];

	protected $fillable = [
		'id_usuario',
		'fecha_valoracion',
		'comentarios',
		'id_medida'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function medida()
	{
		return $this->belongsTo(Medida::class, 'id_medida');
	}
}

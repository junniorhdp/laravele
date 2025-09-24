<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Seguimiento
 * 
 * @property int $id_progreso
 * @property int|null $id_usuario
 * @property int|null $id_ejercicio
 * @property Carbon|null $fecha
 * @property int|null $repeticiones_realizadas
 * @property int|null $series_realizadas
 * @property float|null $peso_usado
 * @property string|null $comentarios
 * 
 * @property Usuario|null $usuario
 * @property Ejercicio|null $ejercicio
 *
 * @package App\Models
 */
class Seguimiento extends Model
{
	protected $table = 'seguimiento';
	protected $primaryKey = 'id_progreso';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_ejercicio' => 'int',
		'fecha' => 'datetime',
		'repeticiones_realizadas' => 'int',
		'series_realizadas' => 'int',
		'peso_usado' => 'float'
	];

	protected $fillable = [
		'id_usuario',
		'id_ejercicio',
		'fecha',
		'repeticiones_realizadas',
		'series_realizadas',
		'peso_usado',
		'comentarios'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function ejercicio()
	{
		return $this->belongsTo(Ejercicio::class, 'id_ejercicio');
	}
}

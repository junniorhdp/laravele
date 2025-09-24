<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RutinaEjercicio
 * 
 * @property int $id_rutina_ejercicio
 * @property int|null $id_rutina
 * @property int|null $id_ejercicio
 * @property string|null $dia_semana
 * @property int|null $orden
 * @property int|null $repeticiones
 * @property int|null $series
 * @property string|null $descanso
 * 
 * @property Rutina|null $rutina
 * @property Ejercicio|null $ejercicio
 *
 * @package App\Models
 */
class RutinaEjercicio extends Model
{
	protected $table = 'rutina_ejercicio';
	protected $primaryKey = 'id_rutina_ejercicio';
	public $timestamps = false;

	protected $casts = [
		'id_rutina' => 'int',
		'id_ejercicio' => 'int',
		'orden' => 'int',
		'repeticiones' => 'int',
		'series' => 'int'
	];

	protected $fillable = [
		'id_rutina',
		'id_ejercicio',
		'dia_semana',
		'orden',
		'repeticiones',
		'series',
		'descanso'
	];

	public function rutina()
	{
		return $this->belongsTo(Rutina::class, 'id_rutina');
	}

	public function ejercicio()
	{
		return $this->belongsTo(Ejercicio::class, 'id_ejercicio');
	}
}

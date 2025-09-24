<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ejercicio
 * 
 * @property int $id_ejercicio
 * @property string|null $nombre
 * @property int|null $tipo_ejercicio
 * @property string|null $equipo_necesario
 * @property string|null $nivel_dificultad
 * @property string|null $instrucciones
 * @property string|null $url_video
 * 
 * @property Collection|Rutina[] $rutinas
 * @property Collection|Seguimiento[] $seguimientos
 *
 * @package App\Models
 */
class Ejercicio extends Model
{
	protected $table = 'ejercicio';
	protected $primaryKey = 'id_ejercicio';
	public $timestamps = false;

	protected $casts = [
		'tipo_ejercicio' => 'int'
	];

	protected $fillable = [
		'nombre',
		'tipo_ejercicio',
		'equipo_necesario',
		'nivel_dificultad',
		'instrucciones',
		'url_video'
	];

	public function tipo_ejercicio()
	{
		return $this->belongsTo(TipoEjercicio::class, 'tipo_ejercicio');
	}

	public function rutinas()
	{
		return $this->belongsToMany(Rutina::class, 'rutina_ejercicio', 'id_ejercicio', 'id_rutina')
					->withPivot('id_rutina_ejercicio', 'dia_semana', 'orden', 'repeticiones', 'series', 'descanso');
	}

	public function seguimientos()
	{
		return $this->hasMany(Seguimiento::class, 'id_ejercicio');
	}
}

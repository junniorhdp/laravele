<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rutina
 * 
 * @property int $id_rutina
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property int|null $id_nivel
 * @property string|null $disciplina
 * @property string|null $duracion_total
 * @property string|null $comentario
 * 
 * @property Nivele|null $nivele
 * @property Collection|Ejercicio[] $ejercicios
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Rutina extends Model
{
	protected $table = 'rutina';
	protected $primaryKey = 'id_rutina';
	public $timestamps = false;

	protected $casts = [
		'id_nivel' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'id_nivel',
		'disciplina',
		'duracion_total',
		'comentario'
	];

	public function nivele()
	{
		return $this->belongsTo(Nivele::class, 'id_nivel');
	}

	public function ejercicios()
	{
		return $this->belongsToMany(Ejercicio::class, 'rutina_ejercicio', 'id_rutina', 'id_ejercicio')
					->withPivot('id_rutina_ejercicio', 'dia_semana', 'orden', 'repeticiones', 'series', 'descanso');
	}

	public function usuarios()
	{
		return $this->belongsToMany(Usuario::class, 'rutina_usuario', 'id_rutina', 'id_usuario')
					->withPivot('id_asignacion', 'fecha_inicio', 'fecha_final', 'estado', 'adaptaciones_personalizadas');
	}
}

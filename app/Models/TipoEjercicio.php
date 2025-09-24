<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoEjercicio
 * 
 * @property int $id_tipo
 * @property string $nombre
 * 
 * @property Collection|Ejercicio[] $ejercicios
 *
 * @package App\Models
 */
class TipoEjercicio extends Model
{
	protected $table = 'tipo_ejercicio';
	protected $primaryKey = 'id_tipo';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function ejercicios()
	{
		return $this->hasMany(Ejercicio::class, 'tipo_ejercicio');
	}
}

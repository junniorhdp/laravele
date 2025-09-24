<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Medida
 * 
 * @property int $id_medida
 * @property string $nombre_med
 * 
 * @property Collection|Usuario[] $usuarios
 * @property Collection|ValoracionProfesional[] $valoracion_profesionals
 *
 * @package App\Models
 */
class Medida extends Model
{
	protected $table = 'medidas';
	protected $primaryKey = 'id_medida';
	public $timestamps = false;

	protected $fillable = [
		'nombre_med'
	];

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'id_medida');
	}

	public function valoracion_profesionals()
	{
		return $this->hasMany(ValoracionProfesional::class, 'id_medida');
	}
}

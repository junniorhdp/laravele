<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nivele
 * 
 * @property int $id_nivel
 * @property string $nombre
 * 
 * @property Collection|Rutina[] $rutinas
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Nivele extends Model
{
	protected $table = 'niveles';
	protected $primaryKey = 'id_nivel';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function rutinas()
	{
		return $this->hasMany(Rutina::class, 'id_nivel');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'nivel_usuario');
	}
}

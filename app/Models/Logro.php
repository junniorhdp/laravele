<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Logro
 * 
 * @property int $id_logro
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property string|null $requisito
 * @property int|null $valoracion_num
 * @property string|null $estado
 * @property int|null $cantidad
 * 
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Logro extends Model
{
	protected $table = 'logros';
	protected $primaryKey = 'id_logro';
	public $timestamps = false;

	protected $casts = [
		'valoracion_num' => 'int',
		'cantidad' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'requisito',
		'valoracion_num',
		'estado',
		'cantidad'
	];

	public function usuarios()
	{
		return $this->belongsToMany(Usuario::class, 'usuario_logro', 'id_logro', 'id_usuario')
					->withPivot('fecha_obtenida');
	}
}

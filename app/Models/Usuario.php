<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;



 /**
  * Class Usuario
  *
  * @property int $id_usuario
  * @property string $nombre
  * @property string $apellido
  * @property string $genero
  * @property string $usuario
  * @property string $contrasena
  * @property int|null $edad
  * @property string|null $email
  * @property string|null $objetivo
  * @property string|null $disciplina_preferida
  * @property Carbon|null $fecha_registro
  * @property int|null $id_tipo_usuario
  * @property int|null $id_medida
  * @property int|null $nivel_usuario
  *
  * @property TipoUsuario|null $tipo_usuario
  * @property Medida|null $medida
  * @property Nivele|null $nivele
  * @property Collection|Notificacion[] $notificacions
  * @property Collection|Rutina[] $rutinas
  * @property Collection|Seguimiento[] $seguimientos
  * @property Collection|Logro[] $logros
  * @property Collection|ValoracionProfesional[] $valoracion_profesionals
  *
  * @package App\Models
  */
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Usuario extends Authenticatable
 {
 	protected $table = 'usuarios';
 	protected $primaryKey = 'id_usuario';
 	public $timestamps = false;
 	protected $casts = [
 		'edad' => 'int',
 		'fecha_registro' => 'datetime',
 		'id_tipo_usuario' => 'int',
 		'id_medida' => 'int',
 		'nivel_usuario' => 'int'
 	];
 	protected $fillable = [
 		'nombre',
 		'apellido',
 		'genero',
 		'edad',
 		'email',
		'password',
 		'objetivo',
 		'disciplina_preferida',
 		'fecha_registro',
 		'id_tipo_usuario',
 		'id_medida',
 		'nivel_usuario'
 	];
 
	protected $hidden = [
    'password',
	];

 	public function tipo_usuario()
 	{
 		return $this->belongsTo(TipoUsuario::class, 'id_tipo_usuario');
 	}
 	public function medida()
 	{
 		return $this->belongsTo(Medida::class, 'id_medida');
 	}
 	public function nivele()
 	{
 		return $this->belongsTo(Nivele::class, 'nivel_usuario');
 	}
 	public function notificacions()
 	{
 		return $this->hasMany(Notificacion::class, 'id_usuario');
 	}
 	public function rutinas()
 	{
 		return $this->belongsToMany(Rutina::class, 'rutina_usuario', 'id_usuario', 'id_rutina')
 					->withPivot('id_asignacion', 'fecha_inicio', 'fecha_final', 'estado', 'adaptaciones_personalizadas');
 	}
 	public function seguimientos()
 	{
 		return $this->hasMany(Seguimiento::class, 'id_usuario');
 	}
 	public function logros()
 	{
 		return $this->belongsToMany(Logro::class, 'usuario_logro', 'id_usuario', 'id_logro')
 					->withPivot('fecha_obtenida');
 	}
 	public function valoracion_profesionals()
 	{
 		return $this->hasMany(ValoracionProfesional::class, 'id_usuario');
 	}
}
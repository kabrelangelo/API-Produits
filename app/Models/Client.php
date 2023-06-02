<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * 
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $password
 * 
 * @property Collection|Commande[] $commandes
 *
 * @package App\Models
 */
class Client extends Model
{
	protected $table = 'clients';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nom',
		'prenom',
		'email',
		'password'
	];

	public function commandes()
	{
		return $this->hasMany(Commande::class, 'id_client');
	}
}

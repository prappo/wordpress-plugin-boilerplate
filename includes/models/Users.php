<?php
/**
 * Class Users
 *
 * Represents the Users model for MyPlugin.
 *
 * @package MyPlugin\Models
 */

namespace MyPlugin\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Users
 *
 * Represents the Users model for MyPlugin.
 *
 * @package MyPlugin\Models
 */
class Users extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array( 'user_login' );
}

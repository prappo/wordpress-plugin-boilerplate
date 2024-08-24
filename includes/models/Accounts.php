<?php
/**
 * Class Accounts
 *
 * Represents the Accounts model for MyPlugin.
 *
 * @package MyPlugin\Models
 * @since 1.0.0
 */

namespace MyPlugin\Models;

use Prappo\WpEloquent\Database\Eloquent\Model;

/**
 * Class Accounts
 *
 * Represents the Accounts model for MyPlugin.
 *
 * @package MyPlugin\Models
 */
class Accounts extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'accounts';

	/**
	 * The primary key for the model.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'user_id',
		'host',
		'port',
		'first_name',
		'last_name',
		'email',
		'name',
		'password',
		'created_at',
		'updated_at',
	);
}

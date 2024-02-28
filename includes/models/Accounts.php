<?php

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
}

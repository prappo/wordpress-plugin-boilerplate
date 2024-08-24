<?php
/**
 * Database configuration using Eloquent ORM.
 *
 * @package WordPress_Plugin_Boilerplate
 * @subpackage Database
 * @since 1.0.0
 */

namespace MyPlugin\Libs\DatabaseConnection;

use Prappo\WpEloquent\Application;

Application::bootWp();

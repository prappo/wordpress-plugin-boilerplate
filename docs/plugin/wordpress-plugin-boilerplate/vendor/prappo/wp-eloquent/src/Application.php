<?php


namespace Prappo\WpEloquent;

use Prappo\WpEloquent\Events\Dispatcher;
use Prappo\WpEloquent\Database\Capsule\Manager;
use Prappo\WpEloquent\Database\WpConnection;
use Prappo\WpEloquent\Support\Facades\Facade;

class Application
{
	/**
	 * @var Application
	 */
	protected static $instance;
	protected $manager;
	protected function __construct(){
		$this->manager=new Manager();
	}
	protected function setupWp($useWpConnection=true){
		if($useWpConnection) {
			$driver='wp';
		}else{
            $driver='mysql';
		}
        global $wpdb;
        $dbuser     = defined( 'DB_USER' ) ? DB_USER : '';
        $dbpassword = defined( 'DB_PASSWORD' ) ? DB_PASSWORD : '';
        $dbname     = defined( 'DB_NAME' ) ? DB_NAME : '';
        $dbhost     = defined( 'DB_HOST' ) ? DB_HOST : '';
        $charset=$wpdb->charset;
        $collate=$wpdb->collate;
        $this->setupConnection([
            'driver'    => $driver,
            'host'      => $dbhost,
            'database'  => $dbname,
            'username'  => $dbuser,
            'password'  => $dbpassword,
            'charset'   => $charset,
            'collation' => $collate,
            'prefix'    => $wpdb->prefix,
        ]);
	}
	protected function setupConnection($connection=[]){
		$this->manager->addConnection($connection);
	}
	protected function setupEloquent(){
		$app=$this->manager->getContainer();
		$app->instance('db',$this->manager->getDatabaseManager());
		Facade::setFacadeApplication($app);
		$this->manager->setAsGlobal();
		$this->manager->setEventDispatcher(new Dispatcher($app));
		$this->manager->bootEloquent();
	}
	public static function bootWp($useWpConnection=true){
		if(!static::$instance){
			static::$instance=new static();
			static::$instance->setupWp($useWpConnection);
			static::$instance->setupEloquent();
		}
		return static::$instance;
	}
	public static function boot($connection=[]){
		if(!static::$instance){
			static::$instance=new static();
			static::$instance->setupConnection($connection);
			static::$instance->setupEloquent();
		}
		return static::$instance;
	}
	public function getCapsule(){
		return $this->manager;
	}
	public static function getInstance(){
		return static::$instance;
	}
	/**
	 * Dynamically pass methods to the default connection.
	 *
	 * @param  string  $method
	 * @param  array  $parameters
	 * @return mixed
	 */
	public static function __callStatic($method, $parameters)
	{
		return static::$instance->getCapsule()->getConnection()->$method(...$parameters);
	}
}

<?php
/**
 * 
 */
class ManagerSessionController{

	private static $class_called = [];
	protected static $module;

	/**
	 * [getController description]
	 * @return [type] [description]
	 */
	public static function getController()
	{
		self::setModuleController();
		if(!isset(self::$class_called['controller'])){
			die('Controller name was not provided in route configuration to the '.self::$module);
		}
		if(!isset(self::$class_called['method'])){
			die('Method name was not provided in route configuration to the '.self::$module);
		}

		//Sets the view if it was informed at configuration route 
		if(isset(self::$class_called['view']) && !empty(self::$class_called['view'])){
			View::view(self::$class_called['view']);
		}

		//Instance the controller class
		$object_class = new self::$class_called['controller'];
		$method = self::$class_called['method'];
		//Call the method
		View::data($object_class->$method());
		View::data(['coisa'=>'fasdfa']);
		//If thereis any result, passes it to view
	}

	/**
	 * [setModuleController description]
	 */
	public static function setModuleController()
	{
		self::$class_called = NULL;
		//If it was passed a module to access checks if it is a module wich have access without login
		//IF no, call Login Route
		if(isset($_GET['module'])){
			self::$module = $_GET['module'];
		} elseif(isset($_POST['module'])) {
			self::$module = $_POST['module'];
		}

		/**
		 * * Access without session
		 */
		if(!isset($_SESSION['user_id'])){

			/**Check if exist module and if it is one of the without_session modules, which is able to access without session*/
			if(!empty(self::$module)){
				if(array_key_exists(self::$module, Route::getWithoutSessionRoute())){
					
					self::$class_called = Route::getWithoutSessionRoute(self::$module);
				}
			}

			//If not exist a module valid to be access without session, call login controller
			if(empty(self::$class_called)){
				self::$class_called = Route::getLoginRoute(self::$module);
				self::$module = 'login';
			}

		//else, in other hand, If it is logged	
		} else {
			if(array_key_exists(self::$module, Route::getModuleRoute())){
				self::$class_called = Route::getModuleRoute(self::$module);
			}else{
				self::$module = 'dashboard';
				self::$class_called = Route::getModuleRoute(self::$module);
			}

			
		}

	}	
}

<?php
	class DB
	{
		private static $instance=NULL;
		public static function getInstance()
		{
			if(!isset(self::$instance))
			{
				try
				{
					self::$instance = new PDO('mysql:host=localhost;dbname=sinhvien_mvc','root','');
					self::$instance->exec("SET NAMES 'utf8'");
				}
				catch (PDOException $ex)
				{
					die($ex->getMessage());
				}
			}
			return self::$instance;
		}
	}
?>
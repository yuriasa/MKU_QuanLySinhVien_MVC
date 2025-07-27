<?php

	class BaseController
	{
		
		protected $folder;

		public function render($file, $data = array())
		{
			$view_file = 'views/' . $this->folder . '/' . $file . '.php';
			if (is_file($view_file))
			{
				extract($data);
				ob_start();
				require_once($view_file);
				$content = ob_get_clean();
				require_once('views/layouts/application.php');
			}
			else
			{
				header('Location: index.php?controller=home&action=error');
			}
		}
	}

?>
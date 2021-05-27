<?php
	show_source(__FILE__);
	class Secret
	{
		public $cmd = "Hello";
		public function __wakeup()
		{
			@eval($this->cmd);
		}
	};
	echo @file_get_contents($_GET['path']);
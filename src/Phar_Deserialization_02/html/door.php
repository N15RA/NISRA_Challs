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
	if($_GET['path'][0] == 'p')
		echo "Bye~QQ";
	else
		echo @file_get_contents($_GET['path']);
?>
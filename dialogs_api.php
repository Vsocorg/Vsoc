<?php
include_once("db_queries.php");

class DialogManager{
	public $dialogs;
	public $user_id;

	function __construct($user_id, $load_dialogs = true, $ajax_update = false) {
		if($load_dialogs){
			$this->dialogs = getDialogs($user_id);
			$this->user_id = $user_id;
		}

		//if($ajax_update)		
   }

   public function echoDialogs(){
   		foreach ($this->dialogs as $dlg) {					
			$users = getDialogUsers($dlg["id"],$this-$user_id);

			//Количество человек в чате, без нас
			$n = count($users)-1; 

			//echo tag("p",'$n = '.$n);

			if($n > 1) // групповой чат
			{				
				$urls = [];

				foreach ($users as $user) {
					$urls[] = $user["image"];
				}

				echo group_element($dlg["name"],$urls);
			}
			else // диалог 
			{
				$other = $users[1];
				echo dialog_element(
					$other["login"],
					$other["image"]
					);
			}

		}
   }   

}



				function dialog_element(
					$name, 
					$url="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png"
				){
					return "
				<a class='sort-dialog'>
				<div class='dialog-element'>
					<div class='user-icon' style='background-image:url($url);'>
					</div>
					<span>@$name</span>
				</div>
				</a>
					";

				}
				function group_element(
					$name, 
					$urls = null
				){
					$n = count($urls);
					if($n > 4)
						$n = 4;

					$res = "
				<a class='sort-group'>
				<div class='dialog-element'>
					<div class='user-icon sort_$n' style='background-image:url($urls);'>";
					

					for ($i=0; $i < count($urls) and $i < 4; $i++) { 
						$res .= "<div class='user_icon_".($i+1)."' style='background-image:url(".$urls[$i].");'></div>";
					}
					

					$res .= "
					</div>
					<span>$name</span>
				</div>
				</a>
					";
					return $res;

				}

				/*echo br(1).nbsp(5)."ID: ".$user['id'].nbsp(2).$user['login'].
					br().nbsp(5)."IMG: ".$user['image'].
					br();*/

					/*
					echo dialog_element("martinyy",
						"https://s-media-cache-ak0.pinimg.com/736x/ea/3e/b1/ea3eb1e85e6f83e8e50bbf4567689236--only-girl-a-girl.jpg");
					echo dialog_element("johndoe",
						"https://s-media-cache-ak0.pinimg.com/736x/30/5a/fb/305afbd8e6e36fd72283931f7db47708--girl-face-drawing-face-drawings.jpg");
					echo dialog_element("jamesd",
						"https://s-media-cache-ak0.pinimg.com/736x/b5/a6/3b/b5a63b0da8d66df3dd10f269be70ea88--always-smile-face-oil.jpg");
					echo dialog_element("annie90","
					https://s-media-cache-ak0.pinimg.com/originals/cc/60/4b/cc604b1333851d67a89e62ff4cf1fbcb.jpg");
					echo dialog_element("marielle","
					https://s-media-cache-ak0.pinimg.com/736x/11/5b/c3/115bc396461d0b90ffd422d9d25e5b5b.jpg");*/
?>



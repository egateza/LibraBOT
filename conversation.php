<?php 
date_default_timezone_set("Asia/Jakarta");
$wordlist = array(
	'isinya' => array(
		"hai kamu,hi,hay,hy,hyy,hai libra,hi libra,hy libra,hyy libra,hai libra"=>"hai juga ka <b>^@</b>",
		"libra" => "yes sir!!",
		$_COOKIE['username'] => "ia ka <b>{$_COOKIE['username']}</b> knapa ?",
		"lagi apa?,kamu lagi apa?,ngapain?" => "lagi mikirin kamu aja ka <b>{$_COOKIE['username']}</b> (>w<)"
		)
	);

function __construct() {
	
}
if(isset($_POST['msg'])) {
	if($_POST['msg'] == "time") {
		echo "halo ka <b>{$_COOKIE['username']}</b> jam saya menunjukan : ".date('H:m:d');
	} else {
		echo word_check($_POST['msg'], $_COOKIE['username']);
	}
} else {
	echo "halo mas {$_COOKIE['username']}";
}


function word_check($msg, $username) {
	$hasil = "maaf ka {$username} pesan belum terdefinisi :( ";
	global $wordlist;
	foreach($wordlist['isinya'] as $key => $val) {
		if(strpos($key, ",") !== false) {
			$idn = explode(",", $key);
			foreach($idn as $like) {
				if(strpos($msg, $like) !== false) {
					$hasil = str_replace("^@", $username, $val);
					break;
				} else {
					if($msg == $like) {
						
						$hasil = str_replace("^@", $username, $val);
						break;
					} 
				}
			}
		} else {
			if($msg == $key) {
				$hasil = str_replace("^@", $username, $val);
				break;
			}
		}
	}

	return $hasil;

}
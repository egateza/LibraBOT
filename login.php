<?php

if(isset($_POST['username'])) {
	if($_POST['username'] !== "") {
		setcookie("username", $_POST['username'], time() + (86400 * 30), "/");
		echo "berhasil";
	} else {
		echo "gagal";
	}
	#setcookie("username", "", time() - 3600);
} else {
	echo "username tidak boleh kosong";
}
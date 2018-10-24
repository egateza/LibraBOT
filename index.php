<html>
	<head>
		<style type="text/css">
			#conversation
			{
			   /*font-size: 1em !important;*/
			   font-size: 10;
			   /*color: #000 !important;*/
			   font-family: verdana !important;
			}

			#inform {
				/*float:right;*/
  				/*width:30%;*/
  				/*font-size: 1em !important;*/
			   font-size: 10;
			   /*color: #000 !important;*/
			   font-family: verdana !important;
			}

			#left_side {
			  float:left;
			  width:30%;
			}
			#right_side {
			  float:left;
			  width:30%;
			}
			#left_side ,
			#right_side {
				border:1px solid red;
			  	padding:10px;
			}

		</style>
	</head>
	<body>
		<div id="main">
			
			<div id="left_side">
			<?php 
				if(count($_COOKIE) < 1) {  ?>
					<input type="text" id="ur_username" placeholder="input your username" autocomplete="false">
					<button id="login">Masuk</div>
					<script type="text/javascript">
						var loginBtn = document.getElementById("login");
						var username = document.getElementById('ur_username');
						loginBtn.onclick = function() {
							if (username.value== "") {
								alert("username tidak boleh kosong");
							} else {
								$.ajax({
									type: "POST",
									url: "login.php",
									data: {
										"username":username.value
									}, 
									success: function(html) {
										if (html == "berhasil") {
											username.value = "";
											location.reload();
										}
									}
								});
							}
						}
					</script>
			<?php	} else {  ?>
					<input type="text" id="msg_box" placeholder="type some text here" autocomplete="false">
					<button id="send">Kirim</button>
					<button id="reset">Reset</button>
					<button id="logout">Keluar</button>
					<div id="conversation">
						<font color="#ff8533">Libra</font> : halo ka <?php echo $_COOKIE['username']; ?> nama aku <b>Libra</b><br/>
					</div>
					<script type="text/javascript">
						var conversation = document.getElementById("conversation");
						var resetBtn = document.getElementById("reset");
						resetBtn.onclick = function() {
							conversation.innerHTML = "";
						}
						var logoutBtn = document.getElementById("logout");
						logoutBtn.onclick = function() {
							//alert("logout clicked");
							$.ajax({
								type: "POST",
								url: "logout.php",
								success: function() {
									location.reload();
								}
							});
						}

						var sendButton = document.getElementById("send");
						var msgBox = document.getElementById("msg_box");
						sendButton.onclick = function() {
							// alert(document.getElementById('ur_username').style.display);
							
							if(msgBox.value != "") {
								conversation.innerHTML += "<font color='#ff3385'>YOU</font> : "+msgBox.value+'<br />';
								$.ajax({
									type: "POST",
									url: "conversation.php",
									data: {
										"msg" : msgBox.value
									},
									success: function(html) {
										conversation.innerHTML += "<font color='#ff8533'>Libra</font> : "+html+"<br/>";
										//location.reload();
									}
								});
								msgBox.value="";
							} else {
								console.log("message kosong!");
							}
						}
					</script>
			<?php	}
			?>
			</div>
			<div id="right_side">
				<div>
				<div id="inform">
					<p>
						<b>how can i help u ? </b>
						<li>time</li><i>show local time for this bot</i>
						<li>ask</li><i>search what u need</i>
					</p>
				</div>
				</div>
			</div>
		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</html>
   <div id="popupbox" style="text-align:center"> 	
		<form name="Login" action="login.php" method="post">
			<div>
				Username: <input name="username" size="25" />
			</div>
			<div>
				Password: <input name="password" type="password" size="25" />
			</div>
			<input type="submit" name="submit" value="Login" />
		</form>
		<p id="result"></p>
		<a href="javascript:login('hide');">close</a>
	</div> <!--end popupbox-->

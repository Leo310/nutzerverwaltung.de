<?php
  session_start();
  // ist jemand angemeldet?
  if (isset($_SESSION['user']) && $_SESSION['rechte'] == "admin") header("location:startadmin.php");
  if (isset($_SESSION['user']) && $_SESSION['rechte'] == "nutzer") header("location:start.php");
  
  include('include/inc_htmlhead');

  $error = "";
 if (isset($_SESSION['error'])) $error = $_SESSION['error'];
 ?>
<body class="body" background="images/bild3.jpg">   <!-- Photo by Ricardo Gomez Angel on Unsplash -->

<center><div class="formularcontainer">
	<h1 style="margin-top: 10%;" class="frontheadline">willkommen zurück!</h1>
	<h1 class="lowerheadline" style="margin-top:-2%;">wir freuen uns, dass du da bist.</h1>
	<table style="margin-top: 5%;">

		<form action='scr_login.php' method='post'>
			<tr>
				<td>
					<input class="inputRahmen" type='text' id='nutzername' name='name' placeholder="nutzername" required>
				</td>
			</tr>
			<tr>
				<td>
					<input class="inputRahmen" type='password' name='pw' id='pw' placeholder="kennwort" required>
				</td>
			</tr>
	</table>
	<table>
</div>
<div style='margin-left:auto; margin-right:auto; margin-top:5%; min-width:200px; width:100%;'>
			<tr>
				<td>
					<center><input type='submit' value='anmelden »' class="button"></center>

				</td>
			</tr>
		</form>
			<tr>
				<td>
					<h1 style="margin-top: 12%" class="text"><center>du hast noch keinen account? jetzt <a href="register.php" class="a">registrieren »</a><center></h1>
				</td>
			</tr>
			<tr>
				<td>
					<?php
						if ($error) {
						echo "<p class='text'>$error</p>";
						unset($_SESSION['error']);
						}
					?>
				</td>
		</tr>
	</table>
</div>

</body>
</html>

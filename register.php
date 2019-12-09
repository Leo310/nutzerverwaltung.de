<?php
  session_start();
$error1 = $error = "";

if (isset($_SESSION['user']) && $_SESSION['rechte'] == "admin") header("location:startadmin.php");
if (isset($_SESSION['user']) && $_SESSION['rechte'] == "nutzer") header("location:start.php");

if(isset($_SESSION['error'])) $error = $_SESSION['error'];
if(isset($_SESSION['error1'])) $error1 = $_SESSION['error1'];
include('include/inc_htmlhead');
?>
<body class="body" background="images/bild1.jpg">   <!-- Photo by Ricardo Gomez Angel on Unsplash -->

<center><div class="formularcontainer">
	<h1 style="margin-top: 10%;" class="frontheadline">registrierung</h1>
  <h1 class="lowerheadline" style="margin-top:-2%;">neu hier? erstell' dir einfach einen account!</h1>
	<table style="margin-top: 3%;">

		<form action='scr_register.php' method='post'>

			<tr>
				<td>
					<input class="inputRahmen" type='text' id='nutzername' name='name' placeholder="nutzername" required>
				</td>
			</tr>

			<tr>
				<td>
					<input class="inputRahmen" type='password' id='kennwort' name='pw' placeholder="kennwort" required>
				</td>
			</tr>

			<tr>
				<td>
					<input class="inputRahmen" type='password' id='bkennwort' name='bpw' placeholder="kennwort bestätigen" required>
				</td>
			</tr>
		</table>
		<table>
	</div>
<div style='margin-left:auto; margin-right:auto; margin-top:3%; min-width:200px; width:100%;'>
			<tr>
				<td>
					<center><input type='submit' value='registrieren »' class="button"></center>
				</td>
			</tr>
			</form>
				<tr>
					<td>
						<h1 style="margin-top: 10%" class="text" ><center>du hast schon einen account? jetzt <a href="index.php" class="a">anmelden »</a></center></h1>
					</td>
				</tr>
				<tr>
					<td>
						<?php
							if($error){
								echo "<p class='text'>$error</p>";
								unset($_SESSION['error']);
							}

							if($error1){
								echo "<p class='text'>$error1</p>";
								unset($_SESSION['error1']);
							}
						?>
					</td>
				</tr>
			</table>
</div>


</body>
</html>

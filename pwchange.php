<?php
 session_start();
 // Umleitung bei Aufruf ohne Anmeldung
 if (!isset($_SESSION['user'])) header("location:index.php");
 include("include/inc_htmlhead");

 $error = $error1 = "";
 $pwchanged = "";
 if (isset($_SESSION['error'])) $error = $_SESSION['error'];
 if (isset($_SESSION['pwchanged'])) $error1 = $_SESSION['pwchanged'];
  include('include/inc_htmlkopfzeile.php');
?>

<center><div class="formularcontainer">
	<h1 style="margin-top: 10%;" class="frontheadline">kennwort ändern</h1>
		<table style="margin-top: 5%;">
			<form action='scr_pwchange.php' method='post'>
				<?php
				 if (isset($_SESSION['rechte'])) $rechte = $_SESSION['rechte'];
				 echo "<input type='hidden' name='rechte' value='$rechte'>";
				?>
				<tr>
					<td>
						<input class="inputRahmen" type='password' name='oldpw' id='altespw' placeholder="altes kennwort" required>
					</td>
				</tr>
				<tr>
					<td>
						<input class="inputRahmen" type='password' name='newpw' id='neuespw' placeholder="neues kennwort" required>
					</td>
				</tr>
				<tr>
					<td>
						<input class="inputRahmen" type='password' name='bnewpw' id='bneuespw' placeholder="neues kennwort bestätigen" required>
					</td>
				</tr>
		</table>
		<table>
	</div>
<div style='margin-left:auto; margin-right:auto; margin-top:5%; min-width:200px; width:100%;'>
				<tr>
          <td>
            <button class="button" onclick="window.location.href='scr_login.php'" style="margin-left: -5%">« abbrechen</button>
          </td>
					<td>
						<input type='submit' value='speichern »' class="confirmbutton" style="margin-left: 5%">
					</td>
				</tr>
			</form>
    </table>
				<!-- <tr>
					<td> -->
						<center><p style="margin-top: 40px;"></p>
						<?php
							  if ($error) {
								  echo "<p class='text'>$error</p>";
								  unset($_SESSION['error']);
							  }

							  if ($error1) {
								  echo "<p class='text'>$error1</hp>";
								  unset($_SESSION['pwchanged']);
							  }
						?></center>
					<!-- </td>
				</tr> -->
			<!-- </table>  -->
</div>

</body>
</html>

<?php
 session_start();
 // Umleitung bei Aufruf ohne Anmeldung
 if (!isset($_SESSION['user'])) header("location:index.php");
 include("include/inc_htmlhead");
 include('include/inc_htmlkopfzeile.php');

 $error4 = $name = "";

 if (isset($_SESSION['error4'])) $error4 = $_SESSION['error4'];


?>

  <center><div class="formularcontainer">
  	<h1 style="margin-top: 10%;" class="frontheadline">schade, dass du gehst :(</h1>
    <h1 class="lowerheadline" style="margin-top:1%">gib bitte dein kennwort zur bestätigung ein.</h1>
  		<table style="margin-top: 7%;">

  			<form action='scr_deleteuser.php' method='post'>
  				<tr>
  					<td>
					<?php
					$name = $_SESSION['user'];
					echo "<input type='hidden' name='name' value='$name'>";
					?>
  						<input class="inputRahmen" type='password' name='pw' id='pw' placeholder="kennwort" required>
  					</td>
  				</tr>
  		</table>
  		<table>
  	</div>
  <div style='margin-left:auto; margin-right:auto; margin-top:10%; min-width:200px; width:100%;'>
  				<tr>
            <td>
              <button class="button" onclick="history.back();" style="margin-left: -5%">« abbrechen</button>
            </td>
  					<td>
  						<input type='submit' value='löschen »' class="confirmbutton" style="margin-left: 5%">
  					</td>
  				</tr>
  			</form>
      </table>
  				<!-- <tr>
  					<td> -->
  						<center><p style="margin-top: 5%;"></p>
                <?php
      						if ($error4) {
      						echo "<p class='text'>$error4</p>";
      						unset($_SESSION['error4']);
      						}
      					?>
  						</center>
  					<!-- </td>
  				</tr> -->
  			<!-- </table>  -->
  </div>

  </body>
  </html>

<?php
	// == Connect Database ==
	$db_host = "localhost"; //MySQL server host
	$db_username = "root"; //MySQL Database username
	$db_pass = "root"; //MySQL Database Password
	$db_name = "phonedb"; //MySQL Database name
	
	mysql_connect("$db_host","$db_username","$db_pass") or die(mysql_error());
	mysql_select_db("$db_name") or die("Database Connection Error");
	// == End Connect Database ==
	
	// == Phone Logic Here ==
	$msg = '';
	$dir_list = '';
	if(isset($_POST['submit']))
	{
		$edit = $_POST['edit_id'];
		$number = $_POST['K_phone'];
		$new_number = strlen($number);
		if ($new_number != 11) {
			$msg = '<div class="msg">Kindly Recheck the length of the inputted number</div>';
		} else {
			// == Check if edit initiated ==
			if($edit){
				$query = mysql_query("UPDATE phones SET number='$number' WHERE id='$edit' LIMIT 1");
				if(!$query){
					$msg = '<div class="msg_error">Failed to update, try later</div>';
				} else {
					$msg = '<div class="msg">Updated Successfully</div>';
				}
			} else {
				// == Check if number already exist in Database ==
				$query = mysql_query("SELECT * FROM phones WHERE number='$number' LIMIT 1");
				if(mysql_num_rows($query) > 0){
					$msg = '<div class="msg_error">Phone number already in Database</div>';
				} else {
					// == Now insert new phone in Database ==
					$ins_query = mysql_query("INSERT INTO phones (number) VALUES ('$number')");
					if(!$ins_query){
						'<div class="msg_error">There is an error. Check phone number and try again</div>';
					} else {
						$msg = '<div class="msg">Added to Database Successfully</div>';
					}
				}
			}
		}
	}
	
	// == Query to Prepare Record Update ==
	if(isset($_GET['edit'])){
		$get_edit = $_GET['edit'];
		$query = mysql_query("SELECT * FROM phones WHERE id='$get_edit' LIMIT 1");
		while($row = mysql_fetch_assoc($query)){
			$edit_id = $row['id'];
			$edit_number = $row['number'];	
		}
	}
	
	// == Check for Record Delete ==
	if(isset($_GET['delete'])){
		$get_delete = $_GET['delete'];
		$query = mysql_query("DELETE FROM phones WHERE id='$get_delete' LIMIT 1");
		if(!$query){
			$msg = '<div class="msg_error">Failed to delete, try later</div>';
		} else {
			$msg = '<div class="msg">Deleted Successfully</div>';
		}
	}
	
	// == Query All Phones in Database ==
	$rec = mysql_query("SELECT * FROM phones ORDER BY id DESC");
	if(mysql_num_rows($rec) <= 0){
		$dir_list = '';
	} else {
		$count = 1;
		while($item = mysql_fetch_assoc($rec)){
			if(($count%2) == 1){$alt = 'style="background-color:#ccc;"';}else{$alt = '';} //Strip table
			$as="-0";
			$dir_list .= '
				<tr '.$alt.'>
					<td align="center">'.$count.'</td>
					<td>'.$item['number'].''.$as.'</td>
					<td align="center">
						<a href="?edit='.$item['id'].'">Edit</a> | <a href="?delete='.$item['id'].'">Delete</a>
					</td>
				</tr>
			';
			$count += 1;
		}
	}
?>
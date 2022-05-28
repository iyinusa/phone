<?php include('collected.php'); ?>
<html>
    <head>
        <title> THE NUMBER COLLECTOR</title>
        <style>
			body{width:800px; margin:auto; padding:15px; border:10px double #CCF;}
			#header{font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-size:x-large; text-transform:uppercase; border-bottom:10px double #CCF; text-align:center; margin-bottom:30px;}
			#inputter{font-size:large; font-family:Tahoma, Geneva, sans-serif; border-bottom:10px double #CCF; text-align:center; margin-bottom:10px; color:#666;}
			#inputter input{font-size:large; text-align:center;}
			#records table{border:3px double #EEE; width:100%; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;}
			#records table thead td, #records table tfoot td{border:3px double #EEE; padding:5px; background-color:#CCF; font-weight:bold;}
			#records table thead td:first-child, #records table tfoot td:first-child, #records table thead td:last-child, #records table tfoot td:last-child{text-align:center;}
			#records table tbody td{padding:5px;}
			#records table tbody tr.alt{background-color:#EEE;}
			.msg{padding:10px; background-color:#0C9; border:1px solid #096; text-align:center; font-size:large; color:#fff;}
			.msg_error{padding:10px; background-color#F33; border:1px solid #C30; text-align:center; font-size:large;}
		</style>
    </head>
    <body>
        <div id="header">
        	Phone Number Collector
        </div>
        <div id="inputter">
        	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="edit_id" value="<?php if(!empty($edit_id)){echo $edit_id;} ?>">
                <label>Phone Number:</label>
                <input type="text" name="K_phone" value="<?php if(!empty($edit_number)){echo $edit_number;} ?>">
                <input type="submit" name="submit" value="Add Number">
            </form>
            <?php echo $msg; ?>
        </div>
        <div id="records">
        	<table>
            	<thead>
                	<tr>
                    	<td width="50px">S/N</td>
                        <td>Phone Number</td>
                        <td width="120px">Actions</td>
                    </tr>
                </thead>
                
                <tbody>
                	<?php echo $dir_list; ?>
                </tbody>
                
                <tfoot>
                	<tr>
                    	<td>S/N</td>
                        <td>Phone Number</td>
                        <td>Actions</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </body>
</html>
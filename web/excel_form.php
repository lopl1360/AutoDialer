<form action="./index.php?id=330" method="post" enctype="multipart/form-data">
   <p>
      <label for="file">Select a file:</label> <input type="file" name="userfile" id="file"> <br />
	  Group:
    <select name="group">
	
      
	  <?php
	  require_once("./include/membersite_config.php");
	  include "conn.inc.php";
		$q="select name from group_list where enable=1";
		if($res=mysql_query($q))
		{
			while($row=mysql_fetch_row($res))
			{
				echo "<option>";
				echo "$row[0]";
				echo "</option>";
			}
		}
	?>
	</select>
      <button>Upload File</button>
   <p>
</form>
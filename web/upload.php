<?php
function is_class($class)
{
	$query="select id from class_list where name='$class'";
	if($res=mysql_query($query))
	{
		while($row=mysql_fetch_row($res))
		{
			if($row[0]!="")
				return 1;
		}
	}	return 0;
	return 0;
}
require_once("./include/membersite_config.php");
$group=$_POST['group'];
if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
	require_once 'Excel/reader.php';

   // Configuration - Your Options
      $allowed_filetypes = array('.xls'); // These will be the types of file that will pass the validation.
      $max_filesize = 10000288; // Maximum filesize in BYTES (currently 0.5MB).
      $upload_path = './files/'; // The place the files will be uploaded to (currently a 'files' directory).
 
   $filename = $_FILES['userfile']['name']; // Get the name of the file (including file extension).
   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
 
   // Check if the filetype is allowed, if not DIE and inform the user.
   if(!in_array($ext,$allowed_filetypes))
      die('The file you attempted to upload is not allowed.');
 
   // Now check the filesize, if it is too large then DIE and inform the user.
   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
      die('The file you attempted to upload is too large.');
 
   // Check if we can upload to the specified path, if not DIE and inform the user.
   if(!is_writable($upload_path))
      die('You cannot upload to the specified directory, please CHMOD it to 777.');
 
  if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
		{
			 echo 'Your file upload was successful, view the file <a href="' . $upload_path . $filename . '" title="Your File">here</a>'; // It worked.
			 $data = new Spreadsheet_Excel_Reader();
			$data->setOutputEncoding('CP1251');
			$data->read($upload_path.$filename);
			echo "<BR>"."It has <b>";
			print_r($data->sheets[0]['numRows']);
			echo " Rows. </b> First third and last third are: <BR>";
			if($data->sheets[0]['numRows'] >6)
			{
				for ($i = 1; $i <= 3; $i++) 
				{
					echo $data->sheets[0]['cells'][$i][1]."<bR>";
			
				}
				echo ".<BR>..<BR>...<BR>";
				for ($i = $data->sheets[0]['numRows']-2; $i <= $data->sheets[0]['numRows']; $i++) 
				{
					echo $data->sheets[0]['cells'][$i][1]."<bR>";
			
				}
			}
			else
			{
				for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) 
				{
					echo $data->sheets[0]['cells'][$i][1]."<bR>";
			
				}
			}
			$row_count=$data->sheets[0]['numRows'];
			$now=date("m_d");
			$count=1;
			$class="$group"."_"."$filename"."_".$now."_"."$row_count"."_";
			while(is_class("$class"."$count"))
			{
				$count++;
			}
			$class=$class."$count";
			$class=str_replace(".","_",$class);
			echo "<br><b>Count:</b>$row_count";
			echo "<br><b>Group:</b>$group";
			echo "<br><b>Report Class:</b>$class";
			?>
		
		  <form name="form1" method="post" action="index.php?id=331">
		  
    
		  <p><input name="file" type="hidden" id="file" value="<?php echo "$upload_path"."$filename"; ?>"></p>
		  <p><input name="class" type="hidden" id="class" value="<?php echo $class; ?>"></p>
		  <p><input name="group" type="hidden" id="group" value="<?php echo $group; ?>"></p>
		  <p>
			<input type="submit" name="Confirm" value="Submit">
		  </p>
		  <p></p>
		</form>
		<?php	
		}
	  else
         echo 'There was an error during the file upload.  Please try again.'; // It failed :(.
 
?>

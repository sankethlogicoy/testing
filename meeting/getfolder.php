<div id="username"></div>
<?php
$filepath="";
$count=0;
$folder="";
	header("content-type: text/html; charset=UTF-8");
	
	$path=$_POST['foldername'];
	$files = scandir($path);
	$count=0;			
	print '<div>';
	foreach($files as $str)
	{
		if(strcmp($str,".")!=0 && strcmp($str,"..")!=0)
		{
			if(is_dir($path.'/'.$str))
			{
				$filepath=$path;
				$folder=$str;
				$count = $count +1;
				print '<div class="mediaanchor directory floatybox" onclick="sendPOSTDataToPHPfile(\'Main\',\'getfolder.php\',\'foldername='.$path.'/'.$str.'\')">';		
				print '<span><img src="folder.png" alt="Go to "'.$str.' width="42" height="42" border="0"><br>'.$str.'</span>';
				print '</div>';	
			}
		}
	}		
	print '</div>';
	
	print '<div>';
		foreach($files as $str)
		{
			if(strcmp($str,".")!=0 && strcmp($str,"..")!=0)
			{		
				if(!is_dir($path.'/'.$str))				
				{					
					$count = $count +1;
					
					$filepath=$path;
					$folder=$str;
					$filename=basename($str);			
					$name=explode(".",$str);
					print '<div>';	
                    print "<table>";					
					print '<td id=\''.$count.'\'><a class="mediaanchor" href="'.$path.'/'.$str.'" target="_blank">'.$str.'</a>';
					print "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					 
					
					// print '<button onclick="deleteFile(\''.$str.'\',\''.$count.'\',\''.$path.'\')"> delete</button></td>';
					// print "<input type='text' id='myid'.$count value='444'>";
					
					 print "</table>";
					 print '</div>';					
				}
			}
		} 
		print '</div>';
		print "<br/>";
		//print '<div onclick="getBack(\'Main\',\'getfolder.php\',\'foldername='.$folder.'/'.$filepath.'\')">';
		// print '<span><img src="folder.png" alt="Go to "'.$folder.' width="42" height="42" border="0"><br>'.$str.'</span>';
		// print '</div>';
		 //print '<div class="mediaanchor directory floatybox" onclick="getBack(\'Main\',\'getfolder.php\',\'foldername='.$folder.'/'.$filepath.'\')">';		
				//print '<span><img src="folder.png" alt="Go to "'.$filepath.' width="42" height="42" border="0"><br>'.$str.'</span>';
				//print '</div>';	
		 

	if($count ==0)
	{
		print 'File repository is empty..';
	}	
?>
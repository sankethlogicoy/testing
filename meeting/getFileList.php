<?php
	//Include all user details or route to login page
	include('../session.php');
	
	//Get the hashtags
	$hashtags = $_POST['hashtags'];
	
	//Set path to folder containing the meeting notes
	$path='../Files/Meeting';
	
	//Get all files and folders in that directory
	$files = scandir($path);
	
	//Set flag to check for null value
	$count=0;	

	//Pack entire response in a div
	print '<div>';
	
	//Run a loop to scan all files
	foreach($files as $str)
	{
		//Links to self and to parent folder need not be considered
		if(strcmp($str,".")!=0 && strcmp($str,"..")!=0)
		{		
			//Directories need not be considered and only files with matching hashtags should be considered
			if(!is_dir($path.'/'.$str) && findMatchingHashtags($path.'/'.$str,$hashtags))				
			{					
				//At least one file found, keep count of number of hits
				$count = $count +1;
							
				//Split full filename based on . to only display the file name			
				$name=explode(".",$str);
				
				//Pack each entry into a div of its own
				print '<div>';		
				
				//display entry with a method link on onclick to fetch the meeting notes
				print '<span class="mediaanchor" onclick="getDataFromMeetingNotes(this.innerHTML)";>'.$str.'</span>';
				
				//Close div
				print '</div>';					
			}
		}
	} 
	
	//Close packing div
	print '</div>';

	//If the count is zero then no files are present matching the hashtags
	if($count ==0)
	{
		//Display message stating so
		print 'No files present with such hashtags';
	}
	
	//Method: search a file for matching hashtags
	function findMatchingHashtags($filename, $hashtags) 
	{
		//If the filter is set to All then no checks are required
		if(!strcasecmp($hashtags,'all'))
			return true;
		
		//Read target file
		$contents = file_get_contents($filename);

		//Decode JSON from file
		$contents = json_decode($contents);
		
		//Split all hashtags supplied by user based on whitespace
		$listOfHashtags = explode(' ',$hashtags);
		
		//Split all hashtags as present in file being checked against
		$listOfHastagsInFile = explode(' ',$contents->{'searchableMetadata'});
		
		//For every hashtag supplied by user
		foreach($listOfHashtags as $source)
		{
			//For every hashtag in file being checked against
			foreach($listOfHastagsInFile as $target)
			{
				//Compare hashtag, return true if a match is found
				if(!strcasecmp($source,$target))				
					return true;				
			}
		}
		
		//if no match is found then return false
		return false;
	}
?>
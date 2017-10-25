<?php 
  
   function logToFile($filename, $msg) 
   {  
   date_default_timezone_set('Asia/Kolkata');
   $fd = fopen($filename, "a"); 
   $today="[".date("Y/m/d h:i:sa")."]";
   // write string 
   fwrite($fd, $today . "\n"); 
   fwrite($fd, $msg . "\n");
   // close file 
   fclose($fd); 
   } 
   
   function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp@rtifactb@ngalor3';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp@rtifactb@ngalor3';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}
   ?>
   //sanketh
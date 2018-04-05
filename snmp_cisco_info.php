<?php

    $ip = $argv['1'];
    $com = $argv['2'];
    $warnSec = $argv['3'];  
   
    $current_time = time();
    
    $tmp_dir = "/var/tmp/Sw_Info";
    
    if (!is_dir($tmp_dir)) {
      mkdir($tmp_dir, 0770, true);
    }
     
    $elapse_time = 0;
       
    system ("/usr/bin/ping -c 1 -i 1 ".$ip . "&> /dev/null",$Return_Ping);  
   
    if ( $Return_Ping == 0) {  
    
         if (file_exists($tmp_dir."/".$ip."-info.txt")) {
            $fileage = filemtime($tmp_dir."/".$ip."-info.txt");
            $elapse_time = $current_time - $fileage;
         }
      
         $tmp_first = tempnam(sys_get_temp_dir(), 'BOB'); 
         system("/srv/eyesofnetwork/nagios/plugins/snmp_cisco_info.sh ".$ip." ".$com." &> ".$tmp_first);
         $cmd_first= file_get_contents($tmp_first);
         system("rm -f ".$tmp_first);   
      
         
         $tmp_file = tempnam(sys_get_temp_dir(), 'BOB'); 
         system("cat ".$tmp_dir."/".$ip."-info.txt &> ".$tmp_file);
         $cmd_file2= file_get_contents($tmp_file);
         $cmd_file = substr($cmd_file2, 0, -1);
         system("rm -f ".$tmp_file);
         
         if(strpos($cmd_file, "cat: /") !== FALSE){
           //le fichier nexiste pas
           system("echo '".$cmd_first."' > ".$tmp_dir."/".$ip."-info.txt");
           echo $cmd_first;
         } else { 
         
           //Le fichier existe
            if ($cmd_first == $cmd_file){
              //Aucun changement
              echo $cmd_first;
            } else {
              // Changement
        
              if ( $elapse_time < $warnSec) {
                echo "There are few changes! Previously: ".$cmd_file." ";
                echo "Now: ".$cmd_first;
                //Warning
                exit(1);
              } else
              {
                echo $cmd_first;
                system("echo '".$cmd_first."' > ".$tmp_dir."/".$ip."-info.txt");
                exit(0);
              }
            }
         }
    } else
    {
      echo "CRITICAL: Host unreachable\n";
      if (file_exists($tmp_dir."/".$ip."-info.txt")) {
          system("cat ".$tmp_dir."/".$ip."-info.txt");  
      }
      exit(2);
    }  
    
?>



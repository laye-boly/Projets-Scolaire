<?php
   $file="equipe.xml";
   $pas = -1 ;
   $baliseouvert = array();
   function startElement($parser,$name,$attribs){
      global $pas;
      global $baliseouvert;
      $pas++;
      $baliseouvert[] =  $name;
      $espace = "";
      if($pas > 0){
         for ($i=0; $i < $pas ; $i++) { 
            $espace = $espace."&nbsp;";
         }
      }
   

      print "$espace &lt;<font color=\"#0000cc\">$name</font>";
      $espace ="";
      if(sizeof($attribs)){
         foreach ($attribs as $k => $v) {
            print "<font color=\"#009900\">&nbsp;$k</font>=\"<font
            color=\"#990000\">$v</font>\"";
         }
         
      } print "&gt;";
      print("<br>");
   }

   function endElement($parser,$name){
      $pasBaliseFermant;
      global $baliseouvert;
      foreach ($baliseouvert as $balise => $pas) {
         if($balise == $name){
            $pasBaliseFermant = $pas;
            break;
         }
      }
      $espace = "";
      if($pas > 0){
         for ($i=0; $i < $pasBaliseFermant ; $i++) { 
            $espace = $espace."&nbsp;";
         }
      }
      print "$espace &lt;/<font color=\"#0000cc\">$name</font>&gt; <br>";
      print("<br>");
   }
   function characterData($parser,$data){
      print "$data";
   }

   $xml_parser = xml_parser_create();
   xml_set_element_handler($xml_parser,"startElement","endElement");
   xml_set_character_data_handler($xml_parser,"characterData");

   if(!($fp=fopen($file,"r"))){
      die("Fichier XML: ne peut pas être ouvert !!!!");
   } 
   while($data=fread($fp,4096)){
      if(!xml_parse($xml_parser,$data,feof($fp))){
         die("Erreur XML, ligne
         xml_get_current_line_number($xml_parser) !!!");
      }
   } 
   xml_parser_free($xml_parser);

   $xml_parser=xml_parser_create();
   $f="equipe.xml";
   $file1=implode(file($f),"");
   xml_parser_set_option($xml_parser,XML_OPTION_CASE_FOLDING,0);
   xml_parser_set_option($xml_parser,XML_OPTION_SKIP_WHITE,1);
   xml_parse_into_struct($xml_parser,$file1,$struct,$ind);
   print "Les indices : <br><br>";
   print_r($ind);
   print "<br><br> Les structures : <br><br>";
   print_r($struct);
   xml_parser_free($xml_parser);
?>
<?php
   $file="equipe1.xml";
   $pas = -1 ;
   $noeudOuvert = array();
   $statutNoeud = true;
   $nombrePasPrecdent;
   function startElement($parser,$name,$attribs){
      global $pas;
      global $statutNoeud;
      global $noeudOuvert;
     
      if($statutNoeud){
         $pas++;
      }
      $noeudOuvert[] = $name."".$pas;
     
      $statutNoeud = true;
      
      foreach ($noeudOuvert as $key => $value) {
         echo($value);
      }
      $espace = "";
      
      if($pas > 0){
         $espace = "";
         for ($i=0; $i < $pas ; $i++) { 
            $espace = $espace."&nbsp;";
         }
      }
      
   

      print "$espace &lt;<font color=\"#0000cc\">$name &nbsp; $pas</font>";
      
      if(sizeof($attribs)){
         foreach ($attribs as $k => $v) {
            print "<font color=\"#009900\">&nbsp;$k</font>=\"<font
            color=\"#990000\">$v</font>\"";
         }
         
      } print "&gt;";
      // print("nbrePas = $nbrePas<br>");
   }

   function endElement($parser,$name){
      global $pas;
      global $statutNoeud;
      global $noeudOuvert;
      global $pas;
      $statutNoeud = false;
      $nbrePasNoeudFerme = 0;
      $espace = "";
      // echo "nom du noued fermant : ".$name;
      $tailleNoeudOuvert = count($noeudOuvert) ;
      // echo(";talle = ".$tailleNoeudOuvert." taille ;");
      // echo "   nombre noued ouvert = ".$tailleNoeudOuvert;
      for ($j=($tailleNoeudOuvert-1); $j >= 0 ; $j--) { 
         // echo $j;
         // echo "nou ouvr ;".$noeudOuvert[$j];
         //    if($noeudOuvert[$j] == ($name."".$pas)){
         //        echo "noued ferme ".$name;
               
         //       // $nbrePasNoeudFerme = intval(substr($noeudOuvert[$i], -1));
         //       // $noeudOuvert[$i] = "test";
         //       break;
         //    }
         
      }
      if(in_array($name."".$pas, $noeudOuvert)){
         echo $name." ok";
      }
      print "$espace &lt;/<font color=\"#0000cc\">$name $nbrePasNoeudFerme</font>&gt; <br>";
      // print("tailleTabPas = ($tailleTabPas - 1) <br>");
   }
   function characterData($parser,$data){
      print "$data";
      print("<br>");
   }

   // function supprimerTabElement($tab, $name){
   //    $lenTab = count($tab) ;
   //    $i =$lenTab - 1;
   //    $premier = 1;
   //    for($j=$lenTab -1; $j>0; $j--;){
   //       if($name == $)
   //    }
   // }

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
   foreach ($noeudOuvert as $key => $value) {
      echo($value);
   }

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
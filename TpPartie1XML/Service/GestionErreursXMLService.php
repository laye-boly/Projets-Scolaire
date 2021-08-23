<?php

class GestionErreursXMLService
{
	
	public function getDetailError($error)
	{
	    $return = "<br/>\n";
	    switch ($error->level) {
	        case LIBXML_ERR_WARNING:
	            $return .= "<b>Warning $error->code</b>: ";
	            break;
	        case LIBXML_ERR_ERROR:
	            $return .= "<b>Error $error->code</b>: ";
	            break;
	        case LIBXML_ERR_FATAL:
	            $return .= "<b>Fatal Error $error->code</b>: ";
	            break;
	    }
	    $return .= trim($error->message);
	    if ($error->file) {
	        $return .=    " dans <b>$error->file</b>";
	    }
	    $return .= " au numéro <b>$error->line</b>\n";

	    return $return;
	}

	public function displayErrors() {
		?>
		<?php
	    	$errors = libxml_get_errors();
	    ?>
	    <ul>
	    <?php
	    foreach ($errors as $error) { ?>
	    	<li>
	    		<div class="alert alert-danger" role="alert">
          			<?php echo $this->getDetailError($error); ?>
      			</div>
  			</li>
		<?php
		}
		?>
		</ul>
	  <?php 
	  libxml_clear_errors();
 	        
	}
	
}

?>



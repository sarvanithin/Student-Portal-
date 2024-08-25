<?php

class maill {
  // Properties
  public $message;
  public $subject;
  public $tomailid;
  // Methods

    function  __construct($to,$subj,$mess){
	   $this->subject=$subj;
	   $this->message=$mess;
	   $this->tomailid=$to;
	 }
    function sendmail(){
			try{

			 mail($this->tomailid,$this->subject,$this->message);

			}catch(EPDOException $e)
             {

			 echo $sql . "<br>" . $e->getMessage();

			 }

    }
}
?>

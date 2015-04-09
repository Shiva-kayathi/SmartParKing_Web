<?php

function connectToDatabase(){
$link=mysqli_connect('localhost','jiehan','zjh7011','parking');
if(!$link)
{
	echo mysqli_connect_error();
	die("Erro occured while processing your request, please try again later.");
}

echo mysqli_connect_error();
return $link;

}

?>

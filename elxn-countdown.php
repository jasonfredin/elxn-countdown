<?php

// Set the timezone to Eastern Standard Time. 
date_default_timezone_set("America/New_York");

// Set the election day.

$electionday = 27;
$electionmonth = 10;
$electionyear = 2014;
$electionleft = countdown($electionday,$electionmonth,$electionyear);

// Set the nomination day

$nominationday = 12;
$nominationmonth = 9;
$nominationyear = 2014;
$nominationleft = countdown($nominationday,$nominationmonth,$nominationyear);

// Set the filing day

$filingday = 6;
$filingmonth = 1;
$filingyear = 2014;
$filingleft = countdown($filingday,$filingmonth,$filingyear);


// Create the function to calculate the remaining days.

function countdown(&$day,&$month,&$year)	{

	$calculation = ((mktime (0,0,0,$month,$day,$year) - time(void))/3600);
	$hours = (int)$calculation;
	$days  = ($hours/24);
	$fulldays = ceil($days); // Rounds up to the whole day.

			// Return the number of days remaining.

			return $fulldays;

	}

// This is a check to ensure the proper time is set.

echo date('l jS \of F Y h:i:s A') . "<br />";

		
// Set the messages to be sent.

$electionmessage = "Just ". $electionleft ." days remaining until London's next municipal election October 27, 2014. <br />";

$nominationmessage = "Only ". $nominationleft ." days remaining to get yourself on the ballot for London's next municipal election October 27, 2014. <br />";

$filingmessage = $filingleft ." days until you can file your nomination papers for London's next municipal election October 27, 2014. <br />";


// Check to ensure the date has not passed.

function sendmsg(&$msg,&$left)	{
		if ( $left >= 0 ){ 
			// Display the message to be tweeted. 
			echo $msg ."<br />";		
			}
		}
		
sendmsg($electionmessage,$electionleft);

sendmsg($nominationmessage,$nominationleft);

sendmsg($filingmessage,$filingleft);


?>
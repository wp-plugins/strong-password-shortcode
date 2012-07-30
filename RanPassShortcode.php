<?php
/*
Plugin Name: Strong password shortcode
Plugin URI: http://www.austinthemes.com
Description: This plugin creates a shortcode for displaying a random strong password. There are two options, as well, for setting the length of the password and choosing one of 8 different types of strong password. Use special characters, spaces, just numbers, just letters, and even just lowercase. You can also use multiple types on a page to give your users more options for their suggestion.Types: default, nospecial, specialspaces, spaces, dollars, letters, numbers, lowercase. <strong>Shortcode Example: [RP numchars="15" type="dollars"]</strong> Generates a 15-character alphanumeric password with dollar signs (no other special characters)
Version: 1.0
Author: Ryan Bishop
Author URI: http://www.austinthemes.com
*/

/*
Created by Ryan Bishop for free distribution. Based on the plugin creation tutorial by 
Paul McKnight (http://www.reallyeffective.co.uk/archives/2009/06/22/how-to-code-your-own-wordpress-shortcode-plugin-tutorial-part-1/)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

//define plugin defaults
DEFINE("RANPASS_NUMCHARS", "12"); //number of characters to generate
DEFINE("RANPASS_TYPE", "default"); //the default type of password to generate

//tell wordpress to register the demolistposts shortcode
add_shortcode("RanPass", "RanPass_handler");
add_shortcode("RP", "RanPass_handler");


//function for the main handler that handles the shortcode itself
function RanPass_handler($incomingfrompost) {
  //process incoming attributes assigning defaults if required
  $incomingfrompost=shortcode_atts(array(
    "numchars" => RANPASS_NUMCHARS,
    "type" => RANPASS_TYPE
  ), $incomingfrompost);
  
  //run function that actually does the work of the plugin
  $RanPass_output = RanPass_function($incomingfrompost);
  
  //send back text to replace shortcode in post
  return $RanPass_output;
}

// subfunction 1 for generating each random normal letter, with a mixture of lower and uppercase letters and special characters
function randLetter()
{
    $int = rand(1,79);
    $a_z = "abQcd!4efg5hijk2lmno!pqQ0rst!uv6w6xZy!zABCD17!EFGZZZH8I-J2KLMN!OPQR0STU93VWXYZ!";
    $rand_letter = $a_z[$int];
    return $rand_letter;
}

// subfunction 2 for generating each random normal letter, with a mixture of lower and uppercase letters with no special characters
function randLetter2()
{
    $int2 = rand(1,62);
    $a_zNoSpecial = "aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ1234567890";
    $rand_letter2 = $a_zNoSpecial[$int2];
    return $rand_letter2;
}
// subfunction 3 for generating a random password with spaces and special characters
function randLetter3()
{
    $int3 = rand(1,83);
    $a_zSpaces = "aXZ!3AbBcCd!DeEfFgGh!!!HiQQQIjJkKlL! mMnN oOpPq QrRs  StTu!Uv VwWxX4yYz Z1234567890";
    $rand_letter3 = $a_zSpaces[$int3];
    return $rand_letter3;
}
// subfunction 4 for generating a random password with spaces and no special characters
function randLetter4()
{
    $int4 = rand(1,70);
    $a_zNoSpecialSpaces = "aAbBc CdDeEfF gGhHiIjJk KlL mMnNoOpPq QrRsStTuU vVwWx XyYzZ1 234567890";
    $rand_letter4 = $a_zNoSpecialSpaces[$int4];
    return $rand_letter4;
}
// subfunction 5 for lowercase and uppercase letters and numbers with dollar signs
function randLetter5()
{
    $int5 = rand(1,70);
    if ($int5 <= 63){
    $a_zDollars = "aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ1234567890";
    $rand_letter5 = $a_zDollars[$int5];
    } 
    else if ($int5 > 63){ $rand_letter5 = "\$"; }
    return $rand_letter5;
}
// subfunction 6 for generating a mixture of lower and uppercase letters with no special characters
function randLetter6()
{
    $int6 = rand(1,52);
    $a_zletters = "aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ";
    $rand_letter6 = $a_zletters[$int6];
    return $rand_letter6;
}
// subfunction 7 for generating just numbers
function randLetter7()
{
    $rand_letter7 = rand(1,10);
    return $rand_letter7;
}
// subfunction 8 for generating lowercase letters
function randLetter8()
{
    $int8 = rand(1,26);
    $a_zlowercase = "abcdefghijkmnopqrstuvwxyz";
    $rand_letter8 = $a_zlowercase[$int8];
    return $rand_letter8;
}



function RanPass_function($incomingfromhandler) {

  // passed variables
    
    $maxchars=$incomingfromhandler["numchars"];
    $type=$incomingfromhandler["type"];
    $P='';
    $n='';  

// MAIN FUNCTION

for ($i = 1; $i <= $maxchars; $i++) {
/* Generate Each Random Character based on type*/
   if($type == "default"){$n .= randLetter();}
   else if($type == "nospecial"){$n .= randLetter2();}
   else if($type == "specialspaces"){$n .= randLetter3();}
   else if($type == "spaces"){$n .= randLetter4();}
   else if($type == "dollars"){$n .= randLetter5();}
   else if($type == "letters"){$n .= randLetter6();}
   else if($type == "numbers"){$n .= randLetter7();}
   else if($type == "lowercase"){$n .= randLetter8();}
   
   //prevent failure for invalid password types, run default randletter routine
   else if($type != "spaces" && $type != "specialspaces" && $type != "nospecial" && $type != "default" && $type != "dollars" && $type != "letters" && $type != "numbers" && $type != "lowercase"){$n .= randLetter();}
}

/* Finally, add output to a variable */
$RanPass_output .= $n; 

// send back text to calling function
return $RanPass_output;
}
?>
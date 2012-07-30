=== Strong Password Shortcode ===

Contributors: AustinThemes
Donate link: http://www.austinthemes.com/request-a-quote/
Tags: random password shortcode, strong password shortcode, password generator, password shortcode, pw shortcode, pw, password
Requires at least: 2.0.2
Tested up to: 3.4.1

Adds a shortcode for generating a random number, either 1-100 or in a set range.

== Description ==

A random password generator using a shortcode to display a random strong password. There are two options for setting the length of the password and choosing one of 8 different types of strong password. Use special characters, spaces, just numbers, just letters, and even just lowercase. You can also use multiple types on a page to give your users more options for their suggestion.<strong>Types: default, nospecial, specialspaces, spaces, dollars, letters, numbers, lowercase</strong>

The plugin creates two shortcodes, “[RP]” and/or “[RanPass]“. Used as-is, these will each generate a 12 character password with lowercase and uppercase numbers and exclamation points.

For further customization, however, you can set the number of characters and the password type using the "SHORTCODE OPTIONS" below.


 
SHORTCODE OPTIONS:

1)  type= 
	"default" : an alphanumeric password
	"nospecial" :  lowercase and uppercase letters and numbers
	"specialspaces" : lowercase and uppercase letters, numbers, random spaces, and special characters
	"spaces" : lowercase and uppercase letters with numbers and random spaces
	"dollars" : lowercase and uppercase letters with random dollar signs and numbers
	"letters" : letters, both uppercase and lowercase
	"numbers" : just numbers (0-9)
	"lowercase" : just lowercase letters

2) numchars= the length of the password, in characters/digits.




== Examples ==


Example 1)  
 
[RP numchars="15" type="dollars"]
Generates a 15-character alphanumeric password with dollar signs (no other special characters)

Example 2) 

[RP numchars="10" type="specialspaces"]
Generates a 10-character alphanumeric password with special characters and spaces

Example 3) 

[RP type="specialspaces"]
Generates a 12-character alphanumeric password with special characters and spaces

Example 4) 

[RP numchars="23"]
Generates a 23-character alphanumeric password.	




== Installation ==

Just upload using the “plugins > add new > upload” menu in the wordpress admin menu.

To install manually – simply download the zip file above, then upload the PHP file into a new folder within “wp-content/plugins/”, navigate to the plugins menu on your wordpress site and activate the ‘RanNum’ plugin, and presto! .

Then, simply edit a page or post, and paste/type in the shortcode you'd like (but make sure to do it in HTML mode, NOT VISUAL)

== Frequently Asked Questions ==

= Can I use more than one shortcode on a page or post? 

Absolutely! And you can mix and match password lengths and types.


= What about foo bar? =

If it's foo bar, please email ryan@austinthemes.com and i'll check out the issue! No individual usage or customization support is guaranteed, but bugs will almost always be investigated.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the directory of the stable readme.txt, so in this case, `/tags/4.3/screenshot-1.png` (or jpg, jpeg, gif)
2. This is the second screen shot

== Changelog ==

= 1.0 =
* Initial Release




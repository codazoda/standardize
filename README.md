# Standardize

Takes a string and tries to return a standard for it. Originally designed to standardize exterior car 
colors.

To use, just drop the *Standardize.php* file into your project and then include it into your PHP script (or auto load it if you're into that).

# Color() Method

Takes a complex color string and returns the best guess for a standard color. For example, pass in "Pearl White" and the function will return "white".

Example:

	<?php

	include('Standardize.php');
	$standardize = new Standardize;
	echo $standardize->color("Pearl White");

Lots of colors are ambiguous. For example, "neutral" can refer to white, brown, or tan while "garnet" can refer to a redish or brownish color. I've tried to categorize some of these based on exterior auto colors but there is lots of room for interpretation here.

# Tests

I've written a few PHPUnit tests in the *tests* directory. In order to run them you'll need PHPUnit installed and then you can do the following.

	phpunit ./tests/StandardizeTest.php

I have access to a lot of car records. I exported the interior and exterior colors of those cars into the colors.csv file. I then loaded that file in and tested to see if this class gets results for each of the rows. I got the following results:

Exterior Color

	Total: 63970
	Blank: 6085 (9.51%)
	Worked: 55641 (86.98%)
	Failed: 2244 (3.51%)

Interior Color

	Total: 63970
	Blank: 19745 (30.87%)
	Worked: 41707 (65.2%)
	Failed: 2518 (3.94%)
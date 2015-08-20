<?php

// Bring in the Standardize library
include('Standardize.php');

$worked = 0;
$failed = 0;
$blank = 0;
$row = 0;
$column = 0; // Interior = 0, Exterior = 1

// Create an instance of the Standardize object
$standardize = new Standardize;

// Load the example colors CSV file
$handle = fopen('tests/colors.csv', 'r');

// Loop through the example colors
while($car = fgetcsv($handle, 1000, ",")) {

	$theColor = '';

	// Set undefined to a blank value
	if ($car[$column] == 'undefined') {

		$car[$column] = '';

	}

	// If the value is empty, add to blank do nothing else
	if (empty($car[$column])) {

		// Increment the blank counter
		$blank++;
		$rowResult = 'blank';

	} else {

		// Standardize the color
		$theColor = $standardize->color($car[$column]);

		// Log a stat of it if worked or not
		if ($theColor === false) {
			$failed++;
			$rowResult = 'failed';
		} else {
			$worked++;
			$rowResult = 'worked';
		}

	}

	// Show the question and answer
	if ($rowResult == 'failed') {
		echo "$row: {$car[$column]} = {$theColor} ($rowResult)\n";
	}

	// Increment the row counter
	$row++;

}

// Show the stats
$total = $worked+$failed+$blank;
$blankPercent = round($blank/$total*100, 2);
$workedPercent = round($worked/$total*100, 2);
$failedPercent = round($failed/$total*100, 2);
echo "\n";
echo "Total: $total\n";
echo "Blank: $blank ({$blankPercent}%)\n";
echo "Worked: $worked ({$workedPercent}%)\n";
echo "Failed: $failed ({$failedPercent}%)\n";
<?php

class Standardize
{

    /**
     * Takes a complex color string and returns the best guess for a standard color.
     * For example, pass in "Pearl White" and the function will return "white".
     *
     * @param $color string The original color name you want to translate
     * @return string
     */
    function color($color) {
        // Default the return color to false (no match found)
        $returnColor = false;
        // Standard color list with possible synonyms, ordered by color priority
        $colorList = array(
            'white' => array('snow', 'ghost', 'ivory', 'powder', 'blizzard', 'frost', 'winter'),
            'red' => array('salmon', 'crimson', 'fire', 'maroon', 'ruby', 'lava', 'garnet', 'cabernet'),
            'pink' => array('coral'),
            'orange' => array(),
            'yellow' => array('lemon'),
            'purple' => array('violet', 'lavender', 'plum', 'fuchsia', 'magenta'),
            'blue' => array('indigo','cyan', 'teal', 'aqua', 'turquoise', 'navy', 'sky', 'glacier'),
            'black' => array('night', 'midnight', 'ebony', 'blk'),
            'green' => array('forest','olive', 'peacock', 'jade'),
            'brown' => array('gold', 'bronze', 'java', 'cocoa', 'brunello', 'earth', 'pecan', 'espresso', 'saddle'),
            'tan' => array('beige', 'cream', 'almond', 'sahara', 'neutral', 'creme', 'bisque', 'parchment', 'pewter', 'khaki', 'sand', 'camel', 'fawn', 'Bisque', 'taupe', 'dune', 'oyster'),
            'gray' => array('grey', 'silver', 'charcoal', 'graphite', 'ash', 'steel', 'gun', 'smoke', 'stone', 'flint', 'platinum', 'gry'),
            // We might need to add silver, especially for exterior colors
            //'silver' => array(),
        );
        // Convert the users color to lowercase
        $color = strtolower($color);
        // Loop through our standard color list
        foreach($colorList as $standardColorKey => $colorSynonyms) {
            // If the users color includes this key, use it and break of this foreach
            if (strpos($color, $standardColorKey) !== false) {
                $returnColor = $standardColorKey;
                break;
            } else {
                // Loop through the synonyms for this main color looking for matches
                foreach($colorSynonyms as $synonym) {
                    // If this synonym matches then set the return to the main key and break out of the foreach
                    if (strpos($color, $synonym) !== false) {
                        $returnColor = $standardColorKey;
                        break;
                    }
                }
            }
        }
        return $returnColor;
    }

}
<?php
/**
 * Don't let the machines win. You are humanity's last hope...
 **/

fscanf(STDIN, "%d",
    $width // the number of cells on the X axis
);
fscanf(STDIN, "%d",
    $height // the number of cells on the Y axis
);

$coordinatesArray = [];
for ($i = 0; $i < $height; $i++)
{
    // Creating array of coordinates
    $coordinatesArray[] = stream_get_line(STDIN, 31 + 1, "\n"); // width characters, each either 0 or .
}

// Searching by element in line, so starting with Y coordinates
for ($y = 0; $y < $height; $y++) {
    for ($x = 0; $x < $width; $x++) {
        if ($coordinatesArray[$y][$x] == ".") {
            continue;
        }
        $positionRight = '';
        $positionBelow = '';
        $positionCurrent = "{$x} {$y}";
        // Searching for coordinates right from current element
        for ($i = $x + 1; $i < $width; $i++) {
            if (isset($coordinatesArray[$y][$i]) && $coordinatesArray[$y][$i] == '0') {
                $positionRight = "{$i} {$y}";
                break;
            }
        }
        // If no elements right found - return -1 -1
        if (!$positionRight) {
            $positionRight = "-1 -1";
        }

        // Searching for coordinates below from current element
        for ($j = $y + 1; $j < $height; $j++) {
            if (isset($coordinatesArray[$j][$x]) && $coordinatesArray[$j][$x] == '0') {
                $positionBelow = "{$x} {$j}";
                break;
            }
        }
        // If no elements below found - return -1 -1
        if (!$positionBelow) {
            $positionBelow = "-1 -1";
        }
        // Printing result
        echo "{$positionCurrent} {$positionRight} {$positionBelow}\n";
    }
}
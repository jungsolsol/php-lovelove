<?php

namespace App\Http\Utils;

use PhpParser\Node\Expr\Cast\Double;

class Direction extends \Illuminate\Validation\Rules\Enum
{

    const NORTH = (0.0);
    const WEST = (270.0);
    const SOUTH = (180.0);
    const EAST = (90.0);
    const NORTHWEST = (315.0);
    const SOUTHWEST = (225.0);
    const SOUTHEAST = (135.0);
    const NORTHEAST = (45.0);

//    private final Double bearing;

//private $Bearing =
    public function Direction(Double $double)
    {
        $double = $double;
    }

}



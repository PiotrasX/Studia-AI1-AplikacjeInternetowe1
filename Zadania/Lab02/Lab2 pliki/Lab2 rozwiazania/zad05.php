<?php
// Zad 2.5

$n = 3.5;
$note;

switch ($n) 
{
    case 2:
        $note = "niedostateczny";
        break;
    case 3:
        $note = "dostateczny";
        break;
    case 3.5:
        $note = "plus dostateczny";
        break;
    case 4:
        $note = "dobry";
        break;
    case 4.5:
        $note = "plus dobry";
        break;
    case 5:
        $note = "bardzo dobry";
        break;
    default:
        $note = "";
}
print $n . " -> " . $note . "\n";

$note = match ($n) 
{
    2 => "niedostateczny",
    3 => "dostateczny",
    3.5 => "plus dostateczny",
    4 => "dobry",
    4.5 => "plus dobry",
    5 => "bardzo dobry",
    default => ""
};
print $n . " -> " . $note;

<?php

/* Ćwiczenie 24 - Pętle, instrukcje sterujące */

// Pętla for

for ($i = 1; $i <= 10; $i++) print $i . " ";
print "\n";

for ($i = 1; $i <= 10; $i += 2) print $i . " ";
print "\n";

for ($i = 10; $i >= 1; $i--) print $i . " ";
print "\n";



// Pętla while

print "\n";
$i = 1;
while ($i <= 10) 
{
    print $i . " ";
    $i++;
}
print "\n";



// Pętla do-while

print "\n";
$i = 1;
do 
{
    print $i . " ";
    $i++;
} while ($i <= 10);
print "\n";



// Instrukcja continue

print "\n";
for ($i = 1; $i <= 10; $i++) 
{
    if ($i % 2 != 0) continue;
    print $i . " ";
}
print "\n";



// Instrukcja break

print "\n";
for ($i = 1; $i <= 10; $i++) 
{
    if ($i > 7) break;
    print $i . " ";
}
print "\n";

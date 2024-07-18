<?php
echo "<ul>\n";
for ($i = ord('a'); $i <= ord('z'); $i++) 
{
    echo "\t<li>" . chr($i) . "</li>\n";
}
echo "</ul>\n";
?>

<ul>
    <?php for ($i = ord('a'); $i <= ord('z'); $i++) { ?>
        <li><?php print chr($i) ?></li>
    <?php } ?>
</ul>

<!-- Tylko 3 sposób jest poprawny -->
<ul>
    <?php for ($i = ord('a'); $i <= ord('z'); $i++) : ?>
        <li><?php print chr($i) ?></li>
    <?php endfor; ?>
</ul>
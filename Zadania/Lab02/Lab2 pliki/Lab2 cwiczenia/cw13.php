<?php

/* Ćwiczenie 13 - Format heredoc */

// Identyfikator '<<< EOF' informuje interpreter PHP, że tworzymy dokument wbudowany w formacie heredoc.
// Identyfikator 'EOF' oznacza koniec dokumentu wbudowanego.
// Definicja dokumentu wbudowanego w formacie heredoc:
$inwokacja = <<< EOF
Litwo, Ojczyzno moja! Ty jesteś jak zdrowie;
Ile cię trzeba cenić, ten tylko się dowie,
Kto cie stracił. Dziś piękność twą w całej ozdobie
Widzę i opisuję, bo tęskię po tobie.
EOF;

print $inwokacja;

<?php

/* Ćwiczenie 6 - Różnice między 'print' i 'echo' */

// Typ:
//      # 'echo' jest konstrukcją językową, a nie funkcją, co oznacza, że nie jest wymagane stosowanie nawiasów podczas jej wywoływania. 
//        'echo, może przyjmować wiele argumentów, oddzielonych przecinkami.
//      # 'print' również jest konstrukcją językową, ale często jest traktowana bardziej jak funkcja. 'print' może przyjmować tylko 
//        jeden argument i zawsze zwraca 1, co pozwala jej być używaną w wyrażeniach.

// Zwracana wartość:
//      # 'echo' nie zwraca żadnej wartości, jest używane wyłącznie do wyświetlania ciągów znaków.
//      # 'print' zawsze zwraca wartość 1, co pozwala na jego używanie w wyrażeniach, na przykład w warunkach if.

// Wykorzystanie:
//      # 'echo' jest nieco szybsze w przypadku wyświetlania prostych ciągów tekstowych, ponieważ nie zwraca żadnej wartości.
//      # 'print' może być użyteczne, gdy potrzebujesz sprawdzić, czy wydrukowanie ciągu się powiodło, chociaż ten scenariusz jest dość rzadki.

// Składnia:
//      # 'echo' pozwala na wyświetlanie wielu ciągów za pomocą jednego wywołania, oddzielając je przecinkami. Przykład: echo $var1, $var2;
//      # 'print' może wyświetlić tylko jeden ciąg naraz i nie obsługuje tej składni. Przykład: print $var;

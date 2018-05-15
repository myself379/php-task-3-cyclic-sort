# php-task-3-cyclic-sort

Cyclic Sort Katas

# Installation guide

Simply pull this repo and run

```
composer install
```

then run

```
phpunit
```

or if there is no phpunit install globally, run through the vendor directory

```
./vendor/phpunit/phpunit/phpunit
```

# Cyclic Sort Katas

```
/**
 * Cyclic sorts the input using the ordering.
 * @param string input  The input string value.
 * @param int ordering  The ordering, > 1.
 * @return  The reordered output
 */
function cyclicSort($input, $ordering) { }
```

Given an array with these items "A", "B", "C", "D", "E", "F", "G", "H", "I", "J"; and the ordering of 7.

Counting from "A" and the 7th character is "G".
So the first output character is "G".
Remove "G" and remains "A", "B", "C", "D", "E", "F", "H", "I", "J".

Then starting from "H", count 7 in cyclic fashion (and roll over, starts from beginning), and reach "D".
So the second output character is "D".
Remove "D" and remains "A", "B", "C", "E", "F", "H", "I", "J".

Starting from "E" and count 7 in cyclic fashion (and roll over, starts from beginning) and reach "B".
So the second output character is "B".
Remove "B" and remains "A", "C", "E", "F", "H", "I", "J".

Starting from "C" and count 7 and continue the process until nothing remains.

Finally, it should produce the output array of this order.
    "G", "D", "B", "A", "C", "F", "J", "E", "H", "I"

```
$input = "ABCDEFGHIJ";
$output = cyclicSort($input, 7);
echo $output.PHP_EOL; // GDBACFJEHI
```

# Task

1. What is the output of "0123456789ABCDEF", if the order is "11"?

2. With the order is "13", the sorted/scrambled message is given below:

```
d nntobmeanhnld ftcitao.Laluw lyteuhtoohevet iGa rs llUnai coBn o  oayg. p no .oddf .ityio gntire d. LoKrRiouyiG
```

What is the original message (before it was cyclically sorted)?

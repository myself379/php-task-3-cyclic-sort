<?php

use App\CyclicSort;
use PHPUnit\Framework\TestCase;

class CyclicSortTest extends TestCase
{
    /** @test */
    function test_for_cyclic_sort_using_class()
    {
        $givenString = 'ABCDEFGHIJ';
        $ordering = 7;

        $sorted = (new CyclicSort($givenString, $ordering))->makeSort()->implode('');

        $this->assertEquals('GDBACFJEHI', $sorted);
    }

    /** @test */
    function test_cyclic_sort_class_can_only_accept_ordering_more_than_1()
    {
        $givenString = 'ABCDEFGHIJ';
        $ordering = 1;

        $this->expectException('App\InvalidArgumentException');
        $this->expectExceptionMessage("Ordering should be more than 1");
        new CyclicSort($givenString, $ordering);
    }

    /** @test */
    function test_cyclic_sort_class_can_only_accept_ordering_must_be_an_integer()
    {
        $givenString = 'ABCDEFGHIJ';
        $ordering = 2.5;

        $this->expectException('App\InvalidArgumentException');
        $this->expectExceptionMessage("Ordering should be integer");
        new CyclicSort($givenString, $ordering);
    }

    /** @test */
    function test_for_cyclic_sort_for_0123456789ABCDEF()
    {
        $givenString = '0123456789ABCDEF';
        $ordering = 11;

        $sorted = (new CyclicSort($givenString, $ordering))->makeSort()->implode('');

        $this->assertEquals('A51ECBD049783F26', $sorted);

        $output = "\n\nThe output for '0123456789ABCDEF' with order 11 is :"."\n";
        $output2 = $sorted."\n\n";

        $outputMsg = $output.$output2;

        fwrite(STDERR, print_r($outputMsg, TRUE));
    }

    /** @test */
    function test_for_reverse_cyclic_sort()
    {
        $collect = (new CyclicSort('GDBACFJEHI', 7))->reverseSort();

        $this->assertEquals(
            "ABCDEFGHIJ",
            $collect
        );
    }

    /** @test */
    function test_for_reverse_cyclic_sort_for_message_using_class()
    {
        // Cyclic order used is 13
        $message = (new CyclicSort('d nntobmeanhnld ftcitao.Laluw lyteuhtoohevet iGa rs llUnai coBn o  oayg. p no .oddf .ityio gntire d. LoKrRiouyiG', 13))->reverseSort();

        $this->assertEquals(
            "Belief in God. Loyalty to King and country. Upholding the constitution. Rule of Law. Good behavior and morality.",
            $message
        );

        $output = "\n\nThe messsage before sort by 13 order was :"."\n";
        $output2 = $message."\n\n";

        $outputMsg = $output.$output2;

        fwrite(STDERR, print_r($outputMsg, TRUE));
    }
}
<?php

Format::number(1234.56, 2); // 1 234,56
Format::number(1234.56, 0); // 1 234
Format::number(1234.56, 4); // 1 234,5600
Format::number(1234.56, 4)->trimmed(); // 1 234,56

Format::money(1234.56, 2); // 1 234,56 $
Format::money(1234.56, 2)->currency('EUR'); // 1 234,56 €
Format::money(1234.56, 2)->foreign(); // 1 234,56 $CA
Format::money(1234.56, 2)->iso(); // 1 234,56 CAD
Format::accounting(-1234.56, 2); // (-1 234,56)
Format::si(1234.56, 'g', 2); // 1 234,56 g
Format::si(1234.56, ['m', 's'], 2); // 1 234,56 m/s
Format::percentage(1234.56, 2); // 1 234,56 %
Format::scientific(1234.56, 2); // 1.23E3

Format::ratio(1, 4); // 1:4

Format::fraction(2, 4); // 2/4
Format::fraction(2.6, 4); // 3/4
Format::fraction(2, 4)->simplified(); // 1/2

Format::date(now()); // 2020-02-28
Format::date(now())->short(); // 2020-02-28
Format::date(now())->medium(); // Feb 28th, 2020
Format::date(now())->long(); // February 28th, 2020
Format::date(now())->full(); // Friday, February 28th, 2020
Format::time(now()); // 09:06
Format::time(now())->short(); // 09:06
Format::time(now())->medium(); // 09:06:09
Format::time(now())->long(); // 09:06:09 EDT
Format::time(now())->full(); // 09:06:09 Eastern Daylight Time
Format::datetime(now()); // 2020-02-28 09:06
Format::datetime(now())->short(); // 2020-02-28 09:06
Format::datetime(now())->medium(); // 2020-02-28 09:06:09
Format::datetime(now())->long(); // Feb 28th, 2020 09:06:09 EDT
Format::datetime(now())->full(); // Friday, February 28th, 2020 09:06:09 Eastern Daylight Time

Format::period(now()->subYear(), now()); // 2019-02-28 to 2020-02-28

Format::duration(1234); // 20m 34s
Format::duration(1234)->full(); // 20 minutes 34 seconds
Format::duration(1234)->toMinutes(); // 20 minutes

Format::memory(1234.56, 2); // 1,23 MB
Format::memory(1234.56, 2)->octal(); // 1,21 MiB

Format::phone('5145555555'); // +1 (514) 555-55555
Format::socialInsuranceNumber('123456789'); // 123 456 789
Format::creditCard('5500000000000004'); // 5500 0000 0000 0004
Format::creditCard('5500000000000004')->hidden(); // xxxx xxxx xxxx 0004

//=============================================================================

Format::number(null) ?? 'N/A'; // N/A
Format::for(1234.56)->number(2); // 1 234,56
format(1234.56)->number(2); // 1 234,56

Format::macro('markdown', function ($text) {
    return (new Parsedown)->text($text);
});

Format::macro('boolean', function (bool $value) {
    return view('components.formats.boolean');
});

Format::macro('address', function ($address) {
    return new AddressFormatter($address);
});

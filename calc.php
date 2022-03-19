<?php

if (empty($_GET)) {
    return 'Nothing has been submitted!';
}

if (empty($_GET['reds']) || empty($_GET['greens'] || empty($_GET['ticks']))) {
    return 'No arguments passed';
}

$initReds = $_GET['reds'];
$initGreens = $_GET['greens'];
$initTicks = $_GET['ticks'];

function splitOnce($reds, $greens, $ticks) {
    if ($ticks < 0) {
        throw new Error('negative ticks!');
    }

    if ($ticks === 0) {
        return [
            'reds' => $reds,
            'greens' => $greens
        ];
    }

    $splittedReds = [
        'reds' => $reds*4,
        'greens' => $reds*3
    ];

    $splittedGreens = [
        'reds' => $greens*5,
        'greens' => $greens*2
    ];

    $splitted = [
        'reds' => $splittedReds['reds'] + $splittedGreens['reds'],
        'greens' => $splittedReds['greens'] + $splittedGreens['greens']
    ];

    $remainingTicks = $ticks - 1;

    if ($remainingTicks === 0) {
        return $splitted;
    } else {
        return splitOnce($splitted['reds'], $splitted['greens'], $remainingTicks);
    }
}

$result = splitOnce($initReds, $initGreens, $initTicks);

return 'Red ' . $result['reds'] . '<br/>' . 'Green ' . $result['greens'];

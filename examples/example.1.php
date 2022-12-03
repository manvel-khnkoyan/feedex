<?php

require __DIR__ . '/../vendor/autoload.php';

use Manvel\Feedex\Schemas;
use Manvel\Feedex\Fields;
use Manvel\Feedex\Lists;
use Manvel\Feedex\Operators;

// Genre
$genrePop = new Schemas\Genre([
    'id' => new Fields\GenreId('pop'),
    'name' => new Fields\GenreName('Pop'),
]);
$genreHip = new Schemas\Genre([
    'id' => new Fields\GenreId('hip-hop'),
    'name' => new Fields\GenreName('Hip / Hop'),
]);

$genres = new Lists\Genres([$genrePop, $genreHip]);

$operator = (new Operators\Transform())
    ->pull($genrePop)
    ->push($genreHip)
    ->pull(
        new Schemas\Genre([
            'id' => new Fields\GenreId('top')
        ])
    );

foreach ($operator as list($type, $item)) {
    echo " $type \n ";
    // var_dump($item);
}

foreach ($genres as $genre) {
    // echo $genre->id . " - ";
    // echo $genre->name . "\n";
}

// var_dump($genrePop);
// var_dump($genres);

/* 

$xmlFeed = new XMLFileFeed('/tmp/feeds');

// Final
$artistOne = new Artist([
    'id' => new Fields\NumericId(1020329), 
    'title' => new Fields\Title("Babababa"),
    'updatedAt' => new Operator\Increase(1),
    'genres' => new Lists\Genres([
        new Schemas\Genre(),
    ]),
], []);



// Final

$genersOperation = new Operators\Transform();
$genersOperation->push($genre1)
    ->pull($genre2)
    ->pull($genre3)
    ->pull($genre4);

$artisUpdateSchema = new Artist([
    'id' => new Fields\NumericId(1020329),
    'title' => (new Fields\Title("Babababa"))->increase(),
    'version' => new Operators\Increase(12),
    'genres' => (new Operators\Transform())
        ->push($genre1)
        ->pull($genre2)
        ->pull($genre3)
        ->pull($genre4)
        ->push(new Schemas\Genre([

        ]))
]);

$package = new XMLFilePackage($artisUpdateSchema);
$xmlFeed->addPackage($package);

var_dump($trackSchema->id);
var_dump($trackSchema->title);

// print_r($trackSchema);

*/
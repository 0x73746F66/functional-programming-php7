<?php
use Pattern\Functional;
use Pattern\Functional\UnorderedList;
use Pattern\Functional\OrderedList;
use Pattern\Functional\Dictionary;
use Pattern\Functional\Set;

require_once 'src/autoload.php';

echo '<h1>Data Types</h1>';
$test =[
  'nsw' => 'sydney',
  'vic' => 'melbourne',
  'qld' => 'brisbane',
  'wa'  => 'perth',
  'sa'  => 'adelaide',
  'tas' => 'hobart'
];
$cities = new Dictionary($test);
echo '<h2>Dictionary</h2>';
echo '<strong>Test: </strong>'.print_r($test, true).'<br><br>';

$cities->each(function($city, $state) {
  echo ucfirst($city) . ' is the capital of ' . strtoupper($state) . '<br>';
});

$test = ['nsw', 'vic', 'qld', 'wa', 'sa', 'tas'];
$state = new Set($test);
echo '<h2>Set</h2>';
echo '<strong>Test: </strong>'.implode(', ', $test).'<br><br>';
$state->each(function($item) {
  echo strtoupper($item) . '<br>';
});

$test = ['nsw', 'vic', 'wa', 'vic', 'qld', 'sa', 'tas', 'vic'];
$state = new OrderedList($test);
echo '<h2>OrderedList</h2>';
echo '<strong>Test: </strong>'.implode(', ', $test).'<br><br>';
$state->each(function($item) {
  echo strtoupper($item) . '<br>';
});

$test = ['nsw', 'vic', 'qld', 'qld', 'wa', 'qld', 'sa', 'tas'];
$state = new UnorderedList($test);
echo '<h2>UnorderedList</h2>';
echo '<strong>Test: </strong>'.implode(', ', $test).'<br><br>';
$state->each(function($item) {
  echo strtoupper($item) . '<br>';
});

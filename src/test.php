<?php
namespace Acme;

use Acme\CsvResponse;

$response = new CsvResponse( $data, 200, explode( ', ', $columns ) );
$response->setFilename( "data.csv" );
var_dump($response);

<?php
namespace Cltt;

use Cltt\CsvResponse;

$response = new CsvResponse( $data, 200, explode( ', ', $columns ) );
$response->setFilename( "data.csv" );
var_dump($response);

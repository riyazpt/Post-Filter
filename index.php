<?php

require 'vendor/autoload.php';

use API\APIClient;
use API\PostAggregator;

$apiClient = new APIClient("http://coderbyte.com");
$postAggregator = new PostAggregator($apiClient);

header('Content-Type: application/json');
echo $postAggregator->getAggregatedPosts();

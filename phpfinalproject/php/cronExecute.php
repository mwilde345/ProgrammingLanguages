<?php

function search($term){
			$key = "AIzaSyD9GBj2m-_lwsXwZZdwS5X3tj6blyEtMM8"; //disable this after project presentation!!!
			$engineId = "014956187943969651346:2orik1kviv4";
			$result = file_get_contents('https://www.googleapis.com/customsearch/v1?key=' . $key . '&cx=' .$engineId . '&q=' . $term);
			return $result;
}
?>
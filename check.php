<?php
require 'vendor/autoload.php';
require 'config.php';

$config = new \Doctrine\DBAL\Configuration();

$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
$conn->setFetchMode(PDO::FETCH_NUM);

$qb = new \Doctrine\DBAL\Query\QueryBuilder($conn);
$q = $qb->select($columns)->from($tables);

$images_db = $q->execute()->fetchAll();

$filenames_db = array();
foreach($images_db as $image_db){
	foreach($image_db as $path){
		$path_elements=explode(PATH_SEP, $path);
		$filenames_db[]=array_pop($path_elements);
	}
}

$filenames_db = array_unique($filenames_db);
$filenames_local = findAll(IMAGES_DIR);
$filenames_local = array_unique($filenames_local);
$missing_files = array_diff($filenames_local, $filenames_db); // show pictures that are not in db
natsort($missing_files);

foreach($missing_files as $missing_file){
	echo $missing_file."\n";
}

function findAll($path) {
	$result = array();
	$iterator = new FilesystemIterator($path, FilesystemIterator::SKIP_DOTS + FilesystemIterator::KEY_AS_FILENAME);
	foreach ($iterator as $filename => $filepath) {
		$filename = str_replace('_thumb','', $filename);
		$result[] = $filename;
	}
	return $result;
}
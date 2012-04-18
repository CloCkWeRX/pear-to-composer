<?php
$package_file = dirname(__FILE__) . '/package.xml-test';


// TODO: Consider a proper API, ie: PEAR_PackageFileManager2 for later.
$document = simplexml_load_file($package_file);

$composer = array();

$composer['name'] = (string)$document->name;
$composer['description'] = (string)$document->description;
$composer['version'] = (string)$document->version->release;
$composer['time'] = (string)$document->date;
$composer['license'] = (string)$document->license;

// TODO: Array merge and only when !empty, also contributors
foreach ($document->lead as $author) {
    $composer['authors'][] = array(
        'name' => (string)$author->name,
        'email' => (string)$author->email
    );
}

foreach ($document->developer as $author) {
    $composer['authors'][] = array(
        'name' => (string)$author->name,
        'email' => (string)$author->email
    );
}

foreach ($document->dependencies->required->php as $dep) {
    // Yeah, probably wrong.
    $composer['require']['php'] = (string)$dep->min;
}
foreach ($document->dependencies->optional->package as $dep) {
    $composer['suggest'][(string)$dep->channel . '/' . (string)$dep->name] = "Optionally uses " . $dep->min;
}


//print json_encode($composer, JSON_PRETTY_PRINT)."\n";
print json_encode($composer)."\n";



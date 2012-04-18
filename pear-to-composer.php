<?php
$package_file = dirname(__FILE__) . '/Console_Getargs/package.xml';


// TODO: Consider a proper API, ie: PEAR_PackageFileManager2 for later.
$document = simplexml_load_file($package_file);

$composer = array();

$composer['name'] = (string)$document->name;
$composer['description'] = (string)$document->description;


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
/*
{
    "authors": [
        {
            "name": "Nils Adermann",
            "email": "naderman@naderman.de",
            "homepage": "http://www.naderman.de"
        },
        {
            "name": "Jordi Boggiano",
            "email": "j.boggiano@seld.be",
            "homepage": "http://seld.be"
        }
    ]
}
*/

foreach ($document->dependencies->required->php as $dep) {
    // Yeah, probably wrong.
    $composer['require']['php'] = (string)$dep->min;
}
foreach ($document->dependencies->optional->package as $dep) {
    $composer['suggest'][(string)$dep->channel . '/' . (string)$dep->name] = "Optionally uses " . $dep->min;
}

/*
<dependencies>
  <required>
   <php>
    <min>4.1.0</min>
   </php>
   <pearinstaller>
    <min>1.4.0b1</min>
   </pearinstaller>
  </required>
  <optional>
   <package>
    <name>PHPUnit</name>
    <channel>pear.phpunit.de</channel>
    <min>3.6.0</min>
   </package>
  </optional>
 </dependencies>
*/
//print json_encode($composer, JSON_PRETTY_PRINT)."\n";
print json_encode($composer)."\n";



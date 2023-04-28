<?php

require_once '../vendor/autoload.php';
session_start();

$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->itemsList;
$tableName = $_SESSION['firstname'] . $_SESSION['lastname'] . "countitemsList";

$itemSearch = implode(" ", array_filter(explode(" ", strtolower(trim($_POST['itemSearch'])))));

$query = [
    '$or' => [
        ['title' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
        ['brand' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
        ['description' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
        ['category' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
    ]
];

$cursor = $collection->find($query);
$num_results = $collection->count($query);

if ($num_results > 0) {
    $category_to_url_map = [
        'books' => 'books.php',
        'stationery' => 'stationary.php',
        'electronics' => 'electronics.php',
        'teachers' => 'teachers.php',
        'courses' => 'courses.php',
    ];
    $url = null;
    foreach ($category_to_url_map as $category => $url_value) {
        if (preg_match("/{$itemSearch}/", $category)) {
            $url = $category_to_url_map[$category];
            break;
        }
    }
    if ($url !== null) {
        $current_url = basename($_SERVER['REQUEST_URI']);
        $update_query = ['_id' => $current_url];
        $table = $db->$tableName;
        switch ($url) {
            case 'books.php':
                $update_data = ['$inc' => ['countBooks' => 1]];
                break;
            case 'stationary.php':
                $update_data = ['$inc' => ['countStationary' => 1]];
                break;
            case 'electronics.php':
                $update_data = ['$inc' => ['countElectronics' => 1]];
                break;
            case 'teachers.php':
                $update_data = ['$inc' => ['countTeachers' => 1]];
                break;
            case 'courses.php':
                $update_data = ['$inc' => ['countCourses' => 1]];
                break;
        }
        $table->updateOne($update_query, $update_data, ['upsert' => true]);
        echo ('<script>location.href="../php/' . $url . '"</script>');
    } else {
        // check the title, brand, and description fields for a partial match
        $cursor->rewind();
        foreach ($cursor as $document) {
            $title = strtolower($document['title']);
            $brand = strtolower($document['brand']);
            $description = strtolower($document['description']);

            if (preg_match("/{$itemSearch}/", $title) || preg_match("/{$itemSearch}/", $brand) || preg_match("/{$itemSearch}/", $description)) {
            $category = strtolower($document['category']);
            $url = $category_to_url_map[$category];
            $current_url = basename($_SERVER['REQUEST_URI']);
                    $update_query = ['_id' => $current_url];
                    $table = $db->$tableName;
                    switch ($url) {
                        case 'books.php':
                            $update_data = ['$inc' => ['countBooks' => 1]];
                            break;
                        case 'stationary.php':
                            $update_data = ['$inc' => ['countStationary' => 1]];
                            break;
                        case 'electronics.php':
                            $update_data = ['$inc' => ['countElectronics' => 1]];
                            break;
                        case 'teachers.php':
                            $update_data = ['$inc' => ['countTeachers' => 1]];
                            break;
                        case 'courses.php':
                            $update_data = ['$inc' => ['countCourses' => 1]];
                            break;
                    }
                    $table->updateOne($update_query, $update_data, ['upsert' => true]);
            echo ('<script>location.href="../php/' . $url . '"</script>');
            break;
            }
                    }}
            } else {
            echo 'No results found for "' . $_POST['itemSearch'] . '".';
            }
/*
require_once '../vendor/autoload.php';
session_start();

$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->itemsList;
$tableName = $_SESSION['firstname'] . $_SESSION['lastname'] . "countitemsList";

$itemSearch = implode(" ", array_filter(explode(" ", strtolower(trim($_POST['itemSearch'])))));

$query = [
    '$or' => [
        ['title' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
        ['brand' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
        ['description' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
        ['category' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
    ]
];

$cursor = $collection->find($query);
$num_results = $collection->count($query);

if ($num_results > 0) {
    $category_to_url_map = [
        'books' => 'books.php',
        'stationery' => 'stationary.php',
        'electronics' => 'electronics.php',
        'teachers' => 'teachers.php',
        'courses' => 'courses.php',
    ];
    $url = null;
    foreach ($category_to_url_map as $category => $url_value) {
        if (preg_match("/{$itemSearch}/", $category)) {
            $url = $category_to_url_map[$category];
            break;
        }
    }
    if ($url !== null) {
        $table = $db->$tableName;
        $update_query = ['_id' => $itemSearch];
        switch ($url) {
            case 'books.php':
                $update_data = ['$inc' => ['countBooks' => 1]];
                break;
            case 'stationary.php':
                $update_data = ['$inc' => ['countStationary' => 1]];
                break;
            case 'electronics.php':
                $update_data = ['$inc' => ['countElectronics' => 1]];
                break;
            case 'teachers.php':
                $update_data = ['$inc' => ['countTeachers' => 1]];
                break;
            case 'courses.php':
                $update_data = ['$inc' => ['countCourses' => 1]];
                break;
        }
        $table->updateOne($update_query, $update_data, ['upsert' => true]);
        echo ('<script>location.href="../php/' . $url . '"</script>');
    } else {
        // check the title, brand, and description fields for a partial match
        $cursor->rewind();
        foreach ($cursor as $document) {
            if (preg_match("/{$itemSearch}/", strtolower($document->title)) || preg_match("/{$itemSearch}/", strtolower($document->brand)) || preg_match("/{$itemSearch}/", strtolower($document->description))) {
                $url = $category_to_url_map[strtolower($document->category)];
                break;
            }
        }
        if ($url !== null) {
            $table = $db->$tableName;
            $update_query = ['_id' => $itemSearch];
            $update_data = ['$inc' => ['count' => 1]];
            $table->updateOne($update_query, $update_data, ['upsert' => true]);
            echo ('<script>location.href="../php/' . $url . '"</script>');
        } else {
            echo "No matching items found";
        }
    }
} else {
    echo "No matching items found";
}*/
/*
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$itemSearch = implode(" ",array_filter(explode(" ",strtolower(trim($_POST['itemSearch'])))));
$collection = $db->itemsList;

$query = [
    '$or' => [
        ['title' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
        ['brand' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
        ['description' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
        ['category' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
    ]
];

$cursor = $collection->find($query);
$num_results = $collection->count($query);

if($num_results > 0){
    $category_to_url_map = [
        'books' => 'books.php',
        'stationery' => 'stationary.php',
        'electronics' => 'electronics.php',
        'teachers' => 'teachers.php',
        'courses' => 'courses.php',
    ];
    $url = null;
    foreach($category_to_url_map as $category => $url_value){
        if(preg_match("/{$itemSearch}/",$category)){
            $url = $category_to_url_map[$category];
            break;
        }
    }
    if($url !== null){
        $tableName = $_SESSION['firstname'] . $_SESSION['lastname'] . "countitemsList";
        $collection = $db->$tableName;
        $updateResult = $collection->updateOne(
            ['_id' => '63dd6fff71a25d289f7b3031'],
            ['$inc' => [ 'count' . ucfirst($category) => 1 ]]
        );
        echo ('<script>location.href="../php/'.$url.'"</script>');
    }else{
        // check the title, brand, and description fields for a partial match
        $cursor->rewind();
        foreach($cursor as $document){
            if(preg_match("/{$itemSearch}/", strtolower($document->title)) || preg_match("/{$itemSearch}/", strtolower($document->brand)) || preg_match("/{$itemSearch}/", strtolower($document->description))){
                $url = $category_to_url_map[strtolower($document->category)];
                break;
            }
        }

        if($url !== null){
            $tableName = $_SESSION['firstname'] . $_SESSION['lastname'] . "countitemsList";
            $collection =$db->$tableName;
            $updateResult = $collection->updateOne(
            ['_id' => '63dd6fff71a25d289f7b3031'],
            ['$inc' => [ 'count' . ucfirst(strtolower($document->category)) => 1 ]]
            );
            echo ('<script>location.href="../php/'.$url.'"</script>');
        }else{
            // check the title, brand, and description fields for a partial match
            $cursor->rewind();
            foreach($cursor as $document){
                if(preg_match("/{$itemSearch}/", strtolower($document->title)) || preg_match("/{$itemSearch}/", strtolower($document->brand)) || preg_match("/{$itemSearch}/", strtolower($document->description))){
                    $url = $category_to_url_map[strtolower($document->category)];
                    break;
                }
            }
        
            if($url !== null){
                $tableName = $_SESSION['firstname'] . $_SESSION['lastname'] . "countitemsList";
                $collection =$db->$tableName;
                $updateResult = $collection->updateOne(
                ['_id' => '63dd6fff71a25d289f7b3031'],
                ['$inc' => [ 'count' . ucfirst(strtolower($document->category)) => 1 ]]
                );
                echo ('<script>location.href="../php/'.$url.'"</script>');
            }else{
                // no match was found
                echo 'No match was found for the searched item.';
            }
        }
    }
}*/
        
/*
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$itemSearch = implode(" ",array_filter(explode(" ",strtolower(trim($_POST['itemSearch'])))));
$collection = $db->itemsList;

$query = [
    '$or' => [
        ['title' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
        ['brand' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
        ['description' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
        ['category' => ['$regex' => new MongoDB\BSON\Regex($itemSearch, "i")]],
    ]
];

$cursor = $collection->find($query);
$num_results = $collection->count($query);

if($num_results > 0){
    $category_to_url_map = [
        'books' => 'books.php',
        'stationery' => 'stationary.php',
        'electronics' => 'electronics.php',
        'teachers' => 'teachers.php',
        'courses' => 'courses.php',
    ];
    $url = null;
    foreach($category_to_url_map as $category => $url_value){
        if(preg_match("/{$itemSearch}/",$category)){
            $url = $category_to_url_map[$category];
            break;
        }
    }
    if($url !== null){
        echo ('<script>location.href="../php/'.$url.'"</script>');
    }else{
        // check the title, brand, and description fields for a partial match
        $cursor->rewind();
        $tableName = $_SESSION['firstname'] . $_SESSION['lastname'] . "countitemsList";
$collection = $db->$tableName;

$updateResult = $collection->updateOne(
    ['_id' => '63dd6fff71a25d289f7b3031'],
    ['$inc' => ['countBooks' => 1]]
);
$updateResult = $collection->updateOne(
    ['_id' => '63dd6fff71a25d289f7b3031'],
    ['$inc' => ['countStationary' => 1]]
);

// To update countElectronics
$updateResult = $collection->updateOne(
    ['_id' => '63dd6fff71a25d289f7b3031'],
    ['$inc' => ['countElectronics' => 1]]
);

// To update countCourses
$updateResult = $collection->updateOne(
    ['_id' => '63dd6fff71a25d289f7b3031'],
    ['$inc' => ['countCourses' => 1]]
);

// To update countTeachers
$updateResult = $collection->updateOne(
    ['_id' => '63dd6fff71a25d289f7b3031'],
    ['$inc' => ['countTeachers' => 1]]
);
        foreach($cursor as $document){
            if(preg_match("/{$itemSearch}/", strtolower($document->title)) || preg_match("/{$itemSearch}/", strtolower($document->brand)) || preg_match("/{$itemSearch}/", strtolower($document->description))){
                $url = $category_to_url_map[strtolower($document->category)];
                break;
            }
        }

        if($url !== null){
            echo ('<script>location.href="../php/'.$url.'"</script>');
        }else{
            echo('<script>alert("No match found.")</script>');
        }
    }
}*/
?>
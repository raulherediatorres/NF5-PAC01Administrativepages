<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
?>
<html>
<head>
    <title>Commit</title>
</head>
<body>
<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'add':
            if (isset($_GET['type']) && isset($_POST['movie_name']) && isset($_POST['movie_year']) && isset($_POST['movie_type']) && isset($_POST['movie_leadactor']) && isset($_POST['movie_director'])) {
                $type = $_GET['type'];
                switch ($type) {
                    case 'movie':
                        $query = 'INSERT INTO
                            movie
                                (movie_name, movie_year, movie_type, movie_leadactor,
                                movie_director)
                            VALUES
                                ("' . $_POST['movie_name'] . '",
                                 ' . $_POST['movie_year'] . ',
                                 ' . $_POST['movie_type'] . ',
                                 ' . $_POST['movie_leadactor'] . ',
                                 ' . $_POST['movie_director'] . ')';
                        break;
                    // Add more cases for other types if needed
                }
            } else {
                echo "Error: Missing parameters for 'add' action.";
            }
            break;
        case 'edit':
            if (isset($_GET['type']) && isset($_POST['movie_name']) && isset($_POST['movie_year']) && isset($_POST['movie_type']) && isset($_POST['movie_leadactor']) && isset($_POST['movie_director']) && isset($_POST['movie_id'])) {
                $type = $_GET['type'];
                switch ($type) {
                    case 'movie':
                        $query = 'UPDATE movie SET
                                movie_name = "' . $_POST['movie_name'] . '",
                                movie_year = ' . $_POST['movie_year'] . ',
                                movie_type = ' . $_POST['movie_type'] . ',
                                movie_leadactor = ' . $_POST['movie_leadactor'] . ',
                                movie_director = ' . $_POST['movie_director'] . '
                            WHERE
                                movie_id = ' . $_POST['movie_id'];
                        break;
                    // Add more cases for other types if needed
                }
            } else {
                echo "Error: Missing parameters for 'edit' action.";
            }
            break;
        default:
            echo "Error: Unknown action.";
    }
} else {
    echo "Error: 'action' parameter is missing.";
}

if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
<p>Done!</p>
</body>
</html>


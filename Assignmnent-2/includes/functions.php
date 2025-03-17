<?php
    include 'conn.php'; // Ensure this includes the database connection

    function get_author_count(){
        global $conn; // Make $conn accessible inside this function
        $author_count = 0;
        $query = "SELECT COUNT(*) as author_count FROM authors";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $row = mysqli_fetch_assoc($query_run);
            $author_count = $row['author_count'];
        }
        return $author_count;
    }

    function get_user_count(){
        global $conn; // Add global $conn
        $user_count = 0;
        $query = "SELECT COUNT(*) as user_count FROM users";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $row = mysqli_fetch_assoc($query_run);
            $user_count = $row['user_count'];
        }
        return $user_count;
    }

    function get_book_count(){
        global $conn; 
        $book_count = 0;
        $query = "SELECT COUNT(*) as book_count FROM books";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $row = mysqli_fetch_assoc($query_run);
            $book_count = $row['book_count'];
        }
        return $book_count;
    }

    function get_issue_book_count(){
        global $conn;
        $issue_book_count = 0;
        $query = "SELECT COUNT(*) as issue_book_count FROM issued_books";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $row = mysqli_fetch_assoc($query_run);
            $issue_book_count = $row['issue_book_count'];
        }
        return $issue_book_count;
    }

    function get_category_count(){
        global $conn;
        $cat_count = 0;
        $query = "SELECT COUNT(*) as cat_count FROM category";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $row = mysqli_fetch_assoc($query_run);
            $cat_count = $row['cat_count'];
        }
        return $cat_count;
    }
?>

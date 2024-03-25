<?php
    include 'includes/session.php';

    if(isset($_POST['add'])){
        $name = $_POST['name'];
        $cat_desc = $_POST['cat_desc'];

        // Generate slug from category name
        $cat_slug = strtolower(str_replace(' ', '-', $name));

        $conn = $pdo->open();

        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM category WHERE name=:name");
        $stmt->execute(['name'=>$name]);
        $row = $stmt->fetch();

        if($row['numrows'] > 0){
            $_SESSION['error'] = 'Category already exists';
        }
        else{
            try{
                $stmt = $conn->prepare("INSERT INTO category (name, cat_slug, cat_desc) VALUES (:name, :cat_slug, :cat_desc)");
                $stmt->execute(['name'=>$name, 'cat_slug'=>$cat_slug, 'cat_desc'=>$cat_desc]);
                $_SESSION['success'] = 'Category added successfully';
            }
            catch(PDOException $e){
                $_SESSION['error'] = $e->getMessage();
            }
        }

        $pdo->close();
    }
    else{
        $_SESSION['error'] = 'Fill up category form first';
    }

    header('location: category.php');
?>


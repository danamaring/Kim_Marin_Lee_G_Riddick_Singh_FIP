<?php
    require_once '../load.php';
    confirm_logged_in();
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $delete_content_result = deleteContent($id);
    
        if(!$delete_content_result) {
            $message = "Failed to delete content";
        }
    }

    $story = 'tbl_story';
    $contents = getAll($story);
    
    if(!$contents) {
        $message = 'failed to bring product info';
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Content</title>
</head>
<body>
    <h2>Let's delete some stories</h2>
    <?php echo !empty($message)? $message: ''; ?>
    <?php if($contents):?>
    <table>
        <thead>
            <tr>
                <td>Story ID</td>
                <td>Story Title</td>
                <td>Story Explain</td>
                <td>Delete</td>
            </tr>
        </thead>
        <?php while($content = $contents->fetch(PDO::FETCH_ASSOC)):?>
        <tbody>
            <tr>
                <td><?php echo $content['story_id'];?></td>
                <td><?php echo $content['story_title'];?></td>
                <td><?php echo $content['story_explain'];?></td>
                <td><a href="admin_delete_content.php?id=<?php echo $content['story_id'];?>">Delete</a></td>
            </tr>
        <?php endwhile;?>
        </tbody>
    </table>
        <?php endif;?>
</body>
</html>
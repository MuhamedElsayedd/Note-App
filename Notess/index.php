<?php
  $connection =  require_once './connection.php';
  $notes = $connection -> getNotes();
  $currentNote =[
    'title'=>'',
    'description'=>''

  ];
  if (isset($_GET['id'])){
    $currentNote = $connection->getNoteById($_GET['id']);
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
<div>
    <form class="new-note" action="create.php" method="post">
        <input type="text" name="title" placeholder="Note title" autocomplete="off" value="<?php $currentNote['title']?>">
        <textarea name="description" cols="30" rows="4"
                  placeholder="Note Description">
                <?php echo $currentNote['description']?>
                
                </textarea>
        <button>
            <?php if (isset($currentNote['id'])):?>
                Update Note 
                <?php else : ?>
                New Note
                <?php endif; ?> 
        </button>
    </form>
    <div class="notes">
        <?php foreach ($notes as $note): ?>
        <div class="note">
            <div class="title">
                <a href="?id = <?php echo $note['id']?> "><?php echo $note['title']?></a>
            </div>
            <div class="description">
               <?php echo $note['description']?>
            </div>
            <small><?php echo $note['create_time'] ?> </small>
            <button class="close">X</button>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>

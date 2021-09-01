<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="../wp-content/plugins/79EscapeGame/assets/css/editUsers.css">
</head>
<body>
<div class="pen-title">
<h1>Delete user</h1>
</div>
<div class="container">
<div class="card" style="display: none;"></div>
<div class="card">
  <h1 class="title">Utilisateur : {{ email }}</h1>
  <h3 class="title" style="font-size:18px">Etes vous sure de vouloir supprimer cette utilisateur ?</h3>
  <div class="button-container">
        <a href="./admin.php?page=deleteUser&id={{ id }}&action=delet"><span>Oui</span></a>
        <a href="./admin.php?page=Users"><span>Non</span></a>
    </div>
</div>
</div>
</body>
</html>

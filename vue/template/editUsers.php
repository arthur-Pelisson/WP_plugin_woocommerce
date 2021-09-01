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
<h1>Edit user</h1>
</div>
<div class="container">
<div class="card" style="display: none;"></div>
<div class="card">
  <h1 class="title">Utilisateur : {{ email }}</h1>
  <form action="./admin.php?page=editingUser" method="POST" name="editUser" >
    <div class="input-container">
    <input name="id" type="hidden" value="{{ id }}">
    <div class="classLabel">
      <label for="email">Email</label>
      <input  type="text" id="email" value="{{ email }}"  disabled />
      <input name="email" type="hidden" id="email" value="{{ email }}" readonly />
    </div>
    <div class="classLabel">
      <label for="password">Password</label>
      <input  type="text" id="password" value="{{ password }}"  disabled />
      <input name="password" type="hidden" id="password" value="{{ password }}" readonly/>
    </div>
    </div>
    <div class="input-container">
    <div class="classLabel">
      <label for="nbrGame">Nombre de game restant</label>
      <input name="nbrGame" type="text" id="nbrGame" value="{{ nbr_game }}" required="required"/>
    </div>
    <div class="classLabel">
      <label for="EscapeGame">Escape game</label>
        <select></select>
    </div>
    </div>
    <div class="button-container">
      <button><span>Edit</span></button>
    </div>
    <div class="button-container">
      <a href="./admin.php?page=sendEmailPassword&action=sendEmailPassword&id={{ id }}"><span>Send password</span></a>
    </div>
  </form>
</div>
</div>
</body>
</html>

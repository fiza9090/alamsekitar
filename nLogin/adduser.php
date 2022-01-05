<?php

/*** begin our session ***/
session_start();

/*** set a form token ***/
$form_token = md5( uniqid('auth', true) );

/*** set the session form token ***/
$_SESSION['form_token'] = $form_token;
?>

<html>
<head>
<title>PHPRO Login</title>
</head>

<body>

<p>Pendaftaran ID Pengguna </p>
<h2>Pendaftaran ID Pengguna </h2>


<form action="nLogin/adduser_submit.php" method="post">
<fieldset>
<p>
<label for="phpro_username">Username</label>
<input type="text" id="phpro_username" name="phpro_username" value="" maxlength="20" />
</p>
<p>
<label for="phpro_password">Password</label>
<input type="text" id="phpro_password" name="phpro_password" value="" maxlength="20" />
</p>

<!-- add 10062020-->
<p>
<label for="name">Nama</label>
<input type="text" id="name" name="name" value="" maxlength="20" required />
</p>

<p>
<label for="name">Kod Jawatan</label>
<input type="text" id="jawatan" name="jawatan" value="" maxlength="20" />
</p>

<p>
<label for="name">Bahagian</label>
<input type="text" id="bahagian" name="bahagian" value="" maxlength="20" />
</p>

<p>
<label for="name">Emel</label>
<input type="text" id="email" name="email" value="" maxlength="50" />
</p>

<p>
<label for="name">Level : 0-Responden, 1-Negeri, 2-HQ, 3-Admin</label>
<input type="text" id="level" name="level" value="" maxlength="20" required />
</p>

<p>
<label for="name">Kod Negeri (jika HQ, kosongkan)</label>
<input type="text" id="kod_negeri" name="kod_negeri" value="" maxlength="20" />
</p>

<!--<p>
<label for="name">Kod Survey: 01-RE, 03-RC, 04-RP (jika semua, kosongkan)</label>
<input type="text" id="kod_survey" name="kod_survey" value="" maxlength="20" />
</p>

<p>
<label for="name">Kod PO (jika tiada kaitan, kosongkan)</label>
<input type="text" id="kod_po" name="kod_po" value="" maxlength="20" />
</p>-->


<!-- end add-->




<p>
<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
<input type="submit" value="&rarr; Add User" />
</p>
</fieldset>
</form>
</body>
</html>
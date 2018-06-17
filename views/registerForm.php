
<form action="index.php" method="POST">
    <label for="name" id="name" name="name">
    Name
    </label>
    <input type="text" id="nom" name="name">
    <br>
    <label for="password" id="password">
    Password
    </label>
    <input type="password" id="password" name="password">
    <label for="passconfirmation">Confirmation password</label>
    <input type="password" id="passconfirmation" name="passconfirmation">
    <label for="email" id="email">
    Mail
    </label>
    <input type="text" id="email" name="email">
    <input type="hidden" name="a" value="store">
    <input type="hidden" name="r" value="auth">
    <input type="submit" value="Se connecter">
</form>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema de Login PHP - Didático</title>
          <link href="css/estilo.css" type="text/css" rel="stylesheet" />   
    </head>
    <body>
        <h1>Sistema de Login PHP - Didático</h1>
        <form method="post" action="autentica.php">
            <br/>
            <input type="text" name="login" placeholder="Login" required />

            <br/>
            <input type="password" name="senha" placeholder="Senha" required />

            <br />
            <label>
                <input type="checkbox" name="conectado" <?php echo isset($_COOKIE['login']) ? "checked" : ""; ?>/>
                Mantenha-me conectado
            </label>

            <br/>
            <input type="submit" name="btn" value="Entrar" />

        </form>
        <br /><br />
        <form action="cadastra.php" method="post">
            <fieldset>
                <legend>Cadastrar Novo Usuário</legend>
                <br /><input type="text" name="nome" required placeholder="Nome"/>
                <br /><input type="text" name="login" required placeholder="Login"/>
                <br /><input type="email" name="email" required placeholder="E-mail"/>
                <br /><input type="password" name="senha" required placeholder="Senha" pattern=".{6,12}" title="A senha deve conter de 6 a 12 caracteres"/>
                <br /><input type="submit" name="btnCadastro" value="Cadastrar"/>
            </fieldset>
        </form>
        <h1>Só para Debugar</h1>
        <h2>COOKIE</h2>
        <?php
        print_r($_COOKIE);
        ?>
    </body>
</html>

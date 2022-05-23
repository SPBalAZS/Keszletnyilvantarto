<?php include("backend.php") ?>
<html>
    <head>
        <title>Új eszköz</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css?v=1">
    </head>
    <body>
        <a href="index.html">Főoldal</a>
        <div class="insert">
            <h2>Új eszköz</h2>
            <form method="POST">
                <input class="field" type="text" name="name" placeholder="Megnevezés *" required>
                <select class="field" name="id_worker" required>
                    <?php
						$data = $server->getData("SELECT DISTINCT id,name FROM workers");
						foreach ($data as $value) {
					?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
					<?php } ?>
                </select>
                <select class="field" name="condition" required>
                    <option value="Új" selected>Új</option>
                    <option value="Használt">Használt</option>
                </select>
                <input class="field" type="date" name="date" placeholder="Beszerézs dátuma *" required>
                <input type="submit" name="submit_insert" value="Beszúrás" class="button">
            </form>
        </div>
    </body>
</html>


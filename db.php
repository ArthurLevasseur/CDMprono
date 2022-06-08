        <?php
            $dsn = 'mysql:dbname=bdd;host=localhost;charset=utf8';
            $username = 'root';
            $password = '';
			$options = array();
			
            try {
				$database = new PDO($dsn, $username, $password, $options);
				$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			} catch (PDOException $ex) {
				printf("%s - %s</p>\n", $e->getCode(), $e->getMessage());
			}
        ?>
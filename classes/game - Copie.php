<?php 


	class Game {
		
		private $database;
		
		public $id;
		public $competition;
		public $round;
		public $complete;
		public $player1;
		public $player2;
		public $player3;
		public $player4;
		public $is_match1;
		public $is_match2;
		public $is_match3;
		public $is_match4;
		
		private $id_user;
		
		
		public function __construct() {
			$dsn = 'mysql:dbname=planete-toad;host=localhost;charset=utf8';
            $username = 'planete-toad';
            $password = 'YIS4letsgo!';
			$options = array();
			
            try {
				$this->database = new PDO($dsn, $username, $password, $options);
				$this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			} catch (PDOException $ex) {
				printf("%s - %s</p>\n", $e->getCode(), $e->getMessage());
			}
			
			$requete = 'select id, rank from users where name = "'.$_SESSION['name'].'" and password = "'.$_SESSION['password'].'"';
			
			$idBF = $this->database->query($requete);
			$rqFetched = $idBF->fetchAll();
			$this->id_user = $rqFetched[0][0];
			
		}
		
		public function generate($id) {
			$requete = "SELECT * FROM matches WHERE id = ".$id;
			$res = $this->database->query($requete);
			$fRes = $res->fetch();
			
			
			$this->id = $fRes['id'];
			$this->competition = $fRes['competition'];
			$this->round = $fRes['round'];
			$this->complete = $fRes['complete'];
			$this->player1 = $fRes['player1'];
			$this->player2 = $fRes['player2'];
			$this->player3 = $fRes['player3'];
			$this->player4 = $fRes['player4'];
			$this->is_match1 = $fRes['is_match1'];
			$this->is_match2 = $fRes['is_match2'];
			$this->is_match3 = $fRes['is_match3'];
			$this->is_match4 = $fRes['is_match4'];
			
		}
		
		public function getPlayer($id_match, $id_joueur) {
			
			$requete = "SELECT * FROM matches where id = ".$id_match;
			$resMatch = $this->database->query($requete);
			$fResMatch = $resMatch->fetch();
			
			if ($id_joueur == 1) {
				
				if ($fResMatch['is_match1'] == 0) {
					return $fResMatch['player1'];
				}
				
				else if ($fResMatch['is_match1'] == 1) {
					
					$requete = "SELECT * FROM pronos where game = ".$fResMatch['player1']." and user = ".$this->id_user;
					$resProno = $this->database->query($requete);
					$fResProno = $resProno->fetch();
					
					if (empty($fResProno)) {
						echo '<p>Pas de joueur choisi au précédent match.</p>';
						return -1;
					}
					else {
						return $this->getPlayer($fResMatch['player1'], $fResProno['winner']);
					}
				}
				
			}
			
			else if ($id_joueur == 2) {
				
				if ($fResMatch['is_match2'] == 0) {
					return $fResMatch['player2'];
				}
				
				else if ($fResMatch['is_match2'] == 1) {
					
					$requete = "SELECT * FROM pronos where game = ".$fResMatch['player2']." and user = ".$this->id_user;
					$resProno = $this->database->query($requete);
					$fResProno = $resProno->fetch();
					
					if (empty($fResProno)) {
						echo '<p>Pas de joueur choisi au précédent match.</p>';
						return -1;
					}
					else {
						return $this->getPlayer($fResMatch['player2'], $fResProno['winner']);
					}
					
					
				}
				
			}
			
			else if ($id_joueur == 3) {
				
				if ($fResMatch['is_match3'] == 0) {
					return $fResMatch['player3'];
				}
				
				else if ($fResMatch['is_match3'] == 1) {
					$requete = "SELECT * FROM pronos where game = ".$fResMatch['player3']." and user = ".$this->id_user;
					$resProno = $this->database->query($requete);
					$fResProno = $resProno->fetch();
					
					if (empty($fResProno)) {
						echo '<p>Pas de joueur choisi au précédent match.</p>';
						return -1;
					}
					else {
						return $this->getPlayer($fResMatch['player3'], $fResProno['winner']);
					}
				}
				
			}
			
			else if ($id_joueur == 4) {
				
				if ($fResMatch['is_match4'] == 0) {
					return $fResMatch['player4'];
				}
				
				else if ($fResMatch['is_match4'] == 1) {
					$requete = "SELECT * FROM pronos where game = ".$fResMatch['player4']." and user = ".$this->id_user;
					$resProno = $this->database->query($requete);
					$fResProno = $resProno->fetch();
					
					print_r($fResProno);
					
					if (empty($fResProno)) {
						echo '<p>Pas de joueur choisi au précédent match.</p>';
						return -1;
					}
					else {
						return $this->getPlayer($fResMatch['player4'], $fResProno['winner']);
					}
				}
				
			}
			
		}
		
		public function display() {
			
			$requete = "SELECT name FROM matches JOIN competition ON matches.competition = competition.id WHERE matches.id = ".$this->id;
			$res = $this->database->query($requete);
			
			$requete = "SELECT name FROM matches JOIN round ON matches.round = round.id WHERE matches.id = ".$this->id;
			$res2 = $this->database->query($requete);
			
			echo '<h1>'.$res2->fetch()['name'].' du '.$res->fetch()['name'].'</h1>';
			echo '<form action="pronostiquer.php" method="post">';
			
			$id_joueur = $this->getPlayer($this->id, 1);
			
			if (!empty($this->player1) && $id_joueur != -1) {
				
				$requete = "SELECT name, flag FROM matches JOIN players ON player1 = players.id WHERE players.id = ".$id_joueur." AND matches.id = ".$this->id;
				$res = $this->database->query($requete);
				$fRes = $res->fetch();
				
				echo '<input type="radio" id="player1-match'.$this->id.'" name="match'.$this->id.'" value="'.$id_joueur.'">';
				echo '<label class="player_selection" for="player1-match'.$this->id.'"><img width=50 height=25 src="'.$fRes['flag'].'" />'.$fRes['name'].'</label>';
			}
			
			$id_joueur = $this->getPlayer($this->id, 2);
			
			if (!empty($this->player2) && $id_joueur != -1) {
				
				$requete = "SELECT name, flag FROM matches JOIN players ON player2 = players.id WHERE players.id = ".$id_joueur." AND matches.id = ".$this->id;
				$res = $this->database->query($requete);
				$fRes = $res->fetch();
				
				echo '<input type="radio" id="player2-match'.$this->id.'" name="match'.$this->id.'" value="'.$id_joueur.'">';
				echo '<label class="player_selection" for="player2-match'.$this->id.'"><img width=50 height=25 src="'.$fRes['flag'].'" />'.$fRes['name'].'</label>';
			}
			
			$id_joueur = $this->getPlayer($this->id, 3);
			
			if (!empty($this->player3) && $id_joueur != -1) {
				
				$requete = "SELECT name, flag FROM matches JOIN players ON player3 = players.id WHERE players.id = ".$id_joueur." AND matches.id = ".$this->id;
				$res = $this->database->query($requete);
				$fRes = $res->fetch();
				
				echo '<input type="radio" id="player3-match'.$this->id.'" name="match'.$this->id.'" value="'.$id_joueur.'">';
				echo '<label class="player_selection" for="player3-match'.$this->id.'"><img width=50 height=25 src="'.$fRes['flag'].'" />'.$fRes['name'].'</label>';
			}

			
			$id_joueur = $this->getPlayer($this->id, 4);
			
			if (!empty($this->player4) && $id_joueur != -1) {
				
				$requete = "SELECT name, flag FROM matches JOIN players ON player4 = players.id WHERE players.id = ".$id_joueur." AND matches.id = ".$this->id;
				$res = $this->database->query($requete);
				$fRes = $res->fetch();
				
				echo '<input type="radio" id="player4-match'.$this->id.'" name="match'.$this->id.'" value="'.$id_joueur.'">';
				echo '<label class="player_selection" for="player4-match'.$this->id.'"><img width=50 height=25 src="'.$fRes['flag'].'" />'.$fRes['name'].'</label>';
			}
			
			else {
				
			}
			
			echo '<input type="submit" Value="Valider">';
			echo '</form>';
			
			
			
		}
		
		
	}
	
?>
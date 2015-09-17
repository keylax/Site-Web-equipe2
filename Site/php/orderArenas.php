<?php
include('dbconnector.php');

if(isset($_POST['sortOption']))
{
	$connection = connexionBD();
			
	$sql = "
		SELECT
				ARENA.NAME,
				ARENA.DESCRIPTION,
				COUNTED_GAMES.GAMES_PLAYED,
				AVG(USER_RATING.RATING) AS RATING
			FROM
				ARENA
				LEFT OUTER JOIN USER_RATING
						ON  USER_RATING.ID_ARENA = ARENA.ID_ARENA
				LEFT OUTER JOIN (SELECT 
								GAME.ID_ARENA AS ID,
								COUNT(GAME.ID_GAME) AS GAMES_PLAYED
							FROM
								ARENA
							LEFT OUTER JOIN GAME ON
								GAME.ID_ARENA = ARENA.ID_ARENA
							GROUP BY GAME.ID_ARENA) COUNTED_GAMES ON
													COUNTED_GAMES.ID = ARENA.ID_ARENA
			GROUP BY
				ARENA.NAME, ARENA.DESCRIPTION
			ORDER BY
				".$_POST['sortOption'];
				
		if ($_POST['sortOption'] == "NAME")
		{
			$sql.=" ASC";
		}
		else
		{
			$sql.=" DESC";
		}
		
		$queryListAll = $connection->prepare($sql);
		
		$queryListAll->execute();
		
		$tableOutput= "";
		
		while($lines = $queryListAll->fetch(PDO::FETCH_OBJ))
			{
				$tableOutput.='<div class="col-sm-4">
				<h3>'.$lines->NAME.'</h3>
				</br>'.$lines->DESCRIPTION.'
				</br>Parties jouées: '.$lines->GAMES_PLAYED.'
				</br>Cote moyenne: '.$lines->RATING.'
				</div>';
			}
			
		$queryListAll->closeCursor();

		echo $tableOutput;
}
?>
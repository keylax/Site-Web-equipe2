<?php
include('dbconnector.php');

if(isset($_POST['sortOption']))
{
	$connection = connexionBD();
			
	$sql = "
		SELECT
			USER.NAME AS NAME,
			USER.ID_USER AS ID,
			SUM(STATS.KILLS) AS KILLS,
			SUM(STATS.GOALS) AS GOALS,
			SUM(STATS.DEATHS) AS DEATHS,
			SUM(STATS.SHOTS_TO_GOALS) AS SHOTS_TO_GOALS,
			SUM(STATS.MISSILES_SHOTS) AS MISSILES_SHOTS,
			SUM(STATS.SUCCESSFUL_MISSILE_SHOTS) AS SUCCESSFUL_MISSILE_SHOTS,
			SUM(STATS.FUMBLES_DROPS) AS FUMBLES_DROPS,
			SUM(STATS.PROVOKED_DROPS) AS PROVOKED_DROPS,
			SUM(STATS.INTERCEPTIONS) AS INTERCEPTIONS,
			SUM(STATS.POSSESSTION_TIME) AS POSSESSTION_TIME
		FROM
			GAME_STATISTICS STATS
			RIGHT OUTER JOIN USER ON
				STATS.ID_USER = USER.ID_USER
		GROUP BY
			USER.NAME, STATS.ID_USER
		ORDER BY ".$_POST['sortOption']." DESC";
		
		$queryListAll = $connection->prepare($sql);
		
		$queryListAll->execute();
		
		//Dans l'espoir d'un jour trouver pourquoi l'utiliation d,une requête paramètrée ici ne fonctionne pas
		//$queryListAll->execute(array('order' => $_POST['sortOption']));
		
		$tableOutput= "";
		
		while($lines = $queryListAll->fetch(PDO::FETCH_OBJ))
		{
			if (isset($_SESSION["userid"]) && $_SESSION["userid"] == $lines->ID)
			{
				$tableOutput.="
				<tr>
					<td><b>".$lines->NAME."</b></td>";
			}
			else
			{
				$tableOutput.="
				<tr>
					<td>".$lines->NAME."</td>";
			}
			$tableOutput.="
				<td>".$lines->KILLS."</td>
				<td>".$lines->GOALS."</td>
				<td>".$lines->DEATHS."</td>
				<td>".$lines->SHOTS_TO_GOALS."</td>
				<td>".$lines->MISSILES_SHOTS."</td>
				<td>".$lines->SUCCESSFUL_MISSILE_SHOTS."</td>
				<td>".$lines->FUMBLES_DROPS."</td>
				<td>".$lines->PROVOKED_DROPS."</td>
				<td>".$lines->INTERCEPTIONS."</td>
				<td>".$lines->POSSESSTION_TIME."</td>
			</tr>";
		}
			
		$queryListAll->closeCursor();

		echo $tableOutput;
}
?>
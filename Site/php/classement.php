<?php
include "header.php";
?>

	<div class="page-header">
		<h1>Classement des joueurs</h1>
  
		<table id="playerStats"class="table">
		<thead>
			<tr>
				<td>Nom</td>
				<td>KO</td>
				<td>Buts</td>
				<td>Morts</td>
				<td>Tirs au but</td>
				<td>Tir de missiles</td>
				<td>Tirs de missiles réussis</td>
				<td>Pertes de balle</td>
				<td>Pertes de balles forcée</td>
				<td>Interceptions</td>
				<td>Temps de possession de balle</td>
			</tr>
		</thead>
		<tbody>
		    
		<?php
			include "dbconnector.php";
			
			$connection = connexionBD();
			
			$queryListAll = $connection->prepare("
		SELECT
			USER.NAME AS NAME,
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
		ORDER BY KILLS DESC;
		");
			
			$queryListAll->execute();
			
			while($lines = $queryListAll->fetch(PDO::FETCH_OBJ))
			{
				echo "
				<tr>
					<td>".$lines->NAME."</td>
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
		?>
	
		</tbody>
	</table>

<?php
include "footer.php";
?>
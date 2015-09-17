<?php
include "header.php";
?>

<script type="text/javascript">
    $(document).ready(function(){
        $(".sortOption").click(function(event){
			
            event.preventDefault(); 
            
            var self = $(this);
			
            var sortOption = self.attr('sortOption');
			
            load_classement_ajax(sortOption);
        });
        
      
        function load_classement_ajax(sortOption){
			
            $.ajax({
				
				//on prepare la requete
                'url' : 'orderPlayers.php', 
                'type' : 'POST',
                'data' : {'sortOption' : sortOption},
                
                'success' : function(data){ 
                    var container = $('#playerStatsBody');
                    if(data)
					{
						container.html(data);
                    }
                }
            });
           
        }
     });
</script>

	<div class="page-header">
		<h1>Classement des joueurs</h1>
  
		<table id="playerStatsTable"class="table">
		<thead>
			<tr>
				<td>Nom</td>
				<td><a href = "#" class="sortOption" sortOption="KILLS">KO</a></td>
				<td><a href = "#" class="sortOption" sortOption="GOALS">Buts</a></td>
				<td><a href = "#" class="sortOption" sortOption="DEATHS">Morts</a></td>
				<td><a href = "#" class="sortOption" sortOption="SHOTS_TO_GOALS">Tirs au but</a></td>
				<td><a href = "#" class="sortOption" sortOption="MISSILES_SHOTS">Tirs de missiles</a></td>
				<td><a href = "#" class="sortOption" sortOption="SUCCESSFUL_MISSILE_SHOTS">Tirs de missiles réussis</a></td>
				<td><a href = "#" class="sortOption" sortOption="FUMBLES_DROPS">Pertes de balle</a></td>
				<td><a href = "#" class="sortOption" sortOption="PROVOKED_DROPS">Pertes de balles forcée</a></td>
				<td><a href = "#" class="sortOption" sortOption="INTERCEPTIONS">Interceptions</a></td>
				<td><a href = "#" class="sortOption" sortOption="POSSESSTION_TIME">Temps de possession de balle</a></td>
			</tr>
		</thead>
		<tbody id="playerStatsBody">
		    
		<?php
			$connection = connexionBD();
			
			$queryListAll = $connection->prepare("
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
		ORDER BY KILLS DESC
		");
			
			$queryListAll->execute();
			
			while($lines = $queryListAll->fetch(PDO::FETCH_OBJ))
			{
			if (isset($_SESSION["userid"]) && $_SESSION["userid"] == $lines->ID)
			{
				echo "
				<tr>
					<td><b>".$lines->NAME."</b></td>";
			}
			else
			{
				echo "
				<tr>
					<td>".$lines->NAME."</td>";
			}
				echo "
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
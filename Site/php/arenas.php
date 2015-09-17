<?php
include "header.php";
?>

<script type="text/javascript">
    $(document).ready(function(){
        $(".sortOption").click(function(event){
			
            event.preventDefault(); 
            
            var self = $(this);
			
            var sortOption = self.attr('sortOption');
			
            load_arena_ajax(sortOption);
        });
        
      
        function load_arena_ajax(sortOption){
			
            $.ajax({
				
				//on prepare la requete
                'url' : 'orderArenas.php', 
                'type' : 'POST',
                'data' : {'sortOption' : sortOption},
                
                'success' : function(data){ 
                    var container = $('#arenas');
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
		<h1>Arènes</h1>
			
	<div class="dropdown">
		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
			Critère de tri
			<span class="caret"></span>
		</button>
		
		<ul class="dropdown-menu">
			<li><a href="#" class="sortOption" sortOption="RATING">Trier selon cote</a></li>
			<li><a href="#" class="sortOption" sortOption="NAME">Trier en ordre alphabétique</a></li>
			<li><a href="#" class="sortOption" sortOption="GAMES_PLAYED">Trier par nombre de parties jouées</a></li>
		</ul>
	</div>
	
	<div class="row" id="arenas">
			<?php
			$connection = connexionBD();
			
			$queryListAll = $connection->prepare("
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
				RATING DESC
			");
			
			$queryListAll->execute();
			
			while($lines = $queryListAll->fetch(PDO::FETCH_OBJ))
			{
				echo '<div class="col-sm-4">
				<h3>'.$lines->NAME.'</h3>
				</br>'.$lines->DESCRIPTION.'
				</br>Parties jouées: '.$lines->GAMES_PLAYED.'
				</br>Cote moyenne: '.$lines->RATING.'
				</div>';
			}
			
			$queryListAll->closeCursor();
		?>
		
	</div>

<?php
include "footer.php";
?>
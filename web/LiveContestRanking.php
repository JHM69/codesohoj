<?php
require_once "config.php";
include_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">


<body class="bg-gray-100 text-gray-900 antialiased">

	<main>
		<section class="relative min-h-screen">
			<div class="absolute top-0 w-full h-full bg-gray-100"></div>
			<div class="container mx-auto py-20">
				<div class="bg-white shadow-lg rounded-lg overflow-hidden">
					<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
						<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
							<tr>
								<th scope="col" class="px-6 py-3">
									Rank
								</th>
								<th scope="col" class="px-6 py-3">
									Username
								</th>
								<th scope="col" class="px-6 py-3">
									Name
								</th>
								<th scope="col" class="px-6 py-3">
									Score
								</th>
								<th scope="col" class="px-6 py-3">
									Solved
								</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$sql = "SELECT * FROM Users ORDER BY score DESC";
							$result = DB::findAllFromQuery($sql);
							$rank = 1;

							foreach ($result as $row) {
								echo "<tr>";
								echo "<td class='px-6 py-4'>" .
									$rank .
									"</td>";
								echo "<td class='px-6 py-4'>" .
									$row["username"] .
									"</td>";
								echo "<td class='px-6 py-4'>" .
									$row["name"] .
									"</td>";
								echo "<td class='px-6 py-4'>" .
									$row["score"] .
									"</td>";
								echo "<td class='px-6 py-4'>" .
									$row["solved"] .
									"</td>";
								echo "</tr>";
								$rank++;
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</main>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>
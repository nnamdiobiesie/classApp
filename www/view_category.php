<?php

			session_start();
				
			$page_title = "Admin Dashboard";

			include ('includes/dashboard_header.php');

			 include ('includes/db.php');

             include ('includes/files.php');


?>




<div class="wrapper">
		<div id="stream">
			<table id="tab">
				<thead>
					<tr>
						<th>Catgeory Id</th>
						<th>Category Name</th>
						<th>edit</th>
						<th>delete</th>
					</tr>
				</thead>
				<tbody>
					<?php

						$data = viewCategory($conn);


						echo $data;


					?>
					<!--<tr>
						<td>the knowledge gap</td>
						<td>maja</td>
						<td>January, 10</td>
						<td><a href="#">edit</a></td>
						<td><a href="#">delete</a></td>
					</tr> -->
          		</tbody>
			</table>
		</div>

		<div class="paginated">
			<a href="#">1</a>
			<a href="#">2</a>
			<span>3</span>
			<a href="#">2</a>
		</div>
	</div>
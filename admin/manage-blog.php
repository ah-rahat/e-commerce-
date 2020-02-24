<?php require_once 'header.php' ?>
<?php 
require_once '../vendor/autoload.php';
$obj=new App\classes\Blog();
$allpost=$obj->allBlog();




 ?>
<div class="row">
	<div class="col-sm-12">
		<section class="card">
			<header class="card-header">
				Dynamic Table
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="card-body">
				<div class="adv-table">
					<table  class="display table table-bordered table-striped" id="dynamic-table">
						<thead>
							<tr>
								<th>Sl:NO</th>
								<th>Category name</th>
								<th>title</th>
								<th>content</th>
								<th>photo</th>

								<th>status</th>
								<th>action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($allpost as $data) {?>
							
									<tr>
										<td><?=$data['id']?></td>
										<td><?=$data['catagory_name']?></td>
										<td><?=$data['title']?></td>
										<td><?=$data['content']?></td>
										<td><img style="width: 100px" src="../uploads/<?=$data['photo']?>" alt=""></td>
										<td>	<?php if ($data['status']==1) {?>
											<a href="status.php?id=<?=$data['id']?>&blog=catagory&inactive=inacitve" class="btn btn-info btn-sm btn-block"><i class="fa fa-arrow-up">active</i></a>
											<?php }else{ ?>
												<a href="status.php?id=<?=$data['id']?>&blog=catagory&active=active" class="btn btn-success btn-sm btn-block"><i class="fa fa-arrow-down">inactive</i></a>
									<?php } ?></td>
										<td>
									
											
										
											<a href="edit-blog.php?id=<?=$data['id']?>" class="btn btn-warning btn-sm btn-block"><i class="fa fa-pencil-square-o">edit</i></a>
											<a href="delete.php?id=<?=$data['id']?>&blog=blog&filename=<?=$data['photo']?>" class="btn btn-danger btn-sm btn-block"><i class="fa fa-trash-o">delete</i></a>
										</td>


									</tr>
								
							<?php } ?>
						</tbody>
						
					</table>
				</div>
			</div>
		</section>
	</div>
</div>
<?php require_once 'footer.php' ?>
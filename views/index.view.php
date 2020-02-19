<?php
$title = "Home page | Todolist";
$active_home = true;
require "views/layout/header.view.php";
?>
<div class="row">
	<div class="col-md-6 ml-auto mr-auto">
		<div class="card mt-5">
			<div class="card-header">
				Todo List
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<ul class="list-unstyled">
							<?php 
							if(count($tasks) > 0) :
								foreach ($tasks as $task) :
									if ($task->completed == 1) :
							?>
									<li><input type="checkbox" class="task-check mb-3" checked data-id="<?= $task->id ?>"> <strike><?= $task->description ?></strike> <i class="far fa-times-circle float-right text-danger remove" style="cursor: pointer;" data-id=<?= $task->id ?> ></i> </li>
								<?php else : ?>
									<li><input type="checkbox" class="task-check mb-3" data-id="<?= $task->id ?>"> <?= $task->description ?><i class="far fa-times-circle float-right text-danger remove" style="cursor: pointer;" data-id=<?= $task->id ?>></i></li>
							<?php
									endif;
								endforeach;
							else:
							?>
							<li>Haven't tasks!</li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="col-md-10">
						<input type="text" class="form-control" name="" id="desc" aria-describedby="helpId" placeholder="Type todo...">
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-primary" id="add">Add</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require "views/layout/footer.view.php"; ?>
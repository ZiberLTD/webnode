<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Tasks</h3>
		</div>
		<div class="col-md-12">
			<table class="table table-hover table-striped">
				<thead>
				<tr>
					<th>№</th>
					<th>ZBR adress</th>
					<th>Custom smart contract</th>
					<th>Status</th>
				</tr>
				</thead>
				<tbody>
				<?php if(count($data['tasks']) > 0): ?>
					<?php foreach($data['tasks'] as $task): ?>
					<tr>
						<td><?=$task['id']?></td>
						<td><?=$task['zbr_addr']?></td>
						<td>
							<i class="glyphicon glyphicon-file"></i>
							<a href="<?=get_url('exec').$task['command']?>"><?=$task['command']?></a>
						</td>
						<td>
							<?php if($task['status'] == 1): ?>
							<span class="label label-success">Updated</span>
							<?php else: ?>
							<span class="label label-warning">Expected</span>
							<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; ?>
				<?php else: ?>
				<tr><td colspan="4" class="text-center">You have not created any tasks yet.</td></tr>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
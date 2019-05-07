<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3>
				Category
				<a href="<?= base_url('category/create') ?>" class="btn btn-sm btn-primary">Create</a>
			</h3>
			<?php $this->load->view('layouts/_flash'); ?>
			<table class="table table-sm">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Title</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 0; foreach($content as $row): $no++; ?>
					<tr>
						<th scope="row"><?= $no ?></th>
						<td><?= $row->title ?></td>
						<td>
							<?= form_open("category/delete/{$row->id}", ['method' => 'POST']) ?>
								<?= form_hidden('id', $row->id) ?>
								<a href="<?= base_url("/category/edit/{$row->id}") ?>" class="btn btn-sm btn-secondary">Edit</a>
								<button type="submit" class="btn btn-sm btn-danger">Delete</button>
							<?= form_close() ?>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?= $pagination ?>
		</div>
	</div>
</div>

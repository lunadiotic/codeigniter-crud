<?php 
	$perPage = 2;
	$keywords = $this->session->userdata('keywords');

	if (isset($keywords) || $keywords == null) {
		$page = $this->uri->segment(3);
	} else {
		$page = $this->uri->segment(2);
	}

	// Order Number
	$i = isset($page) ? $page * $perPage - $perPage : 0;
?>

<div role="main" class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3>
				<?= $heading ?> 
				<a href="<?= base_url('/post/create') ?>" class="btn btn-sm btn-primary">Create</a>
				<div class="float-right">
					<?= form_open('post/search', ['method' => 'POST']) ?>
					<div class="input-group mb-3">
						<?= form_input('keywords', $this->session->userdata('keywords'), ['placeholder' => 'Search', 'class' => 'form-control']) ?>
						<div class="input-group-append">
							<?= form_button(['type' => 'submit', 'content' => 'Search', 'class' => 'btn btn-outline-secondary']) ?>
						</div>
					</div>
					<?= form_close() ?>
				</div>
			</h3>
			
			<hr>
			<?php foreach($content as $row) : ?>
			<div class="card" style="width: 40rem;">
				<div class="card-body">
					<h5 class="card-title"><?= $row->title ?></h5>
					<h6 class="card-subtitle mb-2 text-muted"><?= $row->date ?></h6>
					<p class="card-text"><?= $row->body ?></p>
					<a href="<?= base_url('/post/show/' . $row->id) ?>" class="card-link">Show</a>
					<a href="#" class="card-link text-danger">Delete</a>
					<a href="#"><?= ++$i ?></a>
				</div>
			</div>
			<?php endforeach ?>
			<p>Total: <?= $totalRows ?></p>

			<div id="pagination">
				<?= $pagination ?>
			</div>
		</div>
	</div>
</div><!-- /.container -->

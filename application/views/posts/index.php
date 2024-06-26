<h2><?= $title ?></h2>
<hr>

<?php foreach($posts as $post) : ?>
	<!-- <hr> -->
	<!-- Menampilkan judul post -->
	<h3><?php echo $post['title']; ?></h3>
	<div class="row">
		<div class="col-md-3">
			<!-- Menampilkan foto -->
			<img class="post-thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
		</div>

		<div class="col-md-9">
			<!-- Menampilkan dibuat kapan dan di kategori apa -->
			<small class="post-date">Posted on: <?php echo $post['created_at']; ?> in <strong><?php echo $post['name']; ?></strong></small><br>

		<!-- isi body dibatasi 60 kata -->
		<?php echo word_limiter($post['body'], 60); ?>
		<br><br>

		<!-- menuju post yang dimaksud -->
		<p><a class="btn btn-primary" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read More</a></p>
		</div>
	</div>

	<hr>
	
<?php endforeach; ?>


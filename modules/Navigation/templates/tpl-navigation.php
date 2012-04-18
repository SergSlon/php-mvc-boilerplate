<hr class="no-margin">
<nav>
	<ul>
		<?php foreach ($this->items as $item): ?>
		<li>
			<a href="?module=<?php echo $item['alias'] ?>" <?php if ($this->active_module == $item['alias']) echo 'class="active"'; ?>>
				<?php echo $item['title'] ?>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>
</nav>
<hr>
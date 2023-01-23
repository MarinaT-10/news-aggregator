<?php foreach ($categories as $c): ?>
    <a href="<?=route('categories.show', ['id'=>$c['id']])?>"><?=$c['name']?></a>
<?php endforeach; ?>

<?php

echo $this->extend("layout/template");
echo $this->section("content"); 
?>
<h1V>Všechny závody</h1>
<?php foreach ($raceInfo as $race) : ?>

<div class="container-fluid">
<div class="card">
  <div class="card-body">
  <h4 class="card-title"><?=anchor("RacedYears/".$race->id, $race->default_name) ?></h4>
  

  </div>
</div>
</div>
<?php endforeach ; ?>
<div style="width:300px; margin:auto"><?php echo $pager->links(); ?></div>

<?php $this->endSection(); ?>
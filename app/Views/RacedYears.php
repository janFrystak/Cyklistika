<?php

$this->extend("layout/template");
$this->section("content"); 
$table = new \CodeIgniter\View\Table();
$path = "assets/obrazky/logos/";
echo "<h1V>Všechny závody</h1>";
$lastStageId = 1;
$stageCount=0;



$table->setHeading(['Rocnik', 'Date', 'Logo', 'Kategorie', 'Pocet_etap']);
//var_dump($yearInfo);

foreach ($yearInfo as $year){
  $endDate = $year->end_date;
  $startDate = $year->start_date;
  
  if($endDate==$startDate){
    $date = $endDate;
  } else {
    $date = $endDate." - ".$startDate;
  }

  $stageId = $year->id_race_year;
  if($stageId != $lastStageId){
      $stageCount = 1;
  }
  else{
    $stageCount++;
  }

$kompImg = [
  "src" => $path.$year->logo,
  "class" => "img-responsive",
  //"alt" =>"pic",
  "width" => "50cm"

];

$table->addRow($year->real_name,$date, img($kompImg), $year->name, anchor("RaceStages/".$year->id, $stageCount));

}
$template = [
  'table_open' => '<table class="table table-striped">',

  'thead_open'  => '<thead>',
  'thead_close' => '</thead>',

  'heading_row_start'  => '<tr>',
  'heading_row_end'    => '</tr>',
  'heading_cell_start' => '<th>',
  'heading_cell_end'   => '</th>',

  'tfoot_open'  => '<tfoot>',
  'tfoot_close' => '</tfoot>',

  'footing_row_start'  => '<tr>',
  'footing_row_end'    => '</tr>',
  'footing_cell_start' => '<td>',
  'footing_cell_end'   => '</td>',

  'tbody_open'  => '<tbody>',
  'tbody_close' => '</tbody>',

  'row_start'  => '<tr>',
  'row_end'    => '</tr>',
  'cell_start' => '<td>',
  'cell_end'   => '</td>',

  'row_alt_start'  => '<tr>',
  'row_alt_end'    => '</tr>',
  'cell_alt_start' => '<td>',
  'cell_alt_end'   => '</td>',

  'table_close' => '</table>',
];
$table->setTemplate($template);

echo $table->generate();
  
 $this->endSection(); 
?>
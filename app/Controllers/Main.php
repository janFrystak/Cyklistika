<?php

namespace App\Controllers;
use App\Models\Race;
use App\Models\RaceYear;
use App\Models\UciTourType;
use App\Models\Stage;
use App\Models\ParcourType;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Main extends BaseController
{

    var $races_view;
    var $racedYear;
    var $tourType;
    var $stage;
    var $parkour;

    public function __construct()
    {
        $this->races_view = new Race();
        $this->racedYear = new RaceYear();
        $this->tourType = new UciTourType();
        $this->stage = new Stage();
        $this->parkour = new ParcourType();
       
       

    }

    public function index()
    {
        //
    }

    public function baseRaceInfo()
    {
        $data["raceInfo"] = $this->races_view->paginate(32);
        $data["pager"] = $this->races_view->pager;
        echo view("Races", $data);
    }
    public function getYearInfo($id)
    {
        $data["yearInfo"] = $this->racedYear
        ->select('real_name, year, start_date, end_date, logo, name, sum(distance) as distance, count(*) as count, id_race_year')
        ->join('uci_tour_type', 'uci_tour_type.id = race_year.uci_tour', 'inner')
        ->join('stage', 'stage.id_race_year = race_year.id', 'inner')
        ->where('id_race', $id)
        ->groupBy('id_race_year')
        ->find();

       /* ->select('real_name, year, start_date, end_date, logo, name, sum(distance) as distance, count(*) as count, id_race_year')
        ->join("uci_tour_type", "race_year.uci_tour = uci_tour_type.id", "inner")
        ->join("stage", "race_year.id_race = stage.id_race_year", "inner")->findAll();
       // $data["stageInfo"] = $this->stage->where("")*/
        
        echo view("RacedYears", $data);
    }
    public function getRacedStages($id)
    {
        $data["stageInfo"] = $this->stage->where("id_race_year", $id)
        ->join("parcour_type", "stage.parcour_type = parcour_type.id", "innder")->findAll();
        
    }
}

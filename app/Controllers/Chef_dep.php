<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\ChefDepartement;
use App\Models\Dep;


class Chef_dep
{
  use Controller;

  public function index()
  {
    $departements = $this->getDepartments();
    $data['departements'] = $departements;

    $chefs = $this->getAllChefs();
    $data['chefs'] = $chefs;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $dep = new Dep();

      $inputs['id_chef'] = $_POST['id_chef'];
      $inputs['id_dep'] = $_POST['departement'];
      $dep_row = $dep->update($_POST['departement'], "id_dep", $inputs);

      if (!$dep_row) {
        $data['success'] = ['Chef affécté avec success.'];
      } else {
        $dep->errors = ['erreur dans l\'affectation du chef'];
        $data['errors'] = $dep->errors;
      }
    }


    $this->view('designerChef', $data);
  }

  private function getDepartments()
  {
    $dep = new Dep();
    return $dep->findAll();
  }

  private function getAllChefs()
  {
    $chef = new ChefDepartement();
    return $chef->findAll();
  }
}
<?php
namespace App\Services;

use PDF;
use Carbon\Carbon;

class PdfMakerService extends PDF
{
  protected $headerTitle = ''; // Pour pouvoir générer un header dynamiquement, à n'importe quel moment on spécifie le texte du header
  protected $footerTitle = '';

  public function Header(){
    $this->write(5, 'testtttt');
  }
  public function Footer(){
    $this->write(5, 'bbbbb');
  }

}

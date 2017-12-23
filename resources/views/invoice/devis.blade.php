<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>HS Print Devis N°: {{ $devi->id }} </title>
    <style>
    /* DivTable.com */
.divTable{
	display: table;
	width: 100%;
}
.divTableRow {
	display: table-row;
}
.divTableHeading {
	background-color: #EEE;
	display: table-header-group;
}
.divTableCell, .divTableHead {
	border: 1px solid #999999;
	display: table-cell;
	padding: 3px 10px;
}
.noborder{
	border: 0;
	display: table-cell;
	padding: 3px 10px;
}
.center{
  text-align: center;
}
.divTableHeading {
	background-color: #EEE;
	display: table-header-group;
	font-weight: bold;
}
.divTableFoot {
	background-color: #EEE;
	display: table-footer-group;
	font-weight: bold;
}
.divTableBody {
	display: table-row-group;
}
    </style>
  </head>
  <body>
    <div class="divTable">
	<div class="divTableBody">
		<div class="divTableRow">
			<div class="divTableCell noborder"><img src="{{ asset('images/logoSociete.png') }}" alt=""></div>
			<div class="divTableCell noborder">&nbsp;</div>
			<div class="divTableCell noborder">&nbsp;</div>
			<div class="divTableCell noborder center">
        <h2>Devis N°: {{ $devi->id }}</h2>
      </div>
		</div>
		<div class="divTableRow">
			<div class="divTableCell">
        <strong>Entreprise: <br></strong>
        <div class="well">
          HS Print Service
        </div>
      </div>
			<div class="divTableCell">
        <strong>Date de génération: <br></strong>
          {{ $devi->updated_at }}
      </div>
			<div class="divTableCell">
        <strong>Responsable: <br></strong>
        {{ $devi->updated_at }}
      </div>
			<div class="divTableCell">
        <strong>Généré pour: <br></strong>
          {{ $devi->prospect->name }}
      </div>
		</div>
    <br><br><br>
		<div class="divTableRow">
			<div class="divTableCell center"><strong>Produit</strong></div>
			<div class="divTableCell center"><strong>Quantité</strong></div>
			<div class="divTableCell center"><strong>Prix Unité</strong></div>
			<div class="divTableCell center"><strong>Prix HT</strong></div>
		</div>
		<div class="divTableRow">
			<div class="divTableCell">Oylo</div>
			<div class="divTableCell center">10</div>
			<div class="divTableCell center">100</div>
			<div class="divTableCell center">1000</div>
		</div>
		<div class="divTableRow">
			<div class="divTableCell noborder">&nbsp;</div>
			<div class="divTableCell noborder">&nbsp;</div>
			<div class="divTableCell center"><strong>Totale HT</strong></div>
			<div class="divTableCell center"><strong>15000</strong></div>
		</div>
		<div class="divTableRow">
			<div class="divTableCell noborder">&nbsp;</div>
			<div class="divTableCell noborder">&nbsp;</div>
			<div class="divTableCell center"><strong>TVA</strong></div>
			<div class="divTableCell center"><strong>20%</strong></div>
		</div>
		<div class="divTableRow">
			<div class="divTableCell noborder">&nbsp;</div>
			<div class="divTableCell noborder">&nbsp;</div>
			<div class="divTableCell center"><strong>Totale TTC</strong></div>
			<div class="divTableCell center"><strong>16000</strong></div>
		</div>
    <br><br><br>
		<div class="divTableRow">
			<div class="divTableCell  noborder">&nbsp;</div>
			<div class="divTableCell noborder">&nbsp;</div>
			<div class="divTableCell noborder">Cachet:</div>
			<div class="divTableCell noborder">&nbsp;</div>
		</div>
		<div class="divTableRow">
			<div class="divTableCell noborder">&nbsp;</div>
			<div class="divTableCell noborder">&nbsp;</div>
			<div class="divTableCell"><br><br><br><br><br><br></div>
			<div class="divTableCell noborder">&nbsp;</div>
		</div>
	</div>
</div>
<!-- DivTable.com -->
  </body>
</html>

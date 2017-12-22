<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    .invoice-title h2, .invoice-title h3 {
  display: inline-block;
}

.table > tbody > tr > .no-line {
  border-top: none;
}

.table > thead > tr > .no-line {
  border-bottom: none;
}

.table > tbody > tr > .thick-line {
  border-top: 2px solid;
}
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">">
    <style media="screen">

    </style>
  </head>
  <body>
    <div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
          <div class="row">
            <div class="col-md-3">
              <img src="{{ asset('images/logoSociete.png') }}" alt="">
            </div>
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-12">
                  <strong><br>Devis N°: <br></strong>
                  <div class="well">
                    {{ $devi->id }}
                  </div>
                </div>
                <div class="col-md-12">
                  <strong>Entreprise: <br></strong>
                  <div class="well">
                    HS Print Service
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <strong><br>Date de génération: <br></strong>
                  <div class="well">
                    {{ $devi->updated_at }}
                  </div>
                </div>
                <div class="col-md-12">
                  <strong>Généré pour: <br></strong>
                  <div class="well">
                    {{ $devi->prospect->name }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
    		</div>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Récapitulatif de la commande</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Produit</strong></td>
        							<td class="text-center"><strong>Prix Unité</strong></td>
        							<td class="text-center"><strong>Quantité</strong></td>
        							<td class="text-right"><strong>Totale (HT)</strong></td>
                                </tr>
    						</thead>
    						<tbody>

    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
                  @foreach ($devi->devisproduits as $dev)
                    <tr>
      								<td>{{ $dev->produit->name }}</td>
      								<td class="text-center">{{ $dev->produit->prixVente }}</td>
      								<td class="text-center">{{ $dev->quantite }}</td>
      								<td class="text-right">{{ $dev->prixHT }}</td>
      							</tr>
                  @endforeach

    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Totale (HT)</strong></td>
    								<td class="thick-line text-right">{{ $devi->totalHT }} DH</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>TVA</strong></td>
    								<td class="no-line text-right">20%</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Totale (TTC)</strong></td>
    								<td class="no-line text-right">{{ $devi->totalTTC }} DH</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="well">
          <strong>Cachet:</strong><br><br><br><br><br>
        </div>
      </div>
    </div>
</div>
  </body>
</html>

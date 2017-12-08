<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">
        Nouveau devis
      </div>
      <form  slot="body">
        <!-- <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle">
          <thead>
            <th width="30%">Produit</th>
            <th width="20%">Quantité</th>
            <th width="17%">Prix</th>
            <th width="17%">Prix(HT)</th>
            <th width="16%"></th>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="form-group">
                  <select class="form-control select2">
                    <option>Select</option>
                  </select>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input id="tch3" type="text" value="" name="tch3" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default">
                </div>
              </td>
              <td>
                <div class="input-group mb-15">
									<input class="form-control" disabled>
									<span class="input-group-btn">
									  <button type="button" class="btn btn-success" style="padding-left: 10px;padding-right: 10px;"><i class="fa fa-arrow-right fa-xs"></i></button>
									</span>
								</div>
              </td>
              <td>
                <div class="form-group">
                  <input type="text" class="form-control">
                </div>
              </td>
              <td>
                <div class="form-group">
                  <button class="btn btn-primary btn-sm">
                    <i class="fa fa-check fa-2x"></i>
                  </button>
                  <button class="btn btn-default btn-sm">
                    <i class="fa fa-plus fa-2x"></i>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table> -->
        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="width: 20px;">No.</th>
                                <th>Description</th>
                                <th style="width: 80px;">Qty</th>
                                <th style="width: 130px;" class="text-right">Price</th>
                                <th style="width: 90px;">Tax</th>
                                <th style="width: 130px;">Total</th>
                                <th style="width: 130px;"></th>
                            </tr>
                            </thead>
                            <tbody v-sortable.tr="rows">
                            <tr v-for="row in rows" track-by="$index">
                                <td>
                                    {{ $index +1 }}
                                </td>
                                <td>
                                    <input class="form-control" v-model="row.description"/>
                                </td>
                                <td>
                                    <input class="form-control" v-model="row.qty" number/>
                                </td>
                                <td>
                                    <input class="form-control text-right" v-model="row.price | currencyDisplay" number data-type="currency"/>
                                </td>
                                <td>
                                    <select class="form-control" v-model="row.tax">
                                        <option value="0">0%</option>
                                        <option value="10">10%</option>
                                        <option value="20">20%</option>
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control text-right"  v-model="row.total | currencyDisplay" number readonly />
                                    <input type="hidden"  v-model="row.tax_amount | currencyDisplay" number/>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-xs" @click="addRow($index)">add row</button>
                                    <button class="btn btn-danger btn-xs" @click="removeRow($index)">remove row</button>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>

                            <tr>
                                <td colspan="5" class="text-right">TAX</td>
                                <td colspan="1" class="text-right">{{ taxtotal | currencyDisplay }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">TOTAL</td>
                                <td colspan="1" class="text-right">{{ total | currencyDisplay }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">DELIVERY</td>
                                <td colspan="1" class="text-right"><input class="form-control text-right" ></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right"><strong>GRANDTOTAL</strong></td>
                                <td colspan="1" class="text-right"><strong>{{ grandtotal = total + delivery | currencyDisplay }}</strong></td>
                                <td></td>
                            </tr>
                            </tfoot>
                        </table>
      </form>
    </part-panel>
  </div>
</template>

<script>
    import { Form } from './../../api/form.js';
    export default {
      data(){
        return {
            rows: [
                //initial data
                {qty: 5, description: "Something", price: 55.20, tax: 10},
                {qty: 2, description: "Something else", price: 1255.20, tax: 20},
            ],
            //total: 0,
            //grandtotal: 0,
            //taxtotal: 0,
            delivery: 40
        }
      },
      computed: {
          total: function () {
              var t = 0;
              $.each(this.rows, function (i, e) {
                  t += accounting.unformat(e.total, ",");
              });
              return t;
          },
          taxtotal: function () {
              var tt = 0;
              $.each(this.rows, function (i, e) {
                  tt += accounting.unformat(e.tax_amount, ",");
              });
              return tt;
          }
      },
      methods: {
          addRow(index) {
              try {
                  this.rows.splice(index + 1, 0, {});
              } catch(e)
              {
                  console.log(e);
              }
          },
          removeRow(index) {
              this.rows.splice(index, 1);
          },
          getData() {
              $.ajax({
                  context: this,
                  type: "POST",
                  data: {
                      rows: this.rows,
                      total: this.total,
                      delivery: this.delivery,
                      taxtotal: this.taxtotal,
                      grandtotal: this.grandtotal,
                  },
                  url: "/api/data"
              });
          }
      }
    }
</script>

<style lang="css">
</style>

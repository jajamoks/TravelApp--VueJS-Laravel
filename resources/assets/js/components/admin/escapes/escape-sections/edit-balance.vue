<template>
  <span>
  <span class="pull-right">
    <button class="btn btn-default btn-sm"  data-toggle="modal"  :data-target="`#edit-balance-${reservation.id}`">
      <i class="fa fa-edit"></i>
    </button>
  </span>
  <div class="modal fade" tabindex="-1" role="dialog" :id="`edit-balance-${reservation.id}`" ref="modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Balance</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input
                  type="number"
                  v-model="formattedBalance"
                  class="form-control" />
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
          <button type="button" class="btn btn-primary" @click="editBalance">Save</button>
        </div>
      </div>
    </div>
  </div>
</span>
</template>
<script>
import axios from 'axios';
export default {
  name: 'edit-balance',
  props: {
    reservation: {
      type: Object,
      required: true
    }
  },
  data: () => ({
    original_total: 0
  }),
  methods: {
    editBalance() {
      this.reservation.total_balance = this.newTotal;
      axios
        .put(
          `/api/escapes/${this.$route.params.id}/reservations/${this.reservation
            .id}`,
          this.reservation
        )
        .then(res => {
          $(`#edit-balance-${this.reservation.id}`).modal('toggle');
        })
        .catch(err => {
          console.error(err);
        });
    },
    formatValue(value) {
      return value > 0 ? value / 100 : 0;
    }
  },
  computed: {
    formattedBalance: {
      get: function() {
        return this.formatValue(this.reservation.current_balance);
      },
      set: function(value) {
        this.reservation.current_balance = value * 100;
      }
    },
    newTotal: {
      get: function() {
        return (
          this.reservation.total_balance -
          (this.reservation.total_balance -
            this.reservation.payments.reduce((acc, curr) => {
              return acc + curr.amount;
            }, 0) -
            this.reservation.current_balance)
        );
      }
    }
  }
};
</script>

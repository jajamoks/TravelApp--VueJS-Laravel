<template>
  <div>
    <h3>Packing List</h3>
    <div class="row space-top">
      <div class="col-md-6">
        <h4>Items</h4>
        <hr />
        <div class="row" v-if="form.packing_list.items.length > 0">
          <div class="col-md-12">
            <div class="panel-group" role="tablist">
              <div class="panel panel-default"  v-for="item in form.packing_list.items">
                <div class="panel-heading" role="tab">
                  <div class="pull-right panel-btn-container">
                  <button class="btn btn-sm btn-danger">
                    <i class="fa fa-remove" @click="remove(item)"></i>
                  </button>
                  <button class="btn btn-sm btn-default">
                    <i class="fa fa-edit" @click="edit(item)"></i>
                  </button>
                  </div>

                  <h4 class="panel-title">
                    {{item.name}}
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" v-else>
          <div class="col-md-12">
            <div class="alert alert-info">
              No Items Assigned
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group" :class="{
          'has-error': itemForm.errors.has('name')
          }">
          <label>Item Name</label>
          <input class="form-control" type="text" v-model="itemForm.name"/>
          <div class="alert alert-danger" v-if="itemForm.errors.has('name')">
            {{itemForm.errors.get('name')}}
          </div>
        </div>
        <div class="form-group" :class="{
          'has-error': itemForm.errors.has('description')
          }">
          <label>Description</label>
          <textarea rows="5" class="form-control" v-model="itemForm.description"></textarea>
          <div class="alert alert-danger" v-if="itemForm.errors.has('description')">
            {{itemForm.errors.get('description')}}
          </div>
        </div>
        <div class="form-group" :class="{
          'has-error': itemForm.errors.has('link')
          }">
          <label>Purchase Link</label>
          <input class="form-control" type="text" v-model="itemForm.link"/>
          <div class="alert alert-danger" v-if="itemForm.errors.has('link')">
            {{itemForm.errors.get('link')}}
          </div>
        </div>
        <div class="form-group">
          <button class="btn btn-primary" @click="save">Save</button>
          <button class="btn btn-default" @click="clear">Clear</button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
const formFields = {
  name: '',
  description: '',
  link: ''
};
export default {
  name: 'packing-list',
  props: {
    form: {
      type: Object,
      required: true
    }
  },
  data: () => {
    return {
      hasLoaded: false,
      itemForm: new Form(formFields)
    };
  },
  methods: {
    remove(item) {
      var ack = confirm('Are you sure?');
      if (ack) {
        axios
          .delete(
            `/api/escapes/${this.form.id}/packing_list/${this.form.packing_list
              .id}/items/${item.id}`
          )
          .then(response => {
            this.form.packing_list.items = response.data;
            this.clear();
          });
      }
    },
    save() {
      let resource = `/api/escapes/${this.form.id}/packing_list/${this.form
        .packing_list.id}/items`;
      if (this.itemForm.id) {
        Form.put(
          `${resource}/${this.itemForm.id}`,
          this.itemForm
        ).then(response => {
          this.form.packing_list.items = response;
          this.$emit('save');
          this.clear();
        });
      } else {
        Form.post(resource, this.itemForm).then(response => {
          this.form.packing_list.items = response;
          this.$emit('save');
          this.clear();
        });
      }
    },
    edit(item) {
      this.itemForm = new Form(item);
    },
    clear() {
      this.itemForm = new Form(formFields);
    }
  }
};
</script>

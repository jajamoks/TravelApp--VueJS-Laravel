<template>
<div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group" :class="{
        'has-error': form.errors.has('first_name')
      }">
        <label for="first_name">First Name</label>
        <input class="form-control" type="text" name="first_name" id="first_name" v-model="form.first_name" />
          <span v-if="form.errors.has('first_name')"
          class="alert alert-danger">
          {{form.errors.get('first_name')}}
        </span>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group"  :class="{
        'has-error': form.errors.has('last_name')
      }">
        <label for="last_name">Last Name</label>
        <input class="form-control" type="text" name="last_name" id="last_name" v-model="form.last_name" required/>
          <span class="alert alert-danger" v-if="form.errors.has('last_name')">
            {{form.errors.get('last_name')}}
          </span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group" :class="{
        'has-error': form.errors.has('address')
      }">
        <label for="address">Address</label>
        <input class="form-control" type="text" name="address" v-model="form.address" required/>
          <span class="alert alert-danger" v-if="form.errors.has('address')">{{form.errors.get('address')}}</span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-6" :class="{
      'has-error': form.errors.has('city')
    }">
      <label for="city">City</label>
      <input class="form-control" type="text" name="city" v-model="form.city" required/>
        <span class="alert alert-danger" v-if="form.errors.has('city')">{{form.errors.get('city')}}</span>
    </div>
    <div class="form-group col-md-3" :class="{
      'has-error': form.errors.has('state')
    }">
      <label for="state">State</label>
      <input class="form-control" type="text" name="state" v-model="form.state" required />
        <span class="alert alert-danger" v-if="form.errors.has('state')">{{form.errors.get('state')}}</span>
    </div>
    <div class="form-group col-md-3"  :class="{
      'has-error': form.errors.has('zip')
    }">
      <label for="state">Zip Code</label>
      <input class="form-control" type="number" name="zip" v-model="form.zip" required/>
        <span class="alert alert-danger" v-if="form.errors.has('zip')">{{form.errors.get('zip')}}</span>
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-6"   :class="{
      'has-error': form.errors.has('country')
    }">
      <label for="country">Country</label>
      <input class="form-control" type="text" name="country" v-model="form.country" required/>
        <span class="alert alert-danger" v-if="form.errors.has('country')">{{form.errors.get('country')}}</span>
    </div>
  </div>
</div>
</template>
<script>
export default {
  name: 'billing-form',
  props: {
    form: {
      type: Object,
      required: true
    }
  }
};
</script>

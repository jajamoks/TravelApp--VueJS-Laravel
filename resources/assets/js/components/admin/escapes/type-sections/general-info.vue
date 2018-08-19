<template>
<div>
  <div class="row">
    <div class="col-md-12">
        <h3>General Info</h3>
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Name</h3>
        </div>
        <div class="panel-body">
          <div class="alert alert-danger" v-show="form.errors.has('name')">
              {{ form.errors.get('name') }}
          </div>
          <input
          type="text"
          class="form-control"
          v-model="form.name">
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Country</h3>
        </div>
        <div class="panel-body">
          <div class="alert alert-danger" v-show="form.errors.has('country')">
              {{ form.errors.get('country') }}
          </div>
          <input
          type="text"
          class="form-control"
          v-model="form.country">
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Region</h3>
        </div>
        <div class="panel-body">
          <div class="alert alert-danger" v-show="form.errors.has('region')">
              {{ form.errors.get('region') }}
          </div>
          <input
          type="text"
          class="form-control"
          v-model="form.region">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Travel Insurance Required</h3>
        </div>
        <div class="panel-body">
          <label class="radio-inline">
            <input type="radio" name="insurance_required" id="inlineRadio1" value="1" v-model="form.insurance_required"> Yes
          </label>
          <label class="radio-inline">
            <input type="radio" name="insurance_required" id="inlineRadio2" value="0" v-model="form.insurance_required"> No
          </label>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Description</h3>
        </div>
        <div class="panel-body">
          <div class="alert alert-danger" v-show="form.errors.has('description')">
              {{ form.errors.get('description') }}
          </div>
          <div v-if="!$route.params.id || loaded">
          <tiny-mce :other-props="tinymceOptions"
          id="description"
          v-model="form.description"></tiny-mce>
           <iframe id="frameUpload" name="frameUpload" style="display:none"></iframe>
           <input ref="inline_image" name="image" style="display:none;" type="file" v-on:change="uploadInlineImage">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Accomodations</h3>
        </div>
        <div class="panel-body">
          <div class="alert alert-danger" v-show="form.errors.has('accomodations')">
              {{ form.errors.get('accomodations') }}
          </div>
          <div v-if="!$route.params.id || loaded">
          <tiny-mce :other-props="tinymceOptions"
          id="accomodations"
          v-model="form.accomodations"></tiny-mce>
           <iframe id="frameUpload" name="frameUpload" style="display:none"></iframe>
           <input ref="inline_image" name="image" style="display:none;" type="file" v-on:change="uploadInlineImage">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12" v-if="form.id">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Wellness Summary</h3>
        </div>
        <div class="panel-body">
          <div class="alert alert-danger" v-show="form.errors.has('wellness_summary')">
              {{ form.errors.get('wellness_summary') }}
          </div>
          <div  v-if="loaded">
          <tiny-mce :other-props="tinymceOptions"
          id="wellness_summary"
          v-model="form.wellness_summary"></tiny-mce>
           <iframe id="frameUpload" name="frameUpload" style="display:none"></iframe>
           <input ref="inline_image" name="image" style="display:none;" type="file" v-on:change="uploadInlineImage">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12" v-if="form.id">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Nutrition Summary</h3>
        </div>
        <div class="panel-body">
          <div class="alert alert-danger" v-show="form.errors.has('nutrition_summary')">
              {{ form.errors.get('nutrition_summary') }}
          </div>
          <div  v-if="loaded">
          <tiny-mce :other-props="tinymceOptions"
          id="nutrition_summary"
          v-model="form.nutrition_summary"></tiny-mce>
           <iframe id="frameUpload" name="frameUpload" style="display:none"></iframe>
           <input ref="inline_image" name="image" style="display:none;" type="file" v-on:change="uploadInlineImage">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12" v-if="form.id">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Home Summary</h3>
        </div>
        <div class="panel-body">
          <div class="alert alert-danger" v-show="form.errors.has('home_summary')">
              {{ form.errors.get('home_summary') }}
          </div>
          <div v-if="loaded">
          <tiny-mce :other-props="tinymceOptions"
          id="home_summary"
          v-model="form.home_summary"></tiny-mce>
           <iframe id="frameUpload" name="frameUpload" style="display:none"></iframe>
           <input ref="inline_image" name="image" style="display:none;" type="file" v-on:change="uploadInlineImage">
          </div>
        </div>
      </div>
    </div>
       <div class="col-md-12" v-if="form.id">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Give Back Summary</h3>
        </div>
        <div class="panel-body">
          <div class="alert alert-danger" v-show="form.errors.has('give_back_summary')">
              {{ form.errors.get('give_back_summary') }}
          </div>
          <div  v-if="loaded">
          <tiny-mce :other-props="tinymceOptions"
          id="give_back_summary"
          v-model="form.give_back_summary"></tiny-mce>
           <iframe id="frameUpload" name="frameUpload" style="display:none"></iframe>
           <input ref="inline_image" name="image" style="display:none;" type="file" v-on:change="uploadInlineImage">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12" v-if="form.id">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Unique Summary</h3>
        </div>
        <div class="panel-body">
          <div class="alert alert-danger" v-show="form.errors.has('unique_summary')">
              {{ form.errors.get('unique_summary') }}
          </div>
          <div v-if="loaded">
          <tiny-mce :other-props="tinymceOptions"
          id="unique_summary"
          v-model="form.unique_summary"></tiny-mce>
           <iframe id="frameUpload" name="frameUpload" style="display:none"></iframe>
           <input ref="inline_image" name="image" style="display:none;" type="file" v-on:change="uploadInlineImage">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>
<script>
import { tinymceOptions } from '../../../../forms/tinymce';
import TinyMce from 'tinymce-vue-2';
export default {
  name: 'general-info',
  data: () => ({
    tinymceOptions
  }),
  components: {
    TinyMce
  },
  props: {
    form: {
      type: Object,
      required: true
    },
    loaded: {
      type: Boolean,
      required: true
    }
  },
  methods: {
    uploadInlineImage(value) {
      const data = new FormData();
      data.append('inline_image', value.target.files[0]);
      axios
        .post(`/api/media`, data)
        .then(res => {
          var url = res.data.inline_image.fullSize;
          this.setInlineImage(url);
        })
        .catch(err => console.log(err));
    },
    setInlineImage(url) {
      top
        .$('.mce-btn.mce-open')
        .parent()
        .find('.mce-textbox')
        .val(url);
    }
  }
};
</script>

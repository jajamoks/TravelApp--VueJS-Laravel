<template>
    <div>
        <router-link :to="{name: 'press-list'}" class="btn btn-danger margin-bottom">Cancel</router-link>
        <div class="form-group pull-right">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary"
                        @click.prevent="save"
                        :disabled="form.busy">
                    Save
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 margin-bottom">
                        <div class="panel panel-default">
                            <div class="panel-heading">Title</div>
                            <div class="panel-body">
                                <div class="form-group" :class="{'has-error': form.errors.has('title')}">
                                    <div class="alert alert-danger" v-show="form.errors.has('title')">
                                        {{ form.errors.get('title') }}
                                    </div>
                                    <input type="text" class="form-control" name="action_text" v-model="form.title">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 margin-bottom">
                        <div class="panel panel-default">
                            <div class="panel-heading">Date</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="alert alert-danger" v-show="form.errors.has('date')">
                                        {{ form.errors.get('date') }}
                                    </div>
                                    <datepicker
                                            input-class="form-control"
                                            :value="form.date"
                                            v-on:selected="setDate"
                                            format="MMM dd, yyyy"></datepicker>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 margin-bottom">
                        <press-tags :form="form"></press-tags>
                    </div>
                    <div class="col-md-6 margin-bottom">
                        <div class="panel panel-default">
                            <div class="panel-heading">Link</div>
                            <div class="panel-body">
                                <div class="form-group" :class="{'has-error': form.errors.has('link')}">
                                    <div class="alert alert-danger" v-show="form.errors.has('link')">
                                        {{ form.errors.get('link') }}
                                    </div>
                                    <input type="text" class="form-control" name="action_text" v-model="form.link">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group" :class="{'has-error': form.errors.has('content')}">
                        <div class="col-md-12 margin-bottom">
                            <div class="panel panel-default">
                                <div class="panel-heading">Content</div>
                                <div class="panel-body">
                                    <div class="alert alert-danger" v-show="form.errors.has('content')">
                                        {{ form.errors.get('content') }}
                                    </div>

                                    <div v-if ="!isInEditMode">
                                        <tiny-mce :other-props="tinymceOptions"
                                                  id="newpost-content1"
                                                  v-model="form.content"></tiny-mce>
                                                   <iframe
                                                  name="frameUpload" style="display:none"></iframe>
                                <input ref="inline_image" name="image" style="display:none;" type="file" v-on:change="uploadInlineImage">
                                    </div>

                                    <div v-if="form.content && isInEditMode && form.content.length">
                                        <tiny-mce :other-props="tinymceOptions"
                                                  id="newpost-content2"
                                                  v-model="form.content"></tiny-mce>
                                                  <iframe
                                                  name="frameUpload" style="display:none"></iframe>
                                <input ref="inline_image" name="image" style="display:none;" type="file" v-on:change="uploadInlineImage">
                                    </div>

                                    <div v-if ="isInEditMode && form.content == null ">
                                        <tiny-mce :other-props="tinymceOptions"
                                                  id="newpost-content3"
                                                  v-model="form.content"></tiny-mce>
                                            <iframe
                                                  name="frameUpload" style="display:none">
                                                  </iframe>
                                <input ref="inline_image" name="image" style="display:none;" type="file" v-on:change="uploadInlineImage">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <image-upload
                                :errors="form.errors"
                                :image="form.image" v-on:image-change="changeImage" />
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Featured Image Alt</div>
                            <div class="panel-body">
                                <div class="form-group" :class="{'has-error': form.errors.has('image_alt')}">
                                    <div class="alert alert-danger" v-show="form.errors.has('image_alt')">
                                        {{ form.errors.get('image_alt') }}
                                    </div>
                                    <input type="text" class="form-control" name="image_alt" v-model="form.image_alt">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button
                                v-if="this.form.id"
                                class="btn btn-danger" @click="deleteItem">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import FormMixin from '../mixins/form';
import TinyMce from 'tinymce-vue-2';
import { tinymceOptions } from '../../../forms/tinymce';
import moment from 'moment';
import ImageUpload from './image-upload.vue';
import AttachmentUpload from './attachment-upload.vue';
import PressTags from './press-tags.vue';

export default {
  name: 'press-form',
  mixins: [FormMixin],
  components: {
    ImageUpload,
    AttachmentUpload,
    PressTags,
    TinyMce
  },
  data() {
    const tinyOpts = Object.assign({}, tinymceOptions, {
      file_browser_callback: (field_name, url, type, win) => {
        if (type == 'image') this.$refs.inline_image.click();
      }
    });
    return {
      resource: '/api/press',
      onSuccess: { name: 'press-list' },
      isInEditMode: true,
      tinymceOptions: tinyOpts,
      form: new Form({
        link: '',
        title: '',
        media: '',
        date: null,
        image: {},
        attachment: '',
        tags: [],
        attach: '',
        content: '',
        image_alt: ''
      })
    };
  },
  methods: {
    setDate(date) {
      this.form.date = moment(date).format('YYYY-MM-DD HH:MM:SS');
    },
    changeImage(value) {
      this.form.image = value;
      this.form.media = value.id;
    },
    changeAttachment(value) {
      this.form.attachment = value;
      this.form.attach = value.id;
    },
    fetchPost() {
      const { id } = this.$route.params;
      if (id && id !== 'new') {
        axios.get(`/api/press/${id}`).then(res => {
          res.data.tags = res.data.tags.map(tag => tag.name);
          this.form = new Form(res.data);
        });
      }
    }
  },
  mounted() {
    this.fetchPost();
    if (this.$route.params.id != 'new') {
      this.isInEditMode = true;
    }
  },
  created() {
    if (this.$route.params.id == 'new') {
      this.isInEditMode = false;
    }
  }
};
</script>

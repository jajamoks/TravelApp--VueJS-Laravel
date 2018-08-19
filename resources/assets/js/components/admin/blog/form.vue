<template>
  <div>
      <router-link :to="{name: 'blog-list'}" class="btn btn-danger margin-bottom">Cancel</router-link>
      <div class="form-group pull-right">
          <div class="col-md-6">
              <button type="submit" class="btn btn-primary"
                      @click.prevent="savePost"
                      :disabled="form.busy">
                  Save
              </button>
          </div>
      </div>
      <div class="row">
        <div class="col-md-4">

          <category-select :form="form"></category-select>
          <author-select :form="form"></author-select>
          <post-tags :form="form"></post-tags>
          <featured-image
          v-on:image-change="onImageChange"
          :errors="form.errors"
          :image="form.featured_image"></featured-image>
        </div>
        <div class="col-md-8">
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
                    <div class="panel-heading">Published Date</div>
                    <div class="panel-body">
                        <div class="form-group" :class="{'has-error': form.errors.has('published_date')}">
                            <datepicker
                            input-class="form-control"
                            :value="form.published_date"
                            v-on:selected="setPostDate"
                            format="MMM dd, yyyy"></datepicker>
                        </div>
                        <div v-if="form.published_date">
                            <button v-on:click.prevent="unpublishPost" class="btn btn-warning btn-sm">
                                Unpublish
                            </button>
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
                              <div v-if="form.content.length || !$route.params.id">
                                <tiny-mce :other-props="tinymceOptions"
                                    id="newpost-content"
                                    v-model="form.content"></tiny-mce>
                                <iframe id="frameUpload" name="frameUpload" style="display:none"></iframe>
                                <input ref="inline_image" name="image" style="display:none;" type="file" v-on:change="uploadInlineImage">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12" v-if="form.id">
                    <a :href="`/blog/${form.slug}`" target="_blank" class="btn btn-info">Preview</a>
                  </div>
              </div>
          </div>
        </div>

      </div>
          <!-- Content -->

  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
import AuthorSelect from './author-select.vue';
import CategorySelect from './category-select.vue';
import FeaturedImage from './featured-image.vue';
import PostTags from './post-tags.vue';
import TinyMce from 'tinymce-vue-2';
import moment from 'moment';
import { tinymceOptions } from '../../../forms/tinymce';
export default {
	name: 'blog-form',
	components: {
		Datepicker,
		AuthorSelect,
		CategorySelect,
		FeaturedImage,
		PostTags,
		TinyMce,
	},
	data() {
		const tinyOpts = Object.assign({}, tinymceOptions, {
			file_browser_callback: (field_name, url, type, win) => {
				if (type == 'image') this.$refs.inline_image.click();
			},
		});
		return {
			form: new Form({
				title: '',
				content: '',
				published_date: null,
				featured_image: '',
				user_id: 2,
				post_category_id: 1,
				tags: [],
				media: null,
			}),
			tinymceOptions: tinyOpts,
			formAttrs: {
				title: '',
				content: '',
				published_date: null,
				featured_image: '',
				user_id: 2,
				post_category_id: 1,
				tags: [],
				media: null,
			},
		};
	},
	methods: {
		savePost() {
			if (this.form.id) {
				Form.put(`/api/posts/${this.form.id}`, this.form)
					.then(res => {
						this.$router.push({ name: 'blog-list' });
					})
					.catch(err => err);
			} else {
				Form.post('/api/posts', this.form)
					.then(res => {
						this.$router.push({ name: 'blog-list' });
					})
					.catch(err => err);
			}
		},
		onImageChange(value) {
			this.form.featured_image = value.fullSize;
			this.form.media = value.id;
		},
		setPostDate(date) {
			this.form.published_date = moment(date).format('YYYY-MM-DD HH:MM:SS');
		},
		unpublishPost() {
			this.form.published_date = null;
		},
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
		},
		fetchPost() {
			const { id } = this.$route.params;
			if (id && id !== 'new') {
				axios.get(`/api/posts/${id}`).then(res => {
					res.data.tags = res.data.tags.map(tag => tag.name);
					this.form = new Form(res.data);
				});
			}
		},
	},
	mounted() {
		this.fetchPost();
	},
};
</script>

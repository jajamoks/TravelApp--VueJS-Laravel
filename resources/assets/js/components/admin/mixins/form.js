import Datepicker from 'vuejs-datepicker';
import TinyMce from 'tinymce-vue-2';
import moment from 'moment';
import { tinymceOptions } from '../../../forms/tinymce';
export default {
  components: {
    Datepicker,
    TinyMce
  },
  data() {
    return {
      tinymceOptions
    };
  },
  methods: {
    save() {
      if (this.form.id) {
        Form.put(`${this.resource}/${this.form.id}`, this.form)
          .then(res => {
            this.$router.push(this.onSuccess);
          })
          .catch(err => err);
      } else {
        Form.post(`${this.resource}`, this.form)
          .then(res => {
            this.$router.push(this.onSuccess);
          })
          .catch(err => err);
      }
    },
    onImageChange(value) {
      this.form.image = value.fullSize;
      this.form.media = value.id;
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
      top.$('.mce-btn.mce-open').parent().find('.mce-textbox').val(url);
    },
    fetch() {
      const { id } = this.$route.params;
      if (id && id !== 'new') {
        axios.get(`${this.resource}/${id}`).then(res => {
          this.form = new Form(res.data);
        });
      }
    },
    deleteItem() {
      const { id } = this.form;
      if (id) {
        const ack = confirm('Are you sure?');
        if (ack) {
          axios.delete(`${this.resource}/${id}`).then(res => {
            this.$router.push({ name: 'press-list' });
          });
        }
      }
    }
  },
  mounted() {
    this.fetch();
  }
};

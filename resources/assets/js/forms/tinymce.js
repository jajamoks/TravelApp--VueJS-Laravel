export const tinymceOptions = {
  file_browser_callback: (field_name, url, type, win) => {
    if (type == 'image') this.$refs.inline_image.click();
  },

  min_height: 300,
  plugins: 'media link image lists paste image',
  toolbar:
    'undo redo | styleselect | bold italic underline | link image media | alignleft aligncenter alignright | numlist bullist',
  extended_valid_elements:
    'iframe[src|title|width|height|allowfullscreen|frameborder]',
  paste_as_text: true,
  image_title: true,
  automatic_uploads: true,
  file_picker_types: 'image',
  image_class_list: [{ title: 'Responsive', value: 'img-responsive' }],
  image_advtab: true
};

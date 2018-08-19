/**
 * Load the Form helper class.
 */
require('./form');

/**
 * Define the FormError collection class.
 */
require('./errors');

/**
 * Add additional HTTP / form helpers to the Spark object.
 */
$.extend(Form, require('./http'));

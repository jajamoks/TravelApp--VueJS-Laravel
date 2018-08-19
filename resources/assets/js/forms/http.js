module.exports = {
    /**
     * Helper method for making POST HTTP requests.
     */
    post(uri, form) {
        return this.sendForm('post', uri, form);
    },


    /**
     * Helper method for making PUT HTTP requests.
     */
    put(uri, form) {
        return  this.sendForm('put', uri, form);
    },


    /**
     * Helper method for making PATCH HTTP requests.
     */
    patch(uri, form) {
        return  this.sendForm('patch', uri, form);
    },


    /**
     * Helper method for making DELETE HTTP requests.
     */
    delete(uri, form) {
        return this.sendForm('delete', uri, form);
    },


    /**
     * Send the form to the back-end server.
     *
     * This function will clear old errors, update "busy" status, etc.
     */
    sendForm(method, uri, form) {
        return new Promise((resolve, reject) => {
            form.startProcessing();

            axios[method](uri, JSON.parse(JSON.stringify(form)))
                .then(response => {
                    form.finishProcessing();
                    resolve(response.data);
                })
                .catch(errors => {
                    form.errors.set(errors.response.data);
                    form.busy = false;
                    reject(errors.response.data);
                });
        });
    }
};

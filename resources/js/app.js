import './bootstrap';
import Alpine from 'alpinejs';
import flatpckr from "flatpickr";


window.Alpine = Alpine;
window.flatpckr = flatpckr;

require("flatpickr/dist/themes/material_green.css");

Alpine.start();

window.editField = (fieldVal) => {
    return {
        val: fieldVal,
        isEditing: false,
        toggleEditingState() {
            this.isEditing = !this.isEditing;

            if (this.isEditing) {
                this.$nextTick(() => {
                    this.$refs.input.focus();
                })
            }
        },
        disableEditing() {
            this.isEditing = false;
        },
    }
}


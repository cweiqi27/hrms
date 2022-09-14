import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

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

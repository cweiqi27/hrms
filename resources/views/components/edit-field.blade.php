@props(['val', 'label_name', 'name', 'type'])
<div
    x-data="{
                val: '<?= $val ?>',
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
                }
            }"
    class="flex flex-col"
>
    <label for="{{ $name }}">
        {{ $label_name }}
    </label>
    <div class="flex">
        <input
            @click.prevent
            @dblclick="toggleEditingState"
            id="{{ $name }}"
            type="{{ $type }}"
            name="{{ $name }}"
            x-show="!isEditing"
            x-model="val"
            class="bg-white focus:outline-none border border-gray-300
                        text-slate-500 rounded-lg py-2 px-4 appearance-none select-none"
            readonly
        >
        <input
            @click.away="toggleEditingState"
            @keydown.enter="disableEditing"
            @keydown.window.escape="disableEditing"
            id="{{ $name }}"
            type="{{ $type }}"
            name="{{ $name }}"
            x-show="isEditing"
            x-model="val"
            x-ref="input"
            x-cloak
            class="rounded-lg py-2 px-4 appearance-none
                bg-white focus:outline-2 outline-emerald-500 border border-gray-300"
        >
        <button
            @click.prevent
            @click="toggleEditingState"
            class="px-4 hover:text-emerald-500"
        >
            <ion-icon
                name="create-outline"
                class="pointer-events-none text-2xl"
            >
            </ion-icon>
        </button>
    </div>
</div>

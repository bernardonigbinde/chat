<template>
    <div class="justify-end flex flex-col rounded-b-lg border-t">
        <textarea
            class="border-none resize-none ring-0 focus:ring-0 rounded-bl-lg w-full"
            autofocus
            v-model="form.message"
            @keydown.enter.prevent="send"
            placeholder="Enter Message..."></textarea>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";
import {onMounted} from "vue";

let emits = defineEmits(['send']);

let form = useForm({
    message: '',
})

let send = (event) => {
    if (event.shiftKey === true && form.message.trim().length > 0) {
        form.message += '\n';
    } else if (form.message.trim() !== '') {
        emits('send', form.message.trim());
        form.message = null;
    }
}
</script>

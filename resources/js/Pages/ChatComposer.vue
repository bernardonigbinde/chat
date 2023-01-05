<template>
    <div class="justify-end flex flex-col rounded-b-lg">
        <textarea class="border-none resize-none ring-0 focus:ring-0 rounded-bl-lg w-full" autofocus v-model="form.message" @keydown.enter.prevent="send" placeholder="Enter Message..."></textarea>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";

let emits = defineEmits(['send']);

let form = useForm({
    message: '',
})

let send = (event) => {
    if (form.message === '') {
        return;
    }

    emits('send', form.message);
    form.message = '';
}
</script>

<template>
    <div class="composer">
        <textarea v-model="form.message" @keydown.enter="send" placeholder="Enter Message..."></textarea>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";

let emits = defineEmits(['send']);

let form = useForm({
    message: '',
})

let send = () => {
    if (form.message === '') {
        return;
    }

    emits('send', form.message);
    form.message = '';
}
</script>

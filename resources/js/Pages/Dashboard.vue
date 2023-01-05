<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import ChatApp from "@/Pages/ChatApp.vue";
import {useAttrs} from "vue";

let props = defineProps({
    messages: Array,
    contacts: Array,
})

let attrs = useAttrs();

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Chat</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <chat-app :user="attrs.auth.user" :contacts="props.contacts" :messages="props.messages" class="p-6 text-gray-900 h-[40rem]" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

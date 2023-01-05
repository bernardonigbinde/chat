<template>
    <div class="p-0 max-h-[40rem]">
        <h1 class="font-semibold p-4 text-xl bg-gray-200" v-text="form.selectedContact ? form.selectedContact.name : 'Select a Contact'"/>
        <div class="flex flex-row grid grid-cols-12">
            <Conversation class="col-span-9" :contact="form.selectedContact" :messages="form.messages"/>
            <ContactsList class="col-span-3 border-l border-l-1 border-l-gray-300" :contacts="form.contacts" @selectedContact="startConversation"/>
        </div>
    </div>
</template>

<script setup>
import Conversation from "@/Pages/Conversation.vue";
import ContactsList from "@/Pages/ContactsList.vue";
import {useForm} from "@inertiajs/inertia-vue3";
import axios from "axios";

let props = defineProps({
    messages: Array,
    contacts: Array,
    selectedContact: Object,
    user: Object,
});

let form = useForm({
    contacts: props.contacts,
    messages: props.messages,
    selectedContact: props.selectedContact,
})

let startConversation = (contact) => {
    axios.get(route('single.conversation', contact))
        .then(response => {
            form.messages = response.data;
            form.selectedContact = contact;
        }).catch(error => {
        console.log(error);
        //     Swal.fire({
        //         icon: 'error',
        //         text: error.message,
        //     })
    })
}
</script>

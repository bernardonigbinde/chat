<template>
    <div class="chat-app">
        <Conversation :contact="form.selectedContact" :messages="form.messages"/>
        <ContactsList :contacts="form.contacts" @selectedContact="startConversation"/>
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
    // Inertia.visit(route('single.conversation', contact), {}, {
    //     method: 'get',
    //     onSuccess(response) {
    //     },
    //     onError(error) {
    //     },
    // })

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

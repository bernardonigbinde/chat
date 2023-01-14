<template>
    <div class="p-0 flex flex-col rounded-lg">
        <div class="grid grid-cols-12 bg-opacity-60 max-h-full rounded-b-lg">
            <Conversation class="col-span-9" :contact="form.selectedContact" :messages="form.messages" @send="sendMessage"/>
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
    form.selectedContact = contact;
    axios.get(route('single.conversation', form.selectedContact))
        .then(response => {
            form.messages = response.data;
        }).catch(error => {
        console.log(error);
        //     Swal.fire({
        //         icon: 'error',
        //         text: error.message,
        //     })
    })
}

let sendMessage = (text) => {
    axios.post(route('message.send', form.selectedContact), {
        text: encodeURIComponent(text)
    }).then(response => {
        form.messages.push(response.data);
    })
}
</script>

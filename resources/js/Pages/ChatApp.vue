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
import {computed, onMounted} from "vue";

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

onMounted(() => {
    Echo.private(`messages.${props.user.uuid}`)
        .listen('MessageSent', (event) => {
            handleIncomingMessage(event.message);
        })

    form.contacts = _.sortBy(props.contacts, (contact) => contact.unreadMessagesCount).reverse();
})

let startConversation = (contact) => {
    form.selectedContact = contact;
    form.messages = [];
    axios.get(route('show.chat', form.selectedContact))
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
    axios.post(route('send.chat.message', form.selectedContact), {
        text: encodeURIComponent(text)
    }).then(response => {
        form.messages.push(response.data)
        handleIncomingMessage(response.data)

        //when I send a message, move this contact to the top of the list
        // commented out, because the selected contact highlighting is controlled from the ContactList component
        // form.contacts.sort((x, y) => form.selectedContact === x ? -1 : y === form.selectedContact ? 1 : 0)
    })
}

let handleIncomingMessage = (message) => {
    if (form.selectedContact && message.from === form.selectedContact.uuid) {
        form.messages.push(message);
    }
}

let sortedContacts = computed(() => {

})
</script>

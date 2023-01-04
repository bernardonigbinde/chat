<template>
    <div class="chat-app">
        <Conversation :contact="props.selectedContact" :messages="props.messages" />
        <ContactsList :contacts="props.contacts" />
    </div>
</template>

<script setup>
import Conversation from "@/Pages/Conversation.vue";
import ContactsList from "@/Pages/ContactsList.vue";

let props = defineProps({
    messages: Array,
    contacts: Array,
    selectedContact: Object,
    user: Object,
})
</script>

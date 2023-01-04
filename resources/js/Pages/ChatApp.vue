<template>
    <div class="chat-app">
        test
        <conversation :contact="props.selectedContact" :messages="props.messages" />
        <contacts-list :contacts="props.contacts" />
    </div>
</template>

<script setup>
let props = defineProps({
    messages: Array,
    contacts: Array,
    selectedContact: Object
})
</script>

import m from"./Conversation-11686a1f.js";import g from"./ContactsList-398a111a.js";import{u as p,o as i,g as u,d as _,a as c,b as t,q as n}from"./app-88313488.js";import"./ChatFeed-48c90da9.js";import"./ChatComposer-b510db21.js";const f={class:"p-0 flex flex-col rounded-lg"},C={class:"grid grid-cols-12 bg-opacity-60 max-h-full rounded-b-lg"},S={__name:"ChatApp",props:{messages:Array,contacts:Array,selectedContact:Object,user:Object},setup(r){const a=r;let e=p({contacts:a.contacts,messages:a.messages,selectedContact:a.selectedContact}),l=o=>{e.selectedContact=o,n.get(route("single.conversation",e.selectedContact)).then(s=>{e.messages=s.data}).catch(s=>{console.log(s)})},d=o=>{n.post(route("message.send",e.selectedContact),{text:o}).then(s=>{alert("message sent")})};return(o,s)=>(i(),u("div",f,[_("div",C,[c(m,{class:"col-span-9",contact:t(e).selectedContact,messages:t(e).messages,onSend:t(d)},null,8,["contact","messages","onSend"]),c(g,{class:"col-span-3 border-l border-l-1 border-l-gray-300",contacts:t(e).contacts,onSelectedContact:t(l)},null,8,["contacts","onSelectedContact"])])]))}};export{S as default};
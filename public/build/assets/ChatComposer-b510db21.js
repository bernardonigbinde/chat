import{u as n,o as l,g as d,h as i,x as m,b as o,d as u,y as f,f as g}from"./app-88313488.js";const p={class:"justify-end flex flex-col rounded-b-lg"},w={__name:"ChatComposer",emits:["send"],setup(c,{emit:a}){let e=n({message:""}),r=()=>{e.message!==""&&(a("send",e.message),e.message="")};return(x,s)=>(l(),d("div",p,[i(u("textarea",{class:"border-none resize-none ring-0 focus:ring-0 rounded-bl-lg w-full",autofocus:"","onUpdate:modelValue":s[0]||(s[0]=t=>o(e).message=t),onKeydown:s[1]||(s[1]=f(g((...t)=>o(r)&&o(r)(...t),["prevent"]),["enter"])),placeholder:"Enter Message..."},null,544),[[m,o(e).message]])]))}};export{w as default};
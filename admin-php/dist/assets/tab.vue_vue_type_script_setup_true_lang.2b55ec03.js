import{h as s,r as o}from"./index.645abaa1.js";import{y}from"./element-plus.bf9fa066.js";import{d as c,k as f,o as p,H as $}from"./@vue.93d749de.js";import{_ as B}from"./tab.9b122156.js";function q(e,n=1,t={}){return s.request({url:`site/${e}/admin?page=${n}&`+Object.entries(t).map(([i,a])=>`${i}=${a}`).join("&")})}async function A(e,n){return s.request({url:`site/${e}/admin`,method:"POST",data:{user_id:n}})}async function _(e,n){return s.request({url:`site/${e}/admin/${n}`,method:"DELETE"})}async function b(e,n){return s.request({url:`site/${e}/admin/${n}`}).then(t=>t.data)}async function h(e,n,t){return s.request({url:`site/${e}/admin/${n}/role`,method:"POST",data:{roles:t}})}const g=()=>{const e=c(),n=c(),t=o.currentRoute.value.query.sid,i=o.currentRoute.value.query.id,a=async(u=1,r={})=>{e.value=await q(t,u,r)},m=async u=>{await y.confirm("\u786E\u8BA4\u5220\u9664\u8BE5\u7BA1\u7406\u5458\u5417\uFF1F"),await _(t,u.id),a(1)},l=async u=>{await A(t,u.id),a()},d=async u=>{n.value=await b(t,u)};return{admins:e,admin:n,load:a,del:m,add:l,current:async()=>{await d(i)},setRole:async(u,r)=>{await h(t,u,r),o.push({name:"site.admin.index",query:{sid:t}})},find:d}},D=f({__name:"tab",props:{site:null,admin:null},setup(e){return(n,t)=>{var a;const i=B;return p(),$(i,{tabs:[{label:"\u7AD9\u70B9\u5217\u8868",route:{name:"site.index"}},{label:"\u7BA1\u7406\u5458\u5217\u8868",route:{name:"site.admin.index",query:{sid:e.site.id}}},{label:`\u8BBE\u7F6E\u3010${(a=e.admin)==null?void 0:a.name}\u3011\u7BA1\u7406\u5458\u7684\u89D2\u8272`,route:{name:"site.admin.role"},current:!0},{label:"\u89D2\u8272\u5217\u8868",route:{name:"role.index",query:{sid:e.site.id}}}]},null,8,["tabs"])}}});export{D as _,g as u};

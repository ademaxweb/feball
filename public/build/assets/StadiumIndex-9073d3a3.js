import{_ as f,a as k,r as d,o as t,c as s,b as e,d as c,w as _,F as u,e as h,f as m,g as v,v as w,t as a}from"./app-31b2cb08.js";const x={name:"StadiumIndex",data(){return{title:"Стадионы",countries:null}},methods:{getCountries(){k.country.getAllFull().then(i=>{console.log(i),this.countries=i})}},beforeMount(){document.title=this.title},mounted(){this.getCountries()}},b={class:"container container--gap container--column container--pv"},y=e("h1",{class:"heading"},"Список стадионов",-1),C={class:"container container--gap-s"},F={class:"heading heading--secondary"},S={class:"list"},B={class:"heading"},D={class:"container container--v-center container--gap"},N={class:"info info--secondary"},V={class:"info--secondary--accent"},$={class:"heading heading--secondary"};function I(i,A,E,L,p,M){const r=d("router-link"),g=d("font-awesome-icon");return t(),s("div",b,[y,e("div",C,[c(r,{to:{name:"stadium.create"},class:"button button--full"},{default:_(()=>[m("Создать стадион")]),_:1},8,["to"])]),(t(!0),s(u,null,h(p.countries,o=>v((t(),s("div",{class:"container container--column container--gap-s",key:o.id},[e("h2",F,a(o.name),1),e("ul",S,[(t(!0),s(u,null,h(o.stadiums,n=>{var l;return t(),s("li",{class:"list__item",key:n.id},[c(r,{to:{name:"stadium",params:{id:n.id}},class:"link link--with_icon"},{default:_(()=>[e("h3",B,a(n.name),1),c(g,{class:"link__icon",icon:"fa-solid fa-link"})]),_:2},1032,["to"]),e("div",D,[e("p",N,[m(" Клуб: "),e("span",V,a(((l=n.club)==null?void 0:l.name)||"Отсутствует"),1)]),e("h3",$,a(new Date(n.founding).getFullYear()),1)])])}),128))])])),[[w,o.stadiums.length>0]])),128))])}const Y=f(x,[["render",I]]);export{Y as default};
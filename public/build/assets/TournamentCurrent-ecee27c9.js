import{_ as f,a as g,r as d,o,c,d as n,t,g as a,F as h,b as u,h as m,e as i,f as p}from"./app-3d2cc083.js";const v={name:"TournamentCurrent",data(){return{tournament:null}},mounted(){g.tournament.getById(this.$route.params.id).then(r=>{this.tournament=r,console.log(r)})}},y={key:0,class:"container container--section container--gap container--pv"},k={class:"heading"},w={class:"heading heading--secondary"},x={class:"info--secondary--accent"},C={class:"container container--full container--column container--gap-s"},D=n("h2",{class:"heading heading--secondary"},"Последние матчи:",-1),B={class:"list"},N={class:"list__item"},V={class:"container container--v-center container--gap"},b={class:"heading"},L={class:"heading--secondary"},S={class:"container container--v-center container--gap"},T={class:"info info--secondary"},F={class:"info--secondary--accent"},E={class:"info info--secondary"},I={class:"info--secondary--accent"},j={class:"container container--full container--column container--gap-s"},q=n("h2",{class:"heading heading--secondary"},"Команды:",-1),z={class:"list"},A={key:0,class:"list__item"},G=n("div",{class:"container container--v-center container--gap"},[n("h3",{class:"heading"},"Клубов не найдено")],-1),H=[G],J={class:"list__item"},K={class:"container container--v-center container--gap"},M={class:"heading"},O={class:"container container--v-center container--gap"},P={class:"info info--secondary"},Q={class:"info--secondary--accent"};function R(r,U,W,X,e,Y){const _=d("font-awesome-icon"),l=d("router-link");return e.tournament?(o(),c("div",y,[n("h1",k,t(e.tournament.name),1),n("h2",w,[a("Клубов в турнире: "),n("span",x,t(e.tournament.clubs_count),1)]),n("div",C,[D,n("ul",B,[(o(!0),c(h,null,u(e.tournament.games,s=>(o(),c("li",N,[n("div",V,[i(l,{to:{name:"game",params:{id:s.id}},class:"link link--with_icon"},{default:p(()=>[n("h3",b,t(s.name),1),i(_,{class:"link__icon",icon:"fa-solid fa-link"})]),_:2},1032,["to"]),n("h3",L,t(s.home_score)+" : "+t(s.guest_score),1)]),n("div",S,[n("p",T,[a(" Дата: "),n("span",F,t(new Date(s.date).toLocaleDateString()),1)]),n("p",E,[a(" Стадион: "),n("span",I,t(s.stadium.name),1)])])]))),256))])]),n("div",j,[q,n("ul",z,[e.tournament.clubs_count===0?(o(),c("li",A,H)):m("",!0),(o(!0),c(h,null,u(e.tournament.clubs,s=>(o(),c("li",J,[n("div",K,[i(l,{to:{name:"club",params:{id:s.id}},class:"link link--with_icon"},{default:p(()=>[n("h3",M,t(s.name),1),i(_,{class:"link__icon",icon:"fa-solid fa-link"})]),_:2},1032,["to"])]),n("div",O,[n("p",P,[a(" Дата: "),n("span",Q,t(new Date(s.found).toLocaleDateString()),1)])])]))),256))])])])):m("",!0)}const $=f(v,[["render",R]]);export{$ as default};
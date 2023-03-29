import{_ as k,a as m,r as p,o,c as a,b as n,t as e,f as r,h as l,F as g,e as f,d as i,w as v}from"./app-1107ec39.js";const y={name:"TournamentCurrent",data(){return{tournament:null,tournament_id:null}},methods:{deleteTournament(){if(!this.tournament_id)return!1;m.tournament.delete(this.tournament_id).then(c=>{this.tournament=null,this.$router.push({name:"tournaments"})}).catch(c=>console.log(c))}},mounted(){this.tournament_id=this.$route.params.id,m.tournament.getById(this.tournament_id).then(c=>{this.tournament=c,console.log(c)})}},b={key:0,class:"container container--section container--gap container--pv"},w={class:"heading"},C={class:"container container--full container--gap-s"},T={class:"heading heading--secondary"},x={class:"info--secondary--accent"},B={class:"container container--full container--column container--gap-s"},N=n("h2",{class:"heading heading--secondary"},"Последние матчи:",-1),V={class:"list"},D={key:0,class:"list__item"},F=n("div",{class:"container container--v-center container--gap"},[n("h3",{class:"heading"},"Матчей пока нет")],-1),L=[F],S={class:"list__item"},E={class:"container container--v-center container--gap"},I={class:"heading"},j={class:"heading--secondary"},q={class:"container container--v-center container--gap"},z={class:"info info--secondary"},A={class:"info--secondary--accent"},G={class:"info info--secondary"},H={class:"info--secondary--accent"},J={class:"container container--full container--column container--gap-s"},K=n("h2",{class:"heading heading--secondary"},"Команды:",-1),M={class:"list"},O={key:0,class:"list__item"},P=n("div",{class:"container container--v-center container--gap"},[n("h3",{class:"heading"},"Клубов не найдено")],-1),Q=[P],R={class:"list__item"},U={class:"container container--v-center container--gap"},W={class:"heading"},X=n("div",{class:"container container--v-center container--gap"},null,-1);function Y(c,_,Z,$,s,d){const u=p("font-awesome-icon"),h=p("router-link");return s.tournament?(o(),a("div",b,[n("h1",w,e(s.tournament.name),1),n("div",C,[n("button",{class:"button button--action button--danger",onClick:_[0]||(_[0]=(...t)=>d.deleteTournament&&d.deleteTournament(...t))},"Удалить")]),n("h2",T,[r("Клубов в турнире: "),n("span",x,e(s.tournament.clubs_count),1)]),n("div",B,[N,n("ul",V,[s.tournament.games.length?l("",!0):(o(),a("li",D,L)),(o(!0),a(g,null,f(s.tournament.games,t=>(o(),a("li",S,[n("div",E,[i(h,{to:{name:"game",params:{id:t.id}},class:"link link--with_icon"},{default:v(()=>[n("h3",I,e(t.name),1),i(u,{class:"link__icon",icon:"fa-solid fa-link"})]),_:2},1032,["to"]),n("h3",j,e(t.home_score)+" : "+e(t.guest_score),1)]),n("div",q,[n("p",z,[r(" Дата: "),n("span",A,e(new Date(t.date).toLocaleDateString()),1)]),n("p",G,[r(" Стадион: "),n("span",H,e(t.stadium.name),1)])])]))),256))])]),n("div",J,[K,n("ul",M,[s.tournament.clubs_count===0?(o(),a("li",O,Q)):l("",!0),(o(!0),a(g,null,f(s.tournament.clubs,t=>(o(),a("li",R,[n("div",U,[i(h,{to:{name:"club",params:{id:t.id}},class:"link link--with_icon"},{default:v(()=>[n("h3",W,e(t.name),1),i(u,{class:"link__icon",icon:"fa-solid fa-link"})]),_:2},1032,["to"])]),X]))),256))])])])):l("",!0)}const tn=k(y,[["render",Y]]);export{tn as default};

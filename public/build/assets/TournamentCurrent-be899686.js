import{_ as h,a as u,r,o as a,c,d as n,t as e,g as i,F as m,b as p,h as f,e as _,f as g}from"./app-9afa9cdb.js";const y={name:"TournamentCurrent",data(){return{tournament:null}},mounted(){u.tournament.getById(this.$route.params.id).then(s=>{this.tournament=s,console.log(s)})}},k={key:0,class:"container container--section container--gap container--pv"},v={class:"heading"},w={class:"heading heading--secondary"},x={class:"info--secondary--accent"},C={class:"container container--full container--column container--gap-s"},B=n("h2",{class:"heading heading--secondary"},"Последние матчи:",-1),N={class:"list"},V={class:"list__item"},D={class:"container container--v-center container--gap"},T={class:"heading"},b={class:"heading--secondary"},F={class:"container container--v-center container--gap"},L={class:"info info--secondary"},S={class:"info--secondary--accent"},E={class:"info info--secondary"},I={class:"info--secondary--accent"};function $(s,j,q,z,o,A){const d=r("font-awesome-icon"),l=r("router-link");return o.tournament?(a(),c("div",k,[n("h1",v,e(o.tournament.name),1),n("h2",w,[i("Клубов в турнире: "),n("span",x,e(o.tournament.clubs_count),1)]),n("div",C,[B,n("ul",N,[(a(!0),c(m,null,p(o.tournament.games,t=>(a(),c("li",V,[n("div",D,[_(l,{to:{name:"game",params:{id:t.id}},class:"link link--with_icon"},{default:g(()=>[n("h3",T,e(t.name),1),_(d,{class:"link__icon",icon:"fa-solid fa-link"})]),_:2},1032,["to"]),n("h3",b,e(t.home_score)+" : "+e(t.guest_score),1)]),n("div",F,[n("p",L,[i(" Дата: "),n("span",S,e(new Date(t.date).toLocaleDateString()),1)]),n("p",E,[i(" Стадион: "),n("span",I,e(t.stadium.name),1)])])]))),256))])])])):f("",!0)}const H=h(y,[["render",$]]);export{H as default};

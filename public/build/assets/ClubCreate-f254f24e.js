import{_ as p,a as c,r as h,o as r,c as i,b as t,g as u,j as a,k as g,F as d,e as m,l as v,d as k,w as y,t as _,f as C}from"./app-31b2cb08.js";const V={name:"StadiumCreate",data(){return{club:{name:"",founding:null,country_id:null},countries:[],errors:[],formSubmittingProcess:!1,name:"Создание клуба"}},beforeMount(){document.title=this.name},mounted(){this.getCountries()},methods:{getCountries(){c.country.getAll().then(n=>{this.countries=n})},submitForm(){if(this.formSubmittingProcess)return!1;if(this.errors=[],!this.formValidated)return this.errors.push("Вы заполнили не все поля формы"),!1;this.formSubmittingProcess=!0,c.club.create(this.club).then(n=>{console.log(n),this.formSubmittingProcess=!1,this.club.name=""}).catch(n=>{console.log(n),this.errors=n.data})}},computed:{formValidated(){return this.club.name.trim()&&this.club.founding&&this.club.country_id}}},S={class:"container container--section container--pv container--center"},x=t("h2",{class:"heading"},"Создать клуб",-1),F={class:"form__block"},w=t("label",{for:"clubName",class:"form__input_label"},"Название",-1),N={class:"form__block"},M=t("label",{for:"clubFounding",class:"form__input_label"},"Дата основания",-1),P={class:"form__block"},B=t("label",{for:"clubCountry",class:"form__input_label"},"Страна",-1),U=["value"],D={class:"form__block"},T=["disabled"],j={class:"container container--pv-s"};function A(n,o,E,L,s,l){const b=h("router-link");return r(),i("div",S,[x,t("form",{class:"form",onSubmit:o[3]||(o[3]=v((...e)=>l.submitForm&&l.submitForm(...e),["prevent"]))},[t("div",F,[w,u(t("input",{"onUpdate:modelValue":o[0]||(o[0]=e=>s.club.name=e),type:"text",class:"form__input",placeholder:"Название",id:"clubName"},null,512),[[a,s.club.name,void 0,{trim:!0}]])]),t("div",N,[M,u(t("input",{"onUpdate:modelValue":o[1]||(o[1]=e=>s.club.founding=e),type:"date",class:"form__input",placeholder:"Дата основания",id:"clubFounding"},null,512),[[a,s.club.founding,void 0,{trim:!0}]])]),t("div",P,[B,u(t("select",{"onUpdate:modelValue":o[2]||(o[2]=e=>s.club.country_id=e),class:"dropdown",id:"clubCountry"},[(r(!0),i(d,null,m(s.countries,e=>(r(),i("option",{value:e.id},_(e.name),9,U))),256))],512),[[g,s.club.country_id]])]),t("div",D,[t("button",{type:"submit",disabled:!l.formValidated,class:"button form__submit_button"},"Создать",8,T),(r(!0),i(d,null,m(s.errors,(e,f)=>(r(),i("p",{class:"form__input_error",key:f},_(e),1))),128))])],32),t("div",j,[k(b,{to:{name:"stadiums"},class:"link link--underlined"},{default:y(()=>[C("К списку стадионов")]),_:1})])])}const z=p(V,[["render",A]]);export{z as default};

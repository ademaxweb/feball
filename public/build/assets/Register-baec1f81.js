import{_ as k,a as m,r as p,o as _,c as u,b as s,g as i,j as h,f,v as d,d as r,m as w,F as P,e as v,l as C,w as y,t as S}from"./app-31b2cb08.js";const V={name:"Register",data(){return{credentials:{name:"",email:"",password:"",password_confirmation:""},errors:[],showPassword:!1,showPasswordConfirmation:!1,formSubmittingProcess:!1,name:"Регистрация"}},beforeMount(){document.title=this.name},methods:{toggleShowingPassword(){this.showPassword=!this.showPassword},toggleShowingPasswordConfirmation(){this.showPasswordConfirmation=!this.showPasswordConfirmation},submitForm(){if(this.formSubmittingProcess)return!1;if(this.errors=[],!this.formValidated)return this.errors.push("Вы заполнили не все поля формы"),!1;this.formSubmittingProcess=!0,m.user.register(this.credentials).then(a=>{const e=a.access_token;localStorage.setItem(m.LOCAL_STORAGE_KEY,e),m.user.me().then(l=>{this.$store.commit("authorize",l)}).catch(l=>console.log(l.data)),this.formSubmittingProcess=!1,this.$router.push({name:"profile"})}).catch(a=>{console.log(a)})}},computed:{formValidated(){return this.credentials.email.trim().length>4&&this.credentials.password.trim().length>7&&this.credentials.password_confirmation===this.credentials.password&&this.credentials.name.trim().length>2}}},x={class:"container container--section container--pv container--center"},M=s("h2",{class:"heading"},"Регистрация",-1),E={class:"form__block"},F=s("label",{for:"name_input",class:"form__input_label"},"Имя пользователя",-1),U={class:"form__block"},B=s("label",{for:"email_input",class:"form__input_label"},"E-Mail",-1),D={class:"form__block"},L={for:"password_input",class:"form__input_label"},N=["type"],R={class:"form__block"},T={for:"password_confirmation_input",class:"form__input_label"},A=["type"],O={class:"form__block"},j=["disabled"],z={class:"container container--pv-s"};function G(a,e,l,I,o,n){const c=p("font-awesome-icon"),g=p("router-link");return _(),u("div",x,[M,s("form",{class:"form",onSubmit:e[4]||(e[4]=C((...t)=>n.submitForm&&n.submitForm(...t),["prevent"]))},[s("div",E,[F,i(s("input",{"onUpdate:modelValue":e[0]||(e[0]=t=>o.credentials.name=t),type:"text",class:"form__input",placeholder:"Ник",id:"name_input"},null,512),[[h,o.credentials.name,void 0,{trim:!0}]])]),s("div",U,[B,i(s("input",{"onUpdate:modelValue":e[1]||(e[1]=t=>o.credentials.email=t),type:"email",class:"form__input",placeholder:"E-Mail",id:"email_input"},null,512),[[h,o.credentials.email,void 0,{trim:!0}]])]),s("div",D,[s("label",L,[f(" Пароль "),i(r(c,{onClick:n.toggleShowingPassword,icon:"fa-solid fa-eye",class:"form__input_eye"},null,8,["onClick"]),[[d,!o.showPassword]]),i(r(c,{onClick:n.toggleShowingPassword,icon:"fa-solid fa-eye-slash",class:"form__input_eye"},null,8,["onClick"]),[[d,o.showPassword]])]),i(s("input",{"onUpdate:modelValue":e[2]||(e[2]=t=>o.credentials.password=t),type:o.showPassword&&"text"||"password",class:"form__input",placeholder:"Пароль",id:"password_input"},null,8,N),[[w,o.credentials.password,void 0,{trim:!0}]])]),s("div",R,[s("label",T,[f(" Подтверждение пароля "),i(r(c,{onClick:n.toggleShowingPasswordConfirmation,icon:"fa-solid fa-eye",class:"form__input_eye"},null,8,["onClick"]),[[d,!o.showPasswordConfirmation]]),i(r(c,{onClick:n.toggleShowingPasswordConfirmation,icon:"fa-solid fa-eye-slash",class:"form__input_eye"},null,8,["onClick"]),[[d,o.showPasswordConfirmation]])]),i(s("input",{"onUpdate:modelValue":e[3]||(e[3]=t=>o.credentials.password_confirmation=t),type:o.showPasswordConfirmation&&"text"||"password",class:"form__input",placeholder:"Подтвердите пароль",id:"password_confirmation_input"},null,8,A),[[w,o.credentials.password_confirmation,void 0,{trim:!0}]])]),s("div",O,[s("button",{type:"submit",disabled:!n.formValidated,class:"button form__submit_button"},"Отправить",8,j),(_(!0),u(P,null,v(o.errors,(t,b)=>(_(),u("p",{class:"form__input_error",key:b},S(t),1))),128))])],32),s("div",z,[r(g,{to:{name:"login"},class:"link link--underlined"},{default:y(()=>[f("Уже есть аккаунт")]),_:1})])])}const Y=k(V,[["render",G]]);export{Y as default};

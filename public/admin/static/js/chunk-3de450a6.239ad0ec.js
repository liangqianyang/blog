(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-3de450a6","chunk-88b38a74"],{"09f4":function(e,t,a){"use strict";a.d(t,"a",(function(){return n})),Math.easeInOutQuad=function(e,t,a,i){return e/=i/2,e<1?a/2*e*e+t:(e--,-a/2*(e*(e-2)-1)+t)};var i=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(e){window.setTimeout(e,1e3/60)}}();function s(e){document.documentElement.scrollTop=e,document.body.parentNode.scrollTop=e,document.body.scrollTop=e}function l(){return document.documentElement.scrollTop||document.body.parentNode.scrollTop||document.body.scrollTop}function n(e,t,a){var n=l(),r=e-n,o=20,c=0;t="undefined"===typeof t?500:t;var u=function e(){c+=o;var l=Math.easeInOutQuad(c,n,r,t);s(l),c<t?i(e):a&&"function"===typeof a&&a()};u()}},6724:function(e,t,a){"use strict";a("8d41");var i="@@wavesContext";function s(e,t){function a(a){var i=Object.assign({},t.value),s=Object.assign({ele:e,type:"hit",color:"rgba(0, 0, 0, 0.15)"},i),l=s.ele;if(l){l.style.position="relative",l.style.overflow="hidden";var n=l.getBoundingClientRect(),r=l.querySelector(".waves-ripple");switch(r?r.className="waves-ripple":(r=document.createElement("span"),r.className="waves-ripple",r.style.height=r.style.width=Math.max(n.width,n.height)+"px",l.appendChild(r)),s.type){case"center":r.style.top=n.height/2-r.offsetHeight/2+"px",r.style.left=n.width/2-r.offsetWidth/2+"px";break;default:r.style.top=(a.pageY-n.top-r.offsetHeight/2-document.documentElement.scrollTop||document.body.scrollTop)+"px",r.style.left=(a.pageX-n.left-r.offsetWidth/2-document.documentElement.scrollLeft||document.body.scrollLeft)+"px"}return r.style.backgroundColor=s.color,r.className="waves-ripple z-active",!1}}return e[i]?e[i].removeHandle=a:e[i]={removeHandle:a},a}var l={bind:function(e,t){e.addEventListener("click",s(e,t),!1)},update:function(e,t){e.removeEventListener("click",e[i].removeHandle,!1),e.addEventListener("click",s(e,t),!1)},unbind:function(e){e.removeEventListener("click",e[i].removeHandle,!1),e[i]=null,delete e[i]}},n=function(e){e.directive("waves",l)};window.Vue&&(window.waves=l,Vue.use(n)),l.install=n;t["a"]=l},"8d41":function(e,t,a){},af61:function(e,t,a){"use strict";var i=a("eb3a"),s=a.n(i);s.a},cc5e:function(e,t,a){"use strict";a.d(t,"c",(function(){return n})),a.d(t,"e",(function(){return r})),a.d(t,"d",(function(){return o})),a.d(t,"a",(function(){return c})),a.d(t,"f",(function(){return u})),a.d(t,"b",(function(){return d}));var i=a("b775"),s=a("4328"),l=a.n(s);function n(e){return Object(i["a"])({url:"/api/role",method:"get",params:e})}function r(){return Object(i["a"])({url:"/api/role/enable",method:"get"})}function o(e){return Object(i["a"])({url:"/api/role/info",method:"get",params:{id:e}})}function c(e){return Object(i["a"])({url:"/api/role",method:"post",headers:{"content-type":"application/x-www-form-urlencoded"},data:l.a.stringify(e)})}function u(e){return Object(i["a"])({url:"/api/role",method:"put",headers:{"content-type":"application/x-www-form-urlencoded"},data:l.a.stringify(e)})}function d(e){return Object(i["a"])({url:"/api/role",method:"delete",params:{ids:e}})}},dcb1:function(e,t,a){"use strict";a.r(t);var i=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("el-dialog",{attrs:{title:e.temp.id?"编辑":"新增","close-on-click-modal":!1,visible:e.dialogFormVisible},on:{"update:visible":function(t){e.dialogFormVisible=t}}},[a("el-form",{ref:"dataForm",staticStyle:{width:"60%","margin-left":"50px"},attrs:{rules:e.rules,model:e.temp,"label-position":"left","label-width":"120px"}},[a("el-form-item",{attrs:{label:"用户名称",prop:"username"}},[a("el-input",{attrs:{placeholder:"请输入用户名"},model:{value:e.temp.username,callback:function(t){e.$set(e.temp,"username",t)},expression:"temp.username"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"真实姓名",prop:"real_name"}},[a("el-input",{attrs:{placeholder:"请输入真实姓名"},model:{value:e.temp.real_name,callback:function(t){e.$set(e.temp,"real_name",t)},expression:"temp.real_name"}})],1),e._v(" "),"create"==e.dialogStatus?a("el-form-item",{attrs:{label:"密码",prop:"password"}},[a("el-input",{attrs:{type:"password",placeholder:"请输入密码"},model:{value:e.temp.password,callback:function(t){e.$set(e.temp,"password",t)},expression:"temp.password"}})],1):e._e(),e._v(" "),"create"==e.dialogStatus?a("el-form-item",{attrs:{label:"确认密码",prop:"check_password"}},[a("el-input",{attrs:{placeholder:"请确认密码",type:"password"},model:{value:e.temp.check_password,callback:function(t){e.$set(e.temp,"check_password",t)},expression:"temp.check_password"}})],1):e._e(),e._v(" "),a("el-form-item",{attrs:{label:"头像",prop:"avatar"}},[a("el-upload",{staticClass:"avatar-uploader",attrs:{action:e.uploadAction,"show-file-list":!1,"on-success":e.handleAvatarSuccess,"before-upload":e.beforeAvatarUpload}},[e.imageUrl?a("img",{staticClass:"avatar",attrs:{src:e.imageUrl}}):a("i",{staticClass:"el-icon-plus avatar-uploader-icon"})])],1),e._v(" "),a("el-form-item",{attrs:{label:"邮箱",prop:"email"}},[a("el-input",{attrs:{placeholder:"请输入用户邮箱"},model:{value:e.temp.email,callback:function(t){e.$set(e.temp,"email",t)},expression:"temp.email"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"手机号码",prop:"phone"}},[a("el-input",{attrs:{placeholder:"请输入用户手机号码"},model:{value:e.temp.phone,callback:function(t){e.$set(e.temp,"phone",t)},expression:"temp.phone"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"角色",prop:"role_ids"}},[a("el-checkbox-group",{model:{value:e.temp.role_ids,callback:function(t){e.$set(e.temp,"role_ids",t)},expression:"temp.role_ids"}},e._l(e.rolesData,(function(t){return a("el-checkbox",{key:t.id,attrs:{label:t.id}},[e._v(e._s(t.name))])})),1)],1),e._v(" "),a("el-form-item",{attrs:{label:"状态"}},[a("el-select",{staticClass:"el-input",attrs:{placeholder:"请选择"},model:{value:e.temp.status,callback:function(t){e.$set(e.temp,"status",t)},expression:"temp.status"}},e._l(e.statusOptions,(function(e){return a("el-option",{key:e.value,attrs:{label:e.label,value:e.value}})})),1)],1)],1),e._v(" "),a("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(t){e.dialogFormVisible=!1}}},[e._v("取消")]),e._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:function(t){"create"===e.dialogStatus?e.createData():e.updateData()}}},[e._v("确认")])],1)],1)},s=[],l=(a("ac6a"),a("456d"),a("c24f")),n={components:{},data:function(){return{dialogStatus:"",dialogFormVisible:!1,imageUrl:"",rolesData:null,statusOptions:[{value:"0",label:"正常"},{value:"9",label:"停用"}],temp:{username:"",real_name:"",password:"",check_password:"",email:"",phone:"",avatar:"",role_ids:[],status:"0"},rules:{username:[{required:!0,message:"请输入用户名称",trigger:"blur"}],real_name:[{required:!0,message:"请输入真实姓名",trigger:"blur"}],email:[{required:!0,message:"请输入邮箱",trigger:"blur"}],password:[{required:!0,message:"请输入密码",trigger:"blur"}],check_password:[{required:!0,message:"请输入确认密码",trigger:"blur"}],phone:[{required:!0,pattern:/^0{0,1}(13[0-9]|15[7-9]|153|18[0-9]|199)[0-9]{8}$/,message:"手机号格式有误",trigger:"blur"}]},uploadAction:"https://www.lqy-comic.com//api/user/avatar"}},created:function(){},methods:{resetTemp:function(){this.temp={username:"",real_name:"",email:"",phone:"",password:"",check_password:"",avatar:"",role_ids:[],status:"0"}},init:function(e,t){this.dialogFormVisible=!0,this.rolesData=t,this.imageUrl="",0!==Object.keys(e).length?(this.dialogStatus="update",this.temp=Object.assign({},e),this.imageUrl=this.temp.avatar):this.dialogStatus="create"},handleAvatarSuccess:function(e,t){console.log(e),0===e.code?(this.temp.avatar=e.path,this.imageUrl=URL.createObjectURL(t.raw)):this.$message.error(e.message)},beforeAvatarUpload:function(e){var t="image/jpeg"===e.type,a=e.size/1024/1024<2;return t||this.$message.error("上传头像图片只能是 JPG 格式!"),a||this.$message.error("上传头像图片大小不能超过 2MB!"),t&&a},createData:function(){var e=this;this.$refs["dataForm"].validate((function(t){t&&(e.temp.password===e.temp.check_password?e.temp.role_ids?Object(l["a"])(e.temp).then((function(t){e.dialogFormVisible=!1,e.$notify({title:t.type,message:t.message,type:t.type,duration:1500,onClose:function(){e.visible=!1,e.$emit("refreshDataList")}})})):e.$message({message:"请选择角色",type:"warning"}):e.$message({message:"输入的密码与确认密码不相符,请确认输入的密码",type:"warning"}))}))},updateData:function(){var e=this;this.$refs["dataForm"].validate((function(t){if(t)if(0!==e.temp.role_ids){var a=Object.assign({},e.temp);delete a.create_time,delete a.update_time,Object(l["h"])(a).then((function(t){e.dialogFormVisible=!1,e.$notify({title:t.type,message:t.message,type:t.type,duration:1500,onClose:function(){e.visible=!1,e.$emit("refreshDataList")}})}))}else e.$message({message:"请选择角色",type:"warning"})}))}}},r=n,o=(a("af61"),a("2877")),c=Object(o["a"])(r,i,s,!1,null,null,null);t["default"]=c.exports},e382:function(e,t,a){"use strict";a.r(t);var i=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"app-container"},[a("div",{staticClass:"filter-container"},[a("el-input",{staticClass:"filter-item",staticStyle:{width:"200px"},attrs:{placeholder:"请输入用户名称",clearable:""},nativeOn:{keyup:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"enter",13,t.key,"Enter")?null:e.handleFilter(t)}},model:{value:e.listQuery.username,callback:function(t){e.$set(e.listQuery,"username",t)},expression:"listQuery.username"}}),e._v(" "),a("el-button",{directives:[{name:"waves",rawName:"v-waves"}],staticClass:"filter-item",attrs:{type:"primary",icon:"el-icon-search"},on:{click:e.handleFilter}},[e._v("搜索")]),e._v(" "),a("el-button",{staticClass:"filter-item",staticStyle:{"margin-left":"10px"},attrs:{type:"primary",icon:"el-icon-edit"},on:{click:function(t){return e.handleCreate({})}}},[e._v("新增")]),e._v(" "),a("el-button",{directives:[{name:"waves",rawName:"v-waves"}],staticClass:"filter-item",attrs:{loading:e.delLoading,type:"danger",icon:"el-icon-delete"},on:{click:e.handleDeletes}},[e._v("删除")])],1),e._v(" "),a("el-table",{directives:[{name:"loading",rawName:"v-loading",value:e.listLoading,expression:"listLoading"}],key:e.tableKey,ref:"multipleTable",staticStyle:{width:"100%"},attrs:{data:e.list,"row-key":"id",border:"",fit:"","highlight-current-row":""},on:{"sort-change":e.sortChange}},[a("el-table-column",{attrs:{type:"selection",width:"55"}}),e._v(" "),a("el-table-column",{attrs:{label:"用户名称","min-width":"150px"},scopedSlots:e._u([{key:"default",fn:function(t){var i=t.row;return[a("span",{staticClass:"link-type",on:{click:function(t){return e.handleUpdate(i)}}},[e._v(e._s(i.username))])]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"真实姓名","min-width":"150px"},scopedSlots:e._u([{key:"default",fn:function(t){var i=t.row;return[a("span",[e._v(e._s(i.real_name))])]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"头像",prop:"avatar",align:"center"},scopedSlots:e._u([{key:"default",fn:function(e){return[a("img",{attrs:{src:e.row.avatar,width:"100",height:"100"}})]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"角色","min-width":"150px"},scopedSlots:e._u([{key:"default",fn:function(t){return e._l(t.row.role_names,(function(t){return a("el-tag",{key:t,staticStyle:{"margin-right":"5px"}},[e._v(e._s(t))])}))}}])}),e._v(" "),a("el-table-column",{attrs:{label:"操作",align:"center","class-name":"small-padding fixed-width"},scopedSlots:e._u([{key:"default",fn:function(t){var i=t.row;return[a("el-button",{attrs:{type:"primary",size:"mini"},on:{click:function(t){return e.handleUpdate(i)}}},[e._v("编辑")]),e._v(" "),a("el-button",{attrs:{type:"danger",size:"mini"},on:{click:function(t){return e.handleDelete(i)}}},[e._v("删除")])]}}])})],1),e._v(" "),a("pagination",{directives:[{name:"show",rawName:"v-show",value:e.total>0,expression:"total>0"}],attrs:{total:e.total,page:e.listQuery.page,limit:e.listQuery.limit},on:{"update:page":function(t){return e.$set(e.listQuery,"page",t)},"update:limit":function(t){return e.$set(e.listQuery,"limit",t)},pagination:e.getList}}),e._v(" "),a("el-dialog",{attrs:{title:"提示",visible:e.delVisible,"close-on-click-modal":!1,width:"300px",center:""},on:{"update:visible":function(t){e.delVisible=t}}},[a("span",[e._v("是否确定删除？")]),e._v(" "),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(t){e.delVisible=!1}}},[e._v("取 消")]),e._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:e.deleteRow}},[e._v("确 定")])],1)]),e._v(" "),e.addOrUpdateVisible?a("add-or-update",{ref:"addOrUpdate",on:{refreshDataList:e.getList}}):e._e()],1)},s=[],l=a("c24f"),n=a("cc5e"),r=a("6724"),o=a("333d"),c=a("dcb1"),u={name:"User",components:{Pagination:o["a"],AddOrUpdate:c["default"]},directives:{waves:r["a"]},data:function(){return{tableKey:0,list:null,total:0,listLoading:!0,listQuery:{page:1,limit:20,username:"",sort:"",status:"0"},delVisible:!1,addOrUpdateVisible:!1,statusOptions:[{value:"",label:"全部"},{value:"0",label:"正常"},{value:"9",label:"停用"}],ids:[],delLoading:!1}},created:function(){this.getList(),this.getRoles()},methods:{handleFilter:function(){this.listQuery.page=1,this.getList()},sortChange:function(e){var t=e.prop,a=e.order;"status"===t&&this.sortByStatus(a)},sortByStatus:function(e){this.listQuery.sort="ascending"===e?"status asc":"status desc",this.handleFilter()},getRoles:function(){var e=this;Object(n["e"])().then((function(t){e.rolesData=t.data}))},getList:function(){var e=this;this.listLoading=!0,Object(l["e"])(this.listQuery).then((function(t){e.list=t.data,e.total=t.total,e.listLoading=!1}))},handleCreate:function(e){var t=this;this.addOrUpdateVisible=!0,this.$nextTick((function(){t.$refs.addOrUpdate.resetTemp(),t.$refs.addOrUpdate.init(e,t.rolesData)}))},handleUpdate:function(e){var t=this;this.addOrUpdateVisible=!0,this.$nextTick((function(){t.$refs.addOrUpdate.resetTemp(),t.$refs.addOrUpdate.init(e,t.rolesData)}))},handleDelete:function(e){this.delVisible=!0,this.ids=[],this.ids.push(e.id)},handleDeletes:function(){var e=this.$refs.multipleTable.selection,t=e.length;if(t<1)return this.$message({message:"请选择要删除的数据",type:"warning"}),!1;this.delVisible=!0,this.ids=[];for(var a=0;a<t;a++)this.ids.push(e[a].id)},deleteRow:function(){var e=this;this.delLoading=!0,Object(l["b"])(this.ids).then((function(t){e.$notify({title:t.type,message:t.message,type:t.type,duration:1500}),e.getList()})),this.delLoading=!1,this.delVisible=!1}}},d=u,p=a("2877"),m=Object(p["a"])(d,i,s,!1,null,null,null);t["default"]=m.exports},eb3a:function(e,t,a){}}]);
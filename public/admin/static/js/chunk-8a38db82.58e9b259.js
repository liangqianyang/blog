(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-8a38db82"],{"09f4":function(e,t,a){"use strict";a.d(t,"a",(function(){return n})),Math.easeInOutQuad=function(e,t,a,s){return e/=s/2,e<1?a/2*e*e+t:(e--,-a/2*(e*(e-2)-1)+t)};var s=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(e){window.setTimeout(e,1e3/60)}}();function i(e){document.documentElement.scrollTop=e,document.body.parentNode.scrollTop=e,document.body.scrollTop=e}function l(){return document.documentElement.scrollTop||document.body.parentNode.scrollTop||document.body.scrollTop}function n(e,t,a){var n=l(),r=e-n,o=20,c=0;t="undefined"===typeof t?500:t;var d=function e(){c+=o;var l=Math.easeInOutQuad(c,n,r,t);i(l),c<t?s(e):a&&"function"===typeof a&&a()};d()}},"2bcc":function(e,t,a){},"567c":function(e,t,a){"use strict";var s=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",[a("div",{directives:[{name:"show",rawName:"v-show",value:e.isShowSelect,expression:"isShowSelect"}],staticClass:"mask",on:{click:function(t){e.isShowSelect=!e.isShowSelect}}}),e._v(" "),a("el-popover",{attrs:{placement:"bottom-start",width:e.width,trigger:"manual"},on:{hide:e.popoverHide},model:{value:e.isShowSelect,callback:function(t){e.isShowSelect=t},expression:"isShowSelect"}},[a("el-tree",{ref:"tree",staticClass:"common-tree",style:e.style,attrs:{data:e.data,props:e.defaultProps,"show-checkbox":e.multiple,"node-key":e.nodeKey,"check-strictly":e.checkStrictly,"default-expand-all":"","expand-on-click-node":!1,"check-on-click-node":e.multiple,"highlight-current":!0},on:{"node-click":e.handleNodeClick,"check-change":e.handleCheckChange}}),e._v(" "),a("el-select",{ref:"select",staticClass:"tree-select",style:e.selectStyle,attrs:{slot:"reference",size:e.size,multiple:e.multiple,clearable:e.clearable,"collapse-tags":e.collapseTags},on:{"remove-tag":e.removeSelectedNodes,clear:e.removeSelectedNode,change:e.changeSelectedNodes},nativeOn:{click:function(t){e.isShowSelect=!e.isShowSelect}},slot:"reference",model:{value:e.selectedData,callback:function(t){e.selectedData=t},expression:"selectedData"}},e._l(e.options,(function(e){return a("el-option",{key:e.value,attrs:{label:e.label,value:e.value}})})),1)],1)],1)},i=[],l=(a("c5f6"),{name:"TreeSelect",props:{data:{type:Array,default:function(){return[]}},defaultProps:{type:Object,default:function(){return{}}},multiple:{type:Boolean,default:function(){return!1}},clearable:{type:Boolean,default:function(){return!1}},collapseTags:{type:Boolean,default:function(){return!1}},nodeKey:{type:String,default:function(){return"id"}},checkStrictly:{type:Boolean,default:function(){return!1}},checkedKeys:{type:Array,default:function(){return[]}},size:{type:String,default:function(){return"medium"}},width:{type:Number,default:function(){return 250}},height:{type:Number,default:function(){return 300}}},data:function(){return{isShowSelect:!1,options:[],selectedData:[],style:"width:"+this.width+"px;height:"+this.height+"px;",selectStyle:"width:"+(this.width+24)+"px;",checkedIds:[],checkedData:[]}},watch:{isShowSelect:function(e){this.$refs.select.blur()},checkedKeys:function(e){e&&(this.checkedKeys=e,this.initCheckedData())}},mounted:function(){this.initCheckedData()},methods:{setSelectOption:function(e){var t={};t.value=e.key,t.label=e.label,this.options=[],this.options.push(t),this.selectedData=e.key},checkSelectedNode:function(e){var t=e[0];this.$refs.tree.setCurrentKey(t);var a=this.$refs.tree.getNode(t);this.setSelectOption(a)},checkSelectedNodes:function(e){this.$refs.tree.setCheckedKeys(e)},clearSelectedNode:function(){this.selectedData="",this.$refs.tree.setCurrentKey(null)},clearSelectedNodes:function(){for(var e=this.$refs.tree.getCheckedKeys(),t=0;t<e.length;t++)this.$refs.tree.setChecked(e[t],!1)},initCheckedData:function(){this.multiple?this.checkedKeys.length>0?this.checkSelectedNodes(this.checkedKeys):this.clearSelectedNodes():this.checkedKeys.length>0?this.checkSelectedNode(this.checkedKeys):this.clearSelectedNode()},popoverHide:function(){this.multiple?(this.checkedIds=this.$refs.tree.getCheckedKeys(),this.checkedData=this.$refs.tree.getCheckedNodes()):(this.checkedIds=this.$refs.tree.getCurrentKey(),this.checkedData=this.$refs.tree.getCurrentNode()),this.$emit("popoverHide",this.checkedIds,this.checkedData)},handleNodeClick:function(e,t){this.multiple||(this.setSelectOption(t),this.isShowSelect=!this.isShowSelect,this.$emit("change",this.selectedData))},handleCheckChange:function(){var e=this,t=this.$refs.tree.getCheckedKeys();this.options=t.map((function(t){var a=e.$refs.tree.getNode(t),s={};return s.value=a.key,s.label=a.label,s})),this.selectedData=this.options.map((function(e){return e.value})),this.$emit("change",this.selectedData)},removeSelectedNodes:function(e){var t=this;this.$refs.tree.setChecked(e,!1);var a=this.$refs.tree.getNode(e);!this.checkStrictly&&a.childNodes.length>0&&(this.treeToList(a).map((function(e){e.childNodes.length<=0&&t.$refs.tree.setChecked(e,!1)})),this.handleCheckChange()),this.$emit("change",this.selectedData)},treeToList:function(e){var t=[],a=[];t=t.concat(e);while(t.length){var s=t.shift();s.childNodes&&(t=t.concat(s.childNodes)),a.push(s)}return a},removeSelectedNode:function(){this.clearSelectedNode(),this.$emit("change",this.selectedData)},changeSelectedNodes:function(e){this.multiple&&e.length<=0&&this.clearSelectedNodes(),this.$emit("change",this.selectedData)}}}),n=l,r=(a("f927"),a("2877")),o=Object(r["a"])(n,s,i,!1,null,"a52e003c",null);t["a"]=o.exports},6724:function(e,t,a){"use strict";a("8d41");var s="@@wavesContext";function i(e,t){function a(a){var s=Object.assign({},t.value),i=Object.assign({ele:e,type:"hit",color:"rgba(0, 0, 0, 0.15)"},s),l=i.ele;if(l){l.style.position="relative",l.style.overflow="hidden";var n=l.getBoundingClientRect(),r=l.querySelector(".waves-ripple");switch(r?r.className="waves-ripple":(r=document.createElement("span"),r.className="waves-ripple",r.style.height=r.style.width=Math.max(n.width,n.height)+"px",l.appendChild(r)),i.type){case"center":r.style.top=n.height/2-r.offsetHeight/2+"px",r.style.left=n.width/2-r.offsetWidth/2+"px";break;default:r.style.top=(a.pageY-n.top-r.offsetHeight/2-document.documentElement.scrollTop||document.body.scrollTop)+"px",r.style.left=(a.pageX-n.left-r.offsetWidth/2-document.documentElement.scrollLeft||document.body.scrollLeft)+"px"}return r.style.backgroundColor=i.color,r.className="waves-ripple z-active",!1}}return e[s]?e[s].removeHandle=a:e[s]={removeHandle:a},a}var l={bind:function(e,t){e.addEventListener("click",i(e,t),!1)},update:function(e,t){e.removeEventListener("click",e[s].removeHandle,!1),e.addEventListener("click",i(e,t),!1)},unbind:function(e){e.removeEventListener("click",e[s].removeHandle,!1),e[s]=null,delete e[s]}},n=function(e){e.directive("waves",l)};window.Vue&&(window.waves=l,Vue.use(n)),l.install=n;t["a"]=l},"8d41":function(e,t,a){},cc5e:function(e,t,a){"use strict";a.d(t,"c",(function(){return n})),a.d(t,"e",(function(){return r})),a.d(t,"d",(function(){return o})),a.d(t,"a",(function(){return c})),a.d(t,"f",(function(){return d})),a.d(t,"b",(function(){return u}));var s=a("b775"),i=a("4328"),l=a.n(i);function n(e){return Object(s["a"])({url:"/api/roles",method:"get",params:e})}function r(){return Object(s["a"])({url:"/api/roles/enable",method:"get"})}function o(e){return Object(s["a"])({url:"/api/role/info",method:"get",params:{id:e}})}function c(e){return Object(s["a"])({url:"/api/roles",method:"post",headers:{"content-type":"application/x-www-form-urlencoded"},data:l.a.stringify(e)})}function d(e){return Object(s["a"])({url:"/api/roles",method:"put",headers:{"content-type":"application/x-www-form-urlencoded"},data:l.a.stringify(e)})}function u(e){return Object(s["a"])({url:"/api/roles",method:"delete",params:{ids:e}})}},e382:function(e,t,a){"use strict";a.r(t);var s=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"app-container"},[a("div",{staticClass:"filter-container"},[a("el-input",{staticClass:"filter-item",staticStyle:{width:"200px"},attrs:{placeholder:"请输入用户名称",clearable:""},nativeOn:{keyup:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"enter",13,t.key,"Enter")?null:e.handleFilter(t)}},model:{value:e.listQuery.username,callback:function(t){e.$set(e.listQuery,"username",t)},expression:"listQuery.username"}}),e._v(" "),a("el-select",{staticClass:"filter-item",attrs:{placeholder:"请选择状态"},model:{value:e.listQuery.status,callback:function(t){e.$set(e.listQuery,"status",t)},expression:"listQuery.status"}},e._l(e.statusOptions,(function(e){return a("el-option",{key:e.value,attrs:{label:e.label,value:e.value}})})),1),e._v(" "),a("el-button",{directives:[{name:"waves",rawName:"v-waves"}],staticClass:"filter-item",attrs:{type:"primary",icon:"el-icon-search"},on:{click:e.handleFilter}},[e._v("搜索")]),e._v(" "),a("el-button",{staticClass:"filter-item",staticStyle:{"margin-left":"10px"},attrs:{type:"primary",icon:"el-icon-edit"},on:{click:e.handleCreate}},[e._v("新增")]),e._v(" "),a("el-button",{directives:[{name:"waves",rawName:"v-waves"}],staticClass:"filter-item",attrs:{loading:e.delLoading,type:"danger",icon:"el-icon-delete"},on:{click:e.handleDeletes}},[e._v("删除")])],1),e._v(" "),a("el-table",{directives:[{name:"loading",rawName:"v-loading",value:e.listLoading,expression:"listLoading"}],key:e.tableKey,ref:"multipleTable",staticStyle:{width:"100%"},attrs:{data:e.list,"row-key":"id",border:"",fit:"","highlight-current-row":""},on:{"sort-change":e.sortChange}},[a("el-table-column",{attrs:{type:"selection",width:"55"}}),e._v(" "),a("el-table-column",{attrs:{label:"用户名称","min-width":"150px"},scopedSlots:e._u([{key:"default",fn:function(t){var s=t.row;return[a("span",{staticClass:"link-type",on:{click:function(t){return e.handleUpdate(s)}}},[e._v(e._s(s.username))])]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"真实姓名","min-width":"150px"},scopedSlots:e._u([{key:"default",fn:function(t){var s=t.row;return[a("span",[e._v(e._s(s.real_name))])]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"头像",prop:"avatar",align:"center"},scopedSlots:e._u([{key:"default",fn:function(e){return[a("img",{attrs:{src:e.row.avatar,width:"100",height:"100"}})]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"角色","min-width":"150px"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("el-tag",[e._v(e._s(t.row.role_name))])]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"状态",prop:"status",sortable:"custom",align:"center"},scopedSlots:e._u([{key:"default",fn:function(t){return["0"==t.row.status?a("el-tag",{attrs:{type:"success"}},[e._v("正常")]):e._e(),e._v(" "),"9"==t.row.status?a("el-tag",{attrs:{type:"danger"}},[e._v("停用")]):e._e()]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"操作",align:"center","class-name":"small-padding fixed-width"},scopedSlots:e._u([{key:"default",fn:function(t){var s=t.row;return[a("el-button",{attrs:{type:"primary",size:"mini"},on:{click:function(t){return e.handleUpdate(s)}}},[e._v("编辑")]),e._v(" "),a("el-button",{attrs:{type:"danger",size:"mini"},on:{click:function(t){return e.handleDelete(s)}}},[e._v("删除")])]}}])})],1),e._v(" "),a("pagination",{directives:[{name:"show",rawName:"v-show",value:e.total>0,expression:"total>0"}],attrs:{total:e.total,page:e.listQuery.page,limit:e.listQuery.limit},on:{"update:page":function(t){return e.$set(e.listQuery,"page",t)},"update:limit":function(t){return e.$set(e.listQuery,"limit",t)},pagination:e.getList}}),e._v(" "),a("el-dialog",{attrs:{title:"提示",visible:e.delVisible,"close-on-click-modal":!1,width:"300px",center:""},on:{"update:visible":function(t){e.delVisible=t}}},[a("span",[e._v("是否确定删除？")]),e._v(" "),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(t){e.delVisible=!1}}},[e._v("取 消")]),e._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:e.deleteRow}},[e._v("确 定")])],1)]),e._v(" "),a("el-dialog",{attrs:{title:e.textMap[e.dialogStatus],visible:e.dialogFormVisible,"close-on-click-modal":!1},on:{"update:visible":function(t){e.dialogFormVisible=t}}},[a("el-form",{ref:"dataForm",staticStyle:{width:"400px","margin-left":"50px"},attrs:{rules:e.rules,model:e.temp,"label-position":"left","label-width":"120px"}},[a("el-form-item",{attrs:{label:"用户名称",prop:"username"}},[a("el-input",{attrs:{placeholder:"请输入用户名"},model:{value:e.temp.username,callback:function(t){e.$set(e.temp,"username",t)},expression:"temp.username"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"真实姓名",prop:"real_name"}},[a("el-input",{attrs:{placeholder:"请输入真实姓名"},model:{value:e.temp.real_name,callback:function(t){e.$set(e.temp,"real_name",t)},expression:"temp.real_name"}})],1),e._v(" "),"create"==e.dialogStatus?a("el-form-item",{attrs:{label:"密码",prop:"password"}},[a("el-input",{attrs:{type:"password",placeholder:"请输入密码"},model:{value:e.temp.password,callback:function(t){e.$set(e.temp,"password",t)},expression:"temp.password"}})],1):e._e(),e._v(" "),"create"==e.dialogStatus?a("el-form-item",{attrs:{label:"确认密码",prop:"check_password"}},[a("el-input",{attrs:{placeholder:"请确认密码",type:"password"},model:{value:e.temp.check_password,callback:function(t){e.$set(e.temp,"check_password",t)},expression:"temp.check_password"}})],1):e._e(),e._v(" "),a("el-form-item",{attrs:{label:"头像",prop:"avatar"}},[a("el-input",{attrs:{placeholder:"请上传头像"},model:{value:e.temp.avatar,callback:function(t){e.$set(e.temp,"avatar",t)},expression:"temp.avatar"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"邮箱",prop:"email"}},[a("el-input",{attrs:{placeholder:"请输入用户邮箱"},model:{value:e.temp.email,callback:function(t){e.$set(e.temp,"email",t)},expression:"temp.email"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"手机号码",prop:"phone"}},[a("el-input",{attrs:{placeholder:"请输入用户手机号码"},model:{value:e.temp.phone,callback:function(t){e.$set(e.temp,"phone",t)},expression:"temp.phone"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"角色",prop:"role_id"}},[a("tree-select",{attrs:{data:e.rolesData,"default-props":e.defaultProps,"node-key":e.nodeKey,"checked-keys":e.defaultCheckedKeys,placeholder:"请选择角色"},on:{popoverHide:e.popoverHide}})],1),e._v(" "),a("el-form-item",{attrs:{label:"状态"}},[a("el-select",{staticClass:"el-input",attrs:{placeholder:"请选择"},model:{value:e.temp.status,callback:function(t){e.$set(e.temp,"status",t)},expression:"temp.status"}},e._l(e.statusOptions,(function(e){return a("el-option",{key:e.value,attrs:{label:e.label,value:e.value}})})),1)],1)],1),e._v(" "),a("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(t){e.dialogFormVisible=!1}}},[e._v("取消")]),e._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:function(t){"create"===e.dialogStatus?e.createData():e.updateData()}}},[e._v("确认")])],1)],1)],1)},i=[],l=a("c24f"),n=a("cc5e"),r=a("6724"),o=a("333d"),c=a("567c"),d={name:"User",components:{Pagination:o["a"],TreeSelect:c["a"]},directives:{waves:r["a"]},data:function(){return{rolesData:null,defaultProps:{children:"children",label:"name"},nodeKey:"id",defaultCheckedKeys:[],tableKey:0,list:null,total:0,listLoading:!0,listQuery:{page:1,limit:20,username:"",sort:"",status:"0"},temp:{username:"",real_name:"",password:"",check_password:"",email:"",phone:"",avatar:"",role_id:"",status:"0"},dialogFormVisible:!1,delVisible:!1,dialogStatus:"",textMap:{update:"编辑",create:"新增"},rules:{username:[{required:!0,message:"请输入用户名称",trigger:"blur"}],real_name:[{required:!0,message:"请输入真实姓名",trigger:"blur"}],password:[{required:!0,message:"请输入密码",trigger:"blur"}],check_password:[{required:!0,message:"请输入确认密码",trigger:"blur"}],phone:[{required:!0,pattern:/^0{0,1}(13[0-9]|15[7-9]|153|18[0-9]|199)[0-9]{8}$/,message:"手机号格式有误",trigger:"blur"}]},statusOptions:[{value:"",label:"全部"},{value:"0",label:"正常"},{value:"9",label:"停用"}],ids:[],delLoading:!1}},created:function(){this.getList(),this.getRoles()},methods:{handleFilter:function(){this.listQuery.page=1,this.getList()},sortChange:function(e){var t=e.prop,a=e.order;"status"===t&&this.sortByStatus(a)},sortByStatus:function(e){this.listQuery.sort="ascending"===e?"status asc":"status desc",this.handleFilter()},resetTemp:function(){this.temp={username:"",real_name:"",email:"",phone:"",password:"",check_password:"",avatar:"",role_id:"0",status:"0"}},popoverHide:function(e,t){""!==e&&(this.temp.role_id=e)},getRoles:function(){var e=this;Object(n["e"])().then((function(t){e.rolesData=t.data}))},getList:function(){var e=this;this.listLoading=!0,Object(l["e"])(this.listQuery).then((function(t){e.list=t.data,e.total=t.total,e.listLoading=!1}))},handleCreate:function(){var e=this;this.defaultCheckedKeys=[],this.resetTemp(),this.dialogStatus="create",this.dialogFormVisible=!0,this.$nextTick((function(){e.$refs["dataForm"].clearValidate()}))},createData:function(){var e=this;this.$refs["dataForm"].validate((function(t){t&&(e.temp.password===e.temp.check_password?e.temp.role_id?Object(l["a"])(e.temp).then((function(t){e.dialogFormVisible=!1,e.$notify({title:t.type,message:t.message,type:t.type,duration:1500}),e.getList()})):e.$message({message:"请选择角色",type:"warning"}):e.$message({message:"输入的密码与确认密码不相符,请确认输入的密码",type:"warning"}))}))},handleUpdate:function(e){var t=this;this.temp=Object.assign({},e),this.defaultCheckedKeys=[this.temp.role_id],this.dialogStatus="update",this.dialogFormVisible=!0,this.$nextTick((function(){t.$refs["dataForm"].clearValidate()}))},updateData:function(){var e=this;this.$refs["dataForm"].validate((function(t){if(t)if(0!==e.temp.role_id){var a=Object.assign({},e.temp);delete a.create_time,delete a.update_time,Object(l["h"])(a).then((function(t){e.dialogFormVisible=!1,e.$notify({title:t.type,message:t.message,type:t.type,duration:1500}),e.getList()}))}else e.$message({message:"请选择角色",type:"warning"})}))},handleDelete:function(e){this.delVisible=!0,this.ids=[],this.ids.push(e.id)},handleDeletes:function(){var e=this.$refs.multipleTable.selection,t=e.length;if(t<1)return this.$message({message:"请选择要删除的数据",type:"warning"}),!1;this.delVisible=!0,this.ids=[];for(var a=0;a<t;a++)this.ids.push(e[a].id)},deleteRow:function(){var e=this;this.delLoading=!0,Object(l["b"])(this.ids).then((function(t){e.$notify({title:t.type,message:t.message,type:t.type,duration:1500}),e.getList()})),this.delLoading=!1,this.delVisible=!1}}},u=d,p=a("2877"),h=Object(p["a"])(u,s,i,!1,null,null,null);t["default"]=h.exports},f927:function(e,t,a){"use strict";var s=a("2bcc"),i=a.n(s);i.a}}]);
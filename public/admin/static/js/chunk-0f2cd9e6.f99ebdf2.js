(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-0f2cd9e6"],{"09f4":function(t,e,i){"use strict";i.d(e,"a",(function(){return l})),Math.easeInOutQuad=function(t,e,i,n){return t/=n/2,t<1?i/2*t*t+e:(t--,-i/2*(t*(t-2)-1)+e)};var n=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(t){window.setTimeout(t,1e3/60)}}();function a(t){document.documentElement.scrollTop=t,document.body.parentNode.scrollTop=t,document.body.scrollTop=t}function s(){return document.documentElement.scrollTop||document.body.parentNode.scrollTop||document.body.scrollTop}function l(t,e,i){var l=s(),r=t-l,o=20,c=0;e="undefined"===typeof e?500:e;var u=function t(){c+=o;var s=Math.easeInOutQuad(c,l,r,e);a(s),c<e?n(t):i&&"function"===typeof i&&i()};u()}},"1f27":function(t,e,i){"use strict";i.d(e,"c",(function(){return l})),i.d(e,"d",(function(){return r})),i.d(e,"a",(function(){return o})),i.d(e,"e",(function(){return c})),i.d(e,"b",(function(){return u}));var n=i("b775"),a=i("4328"),s=i.n(a);function l(t){return Object(n["a"])({url:"/api/menus",method:"get",params:t})}function r(){return Object(n["a"])({url:"/api/menus/enable",method:"get"})}function o(t){return Object(n["a"])({url:"/api/menus",method:"post",headers:{"content-type":"application/x-www-form-urlencoded"},data:s.a.stringify(t)})}function c(t){return Object(n["a"])({url:"/api/menus",method:"put",headers:{"content-type":"application/x-www-form-urlencoded"},data:s.a.stringify(t)})}function u(t){return Object(n["a"])({url:"/api/menus",method:"delete",params:{ids:t}})}},6724:function(t,e,i){"use strict";i("8d41");var n="@@wavesContext";function a(t,e){function i(i){var n=Object.assign({},e.value),a=Object.assign({ele:t,type:"hit",color:"rgba(0, 0, 0, 0.15)"},n),s=a.ele;if(s){s.style.position="relative",s.style.overflow="hidden";var l=s.getBoundingClientRect(),r=s.querySelector(".waves-ripple");switch(r?r.className="waves-ripple":(r=document.createElement("span"),r.className="waves-ripple",r.style.height=r.style.width=Math.max(l.width,l.height)+"px",s.appendChild(r)),a.type){case"center":r.style.top=l.height/2-r.offsetHeight/2+"px",r.style.left=l.width/2-r.offsetWidth/2+"px";break;default:r.style.top=(i.pageY-l.top-r.offsetHeight/2-document.documentElement.scrollTop||document.body.scrollTop)+"px",r.style.left=(i.pageX-l.left-r.offsetWidth/2-document.documentElement.scrollLeft||document.body.scrollLeft)+"px"}return r.style.backgroundColor=a.color,r.className="waves-ripple z-active",!1}}return t[n]?t[n].removeHandle=i:t[n]={removeHandle:i},i}var s={bind:function(t,e){t.addEventListener("click",a(t,e),!1)},update:function(t,e){t.removeEventListener("click",t[n].removeHandle,!1),t.addEventListener("click",a(t,e),!1)},unbind:function(t){t.removeEventListener("click",t[n].removeHandle,!1),t[n]=null,delete t[n]}},l=function(t){t.directive("waves",s)};window.Vue&&(window.waves=s,Vue.use(l)),s.install=l;e["a"]=s},"6c35":function(t,e,i){"use strict";i.r(e);var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"app-container"},[i("div",{staticClass:"filter-container"},[i("el-input",{staticClass:"filter-item",staticStyle:{width:"200px"},attrs:{placeholder:"请输入角色名称",clearable:""},nativeOn:{keyup:function(e){return!e.type.indexOf("key")&&t._k(e.keyCode,"enter",13,e.key,"Enter")?null:t.handleFilter(e)}},model:{value:t.listQuery.name,callback:function(e){t.$set(t.listQuery,"name",e)},expression:"listQuery.name"}}),t._v(" "),i("el-select",{staticClass:"filter-item",attrs:{placeholder:"请选择状态"},model:{value:t.listQuery.status,callback:function(e){t.$set(t.listQuery,"status",e)},expression:"listQuery.status"}},t._l(t.statusOptions,(function(t){return i("el-option",{key:t.value,attrs:{label:t.label,value:t.value}})})),1),t._v(" "),i("el-button",{directives:[{name:"waves",rawName:"v-waves"}],staticClass:"filter-item",attrs:{type:"primary",icon:"el-icon-search"},on:{click:t.handleFilter}},[t._v("搜索")]),t._v(" "),i("el-button",{staticClass:"filter-item",staticStyle:{"margin-left":"10px"},attrs:{type:"primary",icon:"el-icon-edit"},on:{click:t.handleCreate}},[t._v("新增")]),t._v(" "),i("el-button",{directives:[{name:"waves",rawName:"v-waves"}],staticClass:"filter-item",attrs:{loading:t.delLoading,type:"danger",icon:"el-icon-delete"},on:{click:t.handleDeletes}},[t._v("删除")])],1),t._v(" "),i("el-table",{directives:[{name:"loading",rawName:"v-loading",value:t.listLoading,expression:"listLoading"}],key:t.tableKey,ref:"multipleTable",staticStyle:{width:"100%"},attrs:{data:t.list,"row-key":"id","tree-props":{children:"children",hasChildren:"hasChildren"},border:"",fit:"","highlight-current-row":""},on:{"sort-change":t.sortChange}},[i("el-table-column",{attrs:{type:"selection",width:"55"}}),t._v(" "),i("el-table-column",{attrs:{label:"角色名称","min-width":"150px"},scopedSlots:t._u([{key:"default",fn:function(e){var n=e.row;return[i("span",{staticClass:"link-type",on:{click:function(e){return t.handleUpdate(n)}}},[t._v(t._s(n.name))])]}}])}),t._v(" "),i("el-table-column",{attrs:{label:"备注",prop:"path",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[i("span",[t._v(t._s(e.row.remark))])]}}])}),t._v(" "),i("el-table-column",{attrs:{label:"状态",prop:"status",sortable:"custom",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return["0"==e.row.status?i("el-tag",{attrs:{type:"success"}},[t._v("正常")]):t._e(),t._v(" "),"9"==e.row.status?i("el-tag",{attrs:{type:"danger"}},[t._v("停用")]):t._e()]}}])}),t._v(" "),i("el-table-column",{attrs:{label:"操作",align:"center","class-name":"small-padding fixed-width"},scopedSlots:t._u([{key:"default",fn:function(e){var n=e.row;return[i("el-button",{attrs:{type:"primary",size:"mini"},on:{click:function(e){return t.handleUpdate(n)}}},[t._v("编辑")]),t._v(" "),i("el-button",{attrs:{type:"danger",size:"mini"},on:{click:function(e){return t.handleDelete(n)}}},[t._v("删除")])]}}])})],1),t._v(" "),i("pagination",{directives:[{name:"show",rawName:"v-show",value:t.total>0,expression:"total>0"}],attrs:{total:t.total,page:t.listQuery.page,limit:t.listQuery.limit},on:{"update:page":function(e){return t.$set(t.listQuery,"page",e)},"update:limit":function(e){return t.$set(t.listQuery,"limit",e)},pagination:t.getList}}),t._v(" "),i("el-dialog",{attrs:{title:"提示",visible:t.delVisible,"close-on-click-modal":!1,width:"300px",center:""},on:{"update:visible":function(e){t.delVisible=e}}},[i("span",[t._v("是否确定删除？")]),t._v(" "),i("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[i("el-button",{on:{click:function(e){t.delVisible=!1}}},[t._v("取 消")]),t._v(" "),i("el-button",{attrs:{type:"primary"},on:{click:t.deleteRow}},[t._v("确 定")])],1)]),t._v(" "),i("el-dialog",{attrs:{title:t.textMap[t.dialogStatus],visible:t.dialogFormVisible,"close-on-click-modal":!1},on:{"update:visible":function(e){t.dialogFormVisible=e}}},[i("el-form",{ref:"dataForm",staticStyle:{width:"400px","margin-left":"50px"},attrs:{rules:t.rules,model:t.temp,"label-position":"left","label-width":"120px"}},[i("el-form-item",{attrs:{label:"角色名称",prop:"name"}},[i("el-input",{attrs:{"el-input":""},model:{value:t.temp.name,callback:function(e){t.$set(t.temp,"name",e)},expression:"temp.name"}})],1),t._v(" "),i("el-form-item",{attrs:{label:"备注"}},[i("el-input",{staticClass:"el-input",model:{value:t.temp.remark,callback:function(e){t.$set(t.temp,"remark",e)},expression:"temp.remark"}})],1),t._v(" "),i("el-form-item",{attrs:{label:"权限"}},[i("el-tree",{ref:"tree",attrs:{"node-key":"id",props:t.props,data:t.menusData,"check-strictly":t.checkStrictly,"show-checkbox":"","default-expand-all":""},on:{"check-change":t.handleCheckChange}})],1),t._v(" "),i("el-form-item",{attrs:{label:"状态"}},[i("el-select",{staticClass:"el-input",attrs:{placeholder:"请选择"},model:{value:t.temp.status,callback:function(e){t.$set(t.temp,"status",e)},expression:"temp.status"}},t._l(t.statusOptions,(function(t){return i("el-option",{key:t.value,attrs:{label:t.label,value:t.value}})})),1)],1)],1),t._v(" "),i("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[i("el-button",{on:{click:function(e){t.dialogFormVisible=!1}}},[t._v("取消")]),t._v(" "),i("el-button",{attrs:{type:"primary"},on:{click:function(e){"create"===t.dialogStatus?t.createData():t.updateData()}}},[t._v("确认")])],1)],1)],1)},a=[],s=i("cc5e"),l=i("1f27"),r=i("6724"),o=i("333d"),c={name:"Role",components:{Pagination:o["a"]},directives:{waves:r["a"]},data:function(){return{tableKey:0,list:null,total:0,listLoading:!0,listQuery:{page:1,limit:20,name:"",sort:"",status:"0"},delLoading:!1,delVisible:!1,ids:[],statusOptions:[{value:"",label:"全部"},{value:"0",label:"正常"},{value:"9",label:"停用"}],textMap:{update:"编辑",create:"新增"},dialogFormVisible:!1,dialogStatus:"",menusData:null,checkStrictly:!1,props:{label:"name",children:"children"},temp:{id:"",name:"",remark:"",rule_ids:[],status:"0"},rules:{name:[{required:!0,message:"请输入角色名称",trigger:"blur"}]}}},created:function(){this.getList()},methods:{handleFilter:function(){console.log("开始搜索"),this.listQuery.page=1,this.getList()},sortChange:function(t){var e=t.prop,i=t.order;"sort"===e&&this.sortBySort(i),"status"===e&&this.sortByStatus(i)},sortByStatus:function(t){this.listQuery.sort="ascending"===t?"status asc":"status desc",this.handleFilter()},resetTemp:function(){this.temp={id:"",name:"",remark:"",rule_ids:[],status:"0"}},getMenus:function(){var t=this;Object(l["d"])().then((function(e){t.menusData=e.data}))},getRoleInfo:function(){var t=this;this.checkStrictly=!0,""!==this.temp.id?Object(s["d"])(this.temp.id).then((function(e){t.$refs.tree.setCheckedKeys(e.data.menu_ids),t.checkStrictly=!1})):this.checkStrictly=!1},handleCheckChange:function(t,e,i){var n=this.$refs.tree.getHalfCheckedNodes(),a=this.$refs.tree.getCheckedNodes(),s=a.concat(n),l=s.length;this.temp.rule_ids=[];for(var r=0;r<l;r++)this.temp.rule_ids.push(s[r].id)},getList:function(){var t=this;console.log("调用列表接口"),this.listLoading=!0,Object(s["c"])(this.listQuery).then((function(e){t.list=e.data,t.total=e.total,t.listLoading=!1}))},handleCreate:function(){var t=this;this.getMenus(),this.defaultCheckedKeys=[],this.resetTemp(),this.dialogStatus="create",this.dialogFormVisible=!0,this.$nextTick((function(){t.$refs["dataForm"].clearValidate()}))},createData:function(){var t=this;this.$refs["dataForm"].validate((function(e){if(!e)return!1;Object(s["a"])(t.temp).then((function(e){t.dialogFormVisible=!1,t.$notify({title:e.type,message:e.message,type:e.type,duration:1500}),t.getList()}))}))},handleUpdate:function(t){var e=this;this.getMenus(),this.temp=Object.assign({},t),this.getRoleInfo(),this.dialogStatus="update",this.dialogFormVisible=!0,this.$nextTick((function(){e.$refs["dataForm"].clearValidate()}))},updateData:function(){var t=this;this.$refs["dataForm"].validate((function(e){if(!e)return!1;Object(s["f"])(t.temp).then((function(e){t.dialogFormVisible=!1,t.$notify({title:e.type,message:e.message,type:e.type,duration:1500}),t.getList()}))}))},handleDelete:function(t){this.delVisible=!0,this.ids=[],this.ids.push(t.id)},handleDeletes:function(){var t=this.$refs.multipleTable.selection,e=t.length;if(e<1)return this.$message({message:"请选择要删除的数据",type:"warning"}),!1;this.delVisible=!0,this.ids=[];for(var i=0;i<e;i++)this.ids.push(t[i].id)},deleteRow:function(){var t=this;this.delLoading=!0,Object(s["b"])(this.ids).then((function(e){t.$notify({title:e.type,message:e.message,type:e.type,duration:1500}),t.getList()})),this.delLoading=!1,this.delVisible=!1}}},u=c,d=i("2877"),p=Object(d["a"])(u,n,a,!1,null,null,null);e["default"]=p.exports},"8d41":function(t,e,i){},cc5e:function(t,e,i){"use strict";i.d(e,"c",(function(){return l})),i.d(e,"e",(function(){return r})),i.d(e,"d",(function(){return o})),i.d(e,"a",(function(){return c})),i.d(e,"f",(function(){return u})),i.d(e,"b",(function(){return d}));var n=i("b775"),a=i("4328"),s=i.n(a);function l(t){return Object(n["a"])({url:"/api/roles",method:"get",params:t})}function r(){return Object(n["a"])({url:"/api/roles/enable",method:"get"})}function o(t){return Object(n["a"])({url:"/api/role/info",method:"get",params:{id:t}})}function c(t){return Object(n["a"])({url:"/api/roles",method:"post",headers:{"content-type":"application/x-www-form-urlencoded"},data:s.a.stringify(t)})}function u(t){return Object(n["a"])({url:"/api/roles",method:"put",headers:{"content-type":"application/x-www-form-urlencoded"},data:s.a.stringify(t)})}function d(t){return Object(n["a"])({url:"/api/roles",method:"delete",params:{ids:t}})}}}]);
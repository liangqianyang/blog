(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-90ef00ce","chunk-7edcda99"],{"09f4":function(e,t,n){"use strict";n.d(t,"a",(function(){return l})),Math.easeInOutQuad=function(e,t,n,i){return e/=i/2,e<1?n/2*e*e+t:(e--,-n/2*(e*(e-2)-1)+t)};var i=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(e){window.setTimeout(e,1e3/60)}}();function a(e){document.documentElement.scrollTop=e,document.body.parentNode.scrollTop=e,document.body.scrollTop=e}function s(){return document.documentElement.scrollTop||document.body.parentNode.scrollTop||document.body.scrollTop}function l(e,t,n){var l=s(),r=e-l,o=20,c=0;t="undefined"===typeof t?500:t;var u=function e(){c+=o;var s=Math.easeInOutQuad(c,l,r,t);a(s),c<t?i(e):n&&"function"===typeof n&&n()};u()}},"1f27":function(e,t,n){"use strict";n.d(t,"d",(function(){return l})),n.d(t,"e",(function(){return r})),n.d(t,"a",(function(){return o})),n.d(t,"b",(function(){return c})),n.d(t,"f",(function(){return u})),n.d(t,"c",(function(){return d}));var i=n("b775"),a=n("4328"),s=n.n(a);function l(e){return Object(i["a"])({url:"/api/menu",method:"get",params:e})}function r(){return Object(i["a"])({url:"/api/menu/enable",method:"get"})}function o(){return Object(i["a"])({url:"/api/menu/authMenus",method:"get"})}function c(e){return Object(i["a"])({url:"/api/menu",method:"post",headers:{"content-type":"application/x-www-form-urlencoded"},data:s.a.stringify(e)})}function u(e){return Object(i["a"])({url:"/api/menu",method:"put",headers:{"content-type":"application/x-www-form-urlencoded"},data:s.a.stringify(e)})}function d(e){return Object(i["a"])({url:"/api/menu",method:"delete",params:{ids:e}})}},6127:function(e,t,n){"use strict";n.r(t);var i=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("el-dialog",{attrs:{title:e.temp.id?"编辑":"新增","close-on-click-modal":!1,visible:e.dialogFormVisible},on:{"update:visible":function(t){e.dialogFormVisible=t}}},[n("el-form",{ref:"dataForm",staticStyle:{width:"60%","margin-left":"50px"},attrs:{rules:e.rules,model:e.temp,"label-position":"left","label-width":"120px"}},[n("el-form-item",{attrs:{label:"角色名称",prop:"name"}},[n("el-input",{attrs:{"el-input":""},model:{value:e.temp.name,callback:function(t){e.$set(e.temp,"name",t)},expression:"temp.name"}})],1),e._v(" "),n("el-form-item",{attrs:{label:"备注"}},[n("el-input",{staticClass:"el-input",model:{value:e.temp.remark,callback:function(t){e.$set(e.temp,"remark",t)},expression:"temp.remark"}})],1),e._v(" "),n("el-form-item",{attrs:{label:"权限"}},[n("el-tree",{ref:"tree",attrs:{"node-key":"id",props:e.props,data:e.menusData,"check-strictly":e.checkStrictly,"show-checkbox":""},on:{"check-change":e.handleCheckChange}})],1),e._v(" "),n("el-form-item",{attrs:{label:"状态"}},[n("el-select",{staticClass:"el-input",attrs:{placeholder:"请选择"},model:{value:e.temp.status,callback:function(t){e.$set(e.temp,"status",t)},expression:"temp.status"}},e._l(e.statusOptions,(function(e){return n("el-option",{key:e.value,attrs:{label:e.label,value:e.value}})})),1)],1)],1),e._v(" "),n("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[n("el-button",{on:{click:function(t){e.dialogFormVisible=!1}}},[e._v("取消")]),e._v(" "),n("el-button",{attrs:{type:"primary"},on:{click:function(t){"create"===e.dialogStatus?e.createData():e.updateData()}}},[e._v("确认")])],1)],1)},a=[],s=(n("ac6a"),n("456d"),n("cc5e")),l={components:{},data:function(){return{dialogStatus:"",dialogFormVisible:!1,menusData:null,checkStrictly:!1,props:{label:"name",children:"children"},statusOptions:[{value:"0",label:"正常"},{value:"9",label:"停用"}],temp:{id:"",name:"",remark:"",rule_ids:[],status:"0"},rules:{name:[{required:!0,message:"请输入角色名称",trigger:"blur"}]}}},created:function(){},methods:{resetTemp:function(){this.temp={id:"",name:"",remark:"",rule_ids:[],status:"0"}},init:function(e,t){this.dialogFormVisible=!0,this.menusData=t,this.imageUrl="",0!==Object.keys(e).length?(this.dialogStatus="update",this.temp=Object.assign({},e),this.getRoleInfo()):this.dialogStatus="create"},getRoleInfo:function(){var e=this;this.checkStrictly=!0,""!==this.temp.id?Object(s["d"])(this.temp.id).then((function(t){e.$refs.tree.setCheckedKeys(t.data.menu_ids),e.checkStrictly=!1})):this.checkStrictly=!1},handleCheckChange:function(e,t,n){var i=this.$refs.tree.getHalfCheckedNodes(),a=this.$refs.tree.getCheckedNodes(),s=a.concat(i),l=s.length;this.temp.rule_ids=[];for(var r=0;r<l;r++)this.temp.rule_ids.push(s[r].id)},createData:function(){var e=this;this.$refs["dataForm"].validate((function(t){if(!t)return!1;0!==e.temp.rule_ids.length?Object(s["a"])(e.temp).then((function(t){e.dialogFormVisible=!1,e.$notify({title:t.type,message:t.message,type:t.type,duration:1500,onClose:function(){e.visible=!1,e.$emit("refreshDataList")}})})):e.$message({message:"请选择权限",type:"warning"})}))},updateData:function(){var e=this;this.$refs["dataForm"].validate((function(t){if(!t)return!1;0!==e.temp.rule_ids.length?Object(s["f"])(e.temp).then((function(t){e.dialogFormVisible=!1,e.$notify({title:t.type,message:t.message,type:t.type,duration:1500,onClose:function(){e.visible=!1,e.$emit("refreshDataList")}})})):e.$message({message:"请选择权限",type:"warning"})}))}}},r=l,o=n("2877"),c=Object(o["a"])(r,i,a,!1,null,null,null);t["default"]=c.exports},6724:function(e,t,n){"use strict";n("8d41");var i="@@wavesContext";function a(e,t){function n(n){var i=Object.assign({},t.value),a=Object.assign({ele:e,type:"hit",color:"rgba(0, 0, 0, 0.15)"},i),s=a.ele;if(s){s.style.position="relative",s.style.overflow="hidden";var l=s.getBoundingClientRect(),r=s.querySelector(".waves-ripple");switch(r?r.className="waves-ripple":(r=document.createElement("span"),r.className="waves-ripple",r.style.height=r.style.width=Math.max(l.width,l.height)+"px",s.appendChild(r)),a.type){case"center":r.style.top=l.height/2-r.offsetHeight/2+"px",r.style.left=l.width/2-r.offsetWidth/2+"px";break;default:r.style.top=(n.pageY-l.top-r.offsetHeight/2-document.documentElement.scrollTop||document.body.scrollTop)+"px",r.style.left=(n.pageX-l.left-r.offsetWidth/2-document.documentElement.scrollLeft||document.body.scrollLeft)+"px"}return r.style.backgroundColor=a.color,r.className="waves-ripple z-active",!1}}return e[i]?e[i].removeHandle=n:e[i]={removeHandle:n},n}var s={bind:function(e,t){e.addEventListener("click",a(e,t),!1)},update:function(e,t){e.removeEventListener("click",e[i].removeHandle,!1),e.addEventListener("click",a(e,t),!1)},unbind:function(e){e.removeEventListener("click",e[i].removeHandle,!1),e[i]=null,delete e[i]}},l=function(e){e.directive("waves",s)};window.Vue&&(window.waves=s,Vue.use(l)),s.install=l;t["a"]=s},"6c35":function(e,t,n){"use strict";n.r(t);var i=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"app-container"},[n("div",{staticClass:"filter-container"},[n("el-input",{staticClass:"filter-item",staticStyle:{width:"200px"},attrs:{placeholder:"请输入角色名称",clearable:""},nativeOn:{keyup:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"enter",13,t.key,"Enter")?null:e.handleFilter(t)}},model:{value:e.listQuery.name,callback:function(t){e.$set(e.listQuery,"name",t)},expression:"listQuery.name"}}),e._v(" "),n("el-button",{directives:[{name:"waves",rawName:"v-waves"}],staticClass:"filter-item",attrs:{type:"primary",icon:"el-icon-search"},on:{click:e.handleFilter}},[e._v("搜索")]),e._v(" "),n("el-button",{staticClass:"filter-item",staticStyle:{"margin-left":"10px"},attrs:{type:"primary",icon:"el-icon-edit"},on:{click:function(t){return e.handleCreate({})}}},[e._v("新增")]),e._v(" "),n("el-button",{directives:[{name:"waves",rawName:"v-waves"}],staticClass:"filter-item",attrs:{loading:e.delLoading,type:"danger",icon:"el-icon-delete"},on:{click:e.handleDeletes}},[e._v("删除")])],1),e._v(" "),n("el-table",{directives:[{name:"loading",rawName:"v-loading",value:e.listLoading,expression:"listLoading"}],key:e.tableKey,ref:"multipleTable",staticStyle:{width:"100%"},attrs:{data:e.list,"row-key":"id","tree-props":{children:"children",hasChildren:"hasChildren"},border:"",fit:"","highlight-current-row":""},on:{"sort-change":e.sortChange}},[n("el-table-column",{attrs:{type:"selection",width:"55"}}),e._v(" "),n("el-table-column",{attrs:{label:"角色名称","min-width":"150px"},scopedSlots:e._u([{key:"default",fn:function(t){var i=t.row;return[n("span",{staticClass:"link-type",on:{click:function(t){return e.handleUpdate(i)}}},[e._v(e._s(i.name))])]}}])}),e._v(" "),n("el-table-column",{attrs:{label:"备注",prop:"path",align:"center"},scopedSlots:e._u([{key:"default",fn:function(t){return[n("span",[e._v(e._s(t.row.remark))])]}}])}),e._v(" "),n("el-table-column",{attrs:{label:"操作",align:"center","class-name":"small-padding fixed-width"},scopedSlots:e._u([{key:"default",fn:function(t){var i=t.row;return[n("el-button",{attrs:{type:"primary",size:"mini"},on:{click:function(t){return e.handleUpdate(i)}}},[e._v("编辑")]),e._v(" "),n("el-button",{attrs:{type:"danger",size:"mini"},on:{click:function(t){return e.handleDelete(i)}}},[e._v("删除")])]}}])})],1),e._v(" "),n("pagination",{directives:[{name:"show",rawName:"v-show",value:e.total>0,expression:"total>0"}],attrs:{total:e.total,page:e.listQuery.page,limit:e.listQuery.limit},on:{"update:page":function(t){return e.$set(e.listQuery,"page",t)},"update:limit":function(t){return e.$set(e.listQuery,"limit",t)},pagination:e.getList}}),e._v(" "),n("el-dialog",{attrs:{title:"提示",visible:e.delVisible,"close-on-click-modal":!1,width:"300px",center:""},on:{"update:visible":function(t){e.delVisible=t}}},[n("span",[e._v("是否确定删除？")]),e._v(" "),n("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[n("el-button",{on:{click:function(t){e.delVisible=!1}}},[e._v("取 消")]),e._v(" "),n("el-button",{attrs:{type:"primary"},on:{click:e.deleteRow}},[e._v("确 定")])],1)]),e._v(" "),e.addOrUpdateVisible?n("add-or-update",{ref:"addOrUpdate",on:{refreshDataList:e.getList}}):e._e()],1)},a=[],s=n("cc5e"),l=n("1f27"),r=n("6724"),o=n("333d"),c=n("6127"),u={name:"Role",components:{Pagination:o["a"],AddOrUpdate:c["default"]},directives:{waves:r["a"]},data:function(){return{tableKey:0,list:null,total:0,listLoading:!0,listQuery:{page:1,limit:20,name:"",sort:"",status:"0"},delLoading:!1,delVisible:!1,addOrUpdateVisible:!1,ids:[],statusOptions:[{value:"",label:"全部"},{value:"0",label:"正常"},{value:"9",label:"停用"}],dialogFormVisible:!1,dialogStatus:"",menusData:null}},created:function(){this.getList(),this.getMenus()},methods:{handleFilter:function(){this.listQuery.page=1,this.getList()},sortChange:function(e){var t=e.prop,n=e.order;"sort"===t&&this.sortBySort(n),"status"===t&&this.sortByStatus(n)},sortByStatus:function(e){this.listQuery.sort="ascending"===e?"status asc":"status desc",this.handleFilter()},getMenus:function(){var e=this;Object(l["e"])().then((function(t){e.menusData=t.data}))},getList:function(){var e=this;this.listLoading=!0,Object(s["c"])(this.listQuery).then((function(t){e.list=t.data,e.total=t.total,e.listLoading=!1}))},handleCreate:function(e){var t=this;this.addOrUpdateVisible=!0,this.$nextTick((function(){t.$refs.addOrUpdate.resetTemp(),t.$refs.addOrUpdate.init(e,t.menusData)}))},handleUpdate:function(e){var t=this;this.addOrUpdateVisible=!0,this.$nextTick((function(){t.$refs.addOrUpdate.resetTemp(),t.$refs.addOrUpdate.init(e,t.menusData)}))},handleDelete:function(e){this.delVisible=!0,this.ids=[],this.ids.push(e.id)},handleDeletes:function(){var e=this.$refs.multipleTable.selection,t=e.length;if(t<1)return this.$message({message:"请选择要删除的数据",type:"warning"}),!1;this.delVisible=!0,this.ids=[];for(var n=0;n<t;n++)this.ids.push(e[n].id)},deleteRow:function(){var e=this;this.delLoading=!0,Object(s["b"])(this.ids).then((function(t){e.$notify({title:t.type,message:t.message,type:t.type,duration:1500}),e.getList()})),this.delLoading=!1,this.delVisible=!1}}},d=u,p=n("2877"),m=Object(p["a"])(d,i,a,!1,null,null,null);t["default"]=m.exports},"8d41":function(e,t,n){},cc5e:function(e,t,n){"use strict";n.d(t,"c",(function(){return l})),n.d(t,"e",(function(){return r})),n.d(t,"d",(function(){return o})),n.d(t,"a",(function(){return c})),n.d(t,"f",(function(){return u})),n.d(t,"b",(function(){return d}));var i=n("b775"),a=n("4328"),s=n.n(a);function l(e){return Object(i["a"])({url:"/api/role",method:"get",params:e})}function r(){return Object(i["a"])({url:"/api/role/enable",method:"get"})}function o(e){return Object(i["a"])({url:"/api/role/info",method:"get",params:{id:e}})}function c(e){return Object(i["a"])({url:"/api/role",method:"post",headers:{"content-type":"application/x-www-form-urlencoded"},data:s.a.stringify(e)})}function u(e){return Object(i["a"])({url:"/api/role",method:"put",headers:{"content-type":"application/x-www-form-urlencoded"},data:s.a.stringify(e)})}function d(e){return Object(i["a"])({url:"/api/role",method:"delete",params:{ids:e}})}}}]);
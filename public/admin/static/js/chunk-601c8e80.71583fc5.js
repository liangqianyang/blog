(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-601c8e80","chunk-bde6a162"],{"09f4":function(t,e,i){"use strict";i.d(e,"a",(function(){return s})),Math.easeInOutQuad=function(t,e,i,a){return t/=a/2,t<1?i/2*t*t+e:(t--,-i/2*(t*(t-2)-1)+e)};var a=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(t){window.setTimeout(t,1e3/60)}}();function n(t){document.documentElement.scrollTop=t,document.body.parentNode.scrollTop=t,document.body.scrollTop=t}function l(){return document.documentElement.scrollTop||document.body.parentNode.scrollTop||document.body.scrollTop}function s(t,e,i){var s=l(),o=t-s,r=20,d=0;e="undefined"===typeof e?500:e;var c=function t(){d+=r;var l=Math.easeInOutQuad(d,s,o,e);n(l),d<e?a(t):i&&"function"===typeof i&&i()};c()}},"126e":function(t,e,i){"use strict";var a=i("f459"),n=i.n(a);n.a},"49de":function(t,e,i){"use strict";i.d(e,"c",(function(){return s})),i.d(e,"a",(function(){return o})),i.d(e,"d",(function(){return r})),i.d(e,"b",(function(){return d}));var a=i("b775"),n=i("4328"),l=i.n(n);function s(t){return Object(a["a"])({url:"/api/material",method:"get",params:t})}function o(t){return Object(a["a"])({url:"/api/material",method:"post",headers:{"content-type":"application/x-www-form-urlencoded"},data:l.a.stringify(t)})}function r(t){return Object(a["a"])({url:"/api/material",method:"put",headers:{"content-type":"application/x-www-form-urlencoded"},data:l.a.stringify(t)})}function d(t){return Object(a["a"])({url:"/api/material",method:"delete",params:{ids:t}})}},"63bb":function(t,e,i){"use strict";i.r(e);var a=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("el-dialog",{attrs:{title:t.temp.id?"编辑":"新增","close-on-click-modal":!1,visible:t.dialogFormVisible},on:{"update:visible":function(e){t.dialogFormVisible=e}}},[i("el-form",{ref:"dataForm",staticStyle:{width:"400px","margin-left":"50px"},attrs:{rules:t.rules,model:t.temp,"label-position":"left","label-width":"120px"}},[i("el-form-item",{attrs:{label:"标题",prop:"title"}},[i("el-input",{model:{value:t.temp.title,callback:function(e){t.$set(t.temp,"title",e)},expression:"temp.title"}})],1),t._v(" "),i("el-form-item",{attrs:{label:"素材图",prop:"url"}},[i("el-upload",{staticClass:"material-uploader",attrs:{action:t.uploadAction,"show-file-list":!1,"on-success":t.handleAvatarSuccess}},[t.temp.url?i("img",{staticClass:"material",attrs:{src:t.temp.url}}):i("i",{staticClass:"el-icon-plus material-uploader-icon"})])],1)],1),t._v(" "),i("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[i("el-button",{on:{click:function(e){t.dialogFormVisible=!1}}},[t._v("取消")]),t._v(" "),i("el-button",{attrs:{type:"primary"},on:{click:function(e){"create"===t.dialogStatus?t.createData():t.updateData()}}},[t._v("确认")])],1)],1)},n=[],l=(i("ac6a"),i("456d"),i("49de")),s={components:{},data:function(){return{dialogStatus:"",dataForm:{},dialogFormVisible:!1,uploadAction:"http://www.lqy-comic.com/api/material/upload",imageUrl:"",temp:{id:"",title:"",url:"",width:"",height:"",type:""},rules:{title:[{required:!0,message:"请输入标题名称",trigger:"blur"}]}}},created:function(){},methods:{resetTemp:function(){this.temp={id:"",title:"",url:"",width:"",height:"",type:""}},init:function(t){this.dialogFormVisible=!0,0!==Object.keys(t).length?(this.dialogStatus="update",this.temp=Object.assign({},t)):this.dialogStatus="create"},handleAvatarSuccess:function(t,e){this.temp.url=t.file,this.temp.width=t.width,this.temp.height=t.height,this.temp.type=t.type,this.imageUrl=URL.createObjectURL(e.raw)},createData:function(){var t=this;this.$refs["dataForm"].validate((function(e){e&&Object(l["a"])(t.temp).then((function(e){t.dialogFormVisible=!1,t.$notify({title:e.type,message:e.message,type:e.type,duration:1500,onClose:function(){t.visible=!1,t.$emit("refreshDataList")}})}))}))},updateData:function(){var t=this;this.$refs["dataForm"].validate((function(e){e&&Object(l["d"])(t.temp).then((function(e){t.dialogFormVisible=!1,t.$notify({title:e.type,message:e.message,type:e.type,duration:1500,onClose:function(){t.visible=!1,t.$emit("refreshDataList")}})}))}))}}},o=s,r=(i("126e"),i("2877")),d=Object(r["a"])(o,a,n,!1,null,null,null);e["default"]=d.exports},6724:function(t,e,i){"use strict";i("8d41");var a="@@wavesContext";function n(t,e){function i(i){var a=Object.assign({},e.value),n=Object.assign({ele:t,type:"hit",color:"rgba(0, 0, 0, 0.15)"},a),l=n.ele;if(l){l.style.position="relative",l.style.overflow="hidden";var s=l.getBoundingClientRect(),o=l.querySelector(".waves-ripple");switch(o?o.className="waves-ripple":(o=document.createElement("span"),o.className="waves-ripple",o.style.height=o.style.width=Math.max(s.width,s.height)+"px",l.appendChild(o)),n.type){case"center":o.style.top=s.height/2-o.offsetHeight/2+"px",o.style.left=s.width/2-o.offsetWidth/2+"px";break;default:o.style.top=(i.pageY-s.top-o.offsetHeight/2-document.documentElement.scrollTop||document.body.scrollTop)+"px",o.style.left=(i.pageX-s.left-o.offsetWidth/2-document.documentElement.scrollLeft||document.body.scrollLeft)+"px"}return o.style.backgroundColor=n.color,o.className="waves-ripple z-active",!1}}return t[a]?t[a].removeHandle=i:t[a]={removeHandle:i},i}var l={bind:function(t,e){t.addEventListener("click",n(t,e),!1)},update:function(t,e){t.removeEventListener("click",t[a].removeHandle,!1),t.addEventListener("click",n(t,e),!1)},unbind:function(t){t.removeEventListener("click",t[a].removeHandle,!1),t[a]=null,delete t[a]}},s=function(t){t.directive("waves",l)};window.Vue&&(window.waves=l,Vue.use(s)),l.install=s;e["a"]=l},"8d41":function(t,e,i){},e9f7:function(t,e,i){"use strict";i.r(e);var a=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"app-container"},[i("div",{staticClass:"filter-container"},[i("el-input",{staticClass:"filter-item",staticStyle:{width:"200px"},attrs:{placeholder:"请输入标题",clearable:""},nativeOn:{keyup:function(e){return!e.type.indexOf("key")&&t._k(e.keyCode,"enter",13,e.key,"Enter")?null:t.handleFilter(e)}},model:{value:t.listQuery.title,callback:function(e){t.$set(t.listQuery,"title",e)},expression:"listQuery.title"}}),t._v(" "),i("el-button",{directives:[{name:"waves",rawName:"v-waves"}],staticClass:"filter-item",attrs:{type:"primary",icon:"el-icon-search"},on:{click:t.handleFilter}},[t._v("搜索")]),t._v(" "),i("el-button",{staticClass:"filter-item",staticStyle:{"margin-left":"10px"},attrs:{type:"primary",icon:"el-icon-edit"},on:{click:function(e){return t.handleCreate({})}}},[t._v("新增")]),t._v(" "),i("el-button",{directives:[{name:"waves",rawName:"v-waves"}],staticClass:"filter-item",attrs:{loading:t.delLoading,type:"danger",icon:"el-icon-delete"},on:{click:t.handleDeletes}},[t._v("删除")])],1),t._v(" "),i("el-table",{directives:[{name:"loading",rawName:"v-loading",value:t.listLoading,expression:"listLoading"}],key:t.tableKey,ref:"multipleTable",staticStyle:{width:"100%"},attrs:{data:t.list,"row-key":"id",border:"",fit:"","highlight-current-row":""}},[i("el-table-column",{attrs:{type:"selection",width:"55"}}),t._v(" "),i("el-table-column",{attrs:{label:"标题","min-width":"150px"},scopedSlots:t._u([{key:"default",fn:function(e){return[i("span",[t._v(t._s(e.row.title))])]}}])}),t._v(" "),i("el-table-column",{attrs:{label:"素材图片",prop:"image_url",align:"center","min-width":"320px"},scopedSlots:t._u([{key:"default",fn:function(t){return[i("img",{attrs:{src:t.row.url,width:"300"}})]}}])}),t._v(" "),i("el-table-column",{attrs:{label:"类型","min-width":"150px"},scopedSlots:t._u([{key:"default",fn:function(e){return[i("span",[t._v(t._s(e.row.type))])]}}])}),t._v(" "),i("el-table-column",{attrs:{label:"宽度","min-width":"80px"},scopedSlots:t._u([{key:"default",fn:function(e){return[i("span",[t._v(t._s(e.row.width))])]}}])}),t._v(" "),i("el-table-column",{attrs:{label:"高度","min-width":"80px"},scopedSlots:t._u([{key:"default",fn:function(e){return[i("span",[t._v(t._s(e.row.height))])]}}])}),t._v(" "),i("el-table-column",{attrs:{label:"创建时间","min-width":"150px"},scopedSlots:t._u([{key:"default",fn:function(e){return[i("span",[t._v(t._s(e.row.created_at))])]}}])}),t._v(" "),i("el-table-column",{attrs:{label:"操作",align:"center","class-name":"small-padding fixed-width","min-width":"100px"},scopedSlots:t._u([{key:"default",fn:function(e){var a=e.row;return[i("el-button",{attrs:{type:"primary",size:"mini"},on:{click:function(e){return t.handleUpdate(a)}}},[t._v("编辑")]),t._v(" "),i("el-button",{attrs:{type:"danger",size:"mini"},on:{click:function(e){return t.handleDelete(a)}}},[t._v("删除")])]}}])})],1),t._v(" "),i("pagination",{directives:[{name:"show",rawName:"v-show",value:t.total>0,expression:"total>0"}],attrs:{total:t.total,page:t.listQuery.page,limit:t.listQuery.limit},on:{"update:page":function(e){return t.$set(t.listQuery,"page",e)},"update:limit":function(e){return t.$set(t.listQuery,"limit",e)},pagination:t.getList}}),t._v(" "),i("el-dialog",{attrs:{title:"提示",visible:t.delVisible,"close-on-click-modal":!1,width:"300px",center:""},on:{"update:visible":function(e){t.delVisible=e}}},[i("span",[t._v("是否确定删除？")]),t._v(" "),i("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[i("el-button",{on:{click:function(e){t.delVisible=!1}}},[t._v("取 消")]),t._v(" "),i("el-button",{attrs:{type:"primary"},on:{click:t.deleteRow}},[t._v("确 定")])],1)]),t._v(" "),t.addOrUpdateVisible?i("add-or-update",{ref:"addOrUpdate",on:{refreshDataList:t.getList}}):t._e()],1)},n=[],l=i("63bb"),s=i("49de"),o=i("6724"),r=i("333d"),d={name:"Material",components:{AddOrUpdate:l["default"],Pagination:r["a"]},directives:{waves:o["a"]},data:function(){return{tableKey:0,list:null,listLoading:!0,total:0,listQuery:{title:""},categotyData:null,delVisible:!1,ids:[],delLoading:!1,addOrUpdateVisible:!1}},created:function(){this.getList()},methods:{handleFilter:function(){this.getList()},getList:function(){var t=this;this.listLoading=!0,Object(s["c"])(this.listQuery).then((function(e){t.list=e.data,t.total=e.total,t.listLoading=!1}))},handleCreate:function(t){var e=this;this.addOrUpdateVisible=!0,this.$nextTick((function(){e.$refs.addOrUpdate.resetTemp(),e.$refs.addOrUpdate.init(t)}))},handleUpdate:function(t){var e=this;this.addOrUpdateVisible=!0,this.$nextTick((function(){e.$refs.addOrUpdate.resetTemp(),e.$refs.addOrUpdate.init(t)}))},handleDelete:function(t){this.delVisible=!0,this.ids=[],this.ids.push(t.id)},handleDeletes:function(){var t=this.$refs.multipleTable.selection,e=t.length;if(e<1)return this.$message({message:"请选择要删除的数据",type:"warning"}),!1;this.delVisible=!0,this.ids=[];for(var i=0;i<e;i++)this.ids.push(t[i].id)},deleteRow:function(){var t=this;this.delLoading=!0,Object(s["b"])(this.ids).then((function(e){t.$notify({title:e.type,message:e.message,type:e.type,duration:1500}),t.getList()})),this.delLoading=!1,this.delVisible=!1}}},c=d,u=i("2877"),p=Object(u["a"])(c,a,n,!1,null,null,null);e["default"]=p.exports},f459:function(t,e,i){}}]);
(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-244f810e","chunk-621e3f4b"],{"033a":function(e,t,a){"use strict";var i=a("1d27"),l=a.n(i);l.a},"0532":function(e,t,a){"use strict";a.r(t);var i=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("el-dialog",{attrs:{title:e.temp.id?"编辑":"新增","close-on-click-modal":!1,visible:e.dialogFormVisible},on:{"update:visible":function(t){e.dialogFormVisible=t}}},[a("el-form",{ref:"dataForm",staticStyle:{width:"400px","margin-left":"50px"},attrs:{rules:e.rules,model:e.temp,"label-position":"left","label-width":"120px"}},[a("el-form-item",{attrs:{label:"父级栏目",prop:"parent_id"}},[a("tree-select",{attrs:{data:e.categotyData,"default-props":e.defaultProps,"node-key":e.nodeKey,"checked-keys":e.defaultCheckedKeys},on:{popoverHide:e.popoverHide}})],1),e._v(" "),a("el-form-item",{attrs:{label:"栏目名称",prop:"name"}},[a("el-input",{model:{value:e.temp.name,callback:function(t){e.$set(e.temp,"name",t)},expression:"temp.name"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"栏目简介",prop:"summary"}},[a("el-input",{model:{value:e.temp.summary,callback:function(t){e.$set(e.temp,"summary",t)},expression:"temp.summary"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"链接",prop:"url"}},[a("el-input",{model:{value:e.temp.url,callback:function(t){e.$set(e.temp,"url",t)},expression:"temp.url"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"栏目图片"}},[a("el-radio-group",{model:{value:e.image_radio,callback:function(t){e.image_radio=t},expression:"image_radio"}},[a("el-radio",{attrs:{label:0}},[e._v("网络图片")]),e._v(" "),a("el-radio",{attrs:{label:1}},[e._v("上传栏目图片")])],1)],1),e._v(" "),0==e.image_radio?a("el-form-item",{attrs:{label:"栏目图片",prop:"image"}},[a("el-input",{attrs:{type:"url"},model:{value:e.temp.image,callback:function(t){e.$set(e.temp,"image",t)},expression:"temp.image"}})],1):e._e(),e._v(" "),1==e.image_radio?a("el-form-item",{attrs:{label:"栏目图片",prop:"image"}},[a("el-upload",{staticClass:"image-uploader",attrs:{action:e.uploadAction,"show-file-list":!1,"on-success":e.handleImageSuccess}},[e.temp.image?a("img",{staticClass:"image",attrs:{src:e.temp.image}}):a("i",{staticClass:"el-icon-plus image-uploader-icon"})])],1):e._e(),e._v(" "),a("el-form-item",{attrs:{label:"是否是分类"}},[a("el-radio-group",{attrs:{change:e.typeChange(e.radio)},model:{value:e.radio,callback:function(t){e.radio=t},expression:"radio"}},[a("el-radio",{attrs:{label:1}},[e._v("是")]),e._v(" "),a("el-radio",{attrs:{label:0}},[e._v("否")])],1)],1),e._v(" "),a("el-form-item",{attrs:{label:"排序",prop:"sort"}},[a("el-input",{attrs:{type:"number"},model:{value:e.temp.sort,callback:function(t){e.$set(e.temp,"sort",t)},expression:"temp.sort"}})],1)],1),e._v(" "),a("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(t){e.dialogFormVisible=!1}}},[e._v("取消")]),e._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:function(t){"create"===e.dialogStatus?e.createData():e.updateData()}}},[e._v("确认")])],1)],1)},l=[],n=(a("ac6a"),a("456d"),a("c405")),r=a("567c"),s={components:{TreeSelect:r["a"]},data:function(){return{dialogStatus:"",dataForm:{},dialogFormVisible:!1,categotyData:null,nodeKey:"id",defaultCheckedKeys:[],defaultProps:{children:"children",label:"name"},radio:1,image_radio:1,temp:{id:"",name:"",url:"",is_category:1,parent_id:"0",image:"",summary:"",sort:"1"},uploadAction:"http://www.lqy-comic.com/api/material/upload",rules:{name:[{required:!0,message:"请输入分类名称",trigger:"blur"}],image:[{required:!0,message:"请选择栏目图片",trigger:"blur"}],summary:[{required:!0,message:"请输入栏目简介",trigger:"blur"}],url:[{required:!0,message:"请输入链接",trigger:"blur"}],sort:[{required:!0,message:"请输入排序",trigger:"blur"}]}}},created:function(){},methods:{resetTemp:function(){this.temp={id:"",name:"",url:"",parent_id:"0",image:"",summary:"",is_category:1,sort:"1"},this.defaultCheckedKeys=[0]},init:function(e,t){this.dialogFormVisible=!0,this.categotyData=t,0!==Object.keys(e).length?(this.dialogStatus="update",this.temp=Object.assign({},e),this.defaultCheckedKeys=[e.parent_id]):this.dialogStatus="create"},popoverHide:function(e,t){""!==e&&(this.temp.parent_id=e)},handleImageSuccess:function(e,t){this.temp.image=e.file},typeChange:function(e){this.temp.is_category=e},createData:function(){var e=this;this.$refs["dataForm"].validate((function(t){t&&Object(n["a"])(e.temp).then((function(t){e.dialogFormVisible=!1,e.$notify({title:t.type,message:t.message,type:t.type,duration:1500,onClose:function(){e.visible=!1,e.$emit("refreshDataList"),e.$emit("refreshCategoryList")}})}))}))},updateData:function(){var e=this;this.$refs["dataForm"].validate((function(t){t&&Object(n["e"])(e.temp).then((function(t){e.dialogFormVisible=!1,e.$notify({title:t.type,message:t.message,type:t.type,duration:1500,onClose:function(){e.visible=!1,e.$emit("refreshDataList"),e.$emit("refreshCategoryList")}})}))}))}}},o=s,c=(a("033a"),a("2877")),d=Object(c["a"])(o,i,l,!1,null,null,null);t["default"]=d.exports},"1d27":function(e,t,a){},6724:function(e,t,a){"use strict";a("8d41");var i="@@wavesContext";function l(e,t){function a(a){var i=Object.assign({},t.value),l=Object.assign({ele:e,type:"hit",color:"rgba(0, 0, 0, 0.15)"},i),n=l.ele;if(n){n.style.position="relative",n.style.overflow="hidden";var r=n.getBoundingClientRect(),s=n.querySelector(".waves-ripple");switch(s?s.className="waves-ripple":(s=document.createElement("span"),s.className="waves-ripple",s.style.height=s.style.width=Math.max(r.width,r.height)+"px",n.appendChild(s)),l.type){case"center":s.style.top=r.height/2-s.offsetHeight/2+"px",s.style.left=r.width/2-s.offsetWidth/2+"px";break;default:s.style.top=(a.pageY-r.top-s.offsetHeight/2-document.documentElement.scrollTop||document.body.scrollTop)+"px",s.style.left=(a.pageX-r.left-s.offsetWidth/2-document.documentElement.scrollLeft||document.body.scrollLeft)+"px"}return s.style.backgroundColor=l.color,s.className="waves-ripple z-active",!1}}return e[i]?e[i].removeHandle=a:e[i]={removeHandle:a},a}var n={bind:function(e,t){e.addEventListener("click",l(e,t),!1)},update:function(e,t){e.removeEventListener("click",e[i].removeHandle,!1),e.addEventListener("click",l(e,t),!1)},unbind:function(e){e.removeEventListener("click",e[i].removeHandle,!1),e[i]=null,delete e[i]}},r=function(e){e.directive("waves",n)};window.Vue&&(window.waves=n,Vue.use(r)),n.install=r;t["a"]=n},"8d41":function(e,t,a){},a192:function(e,t,a){"use strict";a.r(t);var i=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"app-container"},[a("div",{staticClass:"filter-container"},[a("el-input",{staticClass:"filter-item",staticStyle:{width:"200px"},attrs:{placeholder:"请输入分类名称",clearable:""},nativeOn:{keyup:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"enter",13,t.key,"Enter")?null:e.handleFilter(t)}},model:{value:e.listQuery.name,callback:function(t){e.$set(e.listQuery,"name",t)},expression:"listQuery.name"}}),e._v(" "),a("el-button",{directives:[{name:"waves",rawName:"v-waves"}],staticClass:"filter-item",attrs:{type:"primary",icon:"el-icon-search"},on:{click:e.handleFilter}},[e._v("搜索")]),e._v(" "),a("el-button",{staticClass:"filter-item",staticStyle:{"margin-left":"10px"},attrs:{type:"primary",icon:"el-icon-edit"},on:{click:function(t){return e.handleCreate({})}}},[e._v("新增")]),e._v(" "),a("el-button",{directives:[{name:"waves",rawName:"v-waves"}],staticClass:"filter-item",attrs:{loading:e.delLoading,type:"danger",icon:"el-icon-delete"},on:{click:e.handleDeletes}},[e._v("删除")])],1),e._v(" "),a("el-table",{directives:[{name:"loading",rawName:"v-loading",value:e.listLoading,expression:"listLoading"}],key:e.tableKey,ref:"multipleTable",staticStyle:{width:"100%"},attrs:{data:e.list,"row-key":"id","tree-props":{children:"children",hasChildren:"hasChildren"},border:"",fit:"","highlight-current-row":""}},[a("el-table-column",{attrs:{type:"selection",width:"55"}}),e._v(" "),a("el-table-column",{attrs:{label:"ID","min-width":"30px"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("span",[e._v(e._s(t.row.id))])]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"栏目图片","min-width":"150px"},scopedSlots:e._u([{key:"default",fn:function(e){return[a("img",{attrs:{src:e.row.image,width:"140",height:"100"}})]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"栏目名称","min-width":"150px"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("span",[e._v(e._s(t.row.name))])]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"栏目简介","min-width":"150px"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("span",[e._v(e._s(t.row.summary))])]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"链接","min-width":"150px"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("span",[e._v(e._s(t.row.url))])]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"是否是分类",prop:"is_category",align:"center"},scopedSlots:e._u([{key:"default",fn:function(t){return["0"==t.row.is_category?a("el-tag",{attrs:{type:"warning"}},[e._v("否")]):e._e(),e._v(" "),"1"==t.row.is_category?a("el-tag",{attrs:{type:"success"}},[e._v("是")]):e._e()]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"排序",prop:"sort",align:"center"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("span",[e._v(e._s(t.row.sort))])]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"操作",align:"center","class-name":"small-padding fixed-width"},scopedSlots:e._u([{key:"default",fn:function(t){var i=t.row;return[a("el-button",{attrs:{type:"primary",size:"mini"},on:{click:function(t){return e.handleUpdate(i)}}},[e._v("编辑")]),e._v(" "),a("el-button",{attrs:{type:"danger",size:"mini"},on:{click:function(t){return e.handleDelete(i)}}},[e._v("删除")])]}}])})],1),e._v(" "),a("el-dialog",{attrs:{title:"提示",visible:e.delVisible,"close-on-click-modal":!1,width:"300px",center:""},on:{"update:visible":function(t){e.delVisible=t}}},[a("span",[e._v("是否确定删除？")]),e._v(" "),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(t){e.delVisible=!1}}},[e._v("取 消")]),e._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:e.deleteRow}},[e._v("确 定")])],1)]),e._v(" "),e.addOrUpdateVisible?a("add-or-update",{ref:"addOrUpdate",on:{refreshDataList:e.getList,refreshCategoryList:e.getEnableCategory}}):e._e()],1)},l=[],n=a("0532"),r=a("c405"),s=a("6724"),o={name:"Category",components:{AddOrUpdate:n["default"]},directives:{waves:s["a"]},data:function(){return{tableKey:0,list:null,listLoading:!0,listQuery:{name:""},categotyData:null,delVisible:!1,ids:[],delLoading:!1,addOrUpdateVisible:!1}},created:function(){this.getList(),this.getEnableCategory()},methods:{handleFilter:function(){this.getList()},getEnableCategory:function(){var e=this;Object(r["c"])().then((function(t){e.categotyData=t.data,e.categotyData.unshift({id:"0",name:"无"})}))},getList:function(){var e=this;this.listLoading=!0,Object(r["d"])(this.listQuery).then((function(t){e.list=t.data,e.listLoading=!1}))},handleCreate:function(e){var t=this;this.addOrUpdateVisible=!0,this.$nextTick((function(){t.$refs.addOrUpdate.resetTemp(),t.$refs.addOrUpdate.init(e,t.categotyData)}))},handleUpdate:function(e){var t=this;this.addOrUpdateVisible=!0,this.$nextTick((function(){t.$refs.addOrUpdate.resetTemp(),t.$refs.addOrUpdate.init(e,t.categotyData)}))},handleDelete:function(e){this.delVisible=!0,this.ids=[],this.ids.push(e.id)},handleDeletes:function(){var e=this.$refs.multipleTable.selection,t=e.length;if(t<1)return this.$message({message:"请选择要删除的数据",type:"warning"}),!1;this.delVisible=!0,this.ids=[];for(var a=0;a<t;a++)this.ids.push(e[a].id)},deleteRow:function(){var e=this;this.delLoading=!0,Object(r["b"])(this.ids).then((function(t){e.$notify({title:t.type,message:t.message,type:t.type,duration:1500}),e.getList()})),this.delLoading=!1,this.delVisible=!1}}},c=o,d=a("2877"),u=Object(d["a"])(c,i,l,!1,null,null,null);t["default"]=u.exports},c405:function(e,t,a){"use strict";a.d(t,"d",(function(){return r})),a.d(t,"c",(function(){return s})),a.d(t,"a",(function(){return o})),a.d(t,"e",(function(){return c})),a.d(t,"b",(function(){return d}));var i=a("b775"),l=a("4328"),n=a.n(l);function r(e){return Object(i["a"])({url:"/api/category",method:"get",params:e})}function s(){return Object(i["a"])({url:"/api/category/enable",method:"get"})}function o(e){return Object(i["a"])({url:"/api/category",method:"post",headers:{"content-type":"application/x-www-form-urlencoded"},data:n.a.stringify(e)})}function c(e){return Object(i["a"])({url:"/api/category",method:"put",headers:{"content-type":"application/x-www-form-urlencoded"},data:n.a.stringify(e)})}function d(e){return Object(i["a"])({url:"/api/category",method:"delete",params:{ids:e}})}}}]);
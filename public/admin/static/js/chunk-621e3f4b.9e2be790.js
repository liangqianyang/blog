(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-621e3f4b"],{"033a":function(e,t,a){"use strict";var i=a("1d27"),r=a.n(i);r.a},"0532":function(e,t,a){"use strict";a.r(t);var i=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("el-dialog",{attrs:{title:e.temp.id?"编辑":"新增","close-on-click-modal":!1,visible:e.dialogFormVisible},on:{"update:visible":function(t){e.dialogFormVisible=t}}},[a("el-form",{ref:"dataForm",staticStyle:{width:"400px","margin-left":"50px"},attrs:{rules:e.rules,model:e.temp,"label-position":"left","label-width":"120px"}},[a("el-form-item",{attrs:{label:"父级栏目",prop:"parent_id"}},[a("tree-select",{attrs:{data:e.categotyData,"default-props":e.defaultProps,"node-key":e.nodeKey,"checked-keys":e.defaultCheckedKeys},on:{popoverHide:e.popoverHide}})],1),e._v(" "),a("el-form-item",{attrs:{label:"栏目名称",prop:"name"}},[a("el-input",{model:{value:e.temp.name,callback:function(t){e.$set(e.temp,"name",t)},expression:"temp.name"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"栏目简介",prop:"summary"}},[a("el-input",{model:{value:e.temp.summary,callback:function(t){e.$set(e.temp,"summary",t)},expression:"temp.summary"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"链接",prop:"url"}},[a("el-input",{model:{value:e.temp.url,callback:function(t){e.$set(e.temp,"url",t)},expression:"temp.url"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"栏目图片"}},[a("el-radio-group",{model:{value:e.image_radio,callback:function(t){e.image_radio=t},expression:"image_radio"}},[a("el-radio",{attrs:{label:0}},[e._v("网络图片")]),e._v(" "),a("el-radio",{attrs:{label:1}},[e._v("上传栏目图片")])],1)],1),e._v(" "),0==e.image_radio?a("el-form-item",{attrs:{label:"栏目图片",prop:"image"}},[a("el-input",{attrs:{type:"url"},model:{value:e.temp.image,callback:function(t){e.$set(e.temp,"image",t)},expression:"temp.image"}})],1):e._e(),e._v(" "),1==e.image_radio?a("el-form-item",{attrs:{label:"栏目图片",prop:"image"}},[a("el-upload",{staticClass:"image-uploader",attrs:{action:e.uploadAction,"show-file-list":!1,"on-success":e.handleImageSuccess}},[e.temp.image?a("img",{staticClass:"image",attrs:{src:e.temp.image}}):a("i",{staticClass:"el-icon-plus image-uploader-icon"})])],1):e._e(),e._v(" "),a("el-form-item",{attrs:{label:"是否是分类"}},[a("el-radio-group",{attrs:{change:e.typeChange(e.radio)},model:{value:e.radio,callback:function(t){e.radio=t},expression:"radio"}},[a("el-radio",{attrs:{label:1}},[e._v("是")]),e._v(" "),a("el-radio",{attrs:{label:0}},[e._v("否")])],1)],1),e._v(" "),a("el-form-item",{attrs:{label:"排序",prop:"sort"}},[a("el-input",{attrs:{type:"number"},model:{value:e.temp.sort,callback:function(t){e.$set(e.temp,"sort",t)},expression:"temp.sort"}})],1)],1),e._v(" "),a("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(t){e.dialogFormVisible=!1}}},[e._v("取消")]),e._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:function(t){"create"===e.dialogStatus?e.createData():e.updateData()}}},[e._v("确认")])],1)],1)},r=[],o=(a("ac6a"),a("456d"),a("c405")),l=a("567c"),s={components:{TreeSelect:l["a"]},data:function(){return{dialogStatus:"",dataForm:{},dialogFormVisible:!1,categotyData:null,nodeKey:"id",defaultCheckedKeys:[],defaultProps:{children:"children",label:"name"},radio:1,image_radio:1,temp:{id:"",name:"",url:"",is_category:1,parent_id:"0",image:"",summary:"",sort:"1"},uploadAction:"http://www.lqy-comic.com/api/material/upload",rules:{name:[{required:!0,message:"请输入分类名称",trigger:"blur"}],image:[{required:!0,message:"请选择栏目图片",trigger:"blur"}],summary:[{required:!0,message:"请输入栏目简介",trigger:"blur"}],url:[{required:!0,message:"请输入链接",trigger:"blur"}],sort:[{required:!0,message:"请输入排序",trigger:"blur"}]}}},created:function(){},methods:{resetTemp:function(){this.temp={id:"",name:"",url:"",parent_id:"0",image:"",summary:"",is_category:1,sort:"1"},this.defaultCheckedKeys=[0]},init:function(e,t){this.dialogFormVisible=!0,this.categotyData=t,0!==Object.keys(e).length?(this.dialogStatus="update",this.temp=Object.assign({},e),this.defaultCheckedKeys=[e.parent_id]):this.dialogStatus="create"},popoverHide:function(e,t){""!==e&&(this.temp.parent_id=e)},handleImageSuccess:function(e,t){this.temp.image=e.file},typeChange:function(e){this.temp.is_category=e},createData:function(){var e=this;this.$refs["dataForm"].validate((function(t){t&&Object(o["a"])(e.temp).then((function(t){e.dialogFormVisible=!1,e.$notify({title:t.type,message:t.message,type:t.type,duration:1500,onClose:function(){e.visible=!1,e.$emit("refreshDataList"),e.$emit("refreshCategoryList")}})}))}))},updateData:function(){var e=this;this.$refs["dataForm"].validate((function(t){t&&Object(o["e"])(e.temp).then((function(t){e.dialogFormVisible=!1,e.$notify({title:t.type,message:t.message,type:t.type,duration:1500,onClose:function(){e.visible=!1,e.$emit("refreshDataList"),e.$emit("refreshCategoryList")}})}))}))}}},n=s,m=(a("033a"),a("2877")),u=Object(m["a"])(n,i,r,!1,null,null,null);t["default"]=u.exports},"1d27":function(e,t,a){},c405:function(e,t,a){"use strict";a.d(t,"d",(function(){return l})),a.d(t,"c",(function(){return s})),a.d(t,"a",(function(){return n})),a.d(t,"e",(function(){return m})),a.d(t,"b",(function(){return u}));var i=a("b775"),r=a("4328"),o=a.n(r);function l(e){return Object(i["a"])({url:"/api/category",method:"get",params:e})}function s(){return Object(i["a"])({url:"/api/category/enable",method:"get"})}function n(e){return Object(i["a"])({url:"/api/category",method:"post",headers:{"content-type":"application/x-www-form-urlencoded"},data:o.a.stringify(e)})}function m(e){return Object(i["a"])({url:"/api/category",method:"put",headers:{"content-type":"application/x-www-form-urlencoded"},data:o.a.stringify(e)})}function u(e){return Object(i["a"])({url:"/api/category",method:"delete",params:{ids:e}})}}}]);
(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-75f1af32"],{"11db":function(e,t,a){"use strict";var i=a("8d40"),l=a.n(i);l.a},2423:function(e,t,a){"use strict";a.d(t,"d",(function(){return o})),a.d(t,"a",(function(){return r})),a.d(t,"g",(function(){return n})),a.d(t,"b",(function(){return c})),a.d(t,"e",(function(){return p})),a.d(t,"f",(function(){return u})),a.d(t,"c",(function(){return d}));var i=a("b775"),l=a("4328"),s=a.n(l);function o(e){return Object(i["a"])({url:"/api/article",method:"get",params:e})}function r(e){return Object(i["a"])({url:"/api/article",method:"post",headers:{"content-type":"application/x-www-form-urlencoded"},data:s.a.stringify(e)})}function n(e){return Object(i["a"])({url:"/api/article",method:"put",headers:{"content-type":"application/x-www-form-urlencoded"},data:s.a.stringify(e)})}function c(e){return Object(i["a"])({url:"/api/article",method:"delete",params:{ids:e}})}function p(e){return Object(i["a"])({url:"/api/article/top",method:"put",params:{id:e}})}function u(e){return Object(i["a"])({url:"/api/article/up",method:"put",params:{ids:e}})}function d(e){return Object(i["a"])({url:"/api/article/down",method:"put",params:{ids:e}})}},"8d40":function(e,t,a){},b9e8:function(e,t,a){"use strict";a.r(t);var i=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("el-dialog",{staticStyle:{width:"100%",left:"50px"},attrs:{title:e.temp.id?"编辑":"新增","close-on-click-modal":!1,center:"",visible:e.dialogFormVisible},on:{"update:visible":function(t){e.dialogFormVisible=t}}},[a("el-form",{ref:"dataForm",staticStyle:{width:"100%"},attrs:{rules:e.rules,model:e.temp,"label-position":"left","label-width":"120px"}},[a("el-form-item",{attrs:{label:"文章标题",prop:"title"}},[a("el-input",{model:{value:e.temp.title,callback:function(t){e.$set(e.temp,"title",t)},expression:"temp.title"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"文章简介",prop:"summary"}},[a("el-input",{model:{value:e.temp.summary,callback:function(t){e.$set(e.temp,"summary",t)},expression:"temp.summary"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"文章分类",prop:"cid"}},[a("tree-select",{staticClass:"el-input",attrs:{data:e.categoryOptions,"default-props":e.defaultProps,"node-key":e.nodeKey,"checked-keys":e.defaultCheckedKeys,width:755},on:{popoverHide:e.popoverHide}})],1),e._v(" "),a("el-form-item",{attrs:{label:"标签",prop:"label_ids"}},[a("el-select",{staticClass:"el-input",attrs:{multiple:"","value-key":"id",placeholder:"请选择标签"},model:{value:e.temp.label_ids,callback:function(t){e.$set(e.temp,"label_ids",t)},expression:"temp.label_ids"}},e._l(e.labelOptions,(function(e){return a("el-option",{key:e.value,attrs:{label:e.title,value:e.id}})})),1)],1),e._v(" "),a("el-form-item",{attrs:{label:"SEO标题",prop:"seo_title"}},[a("el-input",{model:{value:e.temp.seo_title,callback:function(t){e.$set(e.temp,"seo_title",t)},expression:"temp.seo_title"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"SEO关键词",prop:"seo_keywords"}},[a("el-input",{model:{value:e.temp.seo_keywords,callback:function(t){e.$set(e.temp,"seo_keywords",t)},expression:"temp.seo_keywords"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"SEO描述",prop:"seo_description"}},[a("el-input",{model:{value:e.temp.seo_description,callback:function(t){e.$set(e.temp,"seo_description",t)},expression:"temp.seo_description"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"封面图片"}},[a("el-radio-group",{model:{value:e.radio,callback:function(t){e.radio=t},expression:"radio"}},[a("el-radio",{attrs:{label:0}},[e._v("网络图片")]),e._v(" "),a("el-radio",{attrs:{label:1}},[e._v("上传封面图片")])],1)],1),e._v(" "),0==e.radio?a("el-form-item",{attrs:{label:"封面图片",prop:"cover"}},[a("el-input",{attrs:{type:"url"},model:{value:e.temp.cover,callback:function(t){e.$set(e.temp,"cover",t)},expression:"temp.cover"}})],1):e._e(),e._v(" "),1==e.radio?a("el-form-item",{attrs:{label:"封面图片",prop:"cover"}},[a("el-upload",{staticClass:"cover-uploader",attrs:{action:e.uploadAction,name:"cover","show-file-list":!1,"on-success":e.handleAvatarSuccess,"before-upload":e.beforeAvatarUpload}},[e.temp.cover?a("img",{staticClass:"cover",attrs:{src:e.temp.cover}}):a("i",{staticClass:"el-icon-plus cover-uploader-icon"})])],1):e._e(),e._v(" "),a("el-form-item",{staticStyle:{"margin-bottom":"30px"},attrs:{label:"内容",prop:"content"}},[a("Tinymce",{ref:"editor",attrs:{height:400},model:{value:e.temp.content,callback:function(t){e.$set(e.temp,"content",t)},expression:"temp.content"}})],1),e._v(" "),"create"==e.dialogStatus?a("el-form-item",{attrs:{label:"发布日期",prop:"publish_date"}},[a("el-date-picker",{staticStyle:{width:"100%"},attrs:{type:"datetime","value-format":"yyyy-MM-dd HH:mm:ss",placeholder:"选择发布时间"},model:{value:e.temp.publish_date,callback:function(t){e.$set(e.temp,"publish_date",t)},expression:"temp.publish_date"}})],1):e._e(),e._v(" "),"update"==e.dialogStatus?a("el-form-item",{attrs:{label:"点赞数",prop:"likes"}},[a("el-input",{attrs:{type:"number"},model:{value:e.temp.likes,callback:function(t){e.$set(e.temp,"likes",t)},expression:"temp.likes"}})],1):e._e(),e._v(" "),"update"==e.dialogStatus?a("el-form-item",{attrs:{label:"评论数",prop:"comments"}},[a("el-input",{attrs:{type:"number"},model:{value:e.temp.comments,callback:function(t){e.$set(e.temp,"comments",t)},expression:"temp.comments"}})],1):e._e(),e._v(" "),"update"==e.dialogStatus?a("el-form-item",{attrs:{label:"状态",prop:"status"}},[a("el-select",{staticClass:"el-input",attrs:{placeholder:"请选择"},model:{value:e.temp.status,callback:function(t){e.$set(e.temp,"status",t)},expression:"temp.status"}},e._l(e.statusOptions,(function(e){return a("el-option",{key:e.value,attrs:{label:e.label,value:e.value}})})),1)],1):e._e()],1),e._v(" "),a("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(t){return e.handleCancel()}}},[e._v("取消")]),e._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:function(t){"create"===e.dialogStatus?e.createData():e.updateData()}}},[e._v("确认")])],1)],1)},l=[],s=(a("ac6a"),a("456d"),a("2423")),o=a("8256"),r=a("567c"),n={components:{Tinymce:o["a"],TreeSelect:r["a"]},data:function(){return{radio:1,dialogStatus:"",dataForm:{},dialogFormVisible:!1,statusOptions:[{value:"0",label:"正常"},{value:"9",label:"下架"}],categoryOptions:[],labelOptions:[],nodeKey:"id",defaultCheckedKeys:[],defaultProps:{children:"children",label:"name"},imageUrl:"",temp:{id:"",title:"",summary:"",cid:"",label_ids:[],content:"",is_admin:"1",publish_date:"",cover:"",status:"0",seo_title:"",seo_keywords:"",seo_description:"",likes:0,comments:0},rules:{title:[{required:!0,message:"请输入文章标题",trigger:"blur"}],summary:[{required:!0,message:"请输入文章简介",trigger:"blur"}],cid:[{required:!0,message:"请选择文章分类",trigger:"blur"}],label_ids:[{required:!0,message:"请选择文章标签",trigger:"blur"}],content:[{required:!0,message:"请输入文章内容",trigger:"blur"}],cover:[{required:!0,message:"请上传文章封面图片",trigger:"blur"}]},uploadAction:"https://www.lqy-comic.com//api/article/upload"}},created:function(){},methods:{resetTemp:function(){this.temp={id:"",title:"",summary:"",cid:"",label_ids:[],content:"",is_admin:"1",publish_date:"",cover:"",status:"0",seo_title:"",seo_keywords:"",seo_description:"",likes:0,comments:0},this.defaultCheckedKeys=[],this.$refs["editor"]&&window.tinymce.get(this.$refs["editor"].id).setContent("")},init:function(e,t,a){if(this.dialogFormVisible=!0,this.resetTemp(),this.categoryOptions=t,this.labelOptions=a,0!==Object.keys(e).length){this.dialogStatus="update",this.temp=Object.assign({},e),this.$refs["editor"]&&window.tinymce.get(this.$refs["editor"].id).setContent(e.content),this.defaultCheckedKeys=[this.temp.cid];var i=[];for(var l in e.labels)i.push(e.labels[l]["lid"]);this.temp.label_ids=i}else this.dialogStatus="create"},popoverHide:function(e,t){""!==e&&(this.temp.cid=e)},handleAvatarSuccess:function(e,t){this.temp.cover=e.file,this.imageUrl=URL.createObjectURL(t.raw)},beforeAvatarUpload:function(e){var t="image/jpeg"===e.type,a=e.size/1024/1024<2;return t||this.$message.error("上传头像图片只能是 JPG 格式!"),a||this.$message.error("上传头像图片大小不能超过 2MB!"),t&&a},createData:function(){var e=this;this.$refs["dataForm"].validate((function(t){t&&Object(s["a"])(e.temp).then((function(t){e.dialogFormVisible=!1,e.$notify({title:t.type,message:t.message,type:t.type,duration:1500,onClose:function(){e.visible=!1,e.$emit("refreshDataList")}})}))}))},updateData:function(){var e=this;this.$refs["dataForm"].validate((function(t){t&&Object(s["g"])(e.temp).then((function(t){e.dialogFormVisible=!1,e.$notify({title:t.type,message:t.message,type:t.type,duration:1500,onClose:function(){e.visible=!1,e.$emit("refreshDataList")}})}))}))},handleCancel:function(){this.dialogFormVisible=!1}}},c=n,p=(a("11db"),a("2877")),u=Object(p["a"])(c,i,l,!1,null,null,null);t["default"]=u.exports}}]);
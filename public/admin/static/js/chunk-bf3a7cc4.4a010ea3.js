(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-bf3a7cc4"],{"11db":function(e,t,i){"use strict";var n=i("8d40"),a=i.n(n);a.a},2423:function(e,t,i){"use strict";i.d(t,"d",(function(){return o})),i.d(t,"a",(function(){return l})),i.d(t,"f",(function(){return r})),i.d(t,"b",(function(){return c})),i.d(t,"e",(function(){return u})),i.d(t,"c",(function(){return d}));var n=i("b775"),a=i("4328"),s=i.n(a);function o(e){return Object(n["a"])({url:"/api/article",method:"get",params:e})}function l(e){return Object(n["a"])({url:"/api/article",method:"post",headers:{"content-type":"application/x-www-form-urlencoded"},data:s.a.stringify(e)})}function r(e){return Object(n["a"])({url:"/api/article",method:"put",headers:{"content-type":"application/x-www-form-urlencoded"},data:s.a.stringify(e)})}function c(e){return Object(n["a"])({url:"/api/article",method:"delete",params:{ids:e}})}function u(e){return Object(n["a"])({url:"/api/article/up",method:"put",params:{ids:e}})}function d(e){return Object(n["a"])({url:"/api/article/down",method:"put",params:{ids:e}})}},6625:function(e,t,i){"use strict";var n=i("ca6c"),a=i.n(n);a.a},"8d40":function(e,t,i){},b9e8:function(e,t,i){"use strict";i.r(t);var n=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("el-dialog",{staticStyle:{width:"100%",left:"50px"},attrs:{title:e.temp.id?"编辑":"新增","close-on-click-modal":!1,center:"",visible:e.dialogFormVisible},on:{"update:visible":function(t){e.dialogFormVisible=t}}},[i("el-form",{ref:"dataForm",staticStyle:{width:"100%"},attrs:{rules:e.rules,model:e.temp,"label-position":"left","label-width":"120px"}},[i("el-form-item",{attrs:{label:"文章标题",prop:"title"}},[i("el-input",{model:{value:e.temp.title,callback:function(t){e.$set(e.temp,"title",t)},expression:"temp.title"}})],1),e._v(" "),i("el-form-item",{attrs:{label:"文章简介",prop:"summary"}},[i("el-input",{model:{value:e.temp.summary,callback:function(t){e.$set(e.temp,"summary",t)},expression:"temp.summary"}})],1),e._v(" "),i("el-form-item",{attrs:{label:"文章分类",prop:"cid"}},[i("tree-select",{staticClass:"el-input",attrs:{data:e.categoryOptions,"default-props":e.defaultProps,"node-key":e.nodeKey,"checked-keys":e.defaultCheckedKeys,width:755},on:{popoverHide:e.popoverHide}})],1),e._v(" "),i("el-form-item",{attrs:{label:"标签",prop:"label_ids"}},[i("el-select",{staticClass:"el-input",attrs:{multiple:"","value-key":"id",placeholder:"请选择标签"},model:{value:e.temp.label_ids,callback:function(t){e.$set(e.temp,"label_ids",t)},expression:"temp.label_ids"}},e._l(e.labelOptions,(function(e){return i("el-option",{key:e.value,attrs:{label:e.title,value:e.id}})})),1)],1),e._v(" "),i("el-form-item",{attrs:{label:"SEO标题",prop:"seo_title"}},[i("el-input",{model:{value:e.temp.seo_title,callback:function(t){e.$set(e.temp,"seo_title",t)},expression:"temp.seo_title"}})],1),e._v(" "),i("el-form-item",{attrs:{label:"SEO关键词",prop:"seo_keywords"}},[i("el-input",{model:{value:e.temp.seo_keywords,callback:function(t){e.$set(e.temp,"seo_keywords",t)},expression:"temp.seo_keywords"}})],1),e._v(" "),i("el-form-item",{attrs:{label:"SEO描述",prop:"seo_description"}},[i("el-input",{model:{value:e.temp.seo_description,callback:function(t){e.$set(e.temp,"seo_description",t)},expression:"temp.seo_description"}})],1),e._v(" "),i("el-form-item",{attrs:{label:"封面图片",prop:"cover"}},[i("el-upload",{staticClass:"cover-uploader",attrs:{action:e.uploadAction,name:"cover","show-file-list":!1,"on-success":e.handleAvatarSuccess,"before-upload":e.beforeAvatarUpload}},[e.temp.cover?i("img",{staticClass:"cover",attrs:{src:e.temp.cover}}):i("i",{staticClass:"el-icon-plus cover-uploader-icon"})])],1),e._v(" "),i("el-form-item",{staticStyle:{"margin-bottom":"30px"},attrs:{label:"内容",prop:"content"}},[i("Tinymce",{ref:"editor",attrs:{height:400},model:{value:e.temp.content,callback:function(t){e.$set(e.temp,"content",t)},expression:"temp.content"}})],1),e._v(" "),i("el-form-item",{attrs:{label:"发布日期",prop:"publish_date"}},[i("el-date-picker",{staticStyle:{width:"100%"},attrs:{type:"datetime","value-format":"yyyy-MM-dd HH:mm:ss",placeholder:"选择发布时间"},model:{value:e.temp.publish_date,callback:function(t){e.$set(e.temp,"publish_date",t)},expression:"temp.publish_date"}})],1),e._v(" "),i("el-form-item",{attrs:{label:"状态",prop:"status"}},[i("el-select",{staticClass:"el-input",attrs:{placeholder:"请选择"},model:{value:e.temp.status,callback:function(t){e.$set(e.temp,"status",t)},expression:"temp.status"}},e._l(e.statusOptions,(function(e){return i("el-option",{key:e.value,attrs:{label:e.label,value:e.value}})})),1)],1)],1),e._v(" "),i("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[i("el-button",{on:{click:function(t){return e.handleCancel()}}},[e._v("取消")]),e._v(" "),i("el-button",{attrs:{type:"primary"},on:{click:function(t){"create"===e.dialogStatus?e.createData():e.updateData()}}},[e._v("确认")])],1)],1)},a=[],s=(i("ac6a"),i("456d"),i("2423")),o=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",{staticClass:"tinymce-container",class:{fullscreen:e.fullscreen},style:{width:e.containerWidth}},[i("textarea",{staticClass:"tinymce-textarea",attrs:{id:e.tinymceId}}),e._v(" "),i("div",{staticClass:"editor-custom-btn-container"},[i("editorImage",{staticClass:"editor-upload-btn",attrs:{color:"#1890ff"},on:{successCBK:e.imageSuccessCBK}})],1)])},l=[],r=(i("c5f6"),function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",{staticClass:"upload-container"},[i("el-button",{style:{background:e.color,borderColor:e.color},attrs:{icon:"el-icon-upload",size:"mini",type:"primary"},on:{click:function(t){e.dialogVisible=!0}}},[e._v("\n    upload\n  ")]),e._v(" "),i("el-dialog",{attrs:{visible:e.dialogVisible,modal:!1},on:{"update:visible":function(t){e.dialogVisible=t}}},[i("el-upload",{staticClass:"editor-slide-upload",attrs:{multiple:!0,"file-list":e.fileList,"show-file-list":!0,"on-remove":e.handleRemove,"on-success":e.handleSuccess,"before-upload":e.beforeUpload,action:e.uploadAction,"list-type":"picture-card"}},[i("el-button",{attrs:{size:"small",type:"primary"}},[e._v("\n        Click upload\n      ")])],1),e._v(" "),i("el-button",{on:{click:function(t){e.dialogVisible=!1}}},[e._v("\n      Cancel\n    ")]),e._v(" "),i("el-button",{attrs:{type:"primary"},on:{click:e.handleSubmit}},[e._v("\n      Confirm\n    ")])],1)],1)}),c=[],u={name:"EditorSlideUpload",props:{color:{type:String,default:"#1890ff"}},data:function(){return{dialogVisible:!1,listObj:{},fileList:[],uploadAction:"https://www.lqy-comic.com//api/article/upload"}},methods:{checkAllSuccess:function(){var e=this;return Object.keys(this.listObj).every((function(t){return e.listObj[t].hasSuccess}))},handleSubmit:function(){var e=this,t=Object.keys(this.listObj).map((function(t){return e.listObj[t]}));this.checkAllSuccess()?(this.$emit("successCBK",t),this.listObj={},this.fileList=[],this.dialogVisible=!1):this.$message("Please wait for all images to be uploaded successfully. If there is a network problem, please refresh the page and upload again!")},handleSuccess:function(e,t){for(var i=t.uid,n=Object.keys(this.listObj),a=0,s=n.length;a<s;a++)if(this.listObj[n[a]].uid===i)return this.listObj[n[a]].url=e.file,void(this.listObj[n[a]].hasSuccess=!0)},handleRemove:function(e){for(var t=e.uid,i=Object.keys(this.listObj),n=0,a=i.length;n<a;n++)if(this.listObj[i[n]].uid===t)return void delete this.listObj[i[n]]},beforeUpload:function(e){var t=this,i=window.URL||window.webkitURL,n=e.uid;return this.listObj[n]={},new Promise((function(a,s){var o=new Image;o.src=i.createObjectURL(e),o.onload=function(){t.listObj[n]={hasSuccess:!1,uid:e.uid,width:this.width,height:this.height}},a(!0)}))}}},d=u,p=(i("6625"),i("2877")),m=Object(p["a"])(d,r,c,!1,null,"2b83a35d",null),h=m.exports,f=["advlist anchor autolink autosave code codesample colorpicker colorpicker contextmenu directionality emoticons fullscreen hr image imagetools insertdatetime link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace spellchecker tabfocus table template textcolor textpattern visualblocks visualchars wordcount"],b=f,y=["searchreplace bold italic underline strikethrough alignleft aligncenter alignright outdent indent  blockquote undo redo removeformat subscript superscript code codesample","hr bullist numlist link image charmap preview anchor pagebreak insertdatetime media table emoticons forecolor backcolor fullscreen"],v=y,g=(i("ac4d"),i("8a81"),[]);function _(){return window.tinymce}var w=function(e,t){var i=document.getElementById(e),n=t||function(){};if(!i){var a=document.createElement("script");a.src=e,a.id=e,document.body.appendChild(a),g.push(n);var s="onload"in a?o:l;s(a)}function o(t){t.onload=function(){this.onerror=this.onload=null;var e=!0,i=!1,n=void 0;try{for(var a,s=g[Symbol.iterator]();!(e=(a=s.next()).done);e=!0){var o=a.value;o(null,t)}}catch(l){i=!0,n=l}finally{try{e||null==s.return||s.return()}finally{if(i)throw n}}g=null},t.onerror=function(){this.onerror=this.onload=null,n(new Error("Failed to load "+e),t)}}function l(e){e.onreadystatechange=function(){if("complete"===this.readyState||"loaded"===this.readyState){this.onreadystatechange=null;var t=!0,i=!1,n=void 0;try{for(var a,s=g[Symbol.iterator]();!(t=(a=s.next()).done);t=!0){var o=a.value;o(null,e)}}catch(l){i=!0,n=l}finally{try{t||null==s.return||s.return()}finally{if(i)throw n}}g=null}}}i&&n&&(_()?n(null,i):g.push(n))},k=w,C="https://cdn.jsdelivr.net/npm/tinymce-all-in-one@4.9.3/tinymce.min.js",O={name:"Tinymce",components:{editorImage:h},props:{id:{type:String,default:function(){return"vue-tinymce-"+ +new Date+(1e3*Math.random()).toFixed(0)}},value:{type:String,default:""},toolbar:{type:Array,required:!1,default:function(){return[]}},menubar:{type:String,default:"file edit insert view format table"},height:{type:[Number,String],required:!1,default:360},width:{type:[Number,String],required:!1,default:"auto"}},data:function(){return{hasChange:!1,hasInit:!1,tinymceId:this.id,fullscreen:!1,languageTypeList:{en:"en",zh:"zh_CN",es:"es_MX",ja:"ja"}}},computed:{containerWidth:function(){var e=this.width;return/^[\d]+(\.[\d]+)?$/.test(e)?"".concat(e,"px"):e}},watch:{value:function(e){var t=this;!this.hasChange&&this.hasInit&&this.$nextTick((function(){return window.tinymce.get(t.tinymceId).setContent(e||"")}))}},mounted:function(){this.init()},activated:function(){window.tinymce&&this.initTinymce()},deactivated:function(){this.destroyTinymce()},destroyed:function(){this.destroyTinymce()},methods:{init:function(){var e=this;k(C,(function(t){t?e.$message.error(t.message):e.initTinymce()}))},initTinymce:function(){var e=this,t=this;window.tinymce.init({selector:"#".concat(this.tinymceId),language:this.languageTypeList["zh"],height:this.height,body_class:"panel-body ",object_resizing:!1,toolbar:this.toolbar.length>0?this.toolbar:v,menubar:this.menubar,plugins:b,end_container_on_empty_block:!0,powerpaste_word_import:"clean",code_dialog_height:450,code_dialog_width:1e3,advlist_bullet_styles:"square",advlist_number_styles:"default",imagetools_cors_hosts:["www.tinymce.com","codepen.io"],default_link_target:"_blank",link_title:!1,nonbreaking_force_tab:!0,init_instance_callback:function(i){t.value&&i.setContent(t.value),t.hasInit=!0,i.on("NodeChange Change KeyUp SetContent",(function(){e.hasChange=!0,e.$emit("input",i.getContent())}))},setup:function(e){e.on("FullscreenStateChanged",(function(e){t.fullscreen=e.state}))}})},destroyTinymce:function(){var e=window.tinymce.get(this.tinymceId);this.fullscreen&&e.execCommand("mceFullScreen"),e&&e.destroy()},setContent:function(e){window.tinymce.get(this.tinymceId).setContent(e)},getContent:function(){window.tinymce.get(this.tinymceId).getContent()},imageSuccessCBK:function(e){var t=this;e.forEach((function(e){window.tinymce.get(t.tinymceId).insertContent('<img class="wscnph" src="'.concat(e.url,'" >'))}))}}},j=O,S=(i("d403"),Object(p["a"])(j,o,l,!1,null,"0a27d97b",null)),x=S.exports,$=i("567c"),I={components:{Tinymce:x,TreeSelect:$["a"]},data:function(){return{dialogStatus:"",dataForm:{},dialogFormVisible:!1,statusOptions:[{value:"0",label:"正常"},{value:"9",label:"下架"}],categoryOptions:[],labelOptions:[],nodeKey:"id",defaultCheckedKeys:[],defaultProps:{children:"children",label:"name"},imageUrl:"",temp:{id:"",title:"",summary:"",cid:"",label_ids:[],content:"",is_admin:"1",publish_date:"",cover:"",status:"0",seo_title:"",seo_keywords:"",seo_description:""},rules:{title:[{required:!0,message:"请输入文章标题",trigger:"blur"}],summary:[{required:!0,message:"请输入文章简介",trigger:"blur"}],cid:[{required:!0,message:"请选择文章分类",trigger:"blur"}],label_ids:[{required:!0,message:"请选择文章标签",trigger:"blur"}],content:[{required:!0,message:"请输入文章内容",trigger:"blur"}],cover:[{required:!0,message:"请上传文章封面图片",trigger:"blur"}]},uploadAction:"https://www.lqy-comic.com//api/article/upload"}},created:function(){},methods:{resetTemp:function(){this.temp={id:"",title:"",summary:"",cid:"",label_ids:[],content:"",is_admin:"1",publish_date:"",cover:"",status:"0",seo_title:"",seo_keywords:"",seo_description:""},this.defaultCheckedKeys=[]},init:function(e,t,i){if(this.dialogFormVisible=!0,this.resetTemp(),this.categoryOptions=t,this.labelOptions=i,0!==Object.keys(e).length){this.dialogStatus="update",this.temp=Object.assign({},e),this.$refs["editor"]&&window.tinymce.get(this.$refs["editor"].id).setContent(e.content),this.defaultCheckedKeys=[this.temp.cid];var n=[];for(var a in e.labels)n.push(e.labels[a]["lid"]);this.temp.label_ids=n}else this.dialogStatus="create"},popoverHide:function(e,t){""!==e&&(this.temp.cid=e)},handleAvatarSuccess:function(e,t){this.temp.cover=e.file,this.imageUrl=URL.createObjectURL(t.raw)},beforeAvatarUpload:function(e){var t="image/jpeg"===e.type,i=e.size/1024/1024<2;return t||this.$message.error("上传头像图片只能是 JPG 格式!"),i||this.$message.error("上传头像图片大小不能超过 2MB!"),t&&i},createData:function(){var e=this;this.$refs["dataForm"].validate((function(t){t&&Object(s["a"])(e.temp).then((function(t){e.dialogFormVisible=!1,e.$notify({title:t.type,message:t.message,type:t.type,duration:1500,onClose:function(){e.visible=!1,e.$emit("refreshDataList")}})}))}))},updateData:function(){var e=this;this.$refs["dataForm"].validate((function(t){t&&Object(s["f"])(e.temp).then((function(t){e.dialogFormVisible=!1,e.$notify({title:t.type,message:t.message,type:t.type,duration:1500,onClose:function(){e.visible=!1,e.$emit("refreshDataList")}})}))}))},handleCancel:function(){this.dialogFormVisible=!1}}},F=I,T=(i("11db"),Object(p["a"])(F,n,a,!1,null,null,null));t["default"]=T.exports},ca6c:function(e,t,i){},d403:function(e,t,i){"use strict";var n=i("e016"),a=i.n(n);a.a},e016:function(e,t,i){}}]);
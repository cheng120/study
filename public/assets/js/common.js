/**
 * Created by Administrator on 2017/10/13.
 * 公共js文件
 */

//点击跳转
function jump_url (objid, event , url){
    $('#'+objid).on(event,function(){
        location.href = url;
    })
}

/*
 * alert浮层
 */
function am_alert(msg,title){
    var $modal = $('#your-modal');

    var contentObj = $("#am_content");
    var titleObj = $("#am_title");
    if(title){
        titleObj.html(title);
    }
    if(!msg){
        return false;
    }else{
        contentObj.html(msg);
    }
    $modal.modal();

}

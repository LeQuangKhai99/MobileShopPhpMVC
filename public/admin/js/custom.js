$(document).ready(function(){
  setTimeout(function(){ $("#thongbao").fadeOut(1000) }, 2000);
});

function updateOrder(id, status){
	status = status == true ? 0 : 1;
		$.ajax({
            type: "POST",
            dataType:"text",
            url: "http://localhost:8080/php/MobileShop/manage/updateOrder/" + id,
            data : { 
                data : status
        	},
            success: function(result){
                location.reload();
            },
            error: function (e) {
                console.log(e)
            }
        });
}



//---------------------------------------------------------------------------------------------------
function addCmt(){
	var id = parseInt(window.location.href.split('/')[7]);
	var data = document.getElementById('comment_body').value.trim();

	if (data.length > 0) {
		$.ajax({
            type: "POST",
            dataType:"text",
            url: "http://localhost:8080/php/MobileShop/Customer/addCmtPost/" + id,
            data : { 
                data : data
        	},
            success: function(result){
                loadCmt();
                document.getElementById("comment_body").value = "";
            },
            error: function (e) {
                console.log(e)
            }
        });
	}
	else{
		alert('Chưa nhập nội dung!');
	}
}

function loadCmt(){
	var id = parseInt(window.location.href.split('/')[7]);
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/php/MobileShop/Customer/ListCommentPost/" + id,
        success: function(result){
        	result = JSON.parse(result);
            listCmt(result);
        },
        error: function (e) {
            console.log("ERROR: ", e);
        }
    });
}

function listCmt(result){
	var html = '';
	for (var i = 0; i < result.length; i++) {
		html += '<div class="cmt-ask" style="margin: 20px 0">';
		html += '<div class="info-user">';
		html += '<img src="https://gitiho.com/default/gitiho/user.png" class="avt">';
		html += '<div class="username">' + result[i]['name'] + '</div></div>';
		html += '<div class="info-cmt-ask">';
		html += result[i]['content'] + '</div>';
		html += '<div class="interact">';
		html += '<span class="cmt-date"><b class="dot">●</b>' + result[i]['created_at'] + '</span>';
		html += '</div></div>';
	}
	$('#list_cmt').html(html);
}

loadCmt();

//---------------------------------------------------------------------------------------------------
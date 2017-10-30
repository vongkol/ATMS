$(document).ready(function () {
    $("#btnClose").click(function () {
        $("#data").html("");
        $("#search_name").val("");
        $("#myModal").modal('hide');
    });
    $("#btnSearch").click(function () {
        searchCompany($("#search_name").val());
    });
    $("#search_name").keyup(function (e) {
        if(e.keyCode==13)
        {
            searchCompany($("#search_name").val());
        }
    });
    // when user click select button
    $("#btnSelect").on('click', function () {
        var cid = $("#data tr[abc='yes']").attr("id");
        var cname = $("#data tr[abc='yes']").attr('name');
        $("#data").html("");
        $("#seller_name").html(cname);
        $("#search_name").val("");
    })
	// when select on lottery type
	$('#lotterytype').on('change', function(){
		if($(this).val()==='Thai'){
			$('#hf1').attr('style','display:none');
		} else if($(this).val()==='Khmer'){
			$('#hf1').attr('style','display:none');
		} else {
			$('#hf1').attr('style','display:block');
		}
	});
});
// search company or enterprise by its name
function searchCompany(name) {
    $.ajax({
        type: "GET",
        url: burl + "/addboss/find?q=" + name,
        success: function (data) {
            var tr="";
            for(var i=0; i<data.length; i++)
            {
                tr += "<tr id='" + data[i].id + "' name='" + data[i].name + "' onclick='makeSelect(this)' abc='no' class=''>";
                tr += "<td>" + data[i].name + "</td>";
            }
            $("#data").html(tr);
        },

    });
}
// function to make row selected
function makeSelect(row) {
    var id=$(row).attr('id');
    $("#data tr").attr('abc', 'no');
    $(row).attr('abc', 'yes');
    $("#data tr").removeClass('selected');
    $(row).addClass('selected');
}
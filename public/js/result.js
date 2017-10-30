$(document).ready(function () {
	$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
	bindResult('');
	$('#v-pills-tab a').click(function() {
      $("a.active").removeClass("active");
      $(this).addClass('active');
	  $('#v-pills-tabContent div').addClass('show');
});
});
function changeday()
{
	var n = $("#night_vt").prop("checked");
	if(n){
		$('#post_vtA2_2').removeAttr('readonly');
		$('#post_vtA2_3').removeAttr('readonly');
		$('#post_vtA2_4').removeAttr('readonly');
		
		$('#post_vtA3_2').removeAttr('readonly');
		$('#post_vtA3_3').removeAttr('readonly');
	}else {
		$('#post_vtA2_2').attr('readonly','readonly');
		$('#post_vtA2_3').attr('readonly','readonly');
		$('#post_vtA2_4').attr('readonly','readonly');
		
		$('#post_vtA3_2').attr('readonly','readonly');
		$('#post_vtA3_3').attr('readonly','readonly');
	}
}
function btn_go(){
	var postBD = $('#vpostBD').val();
	var arrnum = [];
	arrnum = postBD.split('');
	var B2 = arrnum[1] + arrnum[2];
	$('#vpostB2').val(B2);
	var B3 = arrnum[3] + arrnum[4] + arrnum[5];
	$('#vpostB3').val(B3);
	var C2 = arrnum[4] + arrnum[5];
	$('#vpostC2').val(C2);
	var C3 = arrnum[1] + arrnum[2] + arrnum[3];
	$('#vpostC3').val(C3);
	var D2 = arrnum[1] + arrnum[5];
	$('#vpostD2').val(D2);
	var D3 = arrnum[2] + arrnum[3] + arrnum[4];
	$('#vpostD3').val(D3);
}
function btn_golo(){
	var lo = $('#postLO').val();
	var arrnum = [];
	var p = lo.toString().indexOf(',');
	if(p>0){
		arrnum = lo.split(',');
		for(var i=0;i<arrnum.length; i++){
			if(arrnum[i].toString().length == 2){
				$('#lolist2').append('<tr><td>' + arrnum[i] + '</td></tr>');
			} else {
				$('#lolist3').append('<tr><td>' + arrnum[i] + '</td></tr>');
			}
		}
	}else{
		if(lo.toString().length == 2){
			$('#lolist2').append('<tr><td>' + lo + '</td></tr>');
		} else {
			$('#lolist3').append('<tr><td>' + lo + '</td></tr>');
		}
	}
}
function removeDuplicates(originalArray, properties) {
	var newArray = [];
	var index = 0;
	var lookupObject = {};
	var totalProperties = properties.length;
	for (var i = 0; i < originalArray.length; i++) {
		var exists = false;
		for (var a = 0; a < newArray.length; a++) {
			var propsFound = 0;
			for (var b = 0; b < totalProperties; b++) {
				if (originalArray[i][properties[b]] == newArray[a][properties[b]]) {
					propsFound++;
				}
			}
			if (propsFound == totalProperties) {
				exists = true;
				break;
			}
		}
		if (!exists) {		
			lookupObject = {
				'daytype': originalArray[i].daytype,
				'post': originalArray[i].post,
				'code': originalArray[i].code + ',' + originalArray[i+1].code,
				'lotterytype': originalArray[i].lotterytype,
				'ldate': originalArray[i].ldate
			}
			newArray.push(lookupObject);
			index++;
		}
	}
	return newArray;
}
function bindResult(date) {
    $.ajax({
        type: "GET",
        url: burl + "/result/bind?q=" + date,
        success: function (data) {
			var vd = [], vn = [], kh = [], lo = [];
            $.each(data, function(index, value){
				if(value.lotterytype == 'Vietname' && value.daytype == 'Day'){
					vd.push(value);					
				}
				if(value.lotterytype == 'Vietname' && value.daytype == 'Night'){
					vn.push(value);					
				}
				if(value.lotterytype == 'Khmer'){
					kh.push(value);					
				}
				if(value.post == 'LO'){
					lo.push(value);					
				}
			});
			vietnameday(vd);
			vietnamenight(vn);
			khmerresult(kh);
			loresult(lo);
        },
    });
}
function vietnameday(data){
	var vnA = [], vnB = [], vnC = [], vnD = [];
	$.each(data, function(index, value){
		if(value.post == 'A'){
			vnA.push(value);
		}
		if(value.post == 'B'){
			vnB.push(value);
		}
		if(value.post == 'C'){
			vnC.push(value);
		}
		if(value.post == 'D'){
			vnD.push(value);
		}
	});
	if(vnA.length>0){
		$('#vd2a').html(vnA[0].code);
		$('#vd3a').html(vnA[1].code);
	}
	if(vnB.length>0){
		$('#vd2b').html(vnB[0].code);
		$('#vd3b').html(vnB[1].code);
	}
	if(vnC.length>0){
		$('#vd2c').html(vnC[0].code);
		$('#vd3c').html(vnC[1].code);
	}
	if(vnD.length>0){
		$('#vd2d').html(vnD[0].code);
		$('#vd3d').html(vnD[1].code);
	}
}
function vietnamenight(data){
	var vnA = [], vnB = [], vnC = [], vnD = [];
	$.each(data, function(index, value){
		if(value.post == 'A'){
			vnA.push(value);
		}
		if(value.post == 'B'){
			vnB.push(value);
		}
		if(value.post == 'C'){
			vnC.push(value);
		}
		if(value.post == 'D'){
			vnD.push(value);
		}
	});
	if(vnA.length>0){
		var vnA2 = [], vnA3 = [];
		$.each(vnA, function(index, value){
			if(value.code.toString().length == 2){
				vnA2.push(value);
			}
			if(value.code.toString().length == 3){
				vnA3.push(value);
			}
		});
		$('#vn2a1').html(vnA2[0].code);
		$('#vn2a2').html(vnA2[1].code);
		$('#vn2a3').html(vnA2[2].code);
		$('#vn2a4').html(vnA2[3].code);	
		$('#vn3a1').html(vnA3[0].code);
		$('#vn3a2').html(vnA3[1].code);
		$('#vn3a3').html(vnA3[2].code);
	}
	if(vnB.length>0){
		$('#vn2b').html(vnB[0].code);
		$('#vn3b').html(vnB[1].code);
	}
	if(vnC.length>0){
		$('#vn2c').html(vnC[0].code);
		$('#vn3c').html(vnC[1].code);
	}
	if(vnD.length>0){
		$('#vn2d').html(vnD[0].code);
		$('#vn3d').html(vnD[1].code);
	}
}
function khmerresult(data){
	var t1 = [], t2 = [], t3 = [], t4 = [];
	$.each(data, function(index, value){
		if(value.daytype == 'T1'){
			t1.push(value);
		}
		if(value.daytype == 'T2'){
			t2.push(value);
		}
		if(value.daytype == 'T3'){
			t3.push(value);
		}
		if(value.daytype == 'T4'){
			t4.push(value);
		}
	});
	if(t1.length>0){
		$('#kt12').html(t1[0].code);
		$('#kt13').html(t1[1].code);
	}
	if(t2.length>0){
		$('#kt22').html(t2[0].code);
		$('#kt23').html(t2[1].code);
	}
	if(t3.length>0){
		$('#kt32').html(t3[0].code);
		$('#kt33').html(t3[1].code);
	}
	if(t4.length>0){
		$('#kt42').html(t4[0].code);
		$('#kt43').html(t4[1].code);
	}
}
function loresult(data){
	var lod = [], lon = [];
	var lo2d = [], lo3d = [], lo2n = [], lo3n = [];
	$.each(data, function(index, value){
		if(value.daytype == 'Day'){
			lod.push(value);
		}
		if(value.daytype == 'Night'){
			lon.push(value);
		}
	});
	$.each(lod, function(index, value){
		if(value.code.toString().length == 2){
			lo2d.push(value);
		}
		if(value.code.toString().length == 3){
			lo3d.push(value);
		}
	});
	$.each(lo2d, function(index, value){
		$('#tbl2dlo tr').append('<td class="text-center">' + value.code + '</td>');
	});
	$.each(lo3d, function(index, value){
		$('#tbl3dlo tr').append('<td class="text-center">' + value.code + '</td>');
	});
	$.each(lon, function(index, value){
		if(value.code.toString().length == 2){
			lo2n.push(value);
		}
		if(value.code.toString().length == 3){
			lo3n.push(value);
		}
	});
	$.each(lo2n, function(index, value){
		$('#tbl2nlo tr').append('<td class="text-center">' + value.code + '</td>');
	});
	$.each(lo3n, function(index, value){
		$('#tbl3nlo tr').append('<td class="text-center">' + value.code + '</td>');
	});
}
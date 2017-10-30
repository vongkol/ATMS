$(document).ready(function () {
	var l = $('#lotterytype').val();
	var d = $('#daytype').val();
	findSeller();
	findBoss();
	searchLottery(l,d);
	$('#lotterytype').on('change',function(){
		l = $(this).val();
		searchLottery($(this).val(),d);
	});
	$('#daytype').on('change',function(){
		d = $(this).val();
		searchLottery(l,$(this).val());
	});
});
function searchLottery(lotterytype, daytype)
{
	$.ajax({
        type: "GET",
        url: burl + "/reports/find?l=" + lotterytype + "&d=" + daytype,
        success: function (data) {
            bindLottery(data);
        }
    });
}
function bindLottery(data){
	var res2 = [];
	var res3 = [];
	$.each(data, function(index, value){
		if(value.code.toString().length == 2)
		{
			var obj2 = {
				amount: value.amount,
				cname: value.cname,
				code2: value.code,
				code3: '',
				daytype: value.daytype,
				lotterytype: value.lotterytype,
				originalcode2: value.originalcode,
				originalcode3: '',
				post: value.post,
				seller: value.seller,
				subtotal2: value.subtotal,
				subtotal3: '',
				trandate: value.trandate,
				userpost: value.userpost
			}	
			res2.push(obj2);
		}
		if(value.code.toString().length == 3){
			var obj3 = {
				amount: value.amount,
				cname: value.cname,
				code2: '',
				code3: value.code,
				daytype: value.daytype,
				lotterytype: value.lotterytype,
				originalcode2: '',
				originalcode3: value.originalcode,
				post: value.post,
				seller: value.seller,
				subtotal2: '',
				subtotal3: value.subtotal,
				trandate: value.trandate,
				userpost: value.userpost
			}
			res3.push(obj3);
		}
	});
	var singles2 = removeDuplicates(res2, ["daytype","lotterytype","seller","trandate","userpost","post"]);	
	var postA2 = [], postB2 = [], postC2 = [], postD2= [], postLo2 = [];
	var singles3 = removeDuplicates(res3, ["daytype","lotterytype","seller","trandate","userpost","post"]);	
	var postA3 = [], postB3 = [], postC3 = [], postD3= [], postLo3 = [];
	$.each(singles2, function(index, value){
		if(value.post === 'A'){
			postA2.push(value);
		}
		if(value.post === 'B'){
			postB2.push(value);
		}
		if(value.post === 'C'){
			postC2.push(value);
		}
		if(value.post === 'D'){
			postD2.push(value);
		}
		if(value.post === 'LO'){
			postLo2.push(value);
		}
	});
	$.each(singles3, function(index, value){
		if(value.post === 'A'){
			postA3.push(value);
		}
		if(value.post === 'B'){
			postB3.push(value);
		}
		if(value.post === 'C'){
			postC3.push(value);
		}
		if(value.post === 'D'){
			postD3.push(value);
		}
		if(value.post === 'LO'){
			postLo3.push(value);
		}
	});
	//Post A
	console.log(postA3);
	var ta = addtoPostTable(postA2, postA3, '#postA2','#postA3','#totalpostA');
	//Post B
	var tb = addtoPostTable(postB2, postB3, '#postB2','#postB3','#totalpostB');
	//Post C
	var tc = addtoPostTable(postC2, postC3, '#postC2','#postC3','#totalpostC');
	//Post D
	var td = addtoPostTable(postD2, postD3, '#postD2','#postD3','#totalpostD');
	//Post LO
	var tl = addtoPostTable(postLo2, postLo3, '#postLo2','#postLo3','#totalpostL');
	var total = ta + tb + tc + td + tl;
	$('#total').html(total);
	$('#total70').html(total * 0.7);
	$('#total30').html(total * 0.3);
}
function addtoPostTable(post2, post3, idtable2,idtable3, idtotalpost){
	var aelement2 = '';
	var aelement3 = '';
	var atwototal = 0;
	var athreetotal = 0;
	$.each(post2, function(i, a){
		aelement2 += '<tr>' +
					'<td class="text-center"><a href="#" data-toggle="tooltip" data-placement="top" title="អ្នកចាក់ៈ ' + a.cname + ' ទឹកប្រាក់ដើមៈ ' + a.amount + '">' + a.originalcode2 + '</a></td>' +
					'<td class="text-center">' + a.subtotal2 + '</td>' +
					'</tr>';
		atwototal += Number(a.subtotal2);
	});
	$.each(post3, function(i, a){
		aelement3 +='<tr><td class="text-center"><a href="#" data-toggle="tooltip" data-placement="top" title="អ្នកចាក់ៈ ' + a.cname + ' ទឹកប្រាក់ដើមៈ ' + a.amount + '">' + a.originalcode3 + '</a></td>' +
					'<td class="text-center">' + a.subtotal3 + '</td></tr>';
		athreetotal += Number(a.subtotal3);
	});
	aelement2 += '<tr style="background-color: yellow"><td></td><td class="text-center"><b>' + atwototal + '</b></td></tr>';
	aelement3 += '<tr style="background-color: yellow"><td></td><td class="text-center"><b>' + athreetotal + '</b></td></tr>';
	$(idtable2).append(aelement2);
	$(idtable3).append(aelement3);
	$(idtotalpost).html(atwototal + athreetotal);
	return atwototal + athreetotal;
}
function findSeller(){
	$.ajax({
        type: "GET",
        url: burl + "/reports/findseller",
        success: function (data) {
			var optionel = '<option value="">សរុបទាំងអស់</option>';
			$.each(data, function(index, value){
				optionel +='<option value="' + value.id + '">' + value.name + '</option>';
			});
			$('#seller').append(optionel);
        }
    });
}
function findBoss(){
	$.ajax({
        type: "GET",
        url: burl + "/reports/findboss",
        success: function (data) {
			$.each(data, function(index, value){
				$('#drboss').append('<option value="' + value.id + '">' + value.name + '</option>');
			});
        }
    });
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
				'originalcode2': originalArray[i].originalcode2,
				'originalcode3': originalArray[i].originalcode3,
				'amount': originalArray[i].amount,
				'trandate': originalArray[i].trandate,
				'daytype': originalArray[i].daytype,
				'lotterytype': originalArray[i].lotterytype,
				'seller': originalArray[i].seller,
				'userpost': originalArray[i].userpost,
				'cname': originalArray[i].cname,
				'post': originalArray[i].post,
				'subtotal2': originalArray[i].subtotal2,
				'subtotal3': originalArray[i].subtotal3
			}
			newArray.push(lookupObject);
			index++;
		}
	}
	return newArray;
}
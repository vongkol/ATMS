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
		if($("#cname").val() === ''){
			$("#cname").val(cname);
		}
    })
});
// search company or enterprise by its name
function searchCompany(name) {
    $.ajax({
        type: "GET",
        url: burl + "/seller/find?q=" + name,
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
// function control number
function splitNumber(num){
	var result;
	result = num.split(',');
	return result;
}
var numlast = [];
function increaseLastNumber(num){
	var result =[];
	var c = num.indexOf('-');
	if(c>0){
		var arrlast = num.split('-');
		var first0 = arrlast[0].toString().substring(0,1);
		var first1 = Number(arrlast[0]);
		var last= Number(arrlast[1]);
		var r;
		for(var i=first1;i<=last;i++){
			if(i.toString().length<=1){
				r=first0+''+i
			}else{
				r=i;
			}
			numlast.push(r + '_' + num);		
		}
	}		
}
var numfirst = [];
function increaseFirstNumber(array){
	var result =[];
	var p = array.indexOf('.');
	if(p>0){
		var number = array.split('.');
		var first = number[0].toString().substring(0,1);
		var last = number[0].toString().slice(-1);
		for(var i=first;i<=9;i++){
			numfirst.push(i+''+last + '_' + array);		
		}
	}		
}
function squash(arr){
	var tmp = [];
	for(var i=0;i<arr.length;i++){
		if(tmp.indexOf(arr[i])==-1){
			tmp.push(arr[i]);
		}
	}
	return tmp;
}
function shuffle2d(array, num){
	var arr = [
		array[0]+''+array[1] + '_' + num,
		array[1]+''+array[0] + '_' + num
	];
	return arr;
}
function shuffle3d(array, num){
	var arr = [
		array[0]+''+array[1]+''+array[2] + '_' + num,
		array[0]+''+array[2]+''+array[1] + '_' + num,
		array[1]+''+array[2]+''+array[0] + '_' + num,
		array[1]+''+array[0]+''+array[2] + '_' + num,
		array[2]+''+array[1]+''+array[0] + '_' + num,
		array[2]+''+array[0]+''+array[1] + '_' + num
		];
	return squash(arr);
}
function shuffle4d(array, num){
	var arr = [
		array[0]+''+array[1]+''+array[2]+''+array[3] + '_' + num,
		array[0]+''+array[1]+''+array[3]+''+array[2] + '_' + num,
		array[0]+''+array[2]+''+array[1]+''+array[3] + '_' + num,
		array[0]+''+array[2]+''+array[3]+''+array[1] + '_' + num,
		array[0]+''+array[3]+''+array[2]+''+array[1] + '_' + num,
		array[0]+''+array[3]+''+array[1]+''+array[2] + '_' + num,
		array[1]+''+array[0]+''+array[2]+''+array[3] + '_' + num,
		array[1]+''+array[0]+''+array[3]+''+array[2] + '_' + num,
		array[1]+''+array[2]+''+array[0]+''+array[3] + '_' + num,
		array[1]+''+array[2]+''+array[3]+''+array[0] + '_' + num,
		array[1]+''+array[3]+''+array[0]+''+array[2] + '_' + num,
		array[1]+''+array[3]+''+array[2]+''+array[0] + '_' + num,
		array[2]+''+array[0]+''+array[1]+''+array[3] + '_' + num,
		array[2]+''+array[0]+''+array[3]+''+array[1] + '_' + num,
		array[2]+''+array[1]+''+array[0]+''+array[3] + '_' + num,
		array[2]+''+array[1]+''+array[3]+''+array[0] + '_' + num,
		array[2]+''+array[3]+''+array[0]+''+array[1] + '_' + num,
		array[2]+''+array[3]+''+array[1]+''+array[0] + '_' + num,
		array[3]+''+array[0]+''+array[1]+''+array[2] + '_' + num,
		array[3]+''+array[0]+''+array[2]+''+array[1] + '_' + num,
		array[3]+''+array[1]+''+array[2]+''+array[0] + '_' + num,
		array[3]+''+array[1]+''+array[0]+''+array[2] + '_' + num,
		array[3]+''+array[2]+''+array[0]+''+array[1] + '_' + num,
		array[3]+''+array[2]+''+array[1]+''+array[0] + '_' + num
		];
	return squash(arr);
}
var shuffle = [];
function shuffleNumber(num){
	var result=[];
	var x = num.toString().indexOf('x');
	if(x>0){
		var number= num.replace(/[^\d]/g,'');
		var numarr= num.replace(/[^\d]/g,'').split('');
		if(number.toString().length==2){
			result=shuffle2d(numarr, num);	
		}else if(number.toString().length==3){
			result=shuffle3d(numarr, num);
		}else{
			result=shuffle4d(numarr, num);
		}
	}
	shuffle = shuffle.concat(result);
}
var res =[];
function getSingleNum(array){
	if(array.toString().indexOf('.')<=0){
	if(Number(array)){
		res.push(array + '_' + array);
		}
	}
}
function reset(){
	res=[];
	numlast=[];
	numfirst=[];
	shuffle=[];
	$('#number').val('');
	$('#amount').val('');
	$('#number').focus();
	$('#tbl2digit tbody tr').remove();
	$('#tbl3digit tbody tr').remove();
	$('#tblall .remove').remove();
	total2 = 0;
	total3 = 0;
	index2 = 1;
	index3 = 1;
}
// function add to grid
var total2 = 0;
var total3 = 0;
var index2 = 1;
var index3 = 1;
function addToGrid()
{
	var num = $('#number').val();
    var amount = $("#amount").val();
	var cname = $('#cname').val();
	var arrnum = splitNumber(num);
	var original = '';
	var day = $("input[name='shift']:checked").val();
	var numvalue = [];
	var type = $("input[name='type']:checked").val();
	var saler = $('#seller_name').html();

	if(type === undefined){
		alert("សូមធ្វើការជ្រើសរើសប្រភេទប៉ុស្តិ៍ឆ្នោត!");
	}else if(num ===''){
		alert("សូមធ្វើការបញ្ជូលលេខឆ្នោត!");
	} else if(amount ===''){
		alert("សូមធ្វើការបញ្ជូលចំនួនទឹកប្រាក់!");
	} else if(cname ===''){
		alert("សូមធ្វើការបញ្ជូលឈ្មោះអ្នកចាក់!");	
	} else if(saler === ''){
		alert("សូមធ្វើការបញ្ជូលឈ្មោះអ្នកលក់!");	
	}
	else{		
	 // loop
    for(var i=0; i<arrnum.length;i++)
    {
		getSingleNum(arrnum[i]);
		increaseLastNumber(arrnum[i]);
		increaseFirstNumber(arrnum[i]);
		shuffleNumber(arrnum[i]);		
    }
	numvalue = res.concat(numlast).concat(numfirst).concat(shuffle);
	var element2 = '';
	var element3 = '';
	for(var i=0;i<numvalue.length;i++)
	{
		var x = numvalue[i].split('_')[0].toString().indexOf('x');
		var p = numvalue[i].split('_')[0].toString().indexOf('.');
		var numb = numvalue[i].split('_')[0];
		if(x>0 || p>0){
			numb = numvalue[i].split('_')[0].replace(/[^\d]/g,'');
		}		
		var k = 0;		
		if(numb.toString().length === 2)
		{
			var obj2 = {
				index: index2,
				num: numvalue[i].split('_')[0],
				luy: amount,
				name: cname,
				a: $("#a").prop("checked") ? '&#10004;':'',
				b: $("#b").prop("checked") ? '&#10004;':'',
				c: $("#c").prop("checked") ? '&#10004;':'',
				d: $("#d").prop("checked") ? '&#10004;':'',
				lo: $("#lo").prop("checked") ? '&#10004;':'',
				day: day,
				original: numvalue[i].split('_')[1]
			};		
			k = (obj2.a=='&#10004;'?1:0) + (obj2.b=='&#10004;'?1:0) + (obj2.c=='&#10004;'?1:0) + (obj2.d=='&#10004;'?1:0) + (obj2.lo=='&#10004;'?1:0);
			element2 += '<tr data-original="' + obj2.original + '" data-subtotal="' + obj2.luy * k + '"><td class="text-center"><i class="fa fa-trash-o" onclick="deleterow2(this)" data-k="' + k + '" data-luy="' + obj2.luy + '"></i></td><td>' + obj2.index + '</td><td>' + obj2.num + '</td><td>' + obj2.luy + '</td>' + 
				   '<td class="text-danger text-center" id="rowa">' + obj2.a + '</td>'+ 
				   '<td class="text-danger text-center" id="rowb">' + obj2.b + '</td>'+
				   '<td class="text-danger text-center" id="rowc">' + obj2.c + '</td>'+
				   '<td class="text-danger text-center" id="rowd">' + obj2.d + '</td>'+
				   '<td class="text-danger text-center" id="rowlo">' + obj2.lo + '</td>'+				   
				   '</tr>';
			total2 +=Number(obj2.luy) * k;	
			index2++;
		}
		else if(numb.toString().length ===3)
		{			
			var obj3 = {
				index: index3,
				num: numvalue[i].split('_')[0],
				luy: amount,
				name: cname,
				a: $("#a").prop("checked") ? '&#10004;':'',
				b: $("#b").prop("checked") ? '&#10004;':'',
				c: $("#c").prop("checked") ? '&#10004;':'',
				d: $("#d").prop("checked") ? '&#10004;':'',
				lo: $("#lo").prop("checked") ? '&#10004;':'',
				day: day,
				original: numvalue[i].split('_')[1]
			};
			k = (obj3.a=='&#10004;'?1:0) + (obj3.b=='&#10004;'?1:0) + (obj3.c=='&#10004;'?1:0) + (obj3.d=='&#10004;'?1:0) + (obj3.lo=='&#10004;'?1:0);
			element3 += '<tr data-original="' + obj3.original + '" data-subtotal="' + obj3.luy * k + '"><td class="text-center"><i class="fa fa-trash-o" onclick="deleterow3(this)" data-k="' + k + '" data-luy="' + obj3.luy + '"></i></td><td>' + obj3.index + '</td><td>' + obj3.num + '</td><td>' + obj3.luy + '</td>' +
				   '<td class="text-danger text-center">' + obj3.a + '</td>'+ 
				   '<td class="text-danger text-center">' + obj3.b + '</td>'+
				   '<td class="text-danger text-center">' + obj3.c + '</td>'+
				   '<td class="text-danger text-center">' + obj3.d + '</td>'+
				   '<td class="text-danger text-center">' + obj3.lo + '</td>'+
				   '</tr>';
			total3 +=Number(obj3.luy) * k;	
			index3++;
		}	
	}
	$('#tbl2digit').append(element2);
	$('#tbl3digit').append(element3);
	
	$('#tblall .remove').remove();
	var telement = '';
	telement  = '<tr class="remove"><td><strong class="text-danger">សរុប: ' + total2 + '</strong></td><td></td>' +
				'<td><strong class="text-danger">សរុប: ' + total3 + '</strong></td></tr>';
	
	$('#tblall').append(telement);
	res=[];
	numlast=[];
	numfirst=[];
	shuffle=[];
	$('#number').val('');
	$('#amount').val('');
	$('#number').focus();
	}
}
function cleanArray(actual) {
  var newArray = new Array();
  for (var i = 0; i < actual.length; i++) {
    if (actual[i]) {
      newArray.push(actual[i]);
    }
  }
  return newArray;
}
function deleterow2(option){
	$(option).closest('tr').remove();
	var k = $(option).attr('data-k');
	var luy = $(option).attr('data-luy');
	total2 -= (k*luy);
	$('#tblall .remove').remove();
	var telement = '';
	telement  = '<tr class="remove"><td><strong class="text-danger">សរុប: ' + total2 + '</strong></td><td></td>' +
				'<td><strong class="text-danger">សរុប: ' + total3 + '</strong></td></tr>';
	
	$('#tblall').append(telement);
	index2 = 1;
}
function deleterow3(option){
	$(option).closest('tr').remove();
	var k = $(option).attr('data-k');
	var luy = $(option).attr('data-luy');
	total3 -= (k*luy);
	$('#tblall .remove').remove();
	var telement = '';
	telement  = '<tr class="remove"><td><strong class="text-danger">សរុប: ' + total2 + '</strong></td><td></td>' +
				'<td><strong class="text-danger">សរុប: ' + total3 + '</strong></td></tr>';
	
	$('#tblall').append(telement);
	index3 = 1;
}
function save()
{
	var data = new Array();
	var rawdata2 = {};
	var rawdata3 = {};
	var lpost = [];
	var trs2 = $("#tbl2digit tbody tr");
	for(var i=0; i<trs2.length;i++)
	{
		var arr=[];
		var a = $(trs2[i]).children("td:nth-child(5)").html();
		var b = $(trs2[i]).children("td:nth-child(6)").html();
		var c = $(trs2[i]).children("td:nth-child(7)").html();
		var d = $(trs2[i]).children("td:nth-child(8)").html();
		var lo = $(trs2[i]).children("td:nth-child(9)").html();
		var code = $(trs2[i]).children("td:nth-child(3)").html();
		var amount = $(trs2[i]).children("td:nth-child(4)").html();
		var originalcode = $(trs2[i]).attr("data-original");
		var subtotal = $(trs2[i]).attr("data-subtotal");
		a = a.length>=1?'A':'';
		b = b.length>=1?'B':'';
		c = c.length>=1?'C':'';
		d = d.length>=1?'D':'';
		lo = lo.length>=1?'LO':'';
		arr.push(a);
		arr.push(b);
		arr.push(c);
		arr.push(d);
		arr.push(lo);

		rawdata2 = {
			lotterytype: 'Thai',
			post: cleanArray(arr),
			daytype: $("input[name='shift']:checked").val(),
			cname: $('#cname').val(),
			code: code,
			originalcode: originalcode,
			amount: amount,
			subtotal: subtotal,
			seller: $('#seller_name').html()
		};
		data.push(rawdata2);
	}

	var trs3 = $("#tbl3digit tbody tr");
	for(var i=0; i<trs3.length;i++)
	{
		var arr=[];
		var a = $(trs3[i]).children("td:nth-child(5)").html();
		var b = $(trs3[i]).children("td:nth-child(6)").html();
		var c = $(trs3[i]).children("td:nth-child(7)").html();
		var d = $(trs3[i]).children("td:nth-child(8)").html();
		var lo = $(trs3[i]).children("td:nth-child(9)").html();
		var code = $(trs3[i]).children("td:nth-child(3)").html();
		var amount = $(trs3[i]).children("td:nth-child(4)").html();
		var originalcode = $(trs3[i]).attr("data-original");
		var subtotal = $(trs3[i]).attr("data-subtotal");
		a = a.length>=1?'A':'';
		b = b.length>=1?'B':'';
		c = c.length>=1?'C':'';
		d = d.length>=1?'D':'';
		lo = lo.length>=1?'LO':'';
		arr.push(a);
		arr.push(b);
		arr.push(c);
		arr.push(d);
		arr.push(lo);

		rawdata3 = {
			lotterytype: 'Thai',
			post: cleanArray(arr),
			daytype: $("input[name='shift']:checked").val(),
			cname: $('#cname').val(),
			code: code,
			originalcode: originalcode,
			amount: amount,
			subtotal: subtotal,
			seller: $('#seller_name').html()
		};
		data.push(rawdata3);
	}
	if(data.length>0){
		$.ajax({
        type: "POST",
		url: burl + "/khmer/savekh",	
		data: JSON.stringify({"a": data}),
		contentType: "application/json",
		beforeSend: function (request) {
			return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
        },
		success: function (sms) {
			console.log(sms);
        }
		});
	}else{
		alert("មិនមានលេខឆ្នោតណាដែលត្រូវរក្សាទុក!");
	}
}
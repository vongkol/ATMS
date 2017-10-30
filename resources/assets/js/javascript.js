var number = '123,56x,989x,9988x,00-05,01.';
var arrnum = splitNumber(number);
for(var i=0;i<arrnum.length;i++){
	console.log(arrnum[i]);
	console.log(shuffleNumber(arrnum[i]));
	console.log(increaseLastNumber(arrnum[i]));
	console.log(increaseFirstNumber(arrnum[i]));
}
function splitNumber(num){
	var result;
	result = num.split(',');
	return result;
}
function shuffle(array){
	let counter = array.length;
	while(counter>0){
		let index = Math.floor(Math.random() * counter);
		counter--;
		let temp = array[counter];
		array[counter]=array[index];
		array[index]=temp;
	}
	return array;
}
function shuffle2d(array){
	var arr = [
		array[0]+''+array[1],
		array[1]+''+array[0]
	];
	return arr;
}
function find_duplicate(arr){
	var len=arr.length;
	out=[];
	counts={};
	for(var i=0;i<len;i++){
		var item = arr[i];
		counts[item]=counts[item]>=1?counts[item]+1:1;
		if(counts[item]===2){
		out.push(item);
		}
	}
	return out;
}
function shuffle3d(array){
	var arr = [
		array[0]+''+array[1]+''+array[2],
		array[0]+''+array[2]+''+array[1],
		array[1]+''+array[2]+''+array[0],
		array[1]+''+array[0]+''+array[2],
		array[2]+''+array[1]+''+array[0],
		array[2]+''+array[0]+''+array[1]
		];
	return squash(arr);
}
function shuffle4d(array){
	var arr = [
		array[0]+''+array[1]+''+array[2]+''+array[3],
		array[0]+''+array[1]+''+array[3]+''+array[2],
		array[0]+''+array[2]+''+array[1]+''+array[3],
		array[0]+''+array[2]+''+array[3]+''+array[1],
		array[0]+''+array[3]+''+array[2]+''+array[1],
		array[0]+''+array[3]+''+array[1]+''+array[2],
		array[1]+''+array[0]+''+array[2]+''+array[3],
		array[1]+''+array[0]+''+array[3]+''+array[2],
		array[1]+''+array[2]+''+array[0]+''+array[3],
		array[1]+''+array[2]+''+array[3]+''+array[0],
		array[1]+''+array[3]+''+array[0]+''+array[2],
		array[1]+''+array[3]+''+array[2]+''+array[0],
		array[2]+''+array[0]+''+array[1]+''+array[3],
		array[2]+''+array[0]+''+array[3]+''+array[1],
		array[2]+''+array[1]+''+array[0]+''+array[3],
		array[2]+''+array[1]+''+array[3]+''+array[0],
		array[2]+''+array[3]+''+array[0]+''+array[1],
		array[2]+''+array[3]+''+array[1]+''+array[0],
		array[3]+''+array[0]+''+array[1]+''+array[2],
		array[3]+''+array[0]+''+array[2]+''+array[1],
		array[3]+''+array[1]+''+array[2]+''+array[0],
		array[3]+''+array[1]+''+array[0]+''+array[2],
		array[3]+''+array[2]+''+array[0]+''+array[1],
		array[3]+''+array[2]+''+array[1]+''+array[0]	
		];
	return squash(arr);
}
function shuffleNumber(num){
	var result=[];
	var x = num.indexOf('x');
	if(x>0){
		var number= num.replace(/[^\d]/g,'');
		var numarr= num.replace(/[^\d]/g,'').split('');
		if(number.toString().length==2){
			result=shuffle2d(numarr);		
		}else if(number.toString().length==3){
			result=shuffle3d(numarr);
		}else{
			result=shuffle4d(numarr);
		}
	}
	return result;
}
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
			result.push(r);		
		}
	}		
	return result;
}
function increaseFirstNumber(num){
	var result =[];
	var p = num.indexOf('.');
	if(p>0){
		var number = num.split('.');
		var first = number[0].toString().substring(0,1);
		var last = number[0].toString().slice(-1);
		for(var i=0;i<=9;i++){
			result.push(i+''+last);		
		}
	}		
	return result;
}
function shuffleNumber1(){
	var arr = [1,2,3,4];
	var last = arr.join("");
	var res = [];
	var temp;
	for(var i=0;i<4;i++){
		for(j=0;j<4;j++){
			temp = arr[i];
			arr[i] = arr[j];
			arr[j] = temp;
			res.push(arr.join(""));			
		}
	}
	var ls = "";
	for(var i=last.length-1;i>=0;i--){
		ls+=last[i];
	}
	res.push(ls);
			
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
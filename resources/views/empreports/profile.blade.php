<html>
    <head>
        <title></title>
        <style>
            @page{
                size: auto;
                margin: 3mm;
            }
            .head1{
                text-align: center;
                font-size: 22px;
            }
            .head2{
                text-align: center;
                font-size: 18px;
            }
        </style>
    </head>
    <body> 
        <table style="width: 80%; margin: 0 auto; border: 0px solid; border-collapse: collapse;">
            <tr>
                <td colspan="3" class="head1">ព្រះរាជាណាចក្រកម្ពុជា</td>
            </tr>
            <tr>
                <td colspan="3" class="head2">ជាតិ សាសនា ព្រះមហាក្សត្រ</td>
            </tr>
            <td style="width:100%; padding-top: 30px; position: absolute; top: 25px; left: 80%;">
                    <table style="width: 100%">
                        <tr>
                            <td>
                                <img style="margin-left: 0px;" src="{{asset('profile/'.$employee->photo)}}" width="130px" height="160px">
                            </td>
                        </tr>
                    </table>
                </td>
            <tr>
            <tr>
                <td colspan="3" ><span style="margin-left: 33px;">ក្រសួងមហាផ្ទៃ</span></td>
            </tr>
            <tr>
                <td colspan="3"><span style="margin-left: 0px;">អគ្គស្នងការនគរបាលជាតិ</span></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top: 30px;" class="head2">ប្រវត្តិរូបសង្ខេបមន្ត្រីនគរបាលជាតិ</td>
            </tr>
            <tr>
                <td colspan="3"> <br><br><span style="margin-left: 0px; font-weight: bold;">១ - ព័ត៌មានផ្ទាល់ខ្លួន</span></td>
            </tr>
                <td valign="top" style="width: 100%; padding-top: ២0px; padding-left: 40px;">
                    <table style="width: 100%">
                        <tr>
                            <td style="width: 33%;"> នាមត្រកូល និង នាមខ្លួន  : {{$employee->emp_code}} </td>
                            <td style="width: 33%;"> អក្សរទ្បាតាំង :  {{$employee->eng_name}} </td>
                            <td style="width: 33%;"> ភេទ : {{$employee->gender}} </td>
                        </tr>
                        <tr>
                            <td>ថ្ងៃ ខែ ឆ្នាំកំណើត  : {{$employee->birth_of_date}}
                            </td>
                            <td>សញ្ជាតិ :  {{$employee->nationality}} </td>
                        </tr>
                        <tr>
                            <td>ទីកន្លែងកំណើត  : {{$employee->place_of_bod}}</td>
                        </tr>
                        <tr>
                            <td>អាស័យដ្ធានបច្ចុប្បន្ន  : {{$employee->address}}</td>
                        </tr>
                        <tr>
                            <td>លេខទូរស័ព្ទ  : {{$employee->phone}}</td>
                        </tr>
                    </table>
                </td>
                <td style="width: 20%"></td>
            </tr>
            </tr>
                <td valign="top" style="width: 100%; padding-top: ២0px; padding-left: 40px;">
                    <table style="width: 100%; float: left;">
                        <tr>
                           <td style="width: 33%;"> 
                                <div style="width: 95%; border: blue solid 1px; border-radius: 10px; padding: 5px 7px;">
                                    អត្តលេខមន្តី្រនគបាលជាតិ
                                    <br>លេខ:
                                </div>
                            </td>
                            <td style="width: 33%;"> 
                                <div style="width: 95%; border: blue solid 1px; border-radius: 10px; padding:5px 7px;">
                                    លេខអត្តសញ្ញាណប័ណ្ណនមន្ត្រីនគរបាលជាតិ
                                    <br>លេខ:
                                </div>
                            </td>
                            <td style="width: 33%;"> 
                                <div style="width: 95%; border: blue solid 1px; border-radius: 10px; padding:5px 7px;">
                                    លេខអត្តសញ្ញាណប័ណ្ណខ្មែរ
                                    <br>លេខ:
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 20%"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top: 30px"><span style="margin-left: 0px; font-weight: bold;">២​ - កម្រិតវប្បធ៌មទូទៅ: </span></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top: 30px"><span style="margin-left: 0px; font-weight: bold;">៣​ - ចំណេះដឹងភាសាបរទេស: </span></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top: 30px" ><span style="margin-left: 0px; font-weight: bold;">៣​ - កម្រិតបណ្តះបណ្តាលវិជ្ជាវីវ: (ជំនាញ បច្ចេកទេស ឯកទេស) </span>
                </td>
              
            </tr>
            <tr>  
                <td style="padding-left: 40px;">សូមរៀបរាប់វគ្គបណ្តុះបណ្តាល និងថ្ងៃ ខែ ឆ្នាំ ដែលបានសិក្សាកន្លងមក:</td>
            </tr>
            <tr>  
                <td style="padding-left: 40px;">
                    <table style="width: 100%; border: blue solid 1px; border-collapse: collapse;">
                        <tr>
                            <th style="width: 25%; border: solid 1px blue; border-collapse: collapse​; background: #eee;">កាលបវិច្ចេទ</th>
                            <th style="width: 25%; border: solid 1px blue; border-collapse: collapse; background: #eee;">រយ:ពេលសិក្សា</th> 
                            <th style="width: 25%; border: solid 1px blue; border-collapse: collapse; background: #eee;">ជំនាញ នៃវគ្គសិក្សាបណ្តោះបណ្តាល</th>
                            <th style="width: 25%; border: solid 1px blue; border-collapse: collapse; background: #eee;">គ្រឹះស្តានសិក្សាបណ្តះបណ្តាល</th>
                        </tr>
                        <tr>
                            <td style="​width: 25%; border: solid 1px blue; border-collapse: collapse;">01/01/2012</td>
                            <td style="width: 25%; border: solid 1px blue; border-collapse: collapse;​">2ឆ្នាំ</td>
                            <td style="width: 25%; border: solid 1px blue; border-collapse: collapse; ">Information Technology</td>
                            <td style="width: 25%; border: solid 1px blue; border-collapse: collapse; ">អគ្គស្នងការជាតិ</th>
                        </tr>
                    
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3"> <br><br><span style="margin-left: 0px; font-weight: bold;">៤ - ប្រវត្តិការងារ</span></td>
            </tr>
                <td valign="top" style="width: 100%; padding-top: ២0px; padding-left: 40px;">
                    <table style="width: 100%">
                        <tr>
                            <td>ថ្ងៃ ខែ ឆ្នាំចូលបម្រើការងារក្របខណ្ឌរដ្ធរ  :</td>
                        </tr>
                        <tr>
                            <td><tr>
                            <td>ថ្ងៃ ខែ ឆ្នាំចូលបម្រើការងារក្របខណ្ឌនគរបាលជាតិ  : </td>
                        </tr></td>
                        </tr>
                        <tr>
                            <td> ឋានន្តរសក្តិ:</td>
                        </tr>
                        <tr>
                            <td> មុខដំណែង:</td>
                        </tr>
                        <tr>
                            <td> អង្គភាព: </td>
                        </tr>
                    </table>
                </td>
        </table>
    </body>
</html>
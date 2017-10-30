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
            <tr>
                <td colspan="3" style="padding-top: 40px;"><span style="margin-left: 33px;">ក្រសួងមហាផ្ទៃ</span></td>
            </tr>
            <tr>
                <td colspan="3"><span style="margin-left: 0px;">អគ្គស្នងការនគរបាលជាតិ</span></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top: 30px;" class="head2">ប្រវត្តិរូបសង្ខេប</td>
            </tr>
            <tr>
                <td style="width:30%; padding-top: 30px">
                    <table style="width: 100%">
                        <tr>
                            <td>
                                <img style="margin-left: 0px;" src="{{asset('profile/'.$employee->photo)}}" width="130px" height="160px">
                            </td>
                        </tr>
                    </table>
                </td>
                <td valign="top" style="width: 50%; padding-top: 30px;">
                    <table style="width: 100%">
                        <tr>
                            <td>អត្តលេខ</td>
                            <td>:</td>
                            <td>{{$employee->emp_code}}</td>
                        </tr>
                        <tr>
                            <td>ឈ្មោះភាសាខ្មែរ</td>
                            <td>:</td>
                            <td>{{$employee->khm_name}}</td>
                        </tr>
                        <tr>
                            <td>ឈ្មោះទ្បាតាំង</td>
                            <td>:</td>
                            <td>{{$employee->eng_name}}</td>
                        </tr>
                        <tr>
                            <td>ភេទ</td>
                            <td>:</td>
                            <td>{{$employee->gender}}</td>
                        </tr>
                        <tr>
                            <td>សញ្ជាត្តិ</td>
                            <td>:</td>
                            <td>{{$employee->nationality}}</td>
                        </tr>
                    </table>
                </td>
                <td style="width: 20%"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top: 30px"><span style="margin-left: 0px; font-weight: bold;">ព័ត៌មានទូទៅ</span></td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" border="0">
                        <tr>
                            <td style="width: 30%"><span style="margin-left: 0px;">ស្ថានភាពគ្រួសារ</span></td>
                            <td>:</td>
                            <td>{{$employee->marital_status}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">ថ្ងៃខែឆ្នាំកំណើត</span></td>
                            <td>:</td>
                            <td>{{$employee->birth_of_date}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">លេខទូរសព្ទ</span></td>
                            <td>:</td>
                            <td>{{$employee->phone}}</td>
                        </tr>
                        <tr>
                            <td valign="top"><span style="margin-left: 0px;">អាស័យដ្ឋាន</span></td>
                            <td valign="top">:</td>
                            <td>{{$employee->address}}</td>
                        </tr>
                    </table>
                </td>             
            </tr>         
            <tr>
                <td colspan="3"><span style="margin-left: 0px; font-weight: bold;">ព័ត៌មានការងារ</span></td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" border="0">
                        <tr>
                            <td style="width: 30%"><span style="margin-left: 0px;">កំរិតវប្បធម៌</span></td>
                            <td>:</td>
                            <td>{{$employee->qualification}}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%"><span style="margin-left: 0px;">នាយកដ្ឋាន</span></td>
                            <td>:</td>
                            <td>{{$employee->department_name}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">ការិយាល័យ</span></td>
                            <td>:</td>
                            <td>{{$employee->office_name}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">ផ្នែក</span></td>
                            <td>:</td>
                            <td>{{$employee->unit_name}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">មុខដំណែង</span></td>
                            <td>:</td>
                            <td>{{$employee->position_name}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">ថ្ងៃបម្រើការងារ</span></td>
                            <td>:</td>
                            <td>{{$employee->hire_date}}</td>
                        </tr>
                    </table>
                </td>  
            </tr>
        </table>
    </body>
</html>
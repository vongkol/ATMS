<html>
    <head>
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
                <td colspan="2" class="head1">ព្រះរាជាណាចក្រកម្ពុជា</td>
            </tr>
            <tr>
                <td colspan="2" class="head2">ជាតិ សាសនា ព្រះមហាក្សត្រ</td>
            </tr>
            <tr>
                <td colspan="2" style="padding-top: 40px;"><span style="margin-left: 33px;">ក្រសួងមហាផ្ទៃ</span></td>
            </tr>
            <tr>
                <td colspan="2"><span style="margin-left: 0px;">អគ្គស្នងការនគរបាលជាតិ</span></td>
            </tr>
            <tr>
                <td colspan="2" style="padding-top: 30px;" class="head2">វត្តមានមន្រ្តីប្រចាំថ្ងៃ</td>
            </tr>
            <tr>
                <td style="width:30%; padding-top: 30px">
                    <table style="width: 100%">
                        <tr>
                            <td>
                                <img style="margin-left: 0px;" src="{{asset('profile/'.$tams->photo)}}" width="130px" height="160px">
                            </td>
                        </tr>
                    </table>
                </td>
                <td valign="top" style="width: 70%; padding-top: 30px;">
                    <table style="width: 100%">
                        <tr>
                            <td>អត្តលេខ</td>
                            <td>:</td>
                            <td>{{$tams->emp_code}}</td>
                        </tr>
                        <tr>
                            <td>ឈ្មោះភាសាខ្មែរ</td>
                            <td>:</td>
                            <td>{{$tams->khm_name}}</td>
                        </tr>
                        <tr>
                            <td>មុខងារ</td>
                            <td>:</td>
                            <td>{{$tams->position_name}}</td>
                        </tr>
                        <tr>
                            <td>ផ្នែក</td>
                            <td>:</td>
                            <td>{{$tams->unit_name}}</td>
                        </tr>
                        <tr>
                            <td>ការិយាល័យ</td>
                            <td>:</td>
                            <td>{{$tams->office_name}}</td>
                        </tr>
                        <tr>
                            <td>នាយកដ្ឋាន</td>
                            <td>:</td>
                            <td>{{$tams->department_name}}</td>
                        </tr>
                    </table>
                </td>           
            </tr>
            <tr>
                <td colspan="2" style="padding-top: 30px"><span style="margin-left: 0px; font-weight: bold;">ព័ត៌មានម៉ោងធ្វើការ</span></td>
            </tr>
            <tr>
                <td colspan="2">
                    <table width="100%" border="0">
                        <tr>
                            <td><span style="margin-left: 0px;">ថ្ងៃចូល</span></td>
                            <td>:</td>
                            <td>{{$tams->date_in}}</td>
                            <td><span style="margin-left: 0px;">ថ្ងៃចេញ</span></td>
                            <td>:</td>
                            <td>{{$tams->date_out}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">ម៉ោងចូល</span></td>
                            <td>:</td>
                            <td>{{$tams->time_in}}</td>
                            <td><span style="margin-left: 0px;">ម៉ោងចេញ</span></td>
                            <td>:</td>
                            <td>{{$tams->time_out}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">ចូលមុន</span></td>
                            <td>:</td>
                            <td>{{$tams->early_in}}</td>
                            <td><span style="margin-left: 0px;">ចេញមុន</span></td>
                            <td>:</td>
                            <td>{{$tams->early_out}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">ចូលយឺត</span></td>
                            <td>:</td>
                            <td>{{$tams->late_in}}</td>
                            <td><span style="margin-left: 0px;">ចេញយឺត</span></td>
                            <td>:</td>
                            <td>{{$tams->late_out}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">ម៉ោងធ្វើការ</span></td>
                            <td>:</td>
                            <td>{{$tams->work_hour}}</td>
                            <td><span style="margin-left: 0px;">សុំច្បាប់</span></td>
                            <td>:</td>
                            <td>{{$tams->isleave=='1'?'មាន':'គ្មាន'}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">ការស្គេន</span></td>
                            <td>:</td>
                            <td>{{$tams->ic=='1'?'មិនត្រឹមត្រូវ':'ត្រឹមត្រូវ'}}</td>
                            <td><span style="margin-left: 0px;">អវត្តមាន</span></td>
                            <td>:</td>
                            <td>{{$tams->isabsent=='1'?'អវត្តមាន':'វត្តមាន'}}</td>
                        </tr>
                    </table>
                </td>             
            </tr>         
        </table>
    </body>
</html>
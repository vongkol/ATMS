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
                <td colspan="2" style="padding-top: 30px;" class="head2">ការកែវត្តមានមន្រ្តីប្រចាំថ្ងៃ</td>
            </tr>
            <tr>
                <td style="width:30%; padding-top: 30px">
                    <table style="width: 100%">
                        <tr>
                            <td>
                                <img style="margin-left: 0px;" src="{{asset('profile/'.$tams_approval->photo)}}" width="130px" height="160px">
                            </td>
                        </tr>
                    </table>
                </td>
                <td valign="top" style="width: 70%; padding-top: 30px;">
                    <table style="width: 100%">
                        <tr>
                            <td>អត្តលេខ</td>
                            <td>:</td>
                            <td>{{$tams_approval->emp_code}}</td>
                        </tr>
                        <tr>
                            <td>ឈ្មោះភាសាខ្មែរ</td>
                            <td>:</td>
                            <td>{{$tams_approval->khm_name}}</td>
                        </tr>
                        <tr>
                            <td>មុខងារ</td>
                            <td>:</td>
                            <td>{{$tams_approval->position_name}}</td>
                        </tr>
                        <tr>
                            <td>ផ្នែក</td>
                            <td>:</td>
                            <td>{{$tams_approval->unit_name}}</td>
                        </tr>
                        <tr>
                            <td>ការិយាល័យ</td>
                            <td>:</td>
                            <td>{{$tams_approval->office_name}}</td>
                        </tr>
                        <tr>
                            <td>នាយកដ្ឋាន</td>
                            <td>:</td>
                            <td>{{$tams_approval->department_name}}</td>
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
                            <td><span style="margin-left: 0px;">ថ្ងៃស្គេនចូល</span></td>
                            <td>:</td>
                            <td>{{$tams_approval->date_in}}</td>
                            <td><span style="margin-left: 0px;">ថ្ងៃស្គេនចេញ</span></td>
                            <td>:</td>
                            <td>{{$tams_approval->date_out}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">ម៉ោងស្គេនចូល</span></td>
                            <td>:</td>
                            <td>{{$tams_approval->time_in}}</td>
                            <td><span style="margin-left: 0px;">ម៉ោងស្គេនចេញ</span></td>
                            <td>:</td>
                            <td>{{$tams_approval->time_out}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">ថ្ងៃកែចូល</span></td>
                            <td>:</td>
                            <td>{{$tams_approval->a_date_in}}</td>
                            <td><span style="margin-left: 0px;">ថ្ងៃកែចេញ</span></td>
                            <td>:</td>
                            <td>{{$tams_approval->a_date_out}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">ម៉ោងកែចូល</span></td>
                            <td>:</td>
                            <td>{{$tams_approval->a_time_in}}</td>
                            <td><span style="margin-left: 0px;">ម៉ោងកែចេញ</span></td>
                            <td>:</td>
                            <td>{{$tams_approval->a_time_out}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">អនុម័ត</span></td>
                            <td>:</td>
                            <td>
                            @if ($tams_approval->approve == '0')
                                មិនទាន់អនុម័ត
                            @elseif ($tams_approval->approve == '1')
                                អនុម័ត
                            @else
                                ច្រានចោល
                            @endif
                            </td>   
                            <td><span style="margin-left: 0px;">អនុម័តដោយ</span></td>
                            <td>:</td>
                            <td>{{$tams_approval->user_name}}</td>                 
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">ថ្ងៃអនុម័ត</span></td>
                            <td>:</td>
                            <td colspan="4">{{$tams_approval->create_at}}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 0px;">មូលហេតុ</span></td>
                            <td>:</td>
                            <td colspan="4">{{$tams_approval->reason}}</td>
                        </tr>
                    </table>
                </td>             
            </tr>         
        </table>
    </body>
</html>
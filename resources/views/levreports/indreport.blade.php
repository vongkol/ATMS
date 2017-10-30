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
                <td colspan="6" class="head1">ព្រះរាជាណាចក្រកម្ពុជា</td>
            </tr>
            <tr>
                <td colspan="6" class="head2">ជាតិ សាសនា ព្រះមហាក្សត្រ</td>
            </tr>
            <tr>
                <td colspan="6" style="padding-top: 40px;"><span style="margin-left: 33px;">ក្រសួងមហាផ្ទៃ</span></td>
            </tr>
            <tr>
                <td colspan="6"><span style="margin-left: 0px;">អគ្គស្នងការនគរបាលជាតិ</span></td>
            </tr>
            <tr>
                <td colspan="6" style="padding-top: 30px; padding-bottom: 30px;" class="head2">ពាក្យសុំច្បាប់</td>
            </tr>
            <tr>
                <td>
                    គោត្តនាម និងនាម
                </td>
                <td>:</td>
                <td>{{$leave->khm_name}}</td>
                <td>អត្តលេខ</td>
                <td>:</td>
                <td>{{$leave->emp_code}}</td>
            </tr>
            <tr>
                <td>
                    តួនាទី
                </td>
                <td>:</td>
                <td>{{$leave->position_name}}</td>
                <td>ផ្នែក</td>
                <td>:</td>
                <td>{{$leave->unit_name}}</td>
            </tr>
            <tr>
                <td>
                    ការិយាល័យ
                </td>
                <td>:</td>
                <td colspan="4">{{$leave->office_name}}</td>       
            </tr>
            <tr>
                <td>នាយកដ្ឋាន</td>
                <td>:</td>
                <td colspan="4">{{$leave->department_name}}</td>
            </tr>
            <tr>
                <td>
                    ប្រភេទច្បាប់
                </td>
                <td>:</td>
                <td>{{$leave->leave_type_name}}</td>
                <td>រយៈពេល</td>
                <td>:</td>
                <td>{{$leave->days}} ថ្ងៃ</td>
            </tr>
            <tr>
                <td>
                    ពីថ្ងៃទី
                </td>
                <td>:</td>
                <td>{{$leave->start_date}}</td>
                <td>ដល់ថ្ងៃទី</td>
                <td>:</td>
                <td>{{$leave->end_date}}</td>
            </tr>
            <tr>
                <td>
                    មូលហេតុ
                </td>
                <td>:</td>
                <td colspan="4">{{$leave->reason}}</td>              
            </tr>
            <tr>
                <td>
                    ច្បាប់នេះត្រូវបាន
                </td>
                <td>:</td>
                <td colspan="4">
                    @if ($leave->approve == "0")
                        មិនទាន់ឯកភាព
                    @elseif ($leave->approve == "1")
                        ឯកភាព
                    @elseif ($leave->approve == "2")
                        មិនឯកភាព
                    @endif
                </td>              
            </tr>
            <tr>
                <td style="padding-top: 30px;" colspan="6">
                   <span style="float: right;">ភ្នំពេញ ថ្ងៃទី......ខែ......ឆ្នាំ......</span>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                <span style="float: right; margin-right: 30px;">ហត្ថលេខា និងឈ្មោះ</span>
                </td>
            </tr>
            <tr>
                <td colspan="6" style="padding-top: 60px;">
                <span style="float: right; margin-right: 60px;">{{$leave->khm_name}}</span>
                </td>
            </tr>
        </table>
    </body>
</html>
<html>
    <head>
        <style>
            @page{
                size: auto A4 landscape;
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
        <table style="width: 100%; margin: 0 auto;">
            <tr>
                <td colspan="3" class="head1">ព្រះរាជាណាចក្រកម្ពុជា</td>
            </tr>
            <tr>
                <td colspan="3" class="head2">ជាតិ សាសនា ព្រះមហាក្សត្រ</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top: 10px;"><span style="margin-left: 33px;">ក្រសួងមហាផ្ទៃ</span></td>
            </tr>
            <tr>
                <td colspan="3"><span style="margin-left: 0px;">អគ្គស្នងការនគរបាលជាតិ</span></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top: 10px; padding-bottom: 10px;" class="head2">តារាងបុគ្គលិក</td>
            </tr>
            <tr>
                <td>
                    <table width="100%">
                    <thead>
                        <tr>
                            <th>ល.រ</th>
                            <th>រូបថត</th>
                            <th>អត្តលេខ</th>
                            <th style="text-align: left;">ឈ្មោះ</th>
                            <th style="text-align: left;">ឈ្មោះទ្បាតាំង</th>    
                            <th>ភេទ</th>
                            <th style="text-align: left;">តួនាទី</th>
                            <th style="text-align: left;">ផ្នែក</th>
                            <th style="text-align: left;">ការិយាល័យ</th>
                            <th style="text-align: left;">នាយកដ្ឋាន</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($employees as $emp)
                        <tr>
                            <td style="text-align: center;">{{$i++}}</td>
                            <td style="text-align: center;"><img src="{{asset('profile/'.$emp->photo)}}" width="38px" height="46px"></td>
                            <td style="text-align: center;">{{$emp->emp_code}}</td>
                            <td>{{$emp->khm_name}}</td>
                            <td>{{$emp->eng_name}}</td>
                            <td style="text-align: center;">{{$emp->gender}}</td>
                            <td>{{$emp->position_name}}</td>
                            <td>{{$emp->unit_name}}</td>
                            <td>{{$emp->office_name}}</td>
                            <td>{{$emp->department_name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </td>
            </tr>
            </table>
        </table>
    </body>
</html>
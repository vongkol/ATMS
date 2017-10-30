<html>
    <head>
    <style>
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
                <td colspan="3" style="padding-top: 10px; padding-bottom: 10px;" class="head2">តារាងបុគ្គលិកសុំច្បាប់</td>
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
                            <th>រយៈពេល</th>
                            <th>ពីថ្ងៃទី</th>
                            <th>ដល់ថ្ងៃទី</th>
                            <th>ប្រភេទច្បាប់</th>
                            <th style="text-align: left;">តួនាទី</th>
                            <th style="text-align: left;">ផ្នែក</th>
                            <th style="text-align: left;">មូលហេតុ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($leaves as $lea)
                        <tr>
                            <td style="text-align: center;">{{$i++}}</td>
                            <td style="text-align: center;"><img src="{{asset('profile/'.$lea->photo)}}" width="38px" height="46px"></td>
                            <td style="text-align: center;">{{$lea->emp_code}}</td>
                            <td>{{$lea->khm_name}}</td>
                            <td style="text-align: center;">{{$lea->days}}</td>
                            <td style="text-align: center;">{{$lea->start_date}}</td>
                            <td style="text-align: center;">{{$lea->end_date}}</td>
                            <td style="text-align: center;">{{$lea->leave_type_name}}</td>
                            <td>{{$lea->position_name}}</td>
                            <td>{{$lea->unit_name}}</td>
                            <td>{{$lea->reason}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </td>
            </tr>
            </table>
        </table>
    </body>
</html>
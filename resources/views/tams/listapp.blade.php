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
                <td colspan="6" style="padding-top: 30px; padding-bottom: 30px;" class="head2">បញ្ជីកែវត្តមានមន្រ្តី</td>
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
                                <th>ថ្ងៃចូល</th>
                                <th>ថ្ងៃចេញ</th>
                                <th>ស្គេនចូល</th>
                                <th>ម៉ោងចូល</th>
                                <th>ស្គេនចេញ</th>
                                <th>ម៉ោងចេញ</th>
                                <th>អនុម័ត</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($tams_approval as $tam)
                            <tr>
                                <td style="text-align: center;">{{$i++}}</td>
                                <td style="text-align: center;"><img src="{{asset('profile/'.$tam->photo)}}" width="38px" height="46px"></td>
                                <td style="text-align: center;">{{$tam->emp_code}}</td>
                                <td>{{$tam->khm_name}}</td>
                                <td style="text-align: center;">{{$tam->a_date_in}}</td>
                                <td style="text-align: center;">{{$tam->a_date_out}}</td>
                                <td style="text-align: center;">{{$tam->time_in}}</td>
                                <td style="text-align: center;">{{$tam->a_time_in}}</td>
                                <td style="text-align: center;">{{$tam->time_out}}</td>
                                <td style="text-align: center;">{{$tam->a_time_out}}</td>
                                <td style="text-align: center;">{{$tam->approve}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
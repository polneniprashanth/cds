@extends('layouts.master')
<link rel="stylesheet" href="css\index.css">
@section('content')
        <form action="{{ route('certcreate', ['certificate'=>$certificate->id]) }}" method="POST">
            @csrf
            <table>
                @foreach($fields as $field)
                <tr>
                    <td class="name-field"><label style="color: rgb(0, 0, 0); padding-left: 70px;">{{$field['FieldName']}}</label></td>   
                    <td>
                        <div class="box">
                            <select name="{{$field['FieldName']}}" id="{{$field['FieldName']}}">
                                <option value="{{$certificate->stud_name}}">Student Name</option>
                                <option value="{{$certificate->course_name}}">Course Name</option>
                                <option value="{{$certificate->stud_id}}">Student ID</option>
                                <option value="http://127.0.0.1:8000/certificate/verify/{{$certificate->cert_id}}"> Verification Link</option>
                            </select>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table> 
            <button style="margin-left:650px" class="button">Submit</button>
        </form>
@endsection
@extends('layouts.master')

@section('page_header')
    Teachers
@endsection

@section('sub_header')
    Symphony Music School
@endsection

@section('content')

    <link href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet">
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}" rel="script"></script>

    {{--Basic buttons to add student and etc--}}
    <div class="container-fluid" style="margin-bottom: 5px;">
        <a href="{{route('addTeacher')}}" class="btn btn-sm btn-primary pull-right">Add Teacher</a>
    </div>

    <div class="box box-info with-border">
        <div class="box-body">

            <style>
                table td, th {
                    text-align: center;
                }
            </style>

            <table class="table table-condensed table-hover table-hover" id="teacherTable">
                <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>Gender</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teachers as $teacher)
                    <tr>
                        <td>{{$teacher->getID()}}</td>
                        <td>{{$teacher->getName()}}</td>
                        <td>
                            @foreach($teacher->getPhones() as $phone)
                                {{$phone}},
                            @endforeach
                        </td>
                        <td>{{$teacher->getGender()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#teacherTable').DataTable();
        });
    </script>

@endsection

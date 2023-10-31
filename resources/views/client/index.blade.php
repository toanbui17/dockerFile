@extends('layouts.admin')
@section('title')
    {{$title}}
@endsection
@section('conten_ad')
<div class="container">
    <div class="category row">
        <div class="category_conten col-md-12">
            <div class="conten_box">
                <div class="conten_hear">
                    <h3 class="conten_name">
                        {{request()->path()}}
                    </h3>
                </div>
                <div class="body_box home1">
                    <div class="conten_body">
                        <h1>information personnel all</h1>
                        @foreach ($dataUser as $key => $it)
                        @if (!empty($it->personnel->office))
                        <div class="mb_4">
                            <label for="" class="name_input">ten user:</label>
                            <label for="" class="name_input_label">{{$it->name}}</label>
                            <label for="" class="name_input">email user:</label>
                            <label for="" class="name_input_label">{{$it->email}}</label>
                            <label for="" class="name_input">lever:</label>
                            <label for="" class="name_input_label">{{$it->lever}}</label>
                            <label for="" class="name_input">office:</label>
                            <label for="" class="name_input_label">{{$it->personnel->office}}</label>
                            <label for="" class="name_input">age:</label>
                            <label for="" class="name_input_label">{{$it->personnel->age}}</label>
                            <label for="" class="name_input">image:</label>
                            <img src="/upload/{{$it->personnel->image}}" alt="" width="150" height="150">
                            <label for="" class="name_input">number phone:</label>
                            <label for="" class="name_input_label">{{$it->personnel->number_phone}}</label>
                            <label for="" class="name_input">address:</label>
                            <label for="" class="name_input_label">{{$it->personnel->address}}</label>
                        </div>
                        {{-- <div class="box_table">
                            <table class="staff_table">
                                <thead>
                                    <tr>
                                        <th>stt</th>
                                        <th>ten</th>
                                        <th>email</th>
                                        <th>lever</th>
                                        <th>chuc vu</th>
                                        <th>tuoi</th>
                                        <th>anh</th>
                                        <th>so dt</th>
                                        <th>que quan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($dataUser))
                                        @foreach ($dataUser as $key => $it)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$it->name}}</td>
                                        <td>{{$it->email}}</td>
                                        <td>{{$it->lever}}</td>
                                        <td>{{$it->personnel->office}}</td>
                                        <td>{{$it->personnel->number_phone}}</td>
                                        <td><img src="/upload/{{$it->personnel->image}}" alt="" width="100" height="100"></td>
                                        <td>{{$it->personnel->address}}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="10">null</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div> --}}
                        @else
                        <div class="mb_4">
                            <label for="" class="name_input_label">{{$it->name}}</label>
                            <div class="data_nul" colspan="10">user chua co thong tin</div>     
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
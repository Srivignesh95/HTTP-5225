@extends('layout')
@section('content')
    <h1> All Students </h1>
    @foreach ( $students as $student)
        <li>
            {{ $student -> fname }}  {{ $student -> lname }} | 
            <a href="{{ route('students.edit',$student -> id) }}">Edit</a>
        </li>
    @endforeach
@endsection

@extends('layouts.frontEndMaster')

@section('body_content')

@include('frontend.sections.latest')

@include('frontend.sections.featured')

@include('frontend.sections.premium')

@include('frontend.sections.popular')

@endsection


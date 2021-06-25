@extends('layouts.client')

@section('title', $project->title)
{{-- @section('meta-url', $project->public_link) --}}
@section('meta-title', $project->title)
@section('model-code-head', $project->model_code)
@section('favicon', $project->favicon)
@section('model-code-body', $project->model_code)
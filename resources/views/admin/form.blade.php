@extends('twill::layouts.form')

@section('contentFields')
    @formField('medias', [
        'name' => 'role-homepage-cover',
        'label' => 'Cover image',
        'withVideoUrl' => false,
        'max' => 1,
    ])

    @formField('input', [
        'name' => 'description',
        'label' => 'Description',
        'translated' => true,
        'maxlength' => 100
    ])
@stop

@section('fieldsets')
    <a17-fieldset title="Slideshow" id="slideshow">
        @formField('medias', [
            'name' => 'role-homepage-slideshow',
            'label' => 'Images',
            'withVideoUrl' => false,
            'max' => 100,
        ])
    </a17-fieldset>

    @include('admin._components.seo')
@stop

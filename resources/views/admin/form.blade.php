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
    <a17-fieldset title="SEO" id="SEO" :open="false">
        @formField('input', [
            'name' => 'seo_title',
            'label' => 'Titre SEO',
            'translated' => true,
            'maxlength' => 250
        ])

        @formField('input', [
            'name' => 'seo_description',
            'label' => 'Description SEO',
            'translated' => true,
            'maxlength' => 250
        ])
    </a17-fieldset>
@stop

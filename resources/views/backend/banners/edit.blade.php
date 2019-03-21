@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form <small>Edit Banner</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="x_content">
                {{ Form::open
                    ([
                        'method' => 'PUT',
                        'route' => ['banner.update', $banner->id],
                        'files' => true,
                        'class' => 'form-horizontal form-label-left input_mask',
                        'enctype' => 'multipart/form-data'
                    ])
                }}
                    <div class="col-md-9 col-sm-9 col-md-offset-9 form-group has-feedback style-form" style="margin-left: 13em;">
                        {{ Form::text('name', $banner->name, ['class' => 'form-control has-feedback-left', 'id' => 'inputSuccess2', 'placeholder' => 'Import name', 'style' => 'padding-left:5em']) }}
                        <span class="form-control-feedback left" style="width:4em; color:#73879C;">Name *</span>
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <h2 class="style_h2_news">Image Banner *</h2>
                    <div class="form-group">
                        {{ Form::label('image', 'Banner Image *: ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        <br>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::file('image', null, ['class' => 'form-control fileimage']) }}
                            <p>( Please select a picture of the correct size min-height: 300 and min-width:200.... ) </p>
                        </div>
                        @if ($errors->has('image'))
                            @foreach ($errors->get('image') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="x_content" style="text-align:center;">
                        @if(!empty($banner->image))
                        <img src="uploads/images/banners/{{ $banner->image}}" width="80%" alt="Image Cover" id="img">
                        @else
                        <img src="" width="80%" alt="Image Cover" id="img" style="display: none;">
                        @endif
                    </div>
                    @if ($errors->has('content'))
                            @foreach ($errors->get('content') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-md-offset-4" style="margin-top:1em;">
                            {{ Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Update', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-right:5em;'] ) }}
                            <a
                                href="{{route('banner.index')}}"
                                class="btn btn-warning"
                            >
                                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancle
                            </a>
                        </div>
                    </div>
                {{  Form::close()  }}
            </div>
        </div>
    </div>
</div>
@endsection
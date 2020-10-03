{{-- {!! Form::model($model, ['url' => $url_destroy, 'method' => 'delete']) !!} --}}

<a class="btn btn-primary btn-sm" href="{{ $url_edit }}"><i class="fa fa-edit bigger-120"></i> Ubah</a>
<a class="btn btn-danger btn-sm" href="{{ $url_destroy }}"><i class="fa fa-trash"></i> Hapus</a>
{{-- <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button> --}}
{{-- {!! Form::close()!!} --}}
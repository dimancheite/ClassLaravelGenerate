<div class="medias">
    <div class="row">
        @foreach($files as $key => $file)
            <div class="col-sm-4">
                @if ($file->getFileType() == 'image')
                    <img class="file-img-list-item" src="{!! asset('/') . $file->filename !!}" >
                    {!! $file->original_name !!}
                @elseif ($file->getFileType() == 'pdf')
                    <img class="file-img-list-item" src="{!! asset('/images/pdf.jpeg') !!}" >
                    {!! $file->original_name !!}
                @endif
            </div>

            @if (($key + 1) % 3 == 0)
                </div><div class="row">
            @endif
        @endforeach
    </div>
</div>
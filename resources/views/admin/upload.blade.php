@extends('layouts.app2')

@section('content')

<html>
    <body>
        <form action="{{url('admin/csv_upload')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <label>Importez un fichier csv</label>
            <input type="file" name="upload_file"/>
            <input class="btn_submit" type="submit" value="Valider" name="submit"/>
        </form>
    </body>
</html>

@endsection
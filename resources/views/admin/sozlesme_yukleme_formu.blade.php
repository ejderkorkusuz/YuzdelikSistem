@include('admin.js_css_eklentileri')
<form role="form" method="post" enctype="multipart/form-data"  action="{{url('/')}}/admin/isler/saveagreement/{{$is_id}}">
        @csrf
    <div class="form-group">
        <label for="exampleInputFile">Sözleşme Yükle </label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" accept="image/x-png,image/gif,image/jpeg" class="custom-file-input" name="sozlesme_resim[]" multiple>
                <label class="custom-file-label" for="exampleInputFile">Sözleşme Seç</label>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">YÜKLE</button>
    </div>
</form>

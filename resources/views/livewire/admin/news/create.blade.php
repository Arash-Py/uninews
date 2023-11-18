@section('title',$page_title)
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header" style="">
                    <div class="card-header">
                        <h3 class="card-title">{{$this->page_title}}</h3>
                    </div>
                    <div class="card-toolbar">
                    </div>
                </div>
                <form wire:submit.prevent="createNews">
                    <div class="card-body">
                        <div class="form-group mt-3 row">
                            <label class="col-lg-2 col-form-label text-end">عنوان خبر :</label>
                            <div class="col-lg-3">
                                <input type="text" wire:model="title" class="form-control"
                                       placeholder="عنوان را وارد کنید"/>
                                @error('title')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <label class="col-lg-2 col-form-label text-end">متن خبر :</label>
                            <div class="col-lg-3">
                                <textarea wire:model="body" class="form-control"></textarea>
                                @error('body')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3 row">
                            <label class="col-lg-2 col-form-label text-end">تصویر خبر :</label>
                            <div class="col-lg-3">
                                <input type="file" wire:model="pic" class="form-control"/>
                                @error('title')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <div class="card-footer mt-5">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-success mr-2">ذخیره
                                </button>
                                <a href="{{route('admin.news.index')}}" class="btn btn-secondary">انصراف</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@section('scripts')

@endsection

@extends('layouts.admin')

@section('content')
<section class="py-8">
    <div class="container px-4 mx-auto">
        <div class="py-4 bg-white rounded">
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex px-6 pb-4 border-b">
                    <h3 class="text-xl font-bold">ブログ登録</h3>
                    <div class="ml-auto">
                        <button type="submit" class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">保存</button>
                    </div>
                </div>

                <div class="pt-4 px-6">
                    <!-- ▼▼▼▼エラーメッセージ▼▼▼▼　-->
                    @if($errors->any())
                    <div class="mb-8 py-4 px-6 border border-red-300 bg-red-50 rounded">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li class="text-red-400">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- ▲▲▲▲エラーメッセージ▲▲▲▲　-->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="title">タイトル</label>
                        <input id="title" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="title" value="{{ old('title') }}">
                    </div>

                    <div class="mb-6 image-input">
                        <label class="block text-sm font-medium mb-2" for="image">画像</label>
                        <div class="flex items-end">
                            <img id="previewImage" src="/images/admin/noimage.jpg" data-noimage="/images/admin/noimage.jpg" alt="" class="preview-image rounded shadow-md w-64">
                            <input id="image" class="selected-image block w-full px-4 py-3 mb-2" type="file" accept='image/*' name="image">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="body">本文</label>
                        <textarea id="body" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="body" rows="5">{{ old('body') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="category">カテゴリ</label>
                        <div class="flex">
                            <select id="category" class="appearance-none block pl-4 pr-8 py-3 mb-2 text-sm bg-white border rounded" name="category_id">
                                <option value="">選択してください</option>
                                @foreach($categories as $category)
                                @if ($loop->index !== 0)
                                <option value="{{ $category->id }}" @if($category->id == old('category_id')) selected @endif>{{ $category->name }}</option>
                                @endif
                                @endforeach
                                <option value="1" @if(1 == old('category_id')) selected @endif>その他</option>
                            </select>
                            <div class="pointer-events-none transform -translate-x-full flex items-center px-2 text-gray-500">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div>
                        </div>
                    <button onclick="toggleModal('category-create-modal')" type="button" class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">カテゴリ登録</button>

                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium mb-2">登場するねこ</label>
                        <select id="js-pulldown" class="mr-6 w-full" name="cat_id" multiple>
                            <option value="">選択してください</option>
                            @foreach($cats as $cat)
                            <option value="{{ $cat->id }}" @if($cat->id == old('cat_id')) selected @endif>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            <div class="px-6 mb-6">
                <button onclick="toggleModal('tag-create-modal')" type="button"class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">新しいねこを登録</button>
            </div>
        </div>
    </div>

   <x-add-cat-modal :cat="$cat"/>
   <x-add-category-modal :category="$category"/>
    

      
</section>

<script>
    // ねこちゃんたち追加
    $('#js-pulldown').select2();
    imgPreview();
    validateForm();
    
</script>
@endsection
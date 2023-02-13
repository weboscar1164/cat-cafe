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

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="image">画像</label>
                        <div class="flex items-end">
                            <img id="previewImage" src="/images/admin/noimage.jpg" data-noimage="/images/admin/noimage.jpg" alt="" class="rounded shadow-md w-64">
                            <input id="image" class=" block w-full px-4 py-3 mb-2" type="file" accept='image/*' name="image">
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
                                <option value="{{ $category->id }}" @if($category->id == old('category_id')) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none transform -translate-x-full flex items-center px-2 text-gray-500">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div>
                        </div>
                    <button type="submit" class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">カテゴリ登録</button>

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
    <!-- ▼▼▼▼新しいねこ登録モーダル▼▼▼▼　-->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="tag-create-modal">
        <div class="relative w-auto my-6 mx-auto max-w-3xl">
          <!--content-->
          <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <form action="{{ route('admin.cat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                <h3 class="text-3xl font-semibold">
                    新しいねこの登録
                </h3>
                    <button onclick="toggleModal('tag-create-modal')"  type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!--body-->
                <div class="relative p-6 flex-auto">
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
                     <label class="block text-sm font-medium mb-2" for="name">名前</label>
                     <input id="name" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="name" value="{{ old('name') }}">
                </div>
                <div class="mb-6">
                     <label class="block text-sm font-medium mb-2" for="breed">種類</label>
                     <input id="breed" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text"  name="breed" value="{{ old('breed') }}">
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2" for="gender">性別</label>
                    <div class="flex">
                        <select id="gender" class="appearance-none block pl-4 pr-8 py-3 mb-2 text-sm bg-white border rounded" name="gender">
                            <option value=""@if($cat->id == old('gender')) selected @endif>選択してください</option>
                            <option value="1"@if($cat->id == old('gender')) selected @endif>オス</option>
                            <option value="2"@if($cat->id == old('gender')) selected @endif>メス</option>
                        </select>
                        <div class="pointer-events-none transform -translate-x-full flex items-center px-2 text-gray-500">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2" for="date_of_birth">生まれた日</label>
                    <input id="date_of_birth" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}">
               </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2" for="image">画像</label>
                    <div class="flex items-end">
                        <img id="catPreviewImage" src="/images/admin/noimage.jpg" data-noimage="/images/admin/noimage.jpg" alt="" class="rounded shadow-md w-64">
                        <input id="catImage" class=" block w-full px-4 py-3 mb-2" type="file" accept='image/*' name="image">
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2" for="introduction">紹介文</label>
                    <textarea id="introduction" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="introduction" rows="5">{{ old('body') }}</textarea>
                </div>
              
            </div>
            <!--footer-->
            <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                <div class="px-3 mb-6">
                    <button onclick="toggleModal('tag-create-modal')" type="button" class="py-2 px-3 text-xs text-white font-semibold bg-red-500 rounded-md">閉じる</button>
                </div>
                <div class="px-3 mb-6">
                    <button type="submit"class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">登録</button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="tag-create-modal-backdrop">
        
    </div>
    

      
</section>

<script>
    // ねこちゃんたち追加
    $('#js-pulldown').select2();

    // 画像プレビュー
    document.getElementById('image').addEventListener('change', e => {
        const previewImageNode = document.getElementById('previewImage')
        const fileReader = new FileReader()
        fileReader.onload = () => previewImageNode.src = fileReader.result
        if (e.target.files.length > 0) {
            fileReader.readAsDataURL(e.target.files[0])
        } else {
            previewImageNode.src = previewImageNode.dataset.noimage
        }
    })

    document.getElementById('catImage').addEventListener('change', e => {
        const previewImageNode = document.getElementById('catPreviewImage')
        const fileReader = new FileReader()
        fileReader.onload = () => previewImageNode.src = fileReader.result
        if (e.target.files.length > 0) {
            fileReader.readAsDataURL(e.target.files[0])
        } else {
            previewImageNode.src = previewImageNode.dataset.noimage
        }
    })

    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).calssList.toggle("frex");
        document.getElementById(modalID + "-backdrop").classList.toggle("frex");
    }
</script>
@endsection
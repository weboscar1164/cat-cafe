<div>
    <!-- ▼▼▼▼新しいねこ登録モーダル▼▼▼▼　-->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="tag-create-modal">
        <div class="relative w-auto my-6 mx-auto max-w-3xl">
          <!--content-->
          <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
              <form class="validate-form" action="{{ route('admin.cat.store') }}" method="POST" enctype="multipart/form-data" >
                  @csrf
            <!--header-->
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
                    <div class="mb-6 validate-input">
                        <label class="block text-sm font-medium mb-2" for="name">名前</label>
                        <input id="name" class="form-control validate-target block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="name" value="{{ old('name') }}" required maxlength="20">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-6  validate-input">
                        <label class="block text-sm font-medium mb-2" for="breed">種類</label>
                        <input id="breed" class="form-control validate-target form-control block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text"  name="breed" value="{{ old('breed') }}" required maxlength="20">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-6  validate-input">
                         <label class="block text-sm font-medium mb-2" for="gender">性別</label>
                        <div class="flex">
                            <select id="gender" class="form-control validate-target appearance-none block pl-4 pr-8 py-3 mb-2 text-sm bg-white border rounded" name="gender" required>
                                <option value="" @if($cat->id == old('gender')) selected @endif>選択してください</option>
                                <option value="1" @if($cat->id == old('gender')) selected @endif>オス</option>
                                <option value="2" @if($cat->id == old('gender')) selected @endif>メス</option>
                            </select>
                            <div class="target-icon pointer-events-none transform -translate-x-full flex items-center px-2 text-gray-500">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="invalid-feedback block"></div>
                    </div>
                    <div class="mb-6  validate-input">
                        <label class="block text-sm font-medium mb-2" for="date_of_birth">生まれた日</label>
                        <input id="date_of_birth" class="form-control validate-target block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-6  validate-input image-input">
                        <label class="block text-sm font-medium mb-2" for="image">画像</label>
                        <div class="flex items-end">
                            <img id="catPreviewImage" src="/images/admin/noimage.jpg" data-noimage="/images/admin/noimage.jpg" alt="" class="preview-image rounded shadow-md w-64">
                            <input id="catImage" class="form-control validate-target selected-image block w-full px-4 py-3 mb-2" type="file" accept='image/*' name="image" required>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-6  validate-input">
                        <label class="block text-sm font-medium mb-2" for="introduction">紹介文</label>
                        <textarea id="introduction" class="form-control validate-target block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="introduction" rows="5" required maxlength="250">{{ old('body') }}</textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                    <div class="px-3 mb-6">
                        <button onclick="toggleModal('tag-create-modal')" type="button" class="py-2 px-3 text-xs text-white font-semibold bg-red-500 rounded-md">閉じる</button>
                    </div>
                    <div class="px-3 mb-6">
                        <button type="submit" class="button-disabled py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md " disabled>登録</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
      </div>
      <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="tag-create-modal-backdrop">
    </div>
</div>
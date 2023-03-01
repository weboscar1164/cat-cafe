<div>
    <!-- ▼▼▼▼削除確認モーダル▼▼▼▼　-->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="delete-modal">
        <div class="relative w-auto my-6 mx-auto max-w-3xl">
          <!--content-->
          <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <form class="validate-form" action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                    <h3 class="text-3xl font-semibold">
                        削除確認
                    </h3>
                    <button onclick="toggleModal('delete-modal')"  type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!--body-->
                <div class="relative p-6 flex-auto">
                    <p>削除します。よろしいですか？</p>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                    <div class="px-3 mb-6">
                        <button onclick="toggleModal('delete-modal')" type="button" class="py-2 px-3 text-xs text-white font-semibold bg-red-500 rounded-md">閉じる</button>
                    </div>
                    <div class="px-3 mb-6">
                        <button type="submit" class="button-disabled py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">削除</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
      <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="delete-modal-backdrop">
    </div>
</div>
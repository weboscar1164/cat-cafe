@extends('layouts.admin')

@section('content')
<section class="py-8">
    <div class="container px-4 mx-auto">
        <div class="py-4 bg-white rounded">
            <div class="px-6 pb-4 border-b">
                <h3 class="text-xl font-bold">お問い合わせ内容</h3>
            </div>

            <div class="pt-4 px-6">
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2" for="name">お名前</label>
                    <input id="name" class="block w-96 max-w-full px-4 py-3 mb-2 text-sm text-gray-500 border rounded" type="text" disabled value="{{ $contact->name }}">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2" for="name_kana">お名前（フリガナ）</label>
                    <input id="name_kana" class="block w-96 max-w-full px-4 py-3 mb-2 text-sm text-gray-500 border rounded" type="text" disabled value="{{ $contact->name_kana }}">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2" for="phone">電話番号</label>
                    <input id="phone" class="block w-96 max-w-full px-4 py-3 mb-2 text-sm text-gray-500 border rounded" type="text" disabled value="{{ $contact->phone }}">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2" for="email">メールアドレス</label>
                    <input id="email" class="block w-96 max-w-full px-4 py-3 mb-2 text-sm text-gray-500 border rounded" type="email" disabled value="{{ $contact->email }}">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2" for="body">本文</label>
                    <textarea id="body" class="block w-full px-4 py-3 mb-2 text-sm text-gray-500 border rounded" name="field-name" rows="5" disabled>{{ $contact->body }}</textarea>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
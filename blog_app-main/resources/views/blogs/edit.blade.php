<!DOCTYPE html>
  <html lang="ja">
  
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Todo</title>
  
      @vite('resources/css/app.css')
  </head>
  
  <body class="flex flex-col min-h-[100vh]">
      <header class="bg-slate-800">
          <div class="max-w-7xl mx-auto px-4 sm:px-6">
              <div class="py-6">
                  <p class="text-white text-xl">Todoアプリ-編集画面</p>
              </div>
          </div>
      </header>
  
      <main class="grow grid place-items-center">
      <section class="text-gray-600 body-font relative">
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
          <div class="flex flex-wrap -m-2">
            <div class="p-2 w-1/2">
              <div class="relative">
                <form action="/blogs/{{ $blog->id }}" method="post" class="mt-10">
                      @csrf
                      @method('PUT')
                      <div class="flex flex-col items-center">
                          <label class="w-full max-w-3xl mx-auto">
                              <input
                                  type="text" name="blog_title" value="{{$blog->title}}" />
                              @error('blog_name')
                                  <div class="mt-3">
                                      <p class="text-red-500">
                                          {{ $message }}
                                      </p>
                                  </div>
                              @enderror
                          </label>
                          <p>{{$blog->created_at}}</p>
                          <label class="w-full max-w-3xl mx-auto">
                              <input
                                  type="text" name="blog_body" value="{{$blog->body}}" />
                              @error('blog_body')
                                  <div class="mt-3">
                                      <p class="text-red-500">
                                          {{ $message }}
                                      </p>
                                  </div>
                              @enderror
                          </label>
            </div>
            <div class="mt-8 w-full flex items-center justify-center gap-10">
                <a href="/blogs" class="block shrink-0 underline underline-offset-2">
                戻る</a>
    <button type="submit"
        class="bg-emerald-700 py-4 w-20 text-white md:hover:bg-emerald-800 transition-colors">完了</button>
</form>
          </div>
        </div>
      </div>
    </section>
      </main>
      <footer class="bg-slate-800">
          <div class="max-w-7xl mx-auto px-4 sm:px-6">
              <div class="py-4 text-center">
                  <p class="text-white text-sm">Todoアプリ</p>
              </div>
          </div>
      </footer>
  </body>
  
  </html>
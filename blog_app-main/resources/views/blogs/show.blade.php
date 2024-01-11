<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>blog</title>
</head>
 
<body>
<section class="text-gray-600 body-font relative">
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
          <div class="flex flex-wrap -m-2">
            <div class="p-2 w-1/2">
              <div class="relative">
             <p>{{$blog->title}}</p>
            <p>{{$blog->created_at}}</p>
             <p>{{$blog->body}}</p>
            </div>
            <div class="mt-8 w-full flex items-center justify-center gap-10">
                <a href="/blogs" class="block shrink-0 underline underline-offset-2">
                戻る</a>
            <a href="/blogs/{{$blog->id}}/edit/">
            編集する</a>
            <div>
  <form onsubmit="return deleteTask();"
      action="/blogs/{{ $blog->id }}" method="post"
      class="inline-block text-gray-500 font-medium"
      role="menuitem" tabindex="-1">
      @csrf
      @method('DELETE')
      <button type="submit"
          class="py-4 w-20 md:hover:bg-slate-200 transition-colors">削除</button>
  </form>
</div>
          </div>
        </div>
      </div>
    </section>
    <script>
    function deleteTask() {
        if (confirm('本当に削除しますか？')) {
            return true;
        } else {
            return false;
        }
    }
  </script>
</body>
 
</html>
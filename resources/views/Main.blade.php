<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/Main.css') }}">
    <script src="{{ asset('js/Main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/turndown/7.0.0/turndown.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/markdown-it@12.0.6/dist/markdown-it.min.js"></script>
</head>

<body>
    <div class="container1">
        <div class="welcome-container">
            <p class="page-title">Welcome!</p>
            <p class="page-title">{{ $user->name }}</p>
        </div>

        <div class="create-button-container">
            <form method="POST" action="{{ route('store-page') }}">
                @csrf
                <button class="create-page-button" type="submit">Create page</button>
            </form>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="page-container">
            @foreach ($pages as $page)
                <button class="page-button" data-page-id="{{ $page->id }}">
                    {{ $page->title }}
                </button>
            @endforeach
        </div>

        <div class="logout-button-container">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout-button" type="submit">Logout</button>
            </form>
        </div>
    </div>

    <div class="container2">
        <form class="container2-form" id="updateForm" method="POST" action="{{ route('update-all-pages') }}">
            @csrf
            @foreach ($pages as $page)
                <div class="page-input-container" id="page-container-{{ $page->id }}"
                    style="{{ $loop->first ? '' : 'display: none;' }}">

                    <div id="toolbar" class="flex space-x-2 mb-2">
                        <input class="title" name="title[{{ $page->id }}]"
                            value="{{ old('title.' . $page->id, $page->title) }}" rows="1" />
                        <button type="button" class="bold-button"
                            onclick="document.execCommand('bold', false, null)">Bold</button>
                        <button type="button" class="italic-button "
                            onclick="document.execCommand('italic', false, null)">Italic</button>
                        <button type="button" class="underline-button"
                            onclick="document.execCommand('underline', false, null)">Underline</button>
                        <select id="headerSelect" class="size-select"
                            onchange="document.execCommand('formatBlock', false, this.value)">
                            <option selected>- Header -</option>
                            <option value="h1">H1</option>
                            <option value="h2">H2</option>
                            <option value="h3">H3</option>
                        </select>
                    </div>

                    <div id="editor-{{ $page->id }}" class="border border-gray-300 p-4 mt-2" contenteditable="true"
                        style="min-height: 200px;">
                        {{ old('text.' . $page->id, $page->text) }}
                    </div>

                    <div id="markdownOutput" class="hidden">
                    </div>

                    <div class="save-button-container mt-2">
                        <button class="save-button" type="submit" id="saveButton">Save</button>
                        <button type="button" class="turndown-button" data-page-id="{{ $page->id }}">Convert to
                            HTML</button>
                        <button type="button" class="markdown-button" data-page-id="{{ $page->id }}">Convert to Markdown</button>
                    </div>
                </div>
            @endforeach
        </form>
    </div>
</body>

</html>